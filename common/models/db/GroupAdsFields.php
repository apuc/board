<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "group_ads_fields".
 *
 * @property integer $id
 * @property string $name
 * @property integer $widgets_id
 *
 * @property AdsFields[] $adsFields
 * @property AdsFieldsGroupAdsFields[] $adsFieldsGroupAdsFields
 * @property CategoryGroupAdsFields[] $categoryGroupAdsFields
 * @property Widgets $widgets
 */
class GroupAdsFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group_ads_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['widgets_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'widgets_id' => 'Widgets ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsFields()
    {
        return $this->hasMany(AdsFields::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsFieldsGroupAdsFields()
    {
        return $this->hasMany(AdsFieldsGroupAdsFields::className(), ['group_ads_fields_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryGroupAdsFields()
    {
        return $this->hasMany(CategoryGroupAdsFields::className(), ['group_ads_fields_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidgets()
    {
        return $this->hasOne(Widgets::className(), ['id' => 'widgets_id']);
    }
}
