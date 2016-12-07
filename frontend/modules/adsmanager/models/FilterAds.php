<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 20.09.2016
 * Time: 2:17
 */

namespace frontend\modules\adsmanager\models;




use common\classes\AdsCategory;
use common\classes\Debug;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsValue;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class FilterAds extends Ads
{

    ///AJAX считаем количество подходящих под запрос
   public function searchFilter($post)
   {
       $idCat = [];
       $idAdsFields = [];
       $parentList =[];
       //Массив категорий
       if (!empty($post['idCat'])) {
           $idCat = explode(',', $post['idCat']);
           foreach ($idCat as $key => $value) {
               if (empty($value)) {
                   unset($idCat[$key]);
               }
           }
       }
       //Debug::prn($idCat);

       //массив доп полей
       if (!empty($post['idAdsFields'])) {
           $idAdsFields = explode(',', $post['idAdsFields']);
           foreach ($idAdsFields as $key => $value) {
               if (empty($value)) {
                   unset($idAdsFields[$key]);
               }
           }
       }

       //Получить id категорий входящих в последнюю выбранную в фильтре
       if (!empty($idCat)) {

           $parentList = AdsCategory::getParentAllCategory($idCat[count($idCat) - 1]);
           if (empty($parentList)) {
               $parentList = $idCat[count($idCat) - 1];
           }
       }

       //Если доп поля в фильтре не выбраны
       if(empty($idAdsFields)){
           $query = Ads::find()
               ->leftJoin('ads_fields_value', '`ads_fields_value`.`ads_id` = `ads`.`id`')
               ->where(['status' => [2,4]])
               ->andFilterWhere(['`ads`.`category_id`' => $parentList]);

       }
       //Если доп поля в фильтре выбраны
       else{
           $query = AdsFieldsValue::find()
               ->leftJoin('ads', '`ads`.`id` = `ads_fields_value`.`ads_id`')
               ->where(['status' => [2,4]])
               ->andFilterWhere(['`ads_fields_value`.`value_id`' => $idAdsFields])
               ->andFilterWhere(['`ads`.`category_id`' => $parentList]);
       }

//Debug::prn($post);
       if(!empty($post['regionFilter'])){
           $query->andFilterWhere(['region_id' => $post['regionFilter']]);
       }
       if($post['cityFilter'] != 'undefined'){
           $query->andFilterWhere(['city_id' => $post['cityFilter']]);
       }



       $query->andWhere(['between', '`ads`.`price`', $post['minPrice'], $post['maxPrice']]);

       ///Конец запроса групируем
        //Если доп поля в фильтре не выбраны
       if(empty($idAdsFields)){
           $ads = $query
               ->groupBy('`ads`.`id`');

       }
       //Если доп поля в фильтре  выбраны
       else{
           $ads = $query
               ->groupBy('`ads_fields_value`.`ads_id`')
               ->having('COUNT(*)=' . count($idAdsFields));
       }

        return $ads;
    }

    //GET поиск по GET запросу
    public function searchFilterGet($get){
        //id категорий
        $idCat = [];

        if(!empty($get['idCat'])){
            $idCat = $get['idCat'];
            array_unshift($idCat, $get['mainCat']);
            foreach($idCat as $key=>$value){
                if(empty($value)){
                    unset($idCat[$key]);
                }
            }
        }

        //Debug::prn($idCat);
        // id дополнительных полей

        $idAdsFields = [];
        if(!empty($get['AdsFieldFilter'])){
            foreach($get['AdsFieldFilter'] as $key=>$value){
                if(!empty($value)){
                    $idAdsFields[] = $value;
                }

            }
        }



        //Получить id категорий входящих в последнюю выбранную в фильтре
            $parentList = [];
            if(!empty($idCat[count($idCat)-1])){
                $parentList = AdsCategory::getParentAllCategory($idCat[count($idCat)-1]);
            }

            /*if(empty($parentList)){
                $parentList = $idCat[count($idCat)-1];
            }*/
            //Debug::prn($idCat[count($idCat)-1]);

            if(empty($idAdsFields)){
                $query = Ads::find()
                    ->leftJoin('ads_fields_value', '`ads_fields_value`.`ads_id` = `ads`.`id`')
                    ->where(['status' => [2,4]])
                    ->andFilterWhere(['`ads`.`category_id`' => $parentList]);

            }
            //Если доп поля в фильтре выбраны
            else{
                $query = AdsFieldsValue::find()
                    ->leftJoin('ads', '`ads`.`id` = `ads_fields_value`.`ads_id`')
                    ->where(['status' => [2,4]])
                    ->andFilterWhere(['`ads_fields_value`.`value_id`' => $idAdsFields])
                    ->andFilterWhere(['`ads`.`category_id`' => $parentList]);
            }


        if(!empty($get['regionFilter'])){
            $query->andFilterWhere(['region_id' => $get['regionFilter']]);
        }
        if(!empty($get['cityFilter'])){
            $query->andFilterWhere(['city_id' => $get['cityFilter']]);
        }

        if(!empty($get['textFilter'])){
            $query->andFilterWhere(['LIKE', 'title', $get['textFilter']]);
            $query->orFilterWhere(['LIKE', 'content', $get['textFilter']]);
        }

        if(isset($get['minPrice']) && isset($get['maxPrice'])) {
            $query->andWhere(['between', '`ads`.`price`', (int)$get['minPrice'], (int)$get['maxPrice']]);
        }


        //Если выбрана сртировка
        if(isset($get['sort'])){
            if($get['sort'] == 'cheap'){
                $query->orderBy('`ads`.`price` ASC');
            }
            if($get['sort'] == 'dear'){
                $query->orderBy('`ads`.`price` DESC');
            }
        }else{
            $query->orderBy('`ads`.`dt_update` DESC');
        }


        ///Конец запроса групируем
        //Если доп поля в фильтре не выбраны
        if(empty($idAdsFields)){
            $ads = $query
                ->groupBy('`ads`.`id`');


        }
        //Если доп поля в фильтре  выбраны
        else{
            $AdsFieldsAll = $query
                ->groupBy('`ads_fields_value`.`ads_id`')
                ->having('COUNT(*)=' . count($idAdsFields))->all();
//Debug::prn($AdsFieldsAll);
            $ads = Ads::find()->where(['id' => ArrayHelper::getColumn($AdsFieldsAll,'ads_id')]);
        }






        return $ads;

    }



/*SELECT * FROM `ads_fields_value`
LEFT JOIN `ads` ON `ads`.`id` = `ads_fields_value`.`ads_id`
WHERE `ads_fields_value`.`value_id` IN ( 1459, 1280) AND `ads`.`category_id` IN (379)

group by `ads_id`
having count(*)=2*/


/*SELECT * FROM `ads_fields_value`

WHERE `ads_fields_value`.`value_id` IN ( 1459, 1280)

group by `ads_id`
having count(*)=2*/
}