<?php
/**
 * Виджет вывода последних добавленных объявлений
 */

namespace frontend\modules\adsmanager\widgets;

use frontend\modules\adsmanager\models\Ads;
use yii\base\Widget;


class ShowHomeAds extends Widget
{
    public function run(){

        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->andWhere(['status' => [2,4]]);
        $query
            ->with('ads_img')
            ->groupBy('`ads`.`id`')
            ->orderBy('dt_update DESC')
            ->limit(25);
//Debug::prn($query->createCommand()->rawSql);
        return $this->render('home-ads', ['ads' => $query->all()]);


    }
}