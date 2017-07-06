<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 18.02.2017
 * Time: 12:57
 */
use common\models\db\Category;
use common\models\db\CategoryOrganizations;
use frontend\widgets\ShowTree;
use yii\helpers\Url;


echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => 'Карта сайта | Все бесплатные объявления без посредников | RUB-ON',
        'description' => 'Все бесплатные объявления Донецка без посредников. Ежедневное обновления предложений по темам: купля/продажа, работа, недвижимость, авто и многое другое',
        'img' => 'http://rub-on.ru/img/Logotip_RUBON.png'
    ]);
?>



<section class="sitemap">
    <div class="container">
        <div class="map-content">
            <h1>Карта сайта</h1>

            <ul class="wrap-column">
                <li>
                    <h2>
                        <a href="">Объявления</a>
                    </h2>
                    <?= ShowTree::widget([
                        'model' => new Category(),
                        'tpl' => '<ul>{items}</ul>',
                        'item_tpl' => '<li>{item}</li>',
                        'item' => '<a href="{link}">{name}</a>',
                        'item_fields' => [
                            [
                                'key'=>'link',
                                'value'=> Url::to(['/adsmanager/adsmanager/index','slug'=>'{slug}'])
                            ]
                        ]
                    ]) ?>
                </li>
            </ul>

            <ul class="wrap-column">
                <li>
                    <h2>
                        <a href="">Организации</a>
                    </h2>
                    <?= ShowTree::widget([
                        'model' => new CategoryOrganizations(),
                        'tpl' => '<ul>{items}</ul>',
                        'item_tpl' => '<li>{item}</li>',
                        'item' => '<a href="{link}">{name}</a>',
                        'item_fields' => [
                            [
                                'key'=>'link',
                                'value'=> Url::to(['/organizations/default/all','slug'=>'{slug}'])
                            ]
                        ]
                    ]) ?>
                </li>
            </ul>

            <!--<ul class="wrap-column">
                <li>
                    <h2>
                        <a href="">Транспорт</a>
                    </h2>
                    <ul>
                        <li>
                            <a href="">Шины, диски и колёса</a>
                            <ul>
                                <li><a href="">Автошины</a></li>
                                <li><a href="">Диски </a></li>
                                <li><a href="">Колеса в сборе </a></li>
                                <li><a href="">Колпаки </a></li>
                                <li><a href="">Мотошины </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Запчасти для спец /с.х. техники </a>
                        </li>
                        <li>
                            <a href="">Прочие запчасти </a>
                        </li>
                        <li>
                            <a href="">Автозапчасти и аксессуары </a>
                            <ul>
                                <li><a href="">Автозапчасти </a></li>
                                <li><a href="">Аксессуары для авто </a></li>
                                <li><a href="">Колеса в сборе </a></li>
                                <li><a href="">Колпаки </a></li>
                                <li><a href="">Мотошины </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>-->


        </div>
    </div>
</section>