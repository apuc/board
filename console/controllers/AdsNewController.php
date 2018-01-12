<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 10.01.18
 * Time: 10:48
 */

namespace console\controllers;

use common\classes\Debug;
use common\models\db\Ads;
use Yii;
use yii\console\Controller;

class AdsNewController extends Controller
{
    public function actionIndex()
    {
        $ads = Ads::find()
            ->where(
                [
                    'pars' => 0,
                    'status' => 1,
                    'visibility' => 0,
                ]
            )
            ->all();

        if(!empty($ads)){
            Yii::$app->mailer->compose()
                ->setTo(Yii::$app->params['mailAdsNew'])
                ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
                ->setSubject('Новые объявления на сайте')
                ->setTextBody('На сайте есть не опубликованные объявления')
                ->send();
            echo 'mail success';
        }

        echo 'success';
    }
}