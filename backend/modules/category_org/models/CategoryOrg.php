<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 11.01.2017
 * Time: 15:57
 */

namespace backend\modules\category_org\models;


use common\models\db\CategoryOrganizations;

class CategoryOrg extends CategoryOrganizations
{

    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'name',
                'out_attribute' => 'slug',
                'translit' => true
            ],
        ];
    }

}