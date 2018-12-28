<?php

use frontend\widgets\AuthUser;
use common\classes\Debug;
$this->registerJsFile('/js/jquery-2.1.3.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => 'Бесплатные объявления ДНР, ЛНР: продажа,покупка,недвижимость',
        'description' => 'Все бесплатные объявления ДНР, ЛНР без посредников. Ежедневное обновления предложений по темам: купля/продажа, работа, недвижимость, авто и многое другое',
        'img' => 'https://rub-on.ru/img/Logotip_RUBON.png'
    ]);
?>


<main class="main">
    <section class="index-main">
        <div class="container">
            <div class="cards">

                <?php foreach ($ads as $add): ?>

                <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">

                    <div class="single-card__main">
                        <div class="single-card__top">
                            <div class="single-card__overlay">
                                <a class="js-openModal" href="#" data-modal="#card-detail<?= $add['id']?>"></a>
                                <span class="single-card__view single-card__city">
                                    <i class="fa fa-camera"></i>
                                    <span><?= count($add->adsImgs)?></span>
                                </span>
                            </div>
                            <div class="single-card__top-content">
                                <a class="single-card__city" href="#"><?= $add->region['name']?></a>
                                <span class="single-card__like">
                                    <i class="fa fa-heart-o"></i>
                                </span>
                            </div>

                            <img class="bg-img" src="<?= (isset($add->adsImgs[0])) ? $add->adsImgs[0]['img_thumb'] : ''?>" alt=""/>

                        </div>
                        <div class="single-card__bottom">
                            <a class="single-card__title" href="#"><?= $add['title']?></a>
                            <span class="price price-adaptive price-small"><?= $add['price']?>₽</span>
                        </div>
                    </div>

                    <div class="modal modal__detail container modal-js" id="card-detail<?=$add['id']?>">
                        <div class="single-card__detail">
                            <button class="button_close js-modalClose">×</button>
                            <div class="single-card__detail-content">
                                <div class="single-card__detail-img"><img class="bg-img" src="<?= (isset($add->adsImgs[0])) ? $add->adsImgs[0]['img_thumb'] : ''?>" alt=""/>
                                    <div class="single-card__detail-img-content"><span class="single-card__view single-card__city"><i class="fa fa-camera"></i><span><?= count($add->adsImgs)?></span></span>
                                    </div>
                                </div>
                                <div class="single-card__detail-main"><a class="button button_small button_gray sm-none"><?= $add->category['name']?></a>
                                    <h3 class="single-card__detail-title mb15 mt20"><?= $add['title']?>
                                    </h3>
                                    <div class="single-card__info-second">
                                        <div class="sm-block mr-auto"><a class="button button_small button_gray"><?= $add->category['name']?></a></div><span class="single-card__detail-date">Добавлено: <?= $add->addDate ?></span>
                                        <div class="single-card__detail-view sm-none"><img class="mr5" src="/img/home/icon-eye.png" alt=""/><span>255</span>
                                        </div><a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
                                            <svg class="single-card__icon ico ico_gray">
                                                <use xlink:href="assets/images/svg.svg#nav">
                                                </use>
                                            </svg><span class="ml5"><?= $add->region['name']?></span></a>
                                    </div>
                                    <div class="single-card__info">
                                        <p>Размер: 30/35см</p>
                                        <p>Материал: натуральная кожа супер качество!</p>
                                        <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>
                                        <p>Цвет: чёрная</p>
                                    </div>
                                    <div class="d-flex flex-wrap align-items-center justify-content-end mt15"><a class="single-card__detail-like mt5 mb5" href="#"><i class="fa fa-heart-o"></i><span>В избранное</span></a>
                                        <div class="sm-block mr-auto">
                                            <div class="single-card__detail-view"><img class="mr5" src="/img/home/icon-eye.png" alt=""/><span>255</span>
                                            </div>
                                        </div><a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>
                                    </div>
                                    <div class="mt15 fw-semi-bold fz18 mb15 lg-none"><span>Похожие объявления:</span></div>
                                    <div class="single-card__slider lg-none"><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-01.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-02.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-03.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-04.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-01.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-02.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-03.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-04.jpg" alt=""/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>


