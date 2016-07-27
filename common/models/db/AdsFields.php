<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "ads_fields".
 *
 * @property integer $id
 * @property integer $type_id
 * @property string $label
 * @property string $template
 * @property string $name
 * @property string $hint
 *
 * @property AdsFieldsType $type
 * @property AdsFieldsDefaultValue[] $adsFieldsDefaultValues
 * @property AdsFieldsGroupAdsFields[] $adsFieldsGroupAdsFields
 * @property AdsFieldsValue[] $adsFieldsValues
 */
class AdsFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'label', 'template', 'name', 'hint'], 'required'],
            [['type_id'], 'integer'],
            [['label', 'template', 'name', 'hint'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdsFieldsType::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'label' => 'Label',
            'template' => 'Template',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(AdsFieldsType::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getads_fields_type()
    {
        return $this->hasOne(AdsFieldsType::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsFieldsDefaultValues()
    {
        return $this->hasMany(AdsFieldsDefaultValue::className(), ['ads_field_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getads_fields_default_value()
    {
        return $this->hasMany(AdsFieldsDefaultValue::className(), ['ads_field_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsFieldsGroupAdsFields()
    {
        return $this->hasMany(AdsFieldsGroupAdsFields::className(), ['fields_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsFieldsValues()
    {
        return $this->hasMany(AdsFieldsValue::className(), ['ads_fields_id' => 'id']);
    }
}
