<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 19.02.2018
 * Time: 0:00
 */

namespace backend\modules\stock\models;

class Stock extends \common\models\db\Stock
{

    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'title',
                'out_attribute' => 'slug',
                'translit' => true
            ],
        ];
    }

}