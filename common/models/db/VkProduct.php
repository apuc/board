<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "vk_product".
 *
 * @property integer $id
 * @property integer $vk_id
 * @property integer $owner_id
 * @property string $title
 * @property string $description
 * @property integer $price
 * @property string $currency
 * @property integer $cat_id
 * @property integer $dt_add
 * @property string $thumb_photo
 */
class VkProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vk_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vk_id', 'owner_id', 'title'], 'required'],
            [['vk_id', 'owner_id', 'price', 'cat_id', 'dt_add'], 'integer'],
            [['description'], 'string'],
            [['title', 'thumb_photo'], 'string', 'max' => 255],
            [['currency'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vk_id' => 'Vk ID',
            'owner_id' => 'Группа',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'price' => 'Цена',
            'currency' => 'Валюта',
            'cat_id' => 'Категория',
            'dt_add' => 'Дата',
            'thumb_photo' => 'Превью',
        ];
    }
}
