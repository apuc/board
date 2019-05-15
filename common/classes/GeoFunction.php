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
use yii\web\Cookie;

class GeoFunction
{
    public static function getRegionName($id)
    {

        $region = GeobaseRegion::findOne($id);
        return $region->name;
    }

    public static function getCityName($id)
    {
        $city = GeobaseCity::findOne($id);
        return $city ? $city->name : $id;
    }

    public static function getCity()
    {
        return GeobaseCity::find()->where(['region_id' => [19, 21]])->orderBy('name')->limit(40)->all();
    }

    public static function getCurrentCity($name = false)
    {
        $cookies = \Yii::$app->response->cookies;
        $city = \Yii::$app->request->get('cityFilter');
        if(!empty($city)){
            $cookies->add(new Cookie(['name' => 'city_id', 'value' => $city]));
            return $name ? self::getCityName($city) : $city;
        }
        else{
            $city = \Yii::$app->request->cookies->get('city_id');
            if(empty($city)){
                return 'Регион';
            }
            else{
                return $name ? self::getCityName($city->value) : $city;
            }
        }
        //Debug::prn($city);
    }
}