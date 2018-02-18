<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "user_stock".
 *
 * @property string $user_id
 * @property string $stock_id
 * @property string $code
 */
class UserStock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'stock_id', 'code'], 'required'],
            [['user_id', 'stock_id'], 'integer'],
            [['code'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
            [['stock_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'stock_id' => 'Stock ID',
            'code' => 'Code',
        ];
    }
}
