<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "organizations_address".
 *
 * @property integer $id
 * @property integer $organizations_id
 * @property integer $region_id
 * @property integer $city_id
 * @property string $address
 */
class OrganizationsAddress extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            'region_id' => [
                'class' => 'common\behaviors\SaveRegionId',
                'in_attribute' => 'city_id',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organizations_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organizations_id', 'region_id', 'city_id'], 'integer'],
            [['address'], 'string', 'max' => 255],
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
            'region_id' => 'Region ID',
            'city_id' => 'City ID',
            'address' => 'Address',
        ];
    }

    public static function saveAddress($org_id,$city_id,$address){
        $addr = new OrganizationsAddress();
        $addr->organizations_id = $org_id;
        $addr->city_id = $city_id;
        $addr->address = $address;
        $addr->save();
        return $addr->id;
    }
}
