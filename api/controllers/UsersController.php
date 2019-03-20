<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 20.03.19
 * Time: 14:32
 */

namespace api\controllers;


use api\models\User;
use common\classes\ApiFunction;
use Yii;
use yii\rest\ActiveController;

class UsersController extends ActiveController
{

    public $modelClass = 'api\models\User';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'user',
    ];

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['view']);
        unset($actions['index']);
        return $actions;
    }


    public function actionView()
    {
        $siteInfo = ApiFunction::getApiKey(Yii::$app->request->get('api_key'));
        if (!isset($siteInfo->name)) return $siteInfo;

        $id = Yii::$app->request->get('id');
        $model = User::find()->where(['id' => $id])->one();

        return $model;
    }

}