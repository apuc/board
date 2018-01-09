<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "vk_product_cat".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property string $cat_name
 * @property integer $section_id
 * @property string $section_name
 * @property integer $board_cat_id
 */
class VkProductCat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vk_product_cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'cat_name', 'section_id', 'section_name'], 'required'],
            [['cat_id', 'section_id', 'board_cat_id'], 'integer'],
            [['cat_name', 'section_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'ID категории',
            'cat_name' => 'Имя категории',
            'section_id' => 'ID секции',
            'section_name' => 'Имя секции',
            'board_cat_id' => 'Категория доски',
        ];
    }
}
