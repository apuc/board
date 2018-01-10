<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 10.01.18
 * Time: 10:48
 */

namespace console\controllers;

use common\classes\Debug;
use Yii;
use yii\console\Controller;

class AdsNewController extends Controller
{
    public function actionIndex()
    {
        Debug::prn(Yii::$app->params['mailAdsNew']);
        Yii::$app->mailer->compose()
            ->setTo(Yii::$app->params['mailAdsNew'])
            ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
            ->setSubject('Новые объявления на сайте')
            ->setTextBody('На сайте есть не опубликованные объявления')
            ->send();
        echo 'success';
    }
}