<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "ads_fields_value".
 *
 * @property integer $id
 * @property integer $ads_id
 * @property string $ads_fields_name
 * @property string $value
 * @property integer $value_id
 * @property integer $widgets_id
 * @property integer $widgets_field_id
 * @property string $widgets_field_value
 *
 * @property AdsFieldsDefaultValue $value0
 * @property Ads $ads
 * @property WidgetsFields $widgetsField
 * @property Widgets $widgets
 */
class AdsFieldsValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_fields_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ads_id'], 'required'],
            [['ads_id', 'value_id', 'widgets_id', 'widgets_field_id'], 'integer'],
            [['ads_fields_name', 'value', 'widgets_field_value'], 'string', 'max' => 255],
            [['value_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdsFieldsDefaultValue::className(), 'targetAttribute' => ['value_id' => 'id']],
            [['ads_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ads::className(), 'targetAttribute' => ['ads_id' => 'id']],
            [['widgets_field_id'], 'exist', 'skipOnError' => true, 'targetClass' => WidgetsFields::className(), 'targetAttribute' => ['widgets_field_id' => 'id']],
            [['widgets_id'], 'exist', 'skipOnError' => true, 'targetClass' => Widgets::className(), 'targetAttribute' => ['widgets_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ads_id' => 'Ads ID',
            'ads_fields_name' => 'Ads Fields Name',
            'value' => 'Value',
            'value_id' => 'Value ID',
            'widgets_id' => 'Widgets ID',
            'widgets_field_id' => 'Widgets Field ID',
            'widgets_field_value' => 'Widgets Field Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValue0()
    {
        return $this->hasOne(AdsFieldsDefaultValue::className(), ['id' => 'value_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasOne(Ads::className(), ['id' => 'ads_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidgetsField()
    {
        return $this->hasOne(WidgetsFields::className(), ['id' => 'widgets_field_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidgets()
    {
        return $this->hasOne(Widgets::className(), ['id' => 'widgets_id']);
    }
}
