<?php
/**
 * Created by PhpStorm.
 * User: KING
 * Date: 12.02.2019
 * Time: 23:34
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PersonalAreaAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/personal-area/css/style.css',
    ];
    public $js = [
        'theme/libs/jquery-3.3.1.js',
        'theme/personal-area/chart.js',
        'theme/personal-area/js/misc.js',
        'theme/personal-area/js/material.js',
        'theme/personal-area/js/dashboard.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}