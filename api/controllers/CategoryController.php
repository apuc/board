<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 31.05.2017
 * Time: 11:05
 */

namespace api\controllers;

use api\models\Category;
use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsGroupAdsFields;
use common\models\db\CategoryGroupAdsFields;
use Yii;
use yii\rest\ActiveController;

class CategoryController extends ActiveController
{
    public $modelClass = 'api\models\Category';

   /* public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items-category',
    ];*/

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
        $searchModel = new Category();
        return $searchModel->getListCat(Yii::$app->request->queryParams);
    }

    //Доп поля для поиска
    public function actionAdsFields()
    {
        $params = Yii::$app->request->queryParams;
        $groupFieldsId = CategoryGroupAdsFields::find()->where(['category_id' => $params['id']])->one();
        $fields = [];
        if(!empty($groupFieldsId)){
            $groupFieldsId = $groupFieldsId->group_ads_fields_id;
            $adsFields = AdsFieldsGroupAdsFields::find()->where(['group_ads_fields_id' => $groupFieldsId])->all();




            foreach ($adsFields as $adsField) {
                $adsFieldsAll = AdsFields::find()
                    ->leftJoin('ads_fields_type', '`ads_fields_type`.`id` = `ads_fields`.`type_id`')
                    ->leftJoin('ads_fields_default_value',
                        '`ads_fields_default_value`.`ads_field_id` = `ads_fields`.`id`')
                    ->where(['`ads_fields`.`id`' => $adsField->fields_id])
                    ->with('ads_fields_type', 'ads_fields_default_value')
                    ->asArray()
                    ->all();
                $fields[] = $adsFieldsAll;
            }
        }


        //$result = json_encode( $fields, JSON_UNESCAPED_UNICODE );

        return $fields;
    }

    public function actionGetCategoryBySlug()
    {
        return Category::find()->where(['slug' => Yii::$app->request->get('cat')])->one();
    }

    public function actionGetListCategory()
    {
        $categoryList = AdsCategory::getListCategory(Yii::$app->request->get('id'), []);
        return $categoryList;
    }
}