<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 12.05.2017
 * Time: 14:49
 */

namespace api\controllers;

use common\classes\Debug;
use frontend\modules\adsmanager\models\Ads;
use frontend\modules\adsmanager\models\FilterAds;
use Yii;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\web\ServerErrorHttpException;

class AdsController extends ActiveController
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
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        //Debug::prn(Yii::$app->request->queryParams);
        $searchModel = new \api\models\Ads();
        return $searchModel->getListAds(Yii::$app->request->queryParams);
    }

    public function actionCreate()
    {
        $model = new Ads();
        //$ads = json_decode(Yii::$app->request->post(), true);
        //Debug::prn($_POST);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->status = 1;
            $model->save();
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

    public function actionSearch()
    {
        $model = new \api\models\Ads();


        $ads = $model->searchFilterGet(Yii::$app->request->queryParams);



        return $ads;
    }
}