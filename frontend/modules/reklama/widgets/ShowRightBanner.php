<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 11.01.2017
 * Time: 13:47
 */

namespace frontend\modules\reklama\widgets;


use common\classes\Debug;
use yii\base\Widget;

class ShowRightBanner extends Widget
{
    public $count = 2;
    public function run()
    {
        $array = [
            [
                'title' => 'Пивград',
                'link' => '#',
                'img' => '/media/reklama/pivgrad-right.png'
            ],
            [
                'title' => 'Весь спектр ветеренарных услуг',
                'link' => '#',
                'img' => '/media/reklama/veterinar-right.png'
            ]
        ];

        $baner = array_rand($array, $this->count);
        //Debug::prn($baner);
        return $this->render('right-banner', ['banner' => (is_array($baner)) ? $baner : [$baner], 'array' => $array ]);
    }
}