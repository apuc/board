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
            [['name', 'icon'], 'required'],
            [['parent_id'], 'integer'],
            [['descr'], 'string'],
            [['name', 'icon', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'icon' => 'Иконка',
            'slug' => 'Slug',
            'parent_id' => 'Родительская категория',
            'descr' => 'Описание',
        ];
    }
}
