<?php

namespace common\models\db;

use Yii;
use yii\helpers\ArrayHelper;

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
 * @property string $title
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
            [['name', 'title'], 'required'],
            [['parent_id', 'show_menu'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['icon', 'slug', 'images', 'title'], 'string', 'max' => 255],
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
            'title' => 'Title',
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

    public static function getTree($parent)
    {
        $arr = [];
        $res = self::find()->where(['parent_id' => $parent])->all();
        if ($res) {
            foreach ((array)$res as $item) {
                if ($ans = static::getTree($item->id)) {
                    $arr[$item->id] = $item->name . '(род. категория)';
                    $arr[$item->name] = $ans;
                } else {
                    $arr[$item->id] = $item->name;
                }
            }
            return $arr;
        }
        return false;
    }

    public static function getNameById($id)
    {
        return static::find()->where(['id' => $id])->one()->name;
    }
}
