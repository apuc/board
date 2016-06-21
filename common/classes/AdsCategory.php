<?php
/**
 * Класс для работы с категориями объявлений
 */

namespace common\classes;




use common\models\db\Category;

class AdsCategory
{
    /**
     * Получить все главные категории
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getMainCategory(){
        $category = Category::find()->where(['parent_id' => 0])->all();
        return $category;
    }

    /**
     * Получить подкатегории, если они есть
     * @param $id
     * @return array|bool|\yii\db\ActiveRecord[]
     */
    public static function getParentCategory($id){
        $category = Category::find()->where(['parent_id' => $id])->all();

        if(empty($category)){
            return false;
        }
        else{
            return $category;
        }
    }

    /**
     * Получить содержимое любого поля
     * @param $id
     * @param $key string
     * @return mixed
     */
    public static function getCategoryInfo($id, $key){
        $info = Category::find()->where(['id' => $id])->one()->$key;
        return $info;
    }

    public static function getListCategory($id,$arr){
        $category = Category::find()->where(['id' => $id])->one();
        $arr[] = $category->name;

        if($category->parent_id != 0){
            $arr = self::getListCategory($category->parent_id, $arr);
        }
        else{
            $arr[] = $category->icon;
        }
;
        //$arrEnd = array_reverse($arr);
        return $arr;
    }
}