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
        'http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic',
        'css/fotorama.css',
        //'css/libs.min.css',
        'css/jquery-ui.min.css',
        'css/style.min.css',
        'css/owl.carousel.css',
        'css/slick.css',
        'css/slick.css',
        'css/slick-theme.css',
        'css/fancybox/jquery.fancybox.css',
        'css/fancybox/jquery.fancybox-thumbs.css',
        'css/fancybox/jquery.fancybox-buttons.css',
        'sass/styles.css',
        'css/jquery.confirm.css',

    ];
    public $js = [
        /*'js/jquery-2.1.3.min.js',*/
        'js/jquery-ui.min.js',
        /*'https://code.jquery.com/jquery-2.2.2.min.js',*/
        'js/bootstrap.min.js',
        'js/characters.js',
        'js/fotorama.js',
        'validation/js/validation.js',
        'js/script.js',
        'js/script.js',
        'js/owl.carousel.min.js',
        'https://api-maps.yandex.ru/2.1/?lang=ru_RU',
        'js/script.min.js',
        'js/AdsFilter.js',
        'js/jquery.contenttoggle.min.js',
        'js/slick.min.js',
        'js/fancybox/jquery.fancybox.js',
        'js/fancybox/jquery.fancybox-buttons.js',
        'js/fancybox/jquery.fancybox-media.js',
        'js/fancybox/jquery.fancybox-thumbs.js',
        'js/fancybox/jquery.fancybox.pack.js',
        'js/jquery.confirm.js',
        'js/general.js',
        'js/stickyfill.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
