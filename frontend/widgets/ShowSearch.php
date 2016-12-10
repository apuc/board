<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 23.08.2016
 * Time: 13:53
 */

namespace frontend\widgets;


use common\models\db\Category;
use common\classes\AdsCategory;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use yii\base\Widget;

class ShowSearch extends Widget
{
    public $class = null;
    public function run(){

        //Все регионы
        $regions = GeobaseRegion::find()
            ->where(['!=','id', 19])
            ->andWhere(['!=','id', 21])
            ->orderBy('name')->all();
        $city = [];
        if(!empty($_GET['regionFilter'])){
            $city = GeobaseCity::find()->where(['region_id' => $_GET['regionFilter']])->orderBy('name')->all();
        }

        //Если выбрана категория
        if(isset($_GET['mainCat'])){
            $currentCategory = Category::find()->where(['id' => $_GET['mainCat']])->one();;
        }else{
            $currentCategory = AdsCategory::getCurrentMainCategory();
        }

        $regionName = 'Выберите область';
        $cityName = 'Выберите город';
        //Если выбран регион получаем его имя
        if(\Yii::$app->request->get('regionFilter')){
            $regionName = GeobaseRegion::find()->where(['id' => \Yii::$app->request->get('regionFilter')])->one()->name;
        }
        if(\Yii::$app->request->get('cityFilter')){
            $cityName = GeobaseCity::find()->where(['id' => \Yii::$app->request->get('cityFilter')])->one()->name;
        }

        if(\Yii::$app->controller->module->id == 'adsmanager'){
            if(\Yii::$app->controller->action->id == 'index' || \Yii::$app->controller->action->id == 'filter_search_view'){
                $this->class = 'adpage';
            }
        }


        return $this->render('search',
            [
                'category' => AdsCategory::getMainCategory(),
                'regions' => $regions,
                'city' => $city,
                'currentCategory' => $currentCategory,
                'regionName' => $regionName,
                'cityName' => $cityName,
                'class' => $this->class,
            ]
        );
    }
}