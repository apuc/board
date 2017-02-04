<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 25.01.2017
 * Time: 16:13
 */

namespace frontend\modules\adsmanager\widgets;


use common\classes\Debug;
use yii\base\Widget;

class ShowOrgCountAds extends Widget
{
    public $idAds;
    public $idOrg;
    public function run(){
        $count = \common\classes\Ads::getCountAdsOrg($this->idOrg);

        if($count > 1){
            $ads = \frontend\modules\adsmanager\models\Ads::find()
                ->where(['!=', 'id', $this->idAds])
                ->andWhere(['business_id' => $this->idOrg])
                ->andWhere(['status' => [2,4]])
                ->orderBy('RAND()')
                ->with('ads_img')
                ->one();

            return $this->render('orgAds/index',
                [
                    'idOrg' => $this->idOrg,
                    'idAds' => $this->idAds,
                    'ads' => $ads,
                    'count' => $count,
                ]);
        }
        else{
            return $this->render('orgAds/msg-nul-ads',
                [
                    'idOrg' => $this->idOrg,
                    'idAds' => $this->idAds,
                ]);
        }
    }
}