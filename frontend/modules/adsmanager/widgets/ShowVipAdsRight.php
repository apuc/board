<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 10.12.2017
 * Time: 18:29
 */

namespace frontend\modules\adsmanager\widgets;

use frontend\modules\adsmanager\models\Ads;
use yii\base\Widget;

class ShowVipAdsRight extends Widget
{
    public function run(){

        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->joinWith('adsDopStatus')
            ->andWhere(['`ads`.`status`' => [2,4]]);
           // ->andWhere(['`ads_dop_status`.`status_id`' => 4]);
        $query
            ->with('ads_img')
            ->groupBy('`ads`.`id`')
            ->orderBy('dt_update DESC')
            ->orderBy('RAND()')
            ->limit(2);
//Debug::prn($query->createCommand()->rawSql);
        return $this->render('vip-ads-right', ['ads' => $query->all()]);
    }
}