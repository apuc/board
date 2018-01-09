<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 06.04.2016
 * Time: 13:36
 */

namespace backend\modules\adsmanager\models;


use common\models\db\Ads;
use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\helpers\Url;

class Adsmanager extends Ads
{
    public function behaviors()
    {
        return [
            'sitemap' => [
                'class' => SitemapBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select([]);
                    $model->andWhere(['!=','status', 1]);
                    $model->orderBy('dt_update DESC');
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => Url::to(['/adsmanager/adsmanager/view','slug'=>$model->slug]),
                        'title' => $model->name,
                        'lastmod' => $model->dt_update,
                        'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                        'priority' => 0.8
                    ];
                }
            ],
        ];
    }
}