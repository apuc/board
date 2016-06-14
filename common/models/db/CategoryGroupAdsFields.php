<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "category_group_ads_fields".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $group_ads_fields_id
 *
 * @property Category $category
 * @property GroupAdsFields $groupAdsFields
 */
class CategoryGroupAdsFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_group_ads_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'group_ads_fields_id'], 'required'],
            [['category_id', 'group_ads_fields_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['group_ads_fields_id'], 'exist', 'skipOnError' => true, 'targetClass' => GroupAdsFields::className(), 'targetAttribute' => ['group_ads_fields_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'group_ads_fields_id' => 'Group Ads Fields ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupAdsFields()
    {
        return $this->hasOne(GroupAdsFields::className(), ['id' => 'group_ads_fields_id']);
    }
}
