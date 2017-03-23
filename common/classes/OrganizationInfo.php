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
}