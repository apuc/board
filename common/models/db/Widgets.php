<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "widgets".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 *
 * @property AdsFieldsValue[] $adsFieldsValues
 * @property GroupAdsFields[] $groupAdsFields
 * @property WidgetsFields[] $widgetsFields
 */
class Widgets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widgets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['slug'], 'string', 'max' => 255],
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
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsFieldsValues()
    {
        return $this->hasMany(AdsFieldsValue::className(), ['widgets_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupAdsFields()
    {
        return $this->hasMany(GroupAdsFields::className(), ['widgets_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidgetsFields()
    {
        return $this->hasMany(WidgetsFields::className(), ['widgets_id' => 'id']);
    }
}
