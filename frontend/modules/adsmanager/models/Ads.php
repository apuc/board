<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 16.06.2016
 * Time: 13:49
 */

namespace frontend\modules\adsmanager\models;


use yii\db\ActiveRecord;

class Ads extends \common\models\db\Ads
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
        ];
    }
}