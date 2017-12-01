<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "promokod".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $one_time
 * @property integer $price
 * @property integer $dt_add
 * @property integer $status
 *
 * @property UserPromocode[] $userPromocodes
 */
class Promokod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promokod';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['one_time', 'price', 'dt_add', 'status'], 'integer'],
            [['name', 'code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'one_time' => 'One Time',
            'price' => 'Price',
            'dt_add' => 'Dt Add',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPromocodes()
    {
        return $this->hasMany(UserPromocode::className(), ['code_id' => 'id']);
    }
}
