<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 09.01.2018
 * Time: 22:37
 */

namespace frontend\modules\personal_area\controllers;

use common\classes\Debug;
use common\models\db\Ads;
use common\models\db\AdsImg;
use common\models\db\Organizations;
use common\models\db\Profile;
use common\models\db\VkGroups;
use common\models\db\VkProdAds;
use common\models\db\VkProductCat;
use common\models\db\VkUserGroups;
use common\models\User;
use common\models\VK;
use yii\filters\AccessControl;
use yii\web\Controller;

class IntegrationController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionVk()
    {
        $userId = \Yii::$app->user->id;
        $userGroups = VkUserGroups::find()->where(['user_id' => $userId])->orderBy('id DESC')->all();
        $userCompany = Organizations::find()->where(['user_id' => $userId])->all();
        return $this->render('vk', ['userGroups' => $userGroups, 'userCompany' => $userCompany]);
    }

    public function actionSetLink()
    {
        $link = \Yii::$app->request->post('link');
        $domain = str_replace('https://vk.com/', '', $link);
        $userCompany = Organizations::find()->where(['user_id' => \Yii::$app->user->id])->all();
        $vk = new VK([
            'client_id' => '6301353',
            'client_secret' => 'jV9DdZuX0bb6sA6E4X8r',
            'access_token' => '51a45c1161c9e972bc6f891a5b56073c6307301c8eec609b1ba93b1eb8bc0b7db7a44300b2e11db0a1d2b',
        ]);

        $res = json_decode($vk->getGroupInfoByDomain($domain, ['fields' => 'members_count']));

        if (isset($res->error)) {
            return json_encode(['error' => 'Группа не найдена'], JSON_UNESCAPED_UNICODE);
        }

        $info = $res->response[0];

        if (VkUserGroups::find()->where(['user_id' => \Yii::$app->user->id, 'owner_id' => $info->id * (-1)])->one()) {
            return json_encode(['error' => 'Группа уже добавленна'], JSON_UNESCAPED_UNICODE);
        }

        $prod = json_decode($vk->getProducts($info->id * (-1), []));
        $count = $prod->response->count;
        $model = new VkUserGroups();
        $model->photo = $info->photo_200;
        $model->name = $info->name;
        $model->domain = $domain;
        $model->user_id = \Yii::$app->user->id;
        $model->owner_id = $info->id * (-1);
        $model->last_update = time();
        $model->prod_count = $count;
        $model->members_count = $info->members_count;
        $model->save();

        return $this->renderAjax('_group_info', [
            'model' => $model,
            'count' => $count,
            'info' => $info,
            'userCompany' => $userCompany,
        ]);
    }

    public function actionDelGroup()
    {
        $res = VkUserGroups::deleteAll(['id' => \Yii::$app->request->post('id')]);
    }

    public function actionUpdateGroup()
    {
        $groupId = \Yii::$app->request->post('id');
        $group = VkUserGroups::find()->where(['id' => $groupId])->one();
        $userCompany = Organizations::find()->where(['user_id' => \Yii::$app->user->id])->all();

        $vk = new VK([
            'client_id' => '6301353',
            'client_secret' => 'jV9DdZuX0bb6sA6E4X8r',
            'access_token' => '51a45c1161c9e972bc6f891a5b56073c6307301c8eec609b1ba93b1eb8bc0b7db7a44300b2e11db0a1d2b',
        ]);
        $res = json_decode($vk->getGroupInfoByDomain($group->domain, ['fields' => 'members_count']));
        $info = $res->response[0];

        $prod = json_decode($vk->getProducts($info->id * (-1), []));
        $count = $prod->response->count;

        $group->photo = $info->photo_200;
        $group->name = $info->name;
        $group->last_update = time();
        $group->prod_count = $count;
        $group->members_count = $info->members_count;
        $group->save();

        return $this->renderAjax('_update_group', ['group' => $group, 'userCompany' => $userCompany]);
    }

    public function actionAddProd()
    {
        $post = \Yii::$app->request->post();
        $group = VkUserGroups::find()->where(['id' => $post['id']])->one();
        $userId = \Yii::$app->user->id;
        $user = User::find()->where(['id' => $userId])->one();

        $vk = new VK([
            'client_id' => '6301353',
            'client_secret' => 'jV9DdZuX0bb6sA6E4X8r',
            'access_token' => '51a45c1161c9e972bc6f891a5b56073c6307301c8eec609b1ba93b1eb8bc0b7db7a44300b2e11db0a1d2b',
        ]);

        $prods = $vk->getAllProducts($group->owner_id, ['extended'=>1]);
        //Debug::prn($post);
        $i = 0;
        foreach ($prods as $prod) {
            //Сохраняем объявление
            if(!VkProdAds::find()->where(['user_id' => $userId, 'vk_prod_id' => $prod->id, 'owner_id' => $prod->owner_id])->one()){
                $ad = new \frontend\modules\adsmanager\models\Ads();
                $ad->user_id = $user->id;
                $ad->category_id = VkProductCat::find()->where(['cat_id' => $prod->category->id])->one()->board_cat_id;
                $ad->title = $prod->title;
                $ad->content = $prod->description;
                $ad->status = 1;
                $geoInfo = \common\classes\Address::get_geo_info();
                $ad->region_id = $geoInfo['region_id'];
                $ad->city_id = $geoInfo['city_id'];
                $userInfo = Profile::find()->where(['user_id' => $userId])->one();

                if(!empty($userInfo->name)){
                    $ad->name = $userInfo->name;
                }

                if(!empty($userInfo->public_email)){
                    $ad->mail = $userInfo->public_email;
                }
                else{
                    $ad->mail = User::find()->where(['id' => $userId])->one()->email;
                }
                $ad->private_business = $post['chOrB'];
                $ad->phone = $post['phone'];
                $ad->business_id = isset($post['sbVal']) ? $post['sbVal'] : null;
                $ad->price = $prod->price->amount / 100;
                $ad->save();

                //Сохраняем связь
                $vpa = new VkProdAds();
                $vpa->user_id = $userId;
                $vpa->ad_id = $ad->id;
                $vpa->vk_prod_id = $prod->id;
                $vpa->owner_id = $prod->owner_id;
                $vpa->save();

                //Сохраняем фото
                if(isset($prod->photos)){
                    foreach ($prod->photos as $photo){
                        $img = new AdsImg();
                        $img->ads_id = $ad->id;
                        $img->img = VK::getPhotoFromObj($photo);
                        $img->img_thumb = VK::getPhotoFromObj($photo);
                        $img->user_id = $userId;
                        $img->save();
                    }
                }
                $i++;
            }
        }
        return $i;
    }
}