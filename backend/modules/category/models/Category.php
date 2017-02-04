<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 06.04.2016
 * Time: 10:21
 */

namespace backend\modules\category\models;


use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\helpers\Url;

class Category extends \common\models\db\Category
{
    public function behaviors()
    {
        return [
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
                        'loc' => Url::toRoute(['/adsmanager/adsmanager/index','slug'=>$model->slug]),
                        'title' => $model->name,
                        'lastmod' => '2016-11-06T19:38:59+03:00',
                        'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                        'priority' => 0.8
                    ];
                }
            ],
        ];
    }
}