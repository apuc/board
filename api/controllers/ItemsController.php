<?php

namespace api\controllers;

use common\classes\ApiFunction;
use common\classes\Debug;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsValue;
use common\models\db\AdsImg;
use common\models\db\SiteAccessApi;
use dektrium\user\helpers\Password;
use dektrium\user\models\User;
use frontend\modules\adsmanager\models\Ads;
use frontend\modules\adsmanager\models\FilterAds;
use Yii;
use yii\caching\DbDependency;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\imagine\Image;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\web\ServerErrorHttpException;

class ItemsController extends ActiveController
{
    public $modelClass = 'api\models\Ads';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'ads',
    ];

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['view']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    /**
     * @return \yii\data\ActiveDataProvider
     * @throws ServerErrorHttpException
     */
    public function prepareDataProvider()
    {
        $searchModel = new \api\models\Ads();
        return $searchModel->getListAds(Yii::$app->request->queryParams);
    }

    public function actionView()
    {
        $siteInfo = ApiFunction::getApiKey(Yii::$app->request->get('api_key'));
        if (isset($siteInfo->name)) {
            $model = \api\models\Ads::find()->where(['id' => Yii::$app->request->get('id')])
                ->with('ads_img')
                ->with('adsFieldsValues')
                ->one();
            \api\models\Ads::updateAllCounters(['views' => 1], ['id' => $model->id]);

            return $model;
        } else {
            return $siteInfo;
        }

    }

    public function actionCreate()
    {
        //Debug::prn($_FILES);
        //Debug::prn(Yii::$app->request->post());
        //die();
        $model = new Ads();
        //$ads = json_decode(Yii::$app->request->post(), true);
        //Debug::prn($_POST);
        $siteInfo = ApiFunction::getApiKey(Yii::$app->request->post('api_key'));
        if (!isset($siteInfo->name)) {
            throw new ServerErrorHttpException($siteInfo);
        }
        if ($model->load(Yii::$app->request->post()) /*&& $model->validate()*/) {

            $user = User::find()->where(['email' => $model->mail])->one();
            //Debug::prn($user);
            if (!empty($user)) {
                $model->user_id = $user->id;
            } else {
                $user = new User();
                $user->username = $model->mail;
                $user->email = $model->mail;
                $password = Password::generate(6);
                $user->password_hash = Yii::$app->security->generatePasswordHash($password);
                $user->confirmed_at = time();
                $user->save();
                $model->user_id = $user->id;

                $subject = 'Новое объявление';
                Yii::$app->mailer->compose('user/add-user',
                    [
                        'password' => $password,
                        'mail' => $model->mail,
                    ]
                )
                    ->setTo($model->mail)
                    ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
                    ->setSubject($subject)
                    ->send();

            }

            $model->status = 1;
            $model->private_business = 0;
            $model->site_id = $siteInfo->id;
            $model->visibility = $siteInfo->visible_ads;

            if ($model->validate()) {
                $model->save();
            }

            if (!empty($_POST['AdsField'])) {
                \common\classes\Ads::saveAdsFields($_POST['AdsField'], $model->id);
            }

            if (!empty($_POST['img'])) {
                foreach ($_POST['img'] as $item) {
                    $adsImg = new AdsImg();
                    $adsImg->user_id = $user->id;
                    $adsImg->img_thumb = $item['img_thumb'];
                    $adsImg->img = $item['img'];
                    $adsImg->ads_id = $model->id;
                    $adsImg->save();
                }
            }

            //$model->save();

            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
            $id = implode(',', array_values($model->getPrimaryKey(true)));
            $response->getHeaders()->set('Location', Url::toRoute(['view', 'id' => $id], true));
        } elseif (!$model->hasErrors()) {
            //Debug::prn(123);
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }
        return $model;
    }

    public function actionUpdate()
    {
        $post = Yii::$app->request->getBodyParams();
        $model = Ads::find()->where(['id' => $post['Ads']['id']])->one();
        $model->load($post['Ads'], '');
        if ($model->validate()) {
            $model->status = 1;
            $model->save();
            if (!empty($post['img'])) {
                /*Debug::prn($model->id);
                die();*/
                AdsImg::deleteAll(['ads_id' => $model->id]);
                foreach ($post['img'] as $item) {
                    $adsImg = new AdsImg();
                    $adsImg->user_id = $model->user_id;
                    $adsImg->img_thumb = $item['img_thumb'];
                    $adsImg->img = $item['img'];
                    $adsImg->ads_id = $model->id;
                    $adsImg->save();
                }
            }
            if (!empty($post['AdsField'])) {
                AdsFieldsValue::deleteAll(['ads_id' => $model->id]);
                \common\classes\Ads::saveAdsFields($post['AdsField'], $model->id);
            }
        } else {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }
        return $model;

    }

    public function actionDelimg()
    {
        AdsImg::deleteAll(['id' => Yii::$app->request->get('id')]);
    }

    public function actionSearch()
    {
        $model = new \api\models\Ads();

        $ads = $model->searchFilterGet(Yii::$app->request->queryParams);

        return $ads;
    }

    //Получить label дополнительного поля
    public function actionGetLabelAdditionalField($name)
    {
        $label = AdsFields::find()->where(['name' => $name])->one()->label;
        return str_replace('Выберите модель ', '', $label);
    }

    public function actionEdit()
    {
        \common\models\db\Ads::updateAll(['status' => 3], ['id' => Yii::$app->request->get('id')]);
        //Debug::prn($_GET);
    }

    public function actionCountModerAds()
    {
        $siteInfo = ApiFunction::getApiKey(Yii::$app->request->get('api_key'));
        if (!empty($siteInfo->name)) {
            return Ads::find()->where(['site_id' => $siteInfo->id, 'status' => 1])->count();
        } else {
            throw new ServerErrorHttpException($siteInfo);
        }

    }

    /**
     * @return \yii\data\ActiveDataProvider
     * @throws ServerErrorHttpException
     */
    public function actionAdsListAll()
    {
        $searchModel = new \api\models\Ads();
        return $searchModel->getListAdsAll(Yii::$app->request->queryParams);
    }

    public function actionEditStatus()
    {

        //Debug::prn($_GET);

        $siteInfo = ApiFunction::getApiKey(Yii::$app->request->get('api_key'));
        if (!empty($siteInfo->name)) {
            \common\models\db\Ads::updateAll(['dt_update' => time(), 'dt_send_msg' => 0, 'status' => Yii::$app->request->get('status')], ['id' => Yii::$app->request->get('id')]);
        } else {
            throw new ServerErrorHttpException($siteInfo);
        }
    }

    public function actionSimilarAds()
    {
        $searchModel = new \api\models\Ads();
        return $searchModel->getSimilar(Yii::$app->request->queryParams);
    }

    /**
     * @return Ads item
     * @throws ServerErrorHttpException|\Exception
     */
    public function actionCreateNew()
    {
        $newAdModel = new Ads();
        $siteInfo = ApiFunction::getApiKey(Yii::$app->request->post('api_key'));
        if (!isset($siteInfo->name)) throw new ServerErrorHttpException($siteInfo);
        if ( $newAdModel->load(Yii::$app->request->post()) ) {
            $newAdModel->mail = Yii::$app->request->post('Ads')['email'];

            $existedUser = User::find()->where(['email' => $newAdModel->mail])->one();
            if (!empty($existedUser)) {
                $newAdModel->user_id = $existedUser->id;
            } else {
                $newUserModel = new User();
                $newUserModel->username = $newAdModel->mail;
                $newUserModel->email = $newAdModel->mail;
                $password = Password::generate(6);
                $newUserModel->password_hash = Yii::$app->security->generatePasswordHash($password);
                $newUserModel->confirmed_at = time();
                $newUserModel->save();
                $newAdModel->user_id = $newUserModel->id;

                $subject = 'Новое объявление';
                Yii::$app->mailer->compose('user/add-user',
                    [
                        'password' => $password,
                        'mail' => $newAdModel->mail,
                    ]
                )
                    ->setTo($newAdModel->mail)
                    ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
                    ->setSubject($subject)
                    ->send();
            }//else creating new User

            $newAdModel->status = Ads::STATUS_MODER;
            $newAdModel->private_business = 0;
            $newAdModel->site_id = $siteInfo->id;
            $newAdModel->visibility = $siteInfo->visible_ads;

            if ($newAdModel->validate()) {
                $newAdModel->save();
            }

            if (!empty($_POST['AdsField'])) {
                \common\classes\Ads::saveAdsFields($_POST['AdsField'], $newAdModel->id);
            }

//            $userPath = Yii::getAlias('@frontend/web/media/users/');
//
//            if (!file_exists($userPath . $newAdModel->user_id)) {
//                mkdir($userPath . $newAdModel->user_id . '/');
//            }
//            if (!file_exists($userPath . $newAdModel->user_id . '/' . date('Y-m-d'))) {
//                mkdir($userPath . $newAdModel->user_id . '/' . date('Y-m-d'));
//            }
//            if (!file_exists($userPath . $newAdModel->user_id . '/' . date('Y-m-d') . '/thumb')) {
//                mkdir($userPath . $newAdModel->user_id . '/' . date('Y-m-d') . '/thumb');
//            }
//
//            $dir = $userPath . $newAdModel->user_id . '/' . date('Y-m-d') . '/';
//            $dirThumb = $dir . 'thumb/';


            if (!empty($_FILES)) {

                $this->saveImagesFromFilesArray($_FILES, $newAdModel->user_id, $newAdModel->id);

//                foreach ($_FILES as $file) {
//                    Image::watermark($file['tmp_name'][0],
//                        Yii::getAlias('@frontend/web/img/logo_watermark.png'))
//                        ->save($dir . $file['name'][0], ['quality' => 100]);
//
//                    Image::thumbnail($file['tmp_name'][0], 142, 100,
//                        $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
//                        ->save($dirThumb . $file['name'][0], ['quality' => 100]);
//
//                    $img = new AdsImg();
//                    $img->ads_id = $newAdModel->id;
//                    $img->img = Url::home(true) . $dir . $file['name'][0];
//                    $img->img_thumb = Url::home(true) . $dirThumb . $file['name'][0];
//                    $img->user_id = $newAdModel->user_id;
//                    $img->save();
//                }
            }//if photos were uploaded

            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
            $id = implode(',', array_values($newAdModel->getPrimaryKey(true)));
            $response->getHeaders()->set('Location', Url::toRoute(['view', 'id' => $id], true));
        } elseif (!$newAdModel->hasErrors()) {
            //Debug::prn(123);
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }
        return $newAdModel;
    }//actionCreateAdvertisementAPI

    /**
     * @return \common\models\db\Ads|null
     * @throws \yii\base\InvalidConfigException
     */
    public function actionUpdateNew()
    {
        $post = Yii::$app->request->getBodyParams();

        $itemId = $post['Ads']['id'];
        $userId = $post['Ads']['user_id'];
        $updateAdModel = \common\models\db\Ads::findOne($itemId);

        $updateAdModel->title = $post['Ads']['title'];
        $updateAdModel->content = $post['Ads']['content'];
        $updateAdModel->region_id = $post['Ads']['region_id'];
        $updateAdModel->city_id = $post['Ads']['city_id'];
        $updateAdModel->price = $post['Ads']['price'];
        $updateAdModel->status = Ads::STATUS_MODER;

        AdsImg::deleteAll(['ads_id' => $itemId]);

        $pictures = json_decode($post['pictures']);

        if(isset($pictures)){

            foreach ($pictures as $picture){
                $img = new AdsImg();
                $img->ads_id = $itemId;
                $img->img = $picture->img;
                $img->img_thumb = $picture->img_thumb;
                $img->user_id = $userId;
                $img->save();
            }//foreach exist picture
        }//if

        if (!empty($_FILES)) {

            $this->saveImagesFromFilesArray($_FILES, $userId, $itemId);

        }//if $_FILES has something
        $updateAdModel->save();
        return $updateAdModel;
    }//actionUpdateAdvertisementAPI

    /**
     * @return \common\models\db\Ads|null
     * @throws ServerErrorHttpException
     */
    public function actionRefresh()
    {
        $siteInfo = ApiFunction::getApiKey(Yii::$app->request->post('api_key'));

        if(!empty($siteInfo->name)){

            $itemId = Yii::$app->request->post('id');
            $itemModel = \common\models\db\Ads::findOne($itemId);

            $itemModel->status = Ads::STATUS_ACTIVE;
            $itemModel->dt_update = time();
            $itemModel->save();

            return $itemModel;
        }//if api key exists
        throw new ServerErrorHttpException($siteInfo);
    }//actionRefreshAdvertisingAPI

    private function saveImagesFromFilesArray($files, $userId, $itemId){

        $userPath = Yii::getAlias('@frontend/web/media/users/');

        if (!file_exists($userPath . $userId)) {
            mkdir($userPath . $userId . '/');
        }
        if (!file_exists($userPath . $userId . '/' . date('Y-m-d'))) {
            mkdir($userPath . $userId . '/' . date('Y-m-d'));
        }
        if (!file_exists($userPath . $userId . '/' . date('Y-m-d') . '/thumb')) {
            mkdir($userPath . $userId . '/' . date('Y-m-d') . '/thumb');
        }

        $dirFroSaving = $userPath . $userId . '/' . date('Y-m-d') . '/';
        $dirThumbFroSaving = $dirFroSaving . 'thumb/';
        $dirForBase = '/media/users/'.$userId.'/'. date('Y-m-d') . '/';
        $dirThumbForBase = $dirForBase . '/thumb/';

        foreach ($files as $file) {
            Image::watermark($file['tmp_name'],
                Yii::getAlias('@frontend/web/img/logo_watermark.png'))
                ->save($dirFroSaving . $file['name'], ['quality' => 100]);

            Image::thumbnail($file['tmp_name'], 142, 100,
                $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                ->save($dirThumbFroSaving . $file['name'], ['quality' => 100]);

            $img = new AdsImg();
            $img->ads_id = $itemId;
            $img->img = $dirForBase . $file['name'];
            $img->img_thumb = $dirThumbForBase . $file['name'];
            $img->user_id = $userId;
            $img->save();
        }//foreach

    }//saveImagesFromFilesArray

}//ItemsController