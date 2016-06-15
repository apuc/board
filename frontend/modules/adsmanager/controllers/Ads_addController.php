<?php

namespace frontend\modules\adsmanager\controllers;




use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\Ads;
use common\models\db\GeobaseCity;
use yii\base\Controller;
use yii\filters\VerbFilter;

class Ads_addController extends Controller
{
    public function actionIndex(){
        $model = new Ads();
        $region = \common\models\db\GeobaseRegion::find()->all();
        $geoInfo = \common\classes\Address::get_geo_info();
        $model->region_id = $geoInfo['region_id'];
        return $this->render('add',
            [
                'model' => $model,
                'region' => $region,
                'geoInfo' => $geoInfo,
            ]);
    }

    public function actionGeneral_modal(){
        $category = AdsCategory::getMainCategory();
        echo $this->renderPartial('modal',['category' => $category]);
    }

    public function actionShow_category(){
        $id = $_POST['id'];
        $parent_category = AdsCategory::getParentCategory($id);

        if(!empty($parent_category)){
            $category = AdsCategory::getMainCategory();
            $catName = AdsCategory::getCategoryInfo($id,'name');
            echo $this->renderPartial('sel_cat',
                [
                    'category' => $category,
                    'parent_category' => $parent_category,
                    'title' => $catName,
                ]
            );
        }
        else{
            return false;
        }

    }

    public function actionShow_parent_category(){
        $id = $_POST['id'];
        $category = AdsCategory::getParentCategory($id);
        $catName = AdsCategory::getCategoryInfo($id,'name');
        if(!empty($category)){
            echo $this->renderPartial('shw_category',
                [
                    'category' => $category,
                    'title' => $catName,
                ]);
        }
        else{
            return false;
        }
    }

    public function actionShow_category_end(){
        $categoryList = AdsCategory::getListCategory($_POST['id'],[]);
        echo $this->renderPartial('categoryList',
            [
                'category' => array_reverse($categoryList),
            ]
        );
        /*Debug::prn($categoryList);*/
    }

    public function actionCreate(){

    }
}