<?php
/**
 * Created by PhpStorm.
 * User: VisioN
 * Date: 04.06.2015
 * Time: 12:58
 */

namespace frontend\modules\msg\assets;


class MessageKushalpandyaAssets extends BaseMessageAssets  {

    public $css = [
        'css/kushalpandya.css',
        'sass/style.css',
    ];

    public $depends = [
        'frontend\modules\msg\assets\MessageAssets'
    ];

} 