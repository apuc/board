<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 15.10.2016
 * Time: 16:35
 */

namespace frontend\assets;


use vision\messages\assets\CloadAsset;

class ClAssets extends CloadAsset
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/msg/private_mess_cload.js'
    ];

    public $css = [
        'css/msg/cload_message.css',
    ];

    public $depends = [
        'vision\messages\assets\PrivateMessPoolingAsset',
        'vision\messages\assets\TinyscrollbarAsset',
        'vision\messages\assets\SortElementsAsset'
    ];

}