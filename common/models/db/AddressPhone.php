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

    public static function savePhone($arr,$org_id,$address_id = 0){
        if(!empty($arr)){
            foreach ($arr as $p){
                if(!empty($p)){
                    $phone = new AddressPhone();
                    $phone->address_id = $address_id;
                    $phone->organizations_id = $org_id;
                    $phone->phone = $p;
                    $phone->save();
                }

            }
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getorganizations_address()
    {
        return $this->hasMany(OrganizationsAddress::className(), ['organizations_id' => 'organizations_id']);
    }
}
