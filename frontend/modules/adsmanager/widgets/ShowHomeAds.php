<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 22.09.2016
 * Time: 10:50
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
            ->orderBy('dt_add DESC')
            ->limit(25);
//Debug::prn($query->createCommand()->rawSql);
        return $this->render('home-ads', ['ads' => $query->all()]);


    }
}