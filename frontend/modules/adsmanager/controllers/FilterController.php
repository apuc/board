<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 12.09.2016
 * Time: 20:24
 */

namespace frontend\modules\adsmanager\controllers;


use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsGroupAdsFields;
use common\models\db\CategoryGroupAdsFields;
use frontend\modules\adsmanager\models\Ads;
use frontend\modules\adsmanager\models\FilterAds;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;

class FilterController extends Controller
{
    public function actionShow_parent_category(){
        $parentCategory = AdsCategory::getParentCategory($_POST['id']);
        return
            Html::label(Html::tag('span','Подкатегория',['class' => 'large-label-title']),'parent-category-filter', ['class' => 'large-label']) .
            Html::dropDownList('idCat[]',
                null,
                ArrayHelper::map($parentCategory, 'id', 'name'),
                ['class' => 'large-select filterCategory','id' => 'parent-category-filter','prompt' => 'Выберите']
            );
    }

    public function actionShow_ads_fields_filter()
    {
        $parentCategory = AdsCategory::getParentCategory($_POST['id']);
        if(!empty($parentCategory)){
            $html =
            Html::label(Html::tag('span','Подкатегория',['class' => 'large-label-title']),'parent-category-filter', ['class' => 'large-label']) .
            Html::dropDownList('idCat[]',
                null,
                ArrayHelper::map($parentCategory, 'id', 'name'),
                ['class' => 'large-select filterCategory','id' => 'parent-parent-category-filter','prompt' => 'Выберите']
            );

            $class = '.parentParentCategoryFieldsFilter';

            $result = json_encode(['html' => $html, 'class' => $class]);
            return  $result;

        }else{
            $groupFieldsId = CategoryGroupAdsFields::find()->where(['category_id' => $_POST['id']])->one()->group_ads_fields_id;

            $adsFields = AdsFieldsGroupAdsFields::find()->where(['group_ads_fields_id' => $groupFieldsId])->all();

            //Debug::prn($adsFields);
            $html = '';
            //if()
            foreach ($adsFields as $adsField) {
                $adsFieldsAll = AdsFields::find()
                    ->leftJoin('ads_fields_type', '`ads_fields_type`.`id` = `ads_fields`.`type_id`')
                    ->leftJoin('ads_fields_default_value', '`ads_fields_default_value`.`ads_field_id` = `ads_fields`.`id`')
                    ->where(['`ads_fields`.`id`' => $adsField->fields_id])
                    ->with('ads_fields_type', 'ads_fields_default_value')
                    ->all();
                $html .= $this->renderPartial('filter_fields', ['adsFields' => $adsFieldsAll]);
            }

            $class = '.aditionlFieldsFilter';
            $result = json_encode(['html' => $html, 'class' => $class]);
            return $result;
        }
    }

    public function actionFilter_search_count(){
        $model = new FilterAds();
        $count = $model->searchFilter($_POST)->count();
        return $count;
        //Debug::prn($count);
    }

    public function actionFilter_search_view(){
        //$this->layout = 'page';
        $model = new FilterAds();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $model->searchFilterGet($_GET)->count(),
        ]);
        $ads = $model->searchFilterGet($_GET)->limit(15)->offset($pagination->offset)
        ->all();

        //Debug::prn($ads->createCommand()->rawSql);die();

        return $this->render('/adsmanager/index',['ads' => $ads, 'pagination' => $pagination]);
    }



}