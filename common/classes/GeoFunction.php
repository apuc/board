<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 25.01.2017
 * Time: 16:47
 */

namespace common\classes;


use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;

class GeoFunction
{
    public static function getRegionName($id){
        $region = GeobaseRegion::find()->where(['id' => $id])->one();
        return $region->name;
    }

    public static function getCityName($id){
        $city = GeobaseCity::find()->where(['id' => $id])->one();
        return $city->name;
    }

    public static function getCity()
    {
        return GeobaseCity::find()->where(['region_id' => [19, 21]])->orderBy('name')->limit(40)->all();
    }
}