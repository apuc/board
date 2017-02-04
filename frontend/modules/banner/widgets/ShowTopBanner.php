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
                'title' => 'Муниципальное общеобразовательное учреждение &quot;Лицей &quot;Интеллект&quot; города Донецка&quot;',
                'link' => 'http://dli.dn.ua/',
                'img' => '/media/banner/dli-top.png'
            ],
            [
                'title' => 'Art Craft | Создание сайтов, логотипов, фирменного стиля',
                'link' => 'http://web-artcraft.com/',
                'img' => '/media/banner/artcraft-top.png'
            ],
            [
                'title' => 'Весь спектр ветеренарных услуг',
                'link' => 'https://vk.com/vetpomdon',
                'img' => '/media/banner/veterinar-top.png'
            ],
            [
                'title' => 'RUBON - реклама',
                'link' => 'http://rub-on.ru/reclame',
                'img' => '/media/banner/rubon-top.png'
            ],
            [
                'title' => 'Пивград',
                'link' => '#',
                'img' => '/media/banner/pivgrad-top.png'
            ],
        ];

        $baner = array_rand($array, 1);
        return $this->render('top-banner', ['banner' => $array[$baner]]);
    }
}