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

class FilterAds extends Ads
{
   public function searchFilter($post){
       //Debug::prn($post);

       $idCat = [];
       $idAdsFields = [];
       //Массив категорий
       if(!empty($post['idCat'])){
           $idCat = explode(',', $post['idCat']);
           foreach($idCat as $key=>$value){
               if(empty($value)){
                   unset($idCat[$key]);
               }
           }
       }

       //массив доп полей
        if(!empty($post['idAdsFields'])){
            $idAdsFields = explode(',', $post['idAdsFields']);
            foreach($idAdsFields as $key=>$value){
                if(empty($value)){
                    unset($idAdsFields[$key]);
                }
            }
        }



       //Получить id категорий входящих в последнюю выбранную в фильтре
       $parentList = AdsCategory::getParentAllCategory($idCat[count($idCat)-1]);
       if(empty($parentList)){
           $parentList = $idCat[count($idCat)-1];
       }

       Debug::prn($idAdsFields);


      /* $ads = Ads::find()
           ->leftJoin('ads_fields_value', '`ads_fields_value`.`ads_id` = `ads`.`id`')
           ->where(['status' => [2,4]])
           ->andFilterWhere(['`ads`.`category_id`' => $parentList])
           ->andFilterWhere(['`ads_fields_value`.`value_id`'=> $idAdsFields])
           ->groupBy('`ads`.`id`')
           ->with('ads_fields_value');*/
           // ->all();
        $ads = AdsFieldsValue::find()
            ->leftJoin('ads', '`ads`.`id` = `ads_fields_value`.`ads_id`')
            ->where(['status' => [2,4]])
            ->andFilterWhere(['`ads_fields_value`.`value_id`' => $idAdsFields])
            ->andFilterWhere(['`ads`.`category_id`' => $parentList]);

            if(count($idAdsFields) > 0){
                $ads->groupBy('`ads_fields_value`.`ads_id`')
                    ->having('COUNT(*)=' . count($idAdsFields));
            }else{
                $ads->groupBy('`ads`.`id`');
            }

Debug::prn($ads->createCommand()->rawSql);
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