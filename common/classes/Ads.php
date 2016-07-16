<?php
/**
 *Класс для работы с объявлениями и полями
 */

namespace common\classes;


use common\models\db\AdsFields;
use common\models\db\AdsFieldsDefaultValue;
use common\models\db\AdsFieldsType;
use common\models\db\AdsFieldsValue;

class Ads
{
    public static function saveAdsFields($adsFields, $adsId){
        if(!empty($adsFields)){
            foreach ($adsFields as $name=>$value) {

                $adsFields = AdsFields::find()->where(['name' => $name])->one();
                $type = AdsFieldsType::find()->where(['id' => $adsFields->type])->one()->type;
                $adsFieldVal = new AdsFieldsValue();
                $adsFieldVal->ads_id = $adsId;
                if($type == 'text'){
                    $adsFieldVal->ads_fields_name = $name;
                    $adsFieldVal->value = $value;
                }
                if($type == 'select'){
                    $adsFieldVal->ads_fields_name = $name;
                    $adsFieldVal->value = AdsFieldsDefaultValue::find()->where(['id'=>$value])->one()->value;
                    $adsFieldVal->value_id = $value;
                }

                $adsFieldVal->save();
            }
        }
    }
}