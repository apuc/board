<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 23.11.17
 * Time: 14:53
 */

namespace frontend\controllers;

use common\classes\Debug;
use common\models\db\AdsDopStatus;
use frontend\models\user\UserDec;
use frontend\modules\adsmanager\models\Ads;
use frontend\modules\personal_area\models\UserScore;
use yii\web\Controller;

class ControlController extends Controller
{
    public function actionGetAdsEditStatus()
    {
        $html = '';
        $post = \Yii::$app->request->post();
        $score = UserDec::find()->where(['id' => \Yii::$app->user->id] )->one()->score;

        if($post['act'] == 'vip')
        {
            if($score < \Yii::$app->params['adsVip']){
                $html = $this->renderPartial('error');
            }else{
                $html = $this->renderPartial('confirm',
                    [
                        'act' => 'vip',
                        'id' => $post['id'],
                    ]
                );
            }
        }
        if ($post['act'] == 'pick') {
            if($score < \Yii::$app->params['adsPick']){
                $html = $this->renderPartial('error');
            }else{
                $html = $this->renderPartial('confirm',
                    [
                        'act' => 'pick',
                        'id' => $post['id'],
                    ]
                );
            }
        }

        if ($post['act'] == 'raise') {
            if($score < \Yii::$app->params['adsRaise']){
                $html = $this->renderPartial('error');
            }else{
                $html = $this->renderPartial('confirm',
                    [
                        'act' => 'raise',
                        'id' => $post['id'],
                    ]
                );
            }
        }
        //Yii::$app->params['site-api']
        //if()

        return $html;
    }

    public function actionAdsControlStatusEdit()
    {
        $post = \Yii::$app->request->post();
        $userId = \Yii::$app->user->id;

        /*Debug::prn($post['id']);
        die();*/
        $adsId = $post['id'];

        $userScoreOne = UserDec::find()->where(['id' => $userId] )->one()->score;

        //$post['act'] = 'vip';
        $userScore = new UserScore();
        $status = 0;
        $sumEdit = 0;

        if($post['act'] == 'vip'){
            $status = 4;
            $sumEdit = $userScoreOne - \Yii::$app->params['adsVip'];


            $userScore->user_id = $userId;
            $userScore->sum = \Yii::$app->params['adsVip'];
            $userScore->deb_kred = 0;
            $userScore->name = 'Покупка статуса вип';

        }
        if($post['act'] == 'pick'){

            $status = 7;
            $sumEdit = $userScoreOne - \Yii::$app->params['adsPick'];


            $userScore->user_id = $userId;
            $userScore->sum = \Yii::$app->params['adsPick'];
            $userScore->deb_kred = 0;
            $userScore->name = 'Выделение объявления';

        }
        if($post['act'] == 'raise'){
            $status = 8;
            $sumEdit = $userScoreOne - \Yii::$app->params['adsRaise'];


            $userScore->user_id = $userId;
            $userScore->sum = \Yii::$app->params['adsRaise'];
            $userScore->deb_kred = 0;
            $userScore->name = 'Поднятие объявления в поиске';

        }
        /*Ads::updateAll(['status' => $status, 'dt_update' => time()], ['id' => $adsId]);*/
        $adsStatus = AdsDopStatus::find()
            ->where(['ads_id' => $adsId, 'status_id' => $status])
            ->one();
        if(empty($adsStatus)) {
            $adsStatus = new AdsDopStatus();
            $adsStatus->ads_id = $adsId;
            $adsStatus->status_id = $status;
            $adsStatus->dt_add = time();
        }else{
            $adsStatus->ads_id = $adsId;
            $adsStatus->status_id = $status;
            $adsStatus->dt_add = time();
        }

        $adsStatus->save();

        UserDec::updateAll(['score' => $sumEdit], ['id' => $userId]);
        $userScore->save();
    }
}