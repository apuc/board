<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 28.12.2017
 * Time: 16:46
 * @var $slug string
 */

use yii\helpers\Html;

echo Html::a('vk', \yii\helpers\Url::to(['send', 'slug'=>$slug]));
echo "\n";
echo Html::a('tw', \yii\helpers\Url::to(['send-tw', 'slug'=>$slug]));
