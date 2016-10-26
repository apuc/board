<?php
/**
 * Created by PhpStorm.
 * User: VisioN
 * Date: 22.05.2015
 * Time: 14:05
 */

namespace frontend\modules\msg\assets;


class MessageAssets extends BaseMessageAssets {

    public $js = [
        'js/vision_messages.js',
    ];

    public $depends = [
        'frontend\modules\msg\assets\PrivateMessPoolingAsset',
        'yii\web\JqueryAsset'
    ];

} 