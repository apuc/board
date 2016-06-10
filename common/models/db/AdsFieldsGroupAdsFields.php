<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "ads_fields_group_ads_fields".
 *
 * @property integer $id
 * @property integer $fields_id
 * @property integer $group_ads_fields_id
 *
 * @property GroupAdsFields $groupAdsFields
 * @property AdsFields $fields
 */
class AdsFieldsGroupAdsFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_fields_group_ads_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fields_id', 'group_ads_fields_id'], 'required'],
            [['fields_id', 'group_ads_fields_id'], 'integer'],
            [['group_ads_fields_id'], 'exist', 'skipOnError' => true, 'targetClass' => GroupAdsFields::className(), 'targetAttribute' => ['group_ads_fields_id' => 'id']],
            [['fields_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdsFields::className(), 'targetAttribute' => ['fields_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fields_id' => 'Fields ID',
            'group_ads_fields_id' => 'Group Ads Fields ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupAdsFields()
    {
        return $this->hasOne(GroupAdsFields::className(), ['id' => 'group_ads_fields_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFields()
    {
        return $this->hasOne(AdsFields::className(), ['id' => 'fields_id']);
    }
}
