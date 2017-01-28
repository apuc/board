<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 11.01.2017
 * Time: 13:47
 */

namespace frontend\modules\banner\widgets;


use common\classes\Debug;
use yii\base\Widget;

class ShowRightBanner extends Widget
{
    public $count = 1;
    public function run()
    {
        $array = [
            [
                'title' => 'Пивград',
                'link' => '#',
                'img' => '/media/banner/pivgrad-right.png'
            ],
            [
                'title' => 'Весь спектр ветеренарных услуг',
                'link' => 'https://vk.com/vetpomdon',
                'img' => '/media/banner/veterinar-right.png'
            ],
            [
                'title' => 'Art Craft | Создание сайтов, логотипов, фирменного стиля',
                'link' => 'http://web-artcraft.com/',
                'img' => '/media/banner/artcraft-right.png'
            ],
            [
                'title' => 'RUBON - реклама',
                'link' => 'http://rub-on.ru/reclame',
                'img' => '/media/banner/rubon-right.png'
            ],
            [
                'title' => 'Муниципальное общеобразовательное учреждение &quot;Лицей &quot;Интеллект&quot; города Донецка&quot;',
                'link' => 'http://dli.dn.ua/',
                'img' => '/media/banner/dli-right.png'
            ],
        ];

        $baner = array_rand($array, $this->count);
        //Debug::prn($baner);
        return $this->render('right-banner', ['banner' => (is_array($baner)) ? $baner : [$baner], 'array' => $array ]);
    }
}