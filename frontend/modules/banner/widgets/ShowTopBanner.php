<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 11.01.2017
 * Time: 13:04
 */

namespace frontend\modules\banner\widgets;


use common\classes\Debug;
use yii\base\Widget;

class ShowTopBanner extends Widget
{
    public function run()
    {
        $array = [
            [
                'title' => 'Art Craft | Создание сайтов, логотипов, фирменного стиля',
                'link' => 'http://dli.dn.ua/',
                'img' => '/media/banner/dli-top.png'
            ],
            [
                'title' => 'Муниципальное общеобразовательное учреждение &quot;Лицей &quot;Интеллект&quot; города Донецка&quot;',
                'link' => 'http://web-artcraft.com/',
                'img' => '/media/banner/artcraft-top.png'
            ]
        ];

        $baner = array_rand($array, 1);
        return $this->render('top-banner', ['banner' => $array[$baner]]);
    }
}