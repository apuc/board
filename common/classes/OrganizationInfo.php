<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 16.02.2017
 * Time: 11:44
 */

namespace common\classes;


use common\models\db\CategoryOrganizations;

class OrganizationInfo
{
    /**
     * Получить информацию о категории по slug
     * @param $slug
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getInfoCatOrgSlug($slug){
        $categ = CategoryOrganizations::find()->where(['slug' => $slug])->one();
        return $categ;
    }

    public static function getAllCategory(){
        $category = CategoryOrganizations::find()->all();
        $catArr = [];

        foreach ($category as $item) {
            //Debug::prn($item);
            if($item->parent_id == 0){
                $catArr[$item->id]['id'] = $item->id;
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

    public static function getAllInfoCatBySlug($slug){
        $categ = CategoryOrganizations::find()->where(['slug' => $slug])->asArray()->one();
        $parent = CategoryOrganizations::find()->where(['id' => $categ['parent_id']])->asArray()->one();
        $arr['categ'] = $categ;
        $arr['parent_categ'] = $parent;
        return $arr;
    }

    /**
     * Получить родительскую категорию по текущей
     * @return array|null|\yii\db\ActiveRecord
     *
     */
    public static function getCurrentMainCategory(){
        $request = \Yii::$app->request;
        if($request->get('slug')){
            $cat = CategoryOrganizations::find()->where( ['id' => self::getInfoCatOrgSlug($request->get('slug'))] )->one();
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

        }
        else{
            return null;
        }

    }

    /**
     * Получить главную категорию
     *
     * @param $cat
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getMainCategoryById($cat){
        if(!empty($cat)){
            if($cat->parent_id == 0){
                return $cat;
            }
            else{
                $cat = CategoryOrganizations::find()->where(['id' => $cat->parent_id])->one();
                return self::getMainCategoryById($cat);
            }
        }
    }

    /**
     * Получить список всех категорий начиная с последней(Только заголовки категорий)
     * @param $id
     * @param $arr
     * @return array
     */

    public static function getListCategory($id,$arr){
        $category = CategoryOrganizations::find()->where(['id' => $id])->one();
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
}