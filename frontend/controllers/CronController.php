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
            if( $daysEnd <= 3 ){

                Debug::prn($daysEnd);
            }

        }
    }
}