<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 08.08.2017
 * Time: 13:55
 */

namespace api\controllers;

use api\models\Region;
use Yii;
use yii\rest\ActiveController;

class RegionController extends ActiveController
{
    public $modelClass = 'api\models\Region';

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
        $searchModel = new Region();
        return $searchModel->getListRegion(Yii::$app->request->queryParams);
    }
}