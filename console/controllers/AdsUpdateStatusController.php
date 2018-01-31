<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 13.07.2017
 * Time: 16:53
 */

namespace console\controllers;

use common\classes\Debug;
use common\models\db\AdsDopStatus;
use common\models\db\Status;
use frontend\modules\adsmanager\models\Ads;
use Yii;
use yii\console\Controller;

class AdsUpdateStatusController extends Controller
{
    public function actionIndex()
    {
        $this->AdsPublication();
        $this->AdsDelete();
        $this->EditStatusAds();
    }

    /**
     * Снятие с публикации объявления(1раз в час)
     */
    protected function AdsPublication()
    {
        $ads = Ads::find()
            ->leftJoin('user', '`user`.`id` = `ads`.`user_id`')
            ->where(['status' => [2, 4]])
            ->with('user')
            ->all();
        foreach ($ads as $item) {
            //время от даты обновления до снятия с публикации в секундах
            $day = time() - $item->dt_update;
            //считаем кол-во дней оставшихся до снятия публикации
            $daysEnd = 15 - floor($day / 3600 / 24);

            if($item->site_id == 1) {
                Yii::$app->mailer->htmlLayout = "layouts/dainfo";
                $setfrom = ['noreply@da-info.pro' => 'DA-Info'];
            }else{
                $setfrom = ['noreply@rub-on.ru' => 'RubOn'];
            }

            if ($daysEnd <= 3 && $daysEnd > 0) {
                if ($item->dt_send_msg == 0) {

                    \common\models\db\Ads::updateAll(['dt_send_msg' => time()], ['id' => $item->id]);




                    $subject = 'Обновите объявление';
                    //$msg = $this->renderPartial('n_moder',['product'=>$item,'daysEnd' => $daysEnd]);

                    Yii::$app->mailer->compose('@common/mail/cron/ads/warning', ['product' => $item, 'daysEnd' => $daysEnd])
                        ->setTo($item->mail)
                        ->setFrom($setfrom)
                        ->setSubject($subject)
                        ->send();
                }
                //Debug::prn();
            }

            if ($daysEnd <= 0) {
                \common\models\db\Ads::updateAll(['status' => 5, 'dt_send_msg' => time()], ['id' => $item->id]);
                $subject = 'Объявление снято с публикации';

                Yii::$app->mailer->compose('@common/mail/cron/ads/remove_publ', ['product' => $item, 'daysEnd' => $daysEnd])
                    ->setTo($item->mail)
                    ->setFrom($setfrom)
                    ->setSubject($subject)
                    ->send();
            }
        }
    }

    /**
     * Удаление объявления с сайта (1 раз в день)
     */
    protected function AdsDelete()
    {
        $ads = Ads::find()
            ->leftJoin('user', '`user`.`id` = `ads`.`user_id`')
            ->where(['status' => [5]])
            ->with('user')
            ->all();

        foreach ($ads as $item) {
            if ($item->dt_send_msg != 0) {
                $day = time() - $item->dt_send_msg;
                $daysEnd = 30 - floor($day / 3600 / 24);

                if($item->site_id == 1) {
                    Yii::$app->mailer->htmlLayout = "layouts/dainfo";
                    $setfrom = ['noreply@da-info.pro' => 'DA-Info'];
                }else{
                    $setfrom = ['noreply@rub-on.ru' => 'RubOn'];
                }

                if ($daysEnd == 3) {
                    $subject = 'Объявление будет удалено';

                    Yii::$app->mailer->compose('@common/mail/cron/ads/warning_delete', ['product' => $item, 'daysEnd' => $daysEnd])
                        ->setTo($item->mail)
                        ->setFrom($setfrom)
                        ->setSubject($subject)
                        ->send();
                }
                if ($daysEnd == 0) {
                    $subject = 'Объявление удалено';

                    Yii::$app->mailer->compose('@common/mail/cron/ads/delete', ['product' => $item])
                        ->setTo($item->mail)
                        ->setFrom($setfrom)
                        ->setSubject($subject)
                        ->send();
                }
            }

        }
    }


    //Изменение статуса объявления
    protected function EditStatusAds()
    {
        $ads = Ads::find()
            ->joinWith('adsDopStatus')
            ->where(['status' => [2]])
            ->andWhere(['<', '`ads_dop_status`.`dt_add`', time() - 7*86400])
            ->with('user')
            ->all();


        foreach ($ads as $item) {
            foreach ($item['adsDopStatus'] as $status){
                if($status->dt_add < time() - 7*86400) {
                    if($item->site_id == 1) {
                        Yii::$app->mailer->htmlLayout = "layouts/dainfo";
                        $setfrom = ['noreply@da-info.pro' => 'DA-Info'];
                    }else{
                        $setfrom = ['noreply@rub-on.ru' => 'RubOn'];
                    }
                    AdsDopStatus::deleteAll(['id' => $status->id]);
                    $statusAds = Status::find()->where(['id' => $status->status_id])->one();
                    //Debug::prn($statusAds);
                    $subject = 'Изменение статуса объявления';

                    Yii::$app->mailer->compose('@common/mail/cron/ads/edit-status', ['product' => $item, 'status' => $statusAds])
                        ->setTo($item->mail)
                        ->setFrom($setfrom)
                        ->setSubject($subject)
                        ->send();

                }
            }
        }


    }

}