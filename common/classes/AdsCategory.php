<?php
/**
 * Класс для работы с категориями объявлений
 */

namespace common\classes;

use common\models\db\Ads;
use common\models\db\Category;
use yii\helpers\ArrayHelper;

class AdsCategory
{
    /**
     * Получить все главные категории
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getMainCategory()
    {
        $categories = Category::find()->where(['parent_id' => 0])->all();
        return $categories;
    }

    /**
     * Получить подкатегории, если они есть
     * @param $id
     * @return array|bool|\yii\db\ActiveRecord[]
     */
    public static function getParentCategory($id)
    {
        $categories = Category::find()->where(['parent_id' => $id])->all();

        if (empty($categories)) {
            return false;
        } else {
            return $categories;
        }
    }

    /**
     * Получить содержимое любого поля по id категории
     * @param $id
     * @param $key string
     * @return mixed
     */
    public static function getCategoryInfo($id, $key)
    {
        $info = Category::find()->where(['id' => $id])->one()->$key;
        return $info;
    }

    /**
     * Получить содержимое любого поля по slug категории
     * @param $slug
     * @param $key string
     * @return mixed
     */
    public static function getCategoryInfoSlug($slug, $key)
    {
        $info = Category::find()->where(['slug' => $slug])->one()->$key;
        return $info;
    }

    /**
     * Получить содержимое информацию по slug категории
     * @param $slug
     * @return mixed
     */
    public static function getCategoryInfoAll($slug)
    {
        $info = Category::find()->where(['slug' => $slug])->one();
        return $info;
    }

    /**
     * Получить список всех категорий начиная с последней(Только заголовки категорий)
     * @param $id
     * @param $arr
     * @return array
     */

    public static function getListCategory($id, $arr)
    {
        $category = Category::find()->where(['id' => $id])->one();
        $arr[] = $category->name;

        if ($category->parent_id != 0) {
            $arr = self::getListCategory($category->parent_id, $arr);
        } else {
            $arr[] = $category->icon;
        }
        //$arrEnd = array_reverse($arr);
        return $arr;
    }

    public static function getAllCategory()
    {

        $cityId = GeoFunction::getCurrentCity(false);

        $categories = Category::find()
                        ->select(['category.*',"(select count(ads.id) from ads where ads.category_id = category.id AND ads.city_id = :cityId ) as countAds"])
                        ->params([':cityId' => $cityId])
                        ->all();
        $catArr = [];

        foreach ($categories as $item) {
            //Debug::prn($item);
            if ($item->parent_id == 0) {
                $catArr[$item->id]['id'] = $item->id;
                $catArr[$item->id]['name'] = $item->name;
                $catArr[$item->id]['slug'] = $item->slug;
                $catArr[$item->id]['img'] = $item->icon;

                foreach ($categories as $value) {
                    if ($value->parent_id == $item->id) {

                        $catArr[$item->id]['children'][] = $value;
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
    public static function getNameCategory($id)
    {
        $category = Category::findOne($id);
        return $category->name;
    }

    /**
     * Получить id категории по ее slug
     * @param $slug
     * @return mixed
     */
    public static function getIdCategory($slug)
    {
        $category = Category::find()->where(['slug' => $slug])->one();
        if (!empty($category)) {
            return $category->id;
        } else {
            return null;
        }

    }

    /**
     * @param $id
     * @return array
     */
    public static function getParentAllCategory($id)
    {
        $category = Category::find()->where(['parent_id' => $id])->all();
        if (!empty($category)) {
//            $arrayResult = [];
            $arrayResult = ArrayHelper::getColumn($category, 'id');
            foreach ($category as $item) {
                $cat = Category::find()->where(['parent_id' => $item->id])->all();
                $arrayResult = array_merge($arrayResult, ArrayHelper::getColumn($cat, 'id'));
            }
        }else {
            $arrayResult = $id;
        }

        return $arrayResult;
    }

    /**
     * Получить список всех категорий начиная с последней(Вся информация)
     * @param $id
     * @param $arr
     * @return array
     */
    public static function getListCategoryAllInfo($id, $arr)
    {
        $category = Category::find()->where(['id' => $id])->one();
        $arr[] = $category;

        if ($category->parent_id != 0) {
            $arr = self::getListCategoryAllInfo($category->parent_id, $arr);
        }

        //$arrEnd = array_reverse($arr);
        return $arr;
    }

    /**
     * Получить родительскую категорию по текущей
     * @return array|null|\yii\db\ActiveRecord
     *
     */
    public static function getCurrentMainCategory()
    {
        $request = \Yii::$app->request;
        if ($request->get('slug')) {
            $cat = Category::find()->where(['id' => self::getIdCategory($request->get('slug'))])->one();
            //Debug::prn(self::getIdCategory($request->get('slug')));
            /*if(!empty($cat)){
                if($cat->parent_id == 0){
                    return $cat;
                }
                else{
                    return $currentMainCat = Category::find()->where(['id' => $cat->parent_id])->one();
                }
            }*/

            return self::getMainCategoryById($cat);

        } else {
            return null;
        }

    }

    /**
     * Получить главную категорию
     *
     * @param $cat
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getMainCategoryById($cat)
    {
        if (!empty($cat)) {
            if ($cat->parent_id == 0) {
                return $cat;
            } else {
                $cat = Category::find()->where(['id' => $cat->parent_id])->one();
                return self::getMainCategoryById($cat);
            }
        }
    }

    public static function getCurentCategory()
    {
        $request = \Yii::$app->request;
        if ($request->get('slug')) {
            $cat = Category::find()->where(['id' => self::getIdCategory($request->get('slug'))])->one();
            //Debug::prn(self::getIdCategory($request->get('slug')));
            if (!empty($cat)) {
                return $cat;
            }
        } else {
            return null;
        }
    }

    public static function getCategoryTree($id)
    {
        $arr = [];
        $categories = Category::find()->where(['parent_id' => $id])->all();
        foreach ((array)$categories as $category){
            if(Category::find()->where(['parent_id' => $category->id])->all()) {
                $arr[$category->name] = self::getCategoryTree($category->id);
            }
            else {
                $arr[$category->id] = $category->name;
            }
        }
        return $arr;
    }

}