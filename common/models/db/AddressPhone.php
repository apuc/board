<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "address_phone".
 *
 * @property integer $id
 * @property integer $organizations_id
 * @property integer $address_id
 * @property string $phone
 */
class AddressPhone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address_phone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organizations_id', 'address_id'], 'integer'],
            [['phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organizations_id' => 'Organizations ID',
            'address_id' => 'Address ID',
            'phone' => 'Phone',
        ];
    }
}
