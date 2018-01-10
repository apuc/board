<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 10.01.18
 * Time: 10:48
 */

namespace console\controllers;

use Yii;
use yii\console\Controller;

class AdsNewController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->mailer->compose()
            ->setTo('korol_dima@list.ru')
            ->setFrom(['noreply@rub-on.ru' => 'RubOn'])
            ->setSubject('Новые объявления на сайте')
            ->attachContent('На сайте есть не опубликованные объявления')
            ->send();
        echo 'success';
    }
}