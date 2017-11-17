<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 15.11.17
 * Time: 14:26
 */

namespace frontend\modules\personal_area\models;

use yii\db\ActiveRecord;

class UserScore extends \common\models\db\UserScore
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