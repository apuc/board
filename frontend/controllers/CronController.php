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

    /**
     * Снятие с публикации объявления(1раз в час)
     */
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
                if($item->dt_send_msg == 0){

                    \common\models\db\Ads::updateAll(['dt_send_msg' => time()], ['id' => $item->id]);

                    $subject = 'Обновите объявление';
                    //$msg = $this->renderPartial('n_moder',['product'=>$item,'daysEnd' => $daysEnd]);


                    Yii::$app->mailer->compose('cron/ads/warning',['product'=>$item,'daysEnd' => $daysEnd])
                        ->setTo($item->mail)
                        ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
                        ->setSubject($subject)
                        ->send();
                }
                //Debug::prn();
            }

            if( $daysEnd <= 0){
                \common\models\db\Ads::updateAll(['status' => 5,'dt_send_msg' => time()], ['id' => $item->id]);
                $subject = 'Объявление стято с публикации';

                Yii::$app->mailer->compose('cron/ads/remove_publ',['product'=>$item,'daysEnd' => $daysEnd])
                    ->setTo($item->mail)
                    ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
                    ->setSubject($subject)
                    ->send();
            }
        }
    }


    /**
     * Удаление объявления с сайта (1 раз в день)
     */
    public function actionAds_delete(){
        $ads = Ads::find()
            ->leftJoin('user', '`user`.`id` = `ads`.`user_id`')
            ->where(['status' => [5]])
            ->with('user')
            ->all();

        foreach ($ads as $item){
            if($item->dt_send_msg != 0){
                $day = time() - $item->dt_send_msg;
                $daysEnd = 30 - floor($day/3600/24);
                if( $daysEnd == 3 ){
                    $subject = 'Объявление будет удалено';

                    Yii::$app->mailer->compose('cron/ads/warning_delete',['product'=>$item,'daysEnd' => $daysEnd])
                        ->setTo($item->mail)
                        ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
                        ->setSubject($subject)
                        ->send();
                }
                if( $daysEnd == 0 ){
                    $subject = 'Объявление удалено';

                    Yii::$app->mailer->compose('cron/ads/delete',['product'=>$item])
                        ->setTo($item->mail)
                        ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
                        ->setSubject($subject)
                        ->send();
                }
            }

        }

    }
}