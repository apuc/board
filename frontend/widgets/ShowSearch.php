<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 23.08.2016
 * Time: 13:53
 */

namespace frontend\widgets;


use common\classes\AdsCategory;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use yii\base\Widget;

class ShowSearch extends Widget
{

    public function run(){

        //Все регионы
        $regions = GeobaseRegion::find()->where(['!=','id', 19])->orderBy('name')->all();
        if(!empty($_GET['regionFilter'])){
            $city = GeobaseCity::find()->where(['region_id' => $_GET['regionFilter']])->orderBy('name')->all();
        }

        return $this->render('search',
            [
                'category' => AdsCategory::getMainCategory(),
                'regions' => $regions,
                'city' => $city,
            ]
        );
    }
}