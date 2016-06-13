<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 06.04.2016
 * Time: 10:21
 */

namespace backend\modules\category\models;


class Category extends \common\models\db\Category
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