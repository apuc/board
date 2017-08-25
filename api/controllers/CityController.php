<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 08.08.2017
 * Time: 15:00
 */

namespace api\controllers;

use api\models\City;
use common\classes\Debug;
use common\models\db\GeobaseCity;
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

    public function actionGetCityList()
    {
        $city = GeobaseCity::find()
            ->select([
                '`geobase_city`.`name` as value',
                '`geobase_city`.`name` as  label',
                '`geobase_city`.`id` as id',
                '`geobase_region`.`name` as region_name',
                '`geobase_region`.`id` as region_id'
            ])
            ->leftJoin('`geobase_region`', '`geobase_region`.`id` = `geobase_city`.`region_id`')
            ->orderBy('`geobase_region`.`name`')
            ->addOrderBy('`geobase_city`.`name`')
            ->asArray()
            ->all();

        $i = 0;
        $data = [];
        foreach ($city as $item) {
            if(!empty($item['region_id'])){
                $data[$item['region_name']][$item['id']] = $item['value'];
            }
        }


        return $data;
    }
}