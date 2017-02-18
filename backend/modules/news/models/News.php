<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 08.02.2017
 * Time: 15:51
 */

namespace backend\modules\news\models;


use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;

class News extends \common\models\db\News
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'name',
                'out_attribute' => 'slug',
                'translit' => true
            ],
            'sitemap' => [
                'class' => SitemapBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select([]);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => Url::toRoute(['/news/default/index','slug'=>$model->slug]),
                        'title' => $model->name,
                        'lastmod' => $model->dt_update,
                        'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                        'priority' => 0.8
                    ];
                }
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Заголовок',
            'short_text' => 'Короткий текст',
            'text' => 'Полный текст',
            'img' => 'Изображение',
            'slug' => 'Slug',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }
}