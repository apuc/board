<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "help".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $slug
 * @property integer $dt_add
 * @property integer $dt_update
 * @property integer $status
 * @property integer $views
 * @property integer $category_id
 */
class Help extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'help';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content'], 'string'],
            [['dt_add', 'dt_update', 'status', 'views', 'category_id'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255],
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
            'content' => 'Текст',
            'slug' => 'Slug',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'status' => 'Status',
            'views' => 'Views',
            'category_id' => 'Category ID',
        ];
    }
}
