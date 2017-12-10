<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 10.12.2017
 * Time: 17:26
 */

namespace frontend\modules\adsmanager\widgets;

use frontend\modules\adsmanager\models\Ads;
use yii\base\Widget;

class ShowVipAdsSlider extends Widget
{
    public function run(){

        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->joinWith('adsDopStatus')
            ->andWhere(['`ads`.`status`' => [2,4]])
            ->andWhere(['`ads_dop_status`.`status_id`' => 4]);
        $query
            ->with('ads_img')
            ->groupBy('`ads`.`id`')
            ->orderBy('dt_update DESC')
            ->limit(25);
//Debug::prn($query->createCommand()->rawSql);
        return $this->render('vip-ads', ['ads' => $query->all()]);
    }
}