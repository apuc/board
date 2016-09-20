<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 19.09.2016
 * Time: 23:19
 */

namespace frontend\modules\adsmanager\widgets;



use yii\base\Widget;

class ShowUserCountAds extends Widget
{
    public $idAds;
    public $idUser;
    public function run(){
        $count = \common\classes\Ads::getCountAdsUser($this->idUser);
        if($count > 1){
            $ads = \frontend\modules\adsmanager\models\Ads::find()
                ->where(['!=', 'id', $this->idAds])
                ->andWhere(['user_id' => $this->idUser])
                ->andWhere(['status' => [2,4]])
                ->orderBy('RAND()')
                ->with('ads_img')
                ->one();

            return $this->render('userAds/index',
                [
                    'idUser' => $this->idUser,
                    'idAds' => $this->idAds,
                    'ads' => $ads,
                    'count' => $count,
                ]);
        }else{
            return $this->render('userAds/msg-nul-ads',
                [
                    'idUser' => $this->idUser,
                    'idAds' => $this->idAds,
                ]);
        }
    }
}