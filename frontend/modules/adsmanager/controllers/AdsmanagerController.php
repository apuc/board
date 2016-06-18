<?php

namespace frontend\modules\adsmanager\controllers;




use common\classes\AdsCategory;
use common\classes\Debug;

use common\models\db\AdsFields;
use common\models\db\AdsFieldsGroupAdsFields;
use common\models\db\CategoryGroupAdsFields;
use common\models\db\GeobaseCity;
use common\models\db\Profile;
use common\models\User;
use frontend\modules\adsmanager\models\Ads;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class AdsmanagerController extends Controller
{
    public function actionIndex(){
        echo "INDEX";
    }


    public function actionCreate()
    {
        $model = new Ads();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
        } else {

            $region = \common\models\db\GeobaseRegion::find()->orderBy('name')->all();
            $geoInfo = \common\classes\Address::get_geo_info();
            $model->region_id = $geoInfo['region_id'];

            $city = GeobaseCity::find()->where(['region_id' => $geoInfo['region_id']])->all();
            $model->city_id = $geoInfo['city_id'];


            $userInfo = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();

            if(!empty($userInfo->name)){
                $model->name = $userInfo->name;
            }

            if(!empty($userInfo->public_email)){
                $model->mail = $userInfo->public_email;
            }
            else{
                $model->mail = User::find()->where(['id' => Yii::$app->user->id])->one()->email;
            }

            return $this->render('ads_add/add',
                [
                    'model' => $model,
                    'region' => $region,
                    'geoInfo' => $geoInfo,
                    'city' => $city,
                    'user' => $userInfo,
                ]);
        }
    }


    public function actionGeneral_modal(){
        $category = AdsCategory::getMainCategory();
        echo $this->renderPartial('ads_add/modal',['category' => $category]);
    }

    public function actionShow_category(){
        $id = $_POST['id'];
        $parent_category = AdsCategory::getParentCategory($id);

        if(!empty($parent_category)){
            $category = AdsCategory::getMainCategory();
            $catName = AdsCategory::getCategoryInfo($id,'name');
            echo $this->renderPartial('ads_add/sel_cat',
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
            echo $this->renderPartial('ads_add/shw_category',
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
        echo $this->renderPartial('ads_add/categoryList',
            [
                'category' => array_reverse($categoryList),
            ]
        );
        /*Debug::prn($categoryList);*/
    }

    public function actionSelect_cyti(){
        $city = GeobaseCity::find()->where(['region_id' => $_POST['id']])->all();
        $city = ArrayHelper::map($city, 'id', 'name');
        $city = json_encode($city, JSON_UNESCAPED_UNICODE);
        echo $city;
    }

    public function actionShow_additional_fields(){
        $id = 4;

        $groupFieldsId = CategoryGroupAdsFields::find()->where(['category_id' => $id])->one()->group_ads_fields_id;
        $adsFields = AdsFieldsGroupAdsFields::find()->where(['group_ads_fields_id' => $groupFieldsId])->all();
        $html = '';
        foreach ($adsFields as $adsField) {
            $adsFieldsAll = AdsFields::find()
                ->leftJoin('ads_fields_type', '`ads_fields_type`.`id` = `ads_fields`.`type_id`')
                ->leftJoin('ads_fields_default_value', '`ads_fields_default_value`.`ads_field_id` = `ads_fields`.`id`')
                ->where(['`ads_fields`.`id`' => $adsField->fields_id])
                ->with('ads_fields_type', 'ads_fields_default_value')
                ->all();
                $html .= $this->renderPartial('ads_add/add_fields', ['adsFields' => $adsFieldsAll]);
        }

        echo $html;

    }
}