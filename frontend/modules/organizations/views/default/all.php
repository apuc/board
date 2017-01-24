<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.01.2017
 * Time: 11:33
 * @var $catOrg \common\models\db\CategoryOrganizations
 */

use frontend\modules\organizations\widgets\CategoryBar;
use frontend\widgets\ShowTree;

$this->registerJsFile('/js/organizations.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = "Организации";
?>

<section class="all-shops__content">
    <div class="container">
        <?= ShowTree::widget([
            'model' => $catOrg,
            'wrap' => '<div class="all-shops__content_left"><div id="cssmenu-1">{tree}</div></div>',
            'tpl' => '<ul>{items}</ul>',
            'item_tpl' => '<li class="has-sub">{item}</li>',
            'item_tpl_last' => '<li>{item}</li>',
            'item' => '<a href="#"><span class="bow-tie icon"></span>{name}</a>'
        ]) ?>
        <div class="all-shops__content_right">
            <!-- open .breadcrubs -->
            <article class="breadcrumbs">
                <!-- open .container -->

                <!-- open .bread -->
                <ol class="breadcrumbs__list">
                    <li><a href="#">Служба поддержки XXX </a></li>
                    <li><a href="#">Работа с объявлениями</a></li>
                    <li>Подача объявления</li>
                </ol>
                <!-- close .bread -->

                <!-- close .container -->
            </article>
            <!-- close .breadcrubs -->
            <span class="count-shops">Все магазины в России: 12 267</span>
            <div class="average-ad">
                <!-- item -->
                <div class="average-ad-item">
                    <a href="" class="average-ad-item-thumb">
                        <img src="img/adpic-1.png" alt=""/>
                    </a>
                    <div class="average-ad-item-content">
                        <div class="top-content">
                            <span class="average-ad-star active-star-icon  "></span>
                            <a href="" class="average-ad-title">«АСКА недвижимость»</a>
                            <p>«АСКА недвижимость» – успешная, динамично развивающаяся компания.</p>
                        </div>
                        <div class="bottom-content">
                            <div class="left">
                                <p class="average-ad-time">На сайте с марта 2015</p>
                                <p class="average-ad-geo"> <span class="geo-space"></span>Ижевск</p>
                            </div>
                            <div class="right">
                                <a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                                <span class="shops-tel">8 800 356 41 25</span>
                            </div>
                            <a href="" class="shops-link">перейти в магазин</a>
                        </div>
                    </div>
                </div>
                <!-- item -->
                <!-- item -->
                <div class="average-ad-item">
                    <a href="" class="average-ad-item-thumb">
                        <img src="img/adpic-1.png" alt=""/>
                    </a>
                    <div class="average-ad-item-content">
                        <div class="top-content">
                            <span class="average-ad-star active-star-icon  "></span>
                            <a href="" class="average-ad-title">«АСКА недвижимость»</a>
                            <p>«АСКА недвижимость» – успешная, динамично развивающаяся компания.</p>
                        </div>
                        <div class="bottom-content">
                            <div class="left">
                                <p class="average-ad-time">На сайте с марта 2015</p>
                                <p class="average-ad-geo"> <span class="geo-space"></span>Ижевск</p>
                            </div>
                            <div class="right">
                                <a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                                <span class="shops-tel">8 800 356 41 25</span>
                            </div>
                            <a href="" class="shops-link">перейти в магазин</a>
                        </div>
                    </div>
                </div>
                <!-- item -->
                <!-- item -->
                <div class="average-ad-item">
                    <a href="" class="average-ad-item-thumb">
                        <img src="img/adpic-1.png" alt=""/>
                    </a>
                    <div class="average-ad-item-content">
                        <div class="top-content">
                            <span class="average-ad-star active-star-icon  "></span>
                            <a href="" class="average-ad-title">«АСКА недвижимость»</a>
                            <p>«АСКА недвижимость» – успешная, динамично развивающаяся компания.</p>
                        </div>
                        <div class="bottom-content">
                            <div class="left">
                                <p class="average-ad-time">На сайте с марта 2015</p>
                                <p class="average-ad-geo"> <span class="geo-space"></span>Ижевск</p>
                            </div>
                            <div class="right">
                                <a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                                <span class="shops-tel">8 800 356 41 25</span>
                            </div>
                            <a href="" class="shops-link">перейти в магазин</a>
                        </div>
                    </div>
                </div>
                <!-- item -->
                <!-- item -->
                <div class="average-ad-item">
                    <a href="" class="average-ad-item-thumb">
                        <img src="img/adpic-1.png" alt=""/>
                    </a>
                    <div class="average-ad-item-content">
                        <div class="top-content">
                            <span class="average-ad-star active-star-icon  "></span>
                            <a href="" class="average-ad-title">«АСКА недвижимость»</a>
                            <p>«АСКА недвижимость» – успешная, динамично развивающаяся компания.</p>
                        </div>
                        <div class="bottom-content">
                            <div class="left">
                                <p class="average-ad-time">На сайте с марта 2015</p>
                                <p class="average-ad-geo"> <span class="geo-space"></span>Ижевск</p>
                            </div>
                            <div class="right">
                                <a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                                <span class="shops-tel">8 800 356 41 25</span>
                            </div>
                            <a href="" class="shops-link">перейти в магазин</a>
                        </div>
                    </div>
                </div>
                <!-- item -->
                <!-- item -->
                <div class="average-ad-item">
                    <a href="" class="average-ad-item-thumb">
                        <img src="img/adpic-1.png" alt=""/>
                    </a>
                    <div class="average-ad-item-content">
                        <div class="top-content">
                            <span class="average-ad-star active-star-icon  "></span>
                            <a href="" class="average-ad-title">«АСКА недвижимость»</a>
                            <p>«АСКА недвижимость» – успешная, динамично развивающаяся компания.</p>
                        </div>
                        <div class="bottom-content">
                            <div class="left">
                                <p class="average-ad-time">На сайте с марта 2015</p>
                                <p class="average-ad-geo"> <span class="geo-space"></span>Ижевск</p>
                            </div>
                            <div class="right">
                                <a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                                <span class="shops-tel">8 800 356 41 25</span>
                            </div>
                            <a href="" class="shops-link">перейти в магазин</a>
                        </div>
                    </div>
                </div>
                <!-- item -->

            </div>
            <!-- <div class="open-shops">
              <a href="">открыть магазин - бесплатно</a>
            </div> -->
        </div>
    </div>
</section>
