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
    {//Debug::prn($post);
        $idCat = [];
        $idAdsFields = [];
        $parentList = [];
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
        if (empty($idAdsFields)) {
            $query = Ads::find()
                ->leftJoin('ads_fields_value', '`ads_fields_value`.`ads_id` = `ads`.`id`')
                ->where(['status' => [2, 4]])
                ->andFilterWhere(['`ads`.`category_id`' => $parentList]);

        } //Если доп поля в фильтре выбраны
        else {
            $query = AdsFieldsValue::find()
                ->leftJoin('ads', '`ads`.`id` = `ads_fields_value`.`ads_id`')
                ->where(['status' => [2, 4]])
                ->andFilterWhere(['`ads_fields_value`.`value_id`' => $idAdsFields])
                ->andFilterWhere(['`ads`.`category_id`' => $parentList]);
        }

//Debug::prn($post);
        if (!empty($post['regionFilter'])) {
            $query->andFilterWhere(['region_id' => $post['regionFilter']]);
        }
        if (!empty($post['cityFilter'])) {
            $query->andFilterWhere(['city_id' => $post['cityFilter']]);
        }


        /*if($post['privat'] == 1 && $post['business'] == 0){
            $query->andFilterWhere(['private_business' => 0]);
        }

        if($post['privat'] == 0 && $post['business'] == 1){
            $query->andFilterWhere(['private_business' => 1]);
        }


        //Debug::prn($query->createCommand()->rawSql);

       $query->andWhere(['between', '`ads`.`price`', $post['minPrice'], $post['maxPrice']]);*/

        ///Конец запроса групируем
        //Если доп поля в фильтре не выбраны
        if (empty($idAdsFields)) {
            $ads = $query
                ->groupBy('`ads`.`id`');

        } //Если доп поля в фильтре  выбраны
        else {
            $ads = $query;
            /*->groupBy('`ads_fields_value`.`ads_id`')
            ->having('COUNT(*)=' . count($idAdsFields));*/
        }

        return $ads;
    }

    //GET поиск по GET запросу
    public function searchFilterGet($get)
    {
//        Debug::prn($get['mainCat']);

        //id категорий
        $idCat = [];

        if (!empty($get['idCat'])) {
            $idCat = $get['idCat'];



            if($get['mainCat']) {
                array_unshift($idCat, $get['mainCat']);

                foreach ($idCat as $key => $value) {
                    if (empty($value)) {
                        unset($idCat[$key]);
                    }
                }
            }
        }
//        Debug::prn($idCat);

        // id дополнительных полей

        $idAdsFields = [];
        if (!empty($get['AdsFieldFilter'])) {
            foreach ($get['AdsFieldFilter'] as $key => $value) {
                if (!empty($value)) {
                    $idAdsFields[] = $value;
                }

            }
        }


        //Получить id категорий входящих в последнюю выбранную в фильтре
        $parentList = [];
        if (!empty($idCat[count($idCat) - 1])) {
            $parentList = AdsCategory::getParentAllCategory($idCat[count($idCat) - 1]);
        }
        else if($idCat){
            $parentList = AdsCategory::getParentAllCategory($idCat[0]);
        }




//        Debug::prn($parentList);
//        Debug::prn($get);

        /*if(empty($parentList)){
            $parentList = $idCat[count($idCat)-1];
        }*/
//        Debug::prn($idCat[count($idCat)-1]);

        if (empty($idAdsFields)) {
            $query = Ads::find()
                ->leftJoin('ads_fields_value', '`ads_fields_value`.`ads_id` = `ads`.`id`')
                ->where(['status' => [Ads::STATUS_ACTIVE, Ads::STATUS_VIP]])
                ->andFilterWhere(['`ads`.`category_id`' => $parentList]);

        } //Если доп поля в фильтре выбраны
        else {
            $query = AdsFieldsValue::find()
                ->leftJoin('ads', '`ads`.`id` = `ads_fields_value`.`ads_id`')
                ->where(['status' => [Ads::STATUS_ACTIVE, Ads::STATUS_VIP]])
                ->andFilterWhere(['`ads_fields_value`.`value_id`' => $idAdsFields])
                ->andFilterWhere(['`ads`.`category_id`' => $parentList]);
        }

        //Если в списке будут избранные объявления пользователя
        $query->select(['ads.*', 'IF (favorites.id IS NOT NULL, 1, 0) is_f'])
                ->leftJoin('favorites', '`ads`.`id` = `favorites`.`gist_id` AND `favorites`.`user_id` = :user_id');

        if (!empty($get['private']) && empty($get['business'])) {
            $query->andFilterWhere(['private_business' => 0]);
        }

        if (!empty($get['business']) && empty($get['private'])) {
            $query->andFilterWhere(['private_business' => 1]);
        }


        if (!empty($get['regionFilter'])) {
            $query->andFilterWhere(['region_id' => $get['regionFilter']]);
        }
        if(isset($get['justInMyCity'])){
            if (!empty($get['cityFilter'])) {
                $query->andFilterWhere(['city_id' => $get['cityFilter']]);
            }
        }

        if (!empty($get['textFilter'])) {
            $query->andFilterWhere(
                [
                    'OR',
                    ['LIKE', 'title', $get['textFilter']],
                    ['LIKE', 'content', $get['textFilter']],
                ]
            );
            /* ['LIKE', 'title', $get['textFilter']]);
         $query->orFilterWhere(['LIKE', 'content', $get['textFilter']]);*/
        }

        if (!empty($get['minPrice']) || !empty($get['maxPrice'])) {
            $minPrice = empty($get['minPrice']) ? 0 : $get['minPrice'];
            $maxPrice = empty($get['maxPrice']) ? 9999999 : $get['maxPrice'];
            $query->andFilterWhere(['between', '`ads`.`price`', (int)$minPrice, (int)$maxPrice]);
        }


        //Если выбрана сртировка
        if(isset($get['sortTypeRadio'])){

            switch ($get['sortTypeRadio']){

                case 'ascPrice':{
                    $query->orderBy('`ads`.`price` ASC');
                }break;
                case 'descPrice':{
                    $query->orderBy('`ads`.`price` DESC');
                }break;
                case 'newOld':{
                    $query->orderBy('`ads`.`dt_update` ASC');
                }break;
                default :{
                    $query->orderBy('`ads`.`dt_update` DESC');
                }break;
            }//switch
        }//type of checked sort-radio button
        else{
            $query->orderBy('`ads`.`dt_update` DESC');
        }


        ///Конец запроса групируем
        //Если доп поля в фильтре не выбраны
        if (empty($idAdsFields)) {
            $ads = $query
                ->groupBy('`ads`.`id`');


        } //Если доп поля в фильтре  выбраны
        else {
            $ads= $query
            ->groupBy('`ads_fields_value`.`ads_id`')
            ->having('COUNT(*)=' . count($idAdsFields))->all();
//Debug::prn($AdsFieldsAll);
            //$ads = Ads::find()->where(['id' => ArrayHelper::getColumn($AdsFieldsAll, 'ads_id')]);
        }

        $ads->params([':user_id' => \Yii::$app->user->id]);

        return $ads;

    }//searchFilterGet



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