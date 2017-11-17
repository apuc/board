<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "user_score".
 *
 * @property integer $user_id
 * @property string $name
 * @property integer $deb_kred
 * @property double $sum
 * @property integer $dt_add
 */
class UserScore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_score';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'deb_kred', 'sum'], 'required'],
            [['user_id', 'deb_kred', 'dt_add'], 'integer'],
            [['sum'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'name' => 'Название',
            'deb_kred' => 'Deb Kred',
            'sum' => 'Сумма',
            'dt_add' => 'Дата',
        ];
    }
}
