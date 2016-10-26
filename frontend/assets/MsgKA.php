<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 19.10.2016
 * Time: 16:29
 */

namespace frontend\assets;


use vision\messages\assets\MessageKushalpandyaAssets;

class MsgKA extends  MessageKushalpandyaAssets
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/msg/kushalpandya.css',
    ];

    public $js = [
        'js/msg/private_mess_pooling.js',
        'js/msg/vision_messages.js',
    ];

    public $depends = [
        'vision\messages\assets\MessageAssets'
    ];

}