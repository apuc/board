<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 08.08.2017
 * Time: 15:00
 */

namespace api\controllers;

use api\models\City;
use Yii;
use yii\rest\ActiveController;

class CityController extends ActiveController
{
    public $modelClass = 'api\models\City';

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
        $searchModel = new City();
        return $searchModel->getListCity(Yii::$app->request->queryParams);
    }
}