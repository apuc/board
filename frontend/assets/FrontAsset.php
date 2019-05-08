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
class FrontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/libs/font-awesome-4.7.0/css/font-awesome.css',
        'theme/libs/slick/slick.css',
        'theme/libs/fancybox/jquery.fancybox.css',
        'theme/libs/select2/select2.min.css',
        'theme/libs/scrollbar/jquery.scrollbar.css',
//        'theme/css/style.css',
        'theme/fonts/fonts.css',
//        'style/style.css',
        'css/style.css',
        'css/backend.css'
    ];
    public $js = [
        'theme/libs/jquery-3.3.1.js',
        'theme/libs/slick/slick.min.js',
        'theme/libs/jquery.sticky-kit.js',
        'theme/libs/masonry/CG.js',
        'theme/libs/masonry/Masonry.js',
        'theme/libs/masonry/events/MasonryEvents.js',
        'theme/libs/masonry/masonry/MasonryFixedSize.js',
        'theme/libs/masonry/masonry/MasonryFixedWidth.js',
        'theme/libs/fancybox/jquery.fancybox.js',
        'theme/libs/gifffer.min.js',
        'theme/libs/select2/select2.min.js',
        'theme/libs/scrollbar/jquery.scrollbar.js',
        'theme/js/script.js',
        'scripts/AdsFilter.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}