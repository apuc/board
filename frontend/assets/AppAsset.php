<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        'css/bootstrap.min.css',
        //'css/libs.min.css',
        'css/slick.css',
        'css/new_main.css',
        //'css/style.min.css',
        //'sass/styles.css',
    ];
    public $js = [
        /*'js/jquery-2.1.3.min.js',*/
        'js/bootstrap.min.js',
        'https://api-maps.yandex.ru/2.1/?lang=ru_RU',
        'js/libs.min.js',

        'js/AdsFilter.js',
        //'js/script.js',
        'js/CG.js',
        'js/Masonry.js',
        'js/MasonryEvents.js',
        'js/MasonryFixedSize.js',
        'js/MasonryFixedWidth.js',
        'js/newscript.js',
        //'js/script.min.js',
        //'js_/characters.js',
        //'js_/general.js',
        //'js_/integration.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