<!--                <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">-->
<!--                    <div class="single-card__main">-->
<!--                        <div class="single-card__top">-->
<!--                            <div class="single-card__overlay">-->
<!--                                <button class="gifer-play-button"></button><a class="js-openModal" href="#" data-modal="#card-detail0"></a><span class="single-card__view single-card__city"><i class="fa fa-camera"></i><span>5</span></span>-->
<!--                            </div>-->
<!--                            <div class="single-card__top-content"><a class="single-card__city" href="#">Москва</a><span class="single-card__like"><i class="fa fa-heart-o"></i></span>-->
<!--                            </div>-->
<!--                            <div class="single-card__gif-content"><span class="single-card__gif-label">Gif</span>-->
<!--                            </div><img class="bg-img gif" data-gifffer="assets/images/cards/dinamic.gif" alt=""/>-->
<!--                        </div>-->
<!--                        <div class="single-card__bottom"><a class="single-card__title" href="#">Рюкзак из натуральной кожи, размеры 30х35 см</a><span class="single-card__price">1800₽</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="modal modal__detail container modal-js" id="card-detail0">-->
<!--                        <div class="single-card__detail">-->
<!--                            <button class="button_close js-modalClose">×</button>-->
<!--                            <div class="single-card__detail-content">-->
<!--                                <div class="single-card__detail-img"><img class="bg-img" src="/img/bag.jpg" alt=""/>-->
<!--                                    <div class="single-card__detail-img-content"><span class="single-card__view single-card__city"><i class="fa fa-camera"></i><span>5</span></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="single-card__detail-main"><a class="button button_small button_gray sm-none">Мода и стиль</a>-->
<!--                                    <h3 class="single-card__detail-title mb15 mt20">Рюкзак из натуральной крокодильей кожи, размеры 30х35 см-->
<!--                                    </h3>-->
<!--                                    <div class="single-card__info-second">-->
<!--                                        <div class="sm-block mr-auto"><a class="button button_small button_gray">Мода и стиль</a></div><span class="single-card__detail-date">Добавлено: 19 марта 2018, 17:15</span>-->
<!--                                        <div class="single-card__detail-view sm-none"><img class="mr5" src="assets/images/icon-eye.png" alt=""/><span>255</span>-->
<!--                                        </div><a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">-->
<!--                                            <svg class="single-card__icon ico ico_gray">-->
<!--                                                <use xlink:href="assets/images/svg.svg#nav">-->
<!--                                                </use>-->
<!--                                            </svg><span class="ml5">Санкт - Петербург</span></a>-->
<!--                                    </div>-->
<!--                                    <div class="single-card__info">-->
<!--                                        <p>Размер: 30/35см</p>-->
<!--                                        <p>Материал: натуральная кожа супер качество!</p>-->
<!--                                        <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>-->
<!--                                        <p>Цвет: чёрная</p>-->
<!--                                    </div>-->
<!--                                    <div class="d-flex flex-wrap align-items-center justify-content-end mt15"><a class="single-card__detail-like mt5 mb5" href="#"><i class="fa fa-heart-o"></i><span>В избранное</span></a>-->
<!--                                        <div class="sm-block mr-auto">-->
<!--                                            <div class="single-card__detail-view"><img class="mr5" src="assets/images/icon-eye.png" alt=""/><span>255</span>-->
<!--                                            </div>-->
<!--                                        </div><a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>-->
<!--                                    </div>-->
<!--                                    <div class="mt15 fw-semi-bold fz18 mb15 lg-none"><span>Похожие объявления:</span></div>-->
<!--                                    <div class="single-card__slider lg-none"><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-01.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-02.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-03.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-04.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-01.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-02.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-03.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-04.jpg" alt=""/></a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">-->
<!--                    <div class="single-card__main">-->
<!--                        <div class="single-card__top">-->
<!--                            <div class="single-card__overlay"><a class="js-openModal" href="#" data-modal="#card-detail2"></a><span class="single-card__view single-card__city"><i class="fa fa-camera"></i><span>5</span></span>-->
<!--                            </div>-->
<!--                            <div class="single-card__top-content"><a class="single-card__city" href="#">Москва</a><span class="single-card__like"><i class="fa fa-heart"></i></span>-->
<!--                            </div><img class="bg-img" src="/img/bag.jpg" alt=""/>-->
<!--                        </div>-->
<!--                        <div class="single-card__bottom"><a class="single-card__title" href="#">Рюкзак из натуральной кожи, размеры 30х35 см</a><span class="single-card__price">1800₽</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="modal modal__detail container modal-js" id="card-detail2">-->
<!--                        <div class="single-card__detail">-->
<!--                            <button class="button_close js-modalClose">×</button>-->
<!--                            <div class="single-card__detail-content">-->
<!--                                <div class="single-card__detail-img"><img class="bg-img" src="/img/bag.jpg" alt=""/>-->
<!--                                    <div class="single-card__detail-img-content"><span class="single-card__view single-card__city"><i class="fa fa-camera"></i><span>5</span></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="single-card__detail-main"><a class="button button_small button_gray sm-none">Мода и стиль</a>-->
<!--                                    <h3 class="single-card__detail-title mb15 mt20">Рюкзак из натуральной крокодильей кожи, размеры 30х35 см-->
<!--                                    </h3>-->
<!--                                    <div class="single-card__info-second">-->
<!--                                        <div class="sm-block mr-auto"><a class="button button_small button_gray">Мода и стиль</a></div><span class="single-card__detail-date">Добавлено: 19 марта 2018, 17:15</span>-->
<!--                                        <div class="single-card__detail-view sm-none"><img class="mr5" src="assets/images/icon-eye.png" alt=""/><span>255</span>-->
<!--                                        </div><a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">-->
<!--                                            <svg class="single-card__icon ico ico_gray">-->
<!--                                                <use xlink:href="assets/images/svg.svg#nav">-->
<!--                                                </use>-->
<!--                                            </svg><span class="ml5">Санкт - Петербург</span></a>-->
<!--                                    </div>-->
<!--                                    <div class="single-card__info">-->
<!--                                        <p>Размер: 30/35см</p>-->
<!--                                        <p>Материал: натуральная кожа супер качество!</p>-->
<!--                                        <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>-->
<!--                                        <p>Цвет: чёрная</p>-->
<!--                                    </div>-->
<!--                                    <div class="d-flex flex-wrap align-items-center justify-content-end mt15"><a class="single-card__detail-like mt5 mb5" href="#"><i class="fa fa-heart-o"></i><span>В избранное</span></a>-->
<!--                                        <div class="sm-block mr-auto">-->
<!--                                            <div class="single-card__detail-view"><img class="mr5" src="assets/images/icon-eye.png" alt=""/><span>255</span>-->
<!--                                            </div>-->
<!--                                        </div><a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>-->
<!--                                    </div>-->
<!--                                    <div class="mt15 fw-semi-bold fz18 mb15 lg-none"><span>Похожие объявления:</span></div>-->
<!--                                    <div class="single-card__slider lg-none"><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-01.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-02.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-03.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-04.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-01.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-02.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-03.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-04.jpg" alt=""/></a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="single-card js-detail-wrap masonry single-card__big" data-horizontal="2" data-vertical="1">-->
<!--                    <div class="single-card__main">-->
<!--                        <div class="single-card__top">-->
<!--                            <div class="single-card__overlay"><a class="js-openModal" href="#" data-modal="#card-detail6"></a><span class="single-card__view single-card__city"><i class="fa fa-camera"></i><span>5</span></span>-->
<!--                            </div>-->
<!--                            <div class="single-card__top-content"><a class="single-card__city" href="#">Москва</a><span class="single-card__like"><i class="fa fa-heart-o"></i></span>-->
<!--                            </div><img class="bg-img" src="assets/images/cards/company.jpg" alt=""/>-->
<!--                        </div>-->
<!--                        <div class="single-card__bottom"><a class="single-card__title" href="#">Игровая компания UBISOFT (является одним из крупнейших игровых издателей в Европе и США)</a>-->
<!--                            <div class="sm-none">-->
<!--                                <div class="single-card__big-bottom"><a class="single-card__company-link" href="#">Перейти на страницу компании</a><a class="single-card__button button button_white-on-pink button button_small ml-auto" href="#">250 товаров</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="sm-block"><a class="single-card__company-link" href="#">Страница компании<img class="ml5" src="assets/images/arrow-sm.png" alt=""/></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="modal modal__detail container modal-js" id="card-detail6">-->
<!--                        <div class="single-card__detail">-->
<!--                            <button class="button_close js-modalClose">×</button>-->
<!--                            <div class="single-card__detail-content">-->
<!--                                <div class="single-card__detail-img"><img class="bg-img" src="/img/bag.jpg" alt=""/>-->
<!--                                    <div class="single-card__detail-img-content"><span class="single-card__view single-card__city"><i class="fa fa-camera"></i><span>5</span></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="single-card__detail-main"><a class="button button_small button_gray sm-none">Мода и стиль</a>-->
<!--                                    <h3 class="single-card__detail-title mb15 mt20">Рюкзак из натуральной крокодильей кожи, размеры 30х35 см-->
<!--                                    </h3>-->
<!--                                    <div class="single-card__info-second">-->
<!--                                        <div class="sm-block mr-auto"><a class="button button_small button_gray">Мода и стиль</a></div><span class="single-card__detail-date">Добавлено: 19 марта 2018, 17:15</span>-->
<!--                                        <div class="single-card__detail-view sm-none"><img class="mr5" src="assets/images/icon-eye.png" alt=""/><span>255</span>-->
<!--                                        </div><a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">-->
<!--                                            <svg class="single-card__icon ico ico_gray">-->
<!--                                                <use xlink:href="assets/images/svg.svg#nav">-->
<!--                                                </use>-->
<!--                                            </svg><span class="ml5">Санкт - Петербург</span></a>-->
<!--                                    </div>-->
<!--                                    <div class="single-card__info">-->
<!--                                        <p>Размер: 30/35см</p>-->
<!--                                        <p>Материал: натуральная кожа супер качество!</p>-->
<!--                                        <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>-->
<!--                                        <p>Цвет: чёрная</p>-->
<!--                                    </div>-->
<!--                                    <div class="d-flex flex-wrap align-items-center justify-content-end mt15"><a class="single-card__detail-like mt5 mb5" href="#"><i class="fa fa-heart-o"></i><span>В избранное</span></a>-->
<!--                                        <div class="sm-block mr-auto">-->
<!--                                            <div class="single-card__detail-view"><img class="mr5" src="assets/images/icon-eye.png" alt=""/><span>255</span>-->
<!--                                            </div>-->
<!--                                        </div><a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>-->
<!--                                    </div>-->
<!--                                    <div class="mt15 fw-semi-bold fz18 mb15 lg-none"><span>Похожие объявления:</span></div>-->
<!--                                    <div class="single-card__slider lg-none"><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-01.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-02.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-03.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-04.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-01.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-02.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-03.jpg" alt=""/></a><a class="single-card__slider-item" href="#"><img class="bg-img" src="assets/images/cards/bag-04.jpg" alt=""/></a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

            </div>
            <div class="d-flex justify-content-center mt20">
                <button class="button button_gray button_big">Показать еще</button>
            </div>
        </div>
    </section>
</main>