<?php
/**
 * Created by PhpStorm.
 * User: VisioN
 * Date: 26.08.2015
 * Time: 12:53
 */

namespace frontend\modules\msg\assets;


class CloadAsset extends BaseMessageAssets {

    public $js = [
        'js/private_mess_cload.js'
    ];

    public $css = [
        'css/cload_message.css',
    ];

    public $depends = [
        'frontend\modules\msg\assets\PrivateMessPoolingAsset',
        'frontend\modules\msg\assets\TinyscrollbarAsset',
        'frontend\modules\msg\assets\SortElementsAsset'
    ];

}