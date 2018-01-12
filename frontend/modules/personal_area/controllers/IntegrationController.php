<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 09.01.2018
 * Time: 22:37
 */

namespace frontend\modules\personal_area\controllers;

use common\classes\Debug;
use common\models\db\VkUserGroups;
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
        return $this->render('vk');
    }

    public function actionSetLink()
    {
        $link = \Yii::$app->request->post('link');
        $domain = str_replace('https://vk.com/', '', $link);
        $vk = new VK([
            'client_id' => '6301353',
            'client_secret' => 'jV9DdZuX0bb6sA6E4X8r',
            'access_token' => '51a45c1161c9e972bc6f891a5b56073c6307301c8eec609b1ba93b1eb8bc0b7db7a44300b2e11db0a1d2b',
        ]);

        $res = json_decode($vk->getGroupInfoByDomain($domain));

        $info = $res->response[0];
        $prod = json_decode($vk->getProducts($info->id * (-1),[]));
        $count = $prod->response->count;
        $model = new VkUserGroups();
        $model->photo = $info->photo_200;
        $model->name = $info->name;
        $model->domain = $domain;
        $model->user_id = \Yii::$app->user->id;
        $model->owner_id = $info->id * (-1);
        return $this->renderAjax('_group_info', ['model' => $model, 'count' => $count]);
    }

}