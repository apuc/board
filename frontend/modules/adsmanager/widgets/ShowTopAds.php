<?php
/**
 * Виджет вывода самых просматриваемых объявлений
 */

namespace frontend\modules\adsmanager\widgets;

use frontend\modules\adsmanager\models\Ads;
use yii\base\Widget;

class ShowTopAds extends Widget
{
    public function run(){

        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->andWhere(['status' => [2,4]]);
        $query
            ->with('ads_img')
            ->groupBy('`ads`.`id`')
            ->orderBy('views DESC')
            ->limit(25)
            ->with('adsDopStatus');
//Debug::prn($query->createCommand()->rawSql);
        return $this->render('top-ads', ['ads' => $query->all()]);
    }
}