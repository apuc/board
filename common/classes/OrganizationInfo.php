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
}