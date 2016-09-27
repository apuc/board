<?php
/**
 * Класс для работы с категориями объявлений
 */

namespace common\classes;




use common\models\db\Category;
use yii\helpers\ArrayHelper;

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


    /**
     * Получить список всех категорий начиная с последней(Только заголовки категорий)
     * @param $id
     * @param $arr
     * @return array
     */

    public static function getListCategory($id,$arr){
        $category = Category::find()->where(['id' => $id])->one();
        $arr[] = $category->name;

        if($category->parent_id != 0){
            $arr = self::getListCategory($category->parent_id, $arr);
        }
        else{
            $arr[] = $category->icon;
        }
        //$arrEnd = array_reverse($arr);
        return $arr;
    }



    public static function getAllCategory(){
        $category = Category::find()->all();
        $carArr = [];

        foreach ($category as $item) {
            if($item->parent_id == 0){
                $carArr[$item->id]['id'] = $item->id;
                $catArr[$item->id]['name'] = $item->name;
                $catArr[$item->id]['slug'] = $item->slug;
                $catArr[$item->id]['img'] = $item->icon;

                foreach ($category as $value) {
                    if($value->parent_id == $item->id){
                        $catArr[$item->id]['childs'][] = $value;
                    }
                }
            }
        }
        return $catArr;
    }

    /**
     * Получить название категории по ее id
     * @param $id
     * @return string
     */
    public static function getNameCategory($id){
        $category = Category::findOne($id);
        return $category->name;
    }

    /**
     * Получить id категории по ее slug
     * @param $slug
     * @return mixed
     */
    public static function getIdCategory($slug){
        return $id = Category::find()->where(['slug' => $slug])->one()->id;
    }

    /**
     * @param $id
     * @return array
     */
    public static function getParentAllCategory($id){
        $category = Category::find()->where(['parent_id' => $id])->all();
        $arryResult = [];
        $arryResult = ArrayHelper::getColumn($category, 'id');
        foreach ($category as $item) {
            $cat = Category::find()->where(['parent_id' => $item->id])->all();
            $arryResult = array_merge($arryResult, ArrayHelper::getColumn($cat, 'id'));
        }

        return $arryResult;
    }

    /**
     * Получить список всех категорий начиная с последней(Вся информация)
     * @param $id
     * @param $arr
     * @return array
     */
    public static function getListCategoryAllInfo($id,$arr){
        $category = Category::find()->where(['id' => $id])->one();
        $arr[] = $category;

        if($category->parent_id != 0){
            $arr = self::getListCategoryAllInfo($category->parent_id, $arr);
        }

        //$arrEnd = array_reverse($arr);
        return $arr;
    }

    public static function getCurrentMainCategory(){

        $cat = Category::find()->where(['id' => self::getIdCategory($_GET['slug'])])->one();
        if($cat->parent_id == 0){
            return $cat;
        }
        else{
            return $currentMainCat = Category::find()->where(['id' => $cat->parent_id])->one();
        }
    }


}