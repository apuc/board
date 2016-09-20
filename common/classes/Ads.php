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
    //Сохраняем дополнительные поля объявления
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

    //Получить label дополнительного поля
    public static function getLabelAdditionalField($name){
        $label=  AdsFields::find()->where(['name' => $name])->one()->label;
        return str_replace('Выберите модель ', '', $label);
    }

    //Количество объявлений у продовца
    public static function getCountAdsUser($id){
        $count = \common\models\db\Ads::find()->where(['user_id' =>$id])->count();
        return $count;
    }
}