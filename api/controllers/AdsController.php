<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 12.05.2017
 * Time: 14:49
 */

namespace api\controllers;

use api\models\Ads;
use common\classes\Debug;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class AdsController extends ActiveController
{
    public $modelClass = 'api\models\Ads';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items-ads',
    ];


    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    /*public function actionIndex()
    {
        $searchModel = new Ads();
        $dataProvider = $searchModel->getListAds();
        return $dataProvider;
    }*/

    public function prepareDataProvider()
    {
        //Debug::prn(Yii::$app->request->queryParams);
        $searchModel = new Ads();
        return $searchModel->getListAds(Yii::$app->request->queryParams);
    }
}