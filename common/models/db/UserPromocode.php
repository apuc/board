<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "user_promocode".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $code_id
 * @property integer $dt_add
 *
 * @property Promokod $code
 * @property User $user
 */
class UserPromocode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_promocode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'code_id'], 'required'],
            [['user_id', 'code_id', 'dt_add'], 'integer'],
            [['code_id'], 'exist', 'skipOnError' => true, 'targetClass' => Promokod::className(), 'targetAttribute' => ['code_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'code_id' => 'Code ID',
            'dt_add' => 'Dt Add',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCode()
    {
        return $this->hasOne(Promokod::className(), ['id' => 'code_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
