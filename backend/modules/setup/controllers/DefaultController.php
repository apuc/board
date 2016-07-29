<?php

namespace backend\modules\setup\controllers;

use backend\modules\setup\models\AutoComBrands;
use backend\modules\setup\models\BcbBrands;
use backend\modules\setup\models\BcbModels;
use backend\modules\setup\models\CarMark;
use backend\modules\setup\models\CarType;
use common\classes\Debug;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsDefaultValue;
use common\models\db\AdsFieldsGroupAdsFields;
use common\models\db\Category;
use common\models\db\CategoryGroupAdsFields;
use common\models\db\GroupAdsFields;
use dosamigos\transliterator\TransliteratorHelper;
use yii\web\Controller;

/**
 * Default controller for the `setup` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //Легковые автомобили
        $mark = BcbBrands::find()->orderBy('name')->all();
        //Debug::prn($mark);
        foreach ($mark as $item) {
            $category = new Category();
            $category->name = $item->name;
            $category->slug = TransliteratorHelper::process( $item->name );
            $category->description = '<p>Описание</p>';
            $category->parent_id = 2;
            $category->save();

            $groupAdsFields = new GroupAdsFields();
            $groupAdsFields->name = 'Транспорт/Легковой автомобиль/' . $item->name;
            $groupAdsFields->save();

            $adsFields = new AdsFields();
                $adsFields->type_id = 4;
                $adsFields->template = '{label}{input}';
                $adsFields->label = 'Выберите модель ' . $item->name;
                $adsFields->name = TransliteratorHelper::process( $item->name );
                $adsFields->hint = 'Выберите марку автомобиля';
            //Debug::prn($adsFields);
                $adsFields->save();


            $models = BcbModels::find()->where(['brand_id' => $item->id])->orderBy('name')->all();
            //Debug::prn($models);
            foreach ($models as $model) {
                $adsFieldDefaultValue = new AdsFieldsDefaultValue();
                $adsFieldDefaultValue->value = $model->name;
                $adsFieldDefaultValue->ads_field_id = $adsFields->id;
                //Debug::prn($adsFieldDefaultValue);
                $adsFieldDefaultValue->save();
            }



            $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = $adsFields->id;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();

            //Доп поля
                $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = 61;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();

                $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = 62;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();

                $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = 63;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();

                $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = 64;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();

                $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = 65;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();

                $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = 66;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();

                $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = 67;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();

                $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = 68;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();

                $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = 69;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();

                $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = 70;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();

                $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
                $adsFieldsGroupAdsFields->fields_id = 71;
                $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $adsFieldsGroupAdsFields->save();


            $categoryGroupAdsFields = new CategoryGroupAdsFields();
                $categoryGroupAdsFields->category_id = $category->id;
                $categoryGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
                $categoryGroupAdsFields->save();


        }

        //мото


        $typeMoto = CarType::find()->all();
        foreach ($typeMoto as $item) {
            $category = new Category();
            $category->name = $item->name;
            $category->slug = TransliteratorHelper::process( $item->name );
            $category->description = '<p>Описание</p>';
            $category->parent_id = 3;
            $category->save();

            $groupAdsFields = new GroupAdsFields();
            $groupAdsFields->name = 'Транспорт/Мото транспорт/' . $item->name;
            $groupAdsFields->save();

            $adsFields = new AdsFields();
            $adsFields->type_id = 4;
            $adsFields->template = '{label}{input}';
            $adsFields->label = 'Выберите модель ' . $item->name;
            $adsFields->name = TransliteratorHelper::process( $item->name );
            $adsFields->hint = 'Выберите марку';
            //Debug::prn($adsFields);
            $adsFields->save();

            $models = CarMark::find()->where(['id_car_type' => $item->id_car_type])->all();

            foreach ($models as $model) {
                $adsFieldDefaultValue = new AdsFieldsDefaultValue();
                $adsFieldDefaultValue->value = $model->name;
                $adsFieldDefaultValue->ads_field_id = $adsFields->id;
                //Debug::prn($adsFieldDefaultValue);
                $adsFieldDefaultValue->save();
            }

            $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
            $adsFieldsGroupAdsFields->fields_id = $adsFields->id;
            $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
            $adsFieldsGroupAdsFields->save();

//поля
            $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
            $adsFieldsGroupAdsFields->fields_id = 66;
            $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
            $adsFieldsGroupAdsFields->save();

            $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
            $adsFieldsGroupAdsFields->fields_id = 62;
            $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
            $adsFieldsGroupAdsFields->save();

            $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
            $adsFieldsGroupAdsFields->fields_id = 67;
            $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
            $adsFieldsGroupAdsFields->save();

            $categoryGroupAdsFields = new CategoryGroupAdsFields();
            $categoryGroupAdsFields->category_id = $category->id;
            $categoryGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
            $categoryGroupAdsFields->save();

        }

//Автобусы
        $groupAdsFields = new GroupAdsFields();
        $groupAdsFields->name = 'Транспорт/Автобусы';
        $groupAdsFields->save();


        $adsFields = new AdsFields();
        $adsFields->type_id = 4;
        $adsFields->template = '{label}{input}';
        $adsFields->label = 'Выберите марку';
        $adsFields->name = 'bus';
        $adsFields->hint = 'Выберите марку';
        //Debug::prn($adsFields);
        $adsFields->save();

        $mark = AutoComBrands::find()->where(['group' => 'bus'])->all();
        foreach ($mark as $item) {
            $adsFieldDefaultValue = new AdsFieldsDefaultValue();
            $adsFieldDefaultValue->value = $item->name;
            $adsFieldDefaultValue->ads_field_id = $adsFields->id;
            //Debug::prn($adsFieldDefaultValue);
            $adsFieldDefaultValue->save();
        }

        $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
        $adsFieldsGroupAdsFields->fields_id = $adsFields->id;
        $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
        $adsFieldsGroupAdsFields->save();

        $categoryGroupAdsFields = new CategoryGroupAdsFields();
        $categoryGroupAdsFields->category_id = 4;
        $categoryGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
        $categoryGroupAdsFields->save();



        ///МИКРОАВТОБУСЫ
        $groupAdsFields = new GroupAdsFields();
        $groupAdsFields->name = 'Транспорт/Микроавтобусы';
        $groupAdsFields->save();


        $adsFields = new AdsFields();
        $adsFields->type_id = 4;
        $adsFields->template = '{label}{input}';
        $adsFields->label = 'Выберите марку';
        $adsFields->name = 'mikrobus';
        $adsFields->hint = 'Выберите марку';
        //Debug::prn($adsFields);
        $adsFields->save();

        $mark = AutoComBrands::find()->where(['group' => 'light_trucks'])->all();
        foreach ($mark as $item) {
            $adsFieldDefaultValue = new AdsFieldsDefaultValue();
            $adsFieldDefaultValue->value = $item->name;
            $adsFieldDefaultValue->ads_field_id = $adsFields->id;
            //Debug::prn($adsFieldDefaultValue);
            $adsFieldDefaultValue->save();
        }

        $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
        $adsFieldsGroupAdsFields->fields_id = $adsFields->id;
        $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
        $adsFieldsGroupAdsFields->save();

        $categoryGroupAdsFields = new CategoryGroupAdsFields();
        $categoryGroupAdsFields->category_id = 358;
        $categoryGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
        $categoryGroupAdsFields->save();

//ТЯГАЧИ

        $groupAdsFields = new GroupAdsFields();
        $groupAdsFields->name = 'Транспорт/Тягачи';
        $groupAdsFields->save();


        $adsFields = new AdsFields();
        $adsFields->type_id = 4;
        $adsFields->template = '{label}{input}';
        $adsFields->label = 'Выберите марку';
        $adsFields->name = 'tagach';
        $adsFields->hint = 'Выберите марку';
        //Debug::prn($adsFields);
        $adsFields->save();

        $mark = AutoComBrands::find()->where(['group' => 'artic'])->all();
        foreach ($mark as $item) {
            $adsFieldDefaultValue = new AdsFieldsDefaultValue();
            $adsFieldDefaultValue->value = $item->name;
            $adsFieldDefaultValue->ads_field_id = $adsFields->id;
            //Debug::prn($adsFieldDefaultValue);
            $adsFieldDefaultValue->save();
        }

        $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
        $adsFieldsGroupAdsFields->fields_id = $adsFields->id;
        $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
        $adsFieldsGroupAdsFields->save();

        $categoryGroupAdsFields = new CategoryGroupAdsFields();
        $categoryGroupAdsFields->category_id = 359;
        $categoryGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
        $categoryGroupAdsFields->save();


//ГРУЗОВИКИ

        $groupAdsFields = new GroupAdsFields();
        $groupAdsFields->name = 'Транспорт/Грузовики';
        $groupAdsFields->save();


        $adsFields = new AdsFields();
        $adsFields->type_id = 4;
        $adsFields->template = '{label}{input}';
        $adsFields->label = 'Выберите марку';
        $adsFields->name = 'tagach';
        $adsFields->hint = 'Выберите марку';
        //Debug::prn($adsFields);
        $adsFields->save();

        $mark = AutoComBrands::find()->where(['group' => 'trucks'])->all();
        foreach ($mark as $item) {
            $adsFieldDefaultValue = new AdsFieldsDefaultValue();
            $adsFieldDefaultValue->value = $item->name;
            $adsFieldDefaultValue->ads_field_id = $adsFields->id;
            //Debug::prn($adsFieldDefaultValue);
            $adsFieldDefaultValue->save();
        }

        $adsFieldsGroupAdsFields = new AdsFieldsGroupAdsFields();
        $adsFieldsGroupAdsFields->fields_id = $adsFields->id;
        $adsFieldsGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
        $adsFieldsGroupAdsFields->save();

        $categoryGroupAdsFields = new CategoryGroupAdsFields();
        $categoryGroupAdsFields->category_id = 360;
        $categoryGroupAdsFields->group_ads_fields_id = $groupAdsFields->id;
        $categoryGroupAdsFields->save();



        return $this->render('index');
    }

    public function actionMoto(){

    }
}
