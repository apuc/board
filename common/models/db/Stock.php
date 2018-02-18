<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property integer $id
 * @property string $title
 * @property string $descr
 * @property string $icon
 * @property string $slug
 * @property integer $status
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['descr'], 'string'],
            [['status'], 'integer'],
            [['title', 'icon', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'descr' => 'Описание',
            'icon' => 'Иконка',
            'slug' => 'Slug',
            'status' => 'Статус',
        ];
    }
}
