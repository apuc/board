<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 29.11.17
 * Time: 17:07
 */

namespace backend\modules\promokod\models;

use yii\db\ActiveRecord;

class Promokod extends \common\models\db\Promokod
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add'],
                ],
            ],
        ];
    }
}