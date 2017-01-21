<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 23.08.2016
 * Time: 15:18
 */

namespace frontend\modules\adsmanager\widgets;


use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use frontend\modules\adsmanager\models\Ads;
use yii\base\Widget;
use yii\db\Connection;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsGroupAdsFields;
use common\models\db\CategoryGroupAdsFields;

class ShowFilterAds extends Widget
{


    public function run(){
        $db = new Connection(\Yii::$app->db);
        $minMax = $db->createCommand('SELECT max(price) AS `max`, min(price) AS `min` from ads')
            ->queryOne();

        $selectMainCat = null;
        $parentCategory = null;
        $selectParentCategory = null;

        $parentParentCategory = null;
        $selectParentParentCategory = null;


        $html = '';
        $curCat = AdsCategory::getCurentCategory();
        if(!empty($curCat)){
            $catArr = AdsCategory::getListCategoryAllInfo($curCat->id, []);
            $catArr = array_reverse($catArr);

            //Debug::prn($catArr);
        }


        if(!empty($_GET['mainCat']) || !empty($curCat)){
            if(!empty($_GET['mainCat'])){
                $parentCategory = AdsCategory::getParentCategory($_GET['mainCat']);
                $selectMainCat = $_GET['mainCat'];
            }
            if(!empty($curCat)){
                if($curCat->parent_id == 0){
                    $parentCategory = AdsCategory::getParentCategory($curCat->id);
                    $selectMainCat = $curCat->id;

                }
                else{

                    $parentCategory = AdsCategory::getParentCategory($catArr[1]->parent_id);
                    $selectMainCat = $catArr[0]->id;
                    $selectParentCategory = $catArr[1]->id;
                    //Debug::prn($catArr);
                }
            }

        }


        if(!empty($_GET['idCat'][0]) || isset($catArr[1])){
            if(!empty($_GET['idCat'][0])){
                $parentParentCategory = AdsCategory::getParentCategory($_GET['idCat'][0]);
                $selectParentCategory = $_GET['idCat'][0];
            }
            else{
                //Debug::prn($catArr);
                $parentParentCategory = AdsCategory::getParentCategory($catArr[1]->id);
                if(isset($catArr[2])){
                    $selectParentParentCategory = $catArr[2]->id;
                }else{
                    $selectParentParentCategory = $catArr[1]->id;
                }

            }

        }

        if(!empty($_GET['idCat'][1]) || isset($catArr[2])){
            if(!empty($_GET['idCat'][1])){
                $idSearch = $_GET['idCat'][1];
                $selectParentParentCategory = $_GET['idCat'][1];
            }
            else{
                $idSearch = $catArr[2];
            }
            $groupFieldsId = CategoryGroupAdsFields::find()->where(['category_id' => $idSearch])->one()->group_ads_fields_id;

            $adsFields = AdsFieldsGroupAdsFields::find()->where(['group_ads_fields_id' => $groupFieldsId])->all();

            //Debug::prn($adsFields);

            //if()
            foreach ($adsFields as $adsField) {
                $adsFieldsAll = AdsFields::find()
                    ->leftJoin('ads_fields_type', '`ads_fields_type`.`id` = `ads_fields`.`type_id`')
                    ->leftJoin('ads_fields_default_value', '`ads_fields_default_value`.`ads_field_id` = `ads_fields`.`id`')
                    ->where(['`ads_fields`.`id`' => $adsField->fields_id])
                    ->with('ads_fields_type', 'ads_fields_default_value')
                    ->all();
                $html .= $this->render('filter_fields', ['adsFields' => $adsFieldsAll]);
            }
        }



        $selMinPrice = $minMax['min'];
        $selMaxPrice = $minMax['max'];
        if(!empty($_GET['minPrice'])){
            $selMinPrice = $_GET['minPrice'];
        }
        if(!empty($_GET['maxPrice'])){
            $selMaxPrice = $_GET['maxPrice'];
        }
        //Debug::prn($_GET);
        return $this->render('filter',
            [
                'minmax' => $minMax,
                'selectMainCat' => $selectMainCat,
                'parentCategory' => $parentCategory,
                'parentParentCategory' => $parentParentCategory,
                'adsFieldsAll' => $html,
                /*'regions' => $regions,
                'city' => $city,*/
                'selectParentCategory' => $selectParentCategory,
                'selectParentParentCategory' => $selectParentParentCategory,
                'selMinPrice' => $selMinPrice,
                'selMaxPrice' => $selMaxPrice,
            ]);
    }



}