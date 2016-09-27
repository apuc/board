<?php
/**
 *Класс для работы с объявлениями и полями
 */

namespace common\classes;


use common\models\db\AdsFields;
use common\models\db\AdsFieldsDefaultValue;
use common\models\db\AdsFieldsType;
use common\models\db\AdsFieldsValue;
use common\models\db\Category;
use common\models\db\Favorites;

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
        $count = \frontend\modules\adsmanager\models\Ads::find()->where(['user_id' =>$id])->andWhere(['status' => [2,4]])->count();
        return $count;
    }

    //количество объявлений в категории
    //$idCat id категории
    //$idAds id объявления который не должен попасть в поиск(если нужно)
    public static function getCountAdsCat($idCat, $idAds = null){
        $count = \common\models\db\Ads::find()
            ->where(['category_id' => $idCat])
            ->andFilterWhere(['!=', 'id', $idAds])
            ->count();
        return $count;
    }

    //Получить id родительской категории(на один уровень вверх) объявления
    public static function getCatIdParent($id){
        $catId = Category::find()->where(['id' => $id])->one();
        return $catId->parent_id;
    }

    //Проверяем есть ли у текущего пользователя сущьность в избранном
    public static function getFavorites($gist, $gistId){
        $fav = Favorites::find()->where(['gist' => $gist, 'gist_id' => $gistId, 'user_id' => \Yii::$app->user->id])->one();
        if(empty($fav)){
            return false;
        }else{
            return true;
        }


    }

}