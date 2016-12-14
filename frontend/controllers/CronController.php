<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 14.12.2016
 * Time: 12:03
 */

namespace frontend\controllers;


use common\classes\Debug;

use frontend\modules\adsmanager\models\Ads;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class CronController extends Controller
{
    public function actionAds_publication(){
        $ads = Ads::find()
            ->leftJoin('user', '`user`.`id` = `ads`.`user_id`')
            ->where(['status' => [2,4]])
            ->with('user')
            ->all();
        foreach ($ads as $item){
            //время от даты обновления до снятия с публикации в секундах
            $day = time() - $item->dt_update;
            //считаем кол-во дней оставшихся до снятия публикации
            $daysEnd = 15 - floor($day/3600/24);
            if( $daysEnd <= 3 && $daysEnd > 0){
                $subject = 'Обновите объявление';
                //$msg = $this->renderPartial('n_moder',['product'=>$item,'daysEnd' => $daysEnd]);


                Yii::$app->mailer->compose('cron/warning',['product'=>$item,'daysEnd' => $daysEnd])
                    ->setTo($item->mail)
                    ->setFrom('kavalar@art-craft.tk')
                    ->setSubject($subject)
                    ->send();
                //Debug::prn();
            }

            if( $daysEnd <= 0){
                \common\models\db\Ads::updateAll(['status' => 5], ['id' => $item->id]);
                $subject = 'Объявление стято с публикации';

                Yii::$app->mailer->compose('cron/remove_publ',['product'=>$item,'daysEnd' => $daysEnd])
                    ->setTo($item->mail)
                    ->setFrom('kavalar@art-craft.tk')
                    ->setSubject($subject)
                    ->send();
            }
        }
    }

    public function actionAds_delete(){
        $ads = Ads::find()
            ->leftJoin('user', '`user`.`id` = `ads`.`user_id`')
            ->where(['status' => [2,4]])
            ->with('user')
            ->all();
    }
}