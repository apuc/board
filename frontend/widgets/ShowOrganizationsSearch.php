<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 24.12.2016
 * Time: 12:45
 */

namespace frontend\widgets;


use common\classes\Debug;
use common\classes\OrganizationInfo;
use common\models\db\CategoryOrganizations;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use yii\base\Widget;

class ShowOrganizationsSearch extends Widget
{
    public $class_c;

    public function run()
    {
        //Все регионы
        $regions = GeobaseRegion::find()
            ->where(['!=','id', 19])
            ->andWhere(['!=','id', 21])
            ->orderBy('name')->all();

        $regionName = 'Выберите область';
        $cityName = 'Выберите город';

        $city = [];
        if(!empty($_GET['regionFilter'])){
            $city = GeobaseCity::find()->where(['region_id' => $_GET['regionFilter']])->orderBy('name')->all();
        }

        //Если выбрана категория
        if(isset($_GET['mainCat'])){
            $currentCategory = CategoryOrganizations::find()->where(['id' => $_GET['mainCat']])->one();;
        }else{
            $currentCategory = OrganizationInfo::getCurrentMainCategory();
        }

        //Если выбран регион получаем его имя
        if(\Yii::$app->request->get('regionFilter')){
            $regionName = GeobaseRegion::find()->where(['id' => \Yii::$app->request->get('regionFilter')])->one()->name;
        }
        if(\Yii::$app->request->get('cityFilter')){
            $cityName = GeobaseCity::find()->where(['id' => \Yii::$app->request->get('cityFilter')])->one()->name;
        }

        return $this->render('organizations_search',[
            'org' => CategoryOrganizations::find()->where(['parent_id' => 0])->all(),
            'class' => $this->class_c,
            'regions' => $regions,
            'regionName' => $regionName,
            'cityName' => $cityName,
            'currentCategory' => $currentCategory,
            'city' => $city,
        ]);
    }

}