<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 26.10.2016
 * Time: 16:15
 */

namespace backend\modules\help\models;


use yii\db\ActiveRecord;

class Help extends \common\models\db\Help
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
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],
        ];
    }
}