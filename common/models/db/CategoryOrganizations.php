<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "category_organizations".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property string $slug
 * @property integer $parent_id
 * @property string $descr
 * @property string $small_icon
 * @property string $title
 */
class CategoryOrganizations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_organizations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['descr'], 'string'],
            [['name', 'icon', 'slug', 'small_icon', 'title'], 'string', 'max' => 255],
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
            'descr' => 'Descr',
            'small_icon' => 'Small Icon',
            'title' => 'Title',
        ];
    }
}
