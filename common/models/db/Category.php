<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property string $slug
 * @property integer $parent_id
 * @property string $description
 * @property integer $show_menu
 * @property string $images
 *
 * @property Ads[] $ads
 * @property CategoryGroupAdsFields[] $categoryGroupAdsFields
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'show_menu'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['icon', 'slug', 'images'], 'string', 'max' => 255],
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
            'icon' => 'Icon',
            'slug' => 'Slug',
            'parent_id' => 'Parent ID',
            'description' => 'Description',
            'show_menu' => 'Show Menu',
            'images' => 'Images',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasMany(Ads::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryGroupAdsFields()
    {
        return $this->hasMany(CategoryGroupAdsFields::className(), ['category_id' => 'id']);
    }
}
