<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 14.01.2017
 * Time: 11:28
 */

namespace frontend\modules\organizations\models;


use yii\db\ActiveRecord;

class Organizations extends \common\models\db\Organizations
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'title',
                'out_attribute' => 'slug',
                'translit' => true
            ],
            'region_id' => [
                'class' => 'common\behaviors\SaveRegionId',
                'in_attribute' => 'city_id',
            ]
        ];
    }
}