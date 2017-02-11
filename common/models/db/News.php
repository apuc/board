<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $name
 * @property string $short_text
 * @property string $text
 * @property string $img
 * @property string $slug
 * @property integer $dt_add
 * @property integer $dt_update
 * @property string $title
 * @property string $description
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'short_text', 'text'], 'required'],
            [['text'], 'string'],
            [['dt_add', 'dt_update'], 'integer'],
            [['name', 'short_text', 'img', 'slug', 'title', 'description'], 'string', 'max' => 255],
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
            'short_text' => 'Short Text',
            'text' => 'Text',
            'img' => 'Img',
            'slug' => 'Slug',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }
}
