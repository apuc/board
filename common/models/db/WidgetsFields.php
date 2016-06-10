<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "widgets_fields".
 *
 * @property integer $id
 * @property integer $widgets_id
 * @property string $label
 * @property string $name
 *
 * @property AdsFieldsValue[] $adsFieldsValues
 * @property Widgets $widgets
 */
class WidgetsFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widgets_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['widgets_id', 'label', 'name'], 'required'],
            [['widgets_id'], 'integer'],
            [['label', 'name'], 'string', 'max' => 255],
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
            'widgets_id' => 'Widgets ID',
            'label' => 'Label',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsFieldsValues()
    {
        return $this->hasMany(AdsFieldsValue::className(), ['widgets_field_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidgets()
    {
        return $this->hasOne(Widgets::className(), ['id' => 'widgets_id']);
    }
}
