<?php

use common\classes\Debug;
use frontend\modules\adsmanager\widgets\Msg;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->registerJsFile('/js/jquery-2.1.3.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$categoryList = \common\classes\AdsCategory::getListCategoryAllInfo($model->category_id, []);

echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => $model->title . ' - ' . $categoryList[0]['name'] . ' ' . $model['geobase_city']->name . ' на RUBON',
        'description' => $model->content,
        'img' => (empty($model['ads_img'][0]->img)) ? 'http://rub-on.ru/img/Logotip_RUBON.png' : $model['ads_img'][0]->img,
    ]);
$categoryList = array_reverse($categoryList);
$this->params['breadcrumbs'][] = [
    'label' => 'Все объявления',
    'url' => ['/adsmanager/adsmanager/index'],
    'class' => 'nav-adv__item',
];
foreach ($categoryList as $item) {
    $this->params['breadcrumbs'][] = [
        'label' => $item->name,
        'url' => ['/obyavleniya/' . $item->slug],
        'class' => 'nav-adv__item',
    ];
}
$this->params['breadcrumbs'][] = $model->title;
?>

<section class="nav-adv">
    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => [
                'label' => 'Главная',
                'url' => Url::to(['/']),
                'class' => 'nav-adv__item',
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'tag' => 'nav',
            'options' => ['class' => 'nav-adv__wrap'],
            'itemTemplate' => '{link}<span class="nav-adv__slash">/</span>',
            'activeItemTemplate' => "<a class=\"nav-adv__item\">{link}</a>",

        ]) ?>
    </div>
</section>
<section class="single-adv">
    <div class="container">
        <h1 class="single-adv__title lg-none"><?= $model->title; ?></h1>
        <div class="single-adv__wrap">
            <div class="single-adv__left">
                <?php if (!empty($model['ads_img'])): ?>
                    <div class="single-adv__sliders">
                        <div class="single-adv__slider-main">
                            <?php foreach ($model['ads_img'] as $item): ?>
                                <div class="single-adv__slider-main-item">
                                    <a class="single-adv__slider-main-increase fancybox" data-fancybox="gallery1"
                                       href="<?= $item->img; ?>">
                                        <img src="/theme/images/ico-increase.png" alt=""/>
                                    </a>
                                    <img src="<?= $item->img; ?>"/>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="single-adv__slider-second">
                            <?php foreach ($model['ads_img'] as $item): ?>
                                <div class="single-adv__slider-second-item">
                                    <img src="<?= $item->img_thumb; ?>"/>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="slider-for">
                        <div class="item">
                            <a class="fancybox-thumb" rel="fancybox-thumb" href="/img/no-img-big.png">
                                <img src='/img/no-img-big.png' alt="<?= $item->title; ?>" draggable="false"/>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
            <div class="single-adv__right">
                <div class="d-flex align-items-center">
                    <span class="price">
                        <?= number_format($model->price, 0, '.', ' '); ?> ₽
                    </span>
                    <div class="sm-block ml-auto">
                        <a class="single-adv__like" href="#">
                            <i class="fa fa-heart-o"></i>
                        </a>
                    </div>
                </div>
                <div class="single-adv__like-and-date">
                    <span class="date mt15">
                        Добавлено: <?= \common\classes\DataTime::time($model->dt_update); ?>
                    </span>
                    <a class="single-adv__like sm-none" href="#">
                        <i class="fa fa-heart-o"></i>
                        <span>Добавить в избранное</span>
                    </a>
                </div>
                <div class="lg-block">
                    <h1 class="single-adv__title"><?= $model->title; ?></h1>
                </div>
                <div class="single-adv__btns">
                    <!--<button class="button button_big-v button_red-border mb10 sm-none">Написать продавцу</button>
                    <div class="sm-block">
                        <button class="button button_big-v button_red-border">Написать</button>
                    </div>
                    -->
                    <button class="button button_big-v button_red showPhone" data-id="<?= $model->id?>">Показать номер</button>
                </div>
                <div class="offer-user mt30 mb30 lg-none">
                    <div class="offer-user__avatar">
                        <span><?= \common\classes\UserFunction::getUserletter($model->name); ?></span>
                    </div>
                    <a class="offer-user__info" href="#">
                        <span class="offer-user__name"><?= $model->name; ?></span>
                        <span class="offer-user__count">(15 объявлений)</span>
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <a href="<?= \yii\helpers\Url::to([
                        '/adsmanager/filter/filter_search_view',
                        'cityFilter' => $model['geobase_city']->id,
                    ]) ?>" class="d-flex align-items-center">
                        <svg class="single-adv__icon ico ico_gray">
                            <use xlink:href="/theme/images/svg.svg#nav">
                            </use>
                        </svg>
                        <span class="ml5 c-gray fz13"><?= $model['geobase_city']->name; ?></span>
                    </a>

                    <div class="ml-auto">
                        <div class="single-card__detail-view"><img class="mr5" src="/theme/images/icon-eye.png" alt=""/>
                            <span><?= $model->views; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-adv__left">
                <div class="single-adv__bottom-item">
                    <div class="single-adv__bottom-title sm-none"><span>Описание</span>
                    </div>
                    <div class="single-adv__bottom-content single-adv__desc">
                        <?= nl2br($model->content); ?>

                        <?php foreach ($model['ads_fields_value'] as $item): ?>
                            <div class="ad-info-row">
                                <span><?= \common\classes\Ads::getLabelAdditionalField($item->ads_fields_name); ?></span>
                                <p><?= $item->value ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="single-adv__bottom-item lg-none">
                    <div class="single-adv__bottom-title d-flex align-items-center"><span>Узнайте больше</span>
                    </div>
                    <div class="single-adv__bottom-content">
                        <button class="button button_red-border mr10 showPhone" data-id="<?= $model->id?>">Показать номер</button>
                        <!--<button class="button button_red">Написать продавцу</button>-->
                    </div>
                </div>
                <div class="single-adv__bottom-item lg-flex">
                    <div class="offer-user">
                        <div class="offer-user__avatar"><span><?= \common\classes\UserFunction::getUserletter($model->name); ?></span>
                        </div>
                        <a class="offer-user__info" href="#"><span
                                    class="offer-user__name"><?= $model->name; ?></span><span class="offer-user__count">(15 объявлений)</span></a>
                    </div>
                </div>
                <div class="single-adv__bottom-item">
                    <div class="single-adv__bottom-title d-flex align-items-center"><span>Поделиться</span>
                    </div>
                    <div class="single-adv__bottom-content d-flex">
                        <div class="social"><a class="social__link bg-vk" href="https://vk.com/rub_on"><i
                                        class="fa fa-vk"></i></a><a class="social__link bg-facebook"
                                                                    href="https://vk.com/rub_on"><i
                                        class="fa fa-facebook"></i></a><a class="social__link bg-odnoklassniki"
                                                                          href="https://vk.com/rub_on"><i
                                        class="fa fa-odnoklassniki"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= \frontend\modules\adsmanager\widgets\RelatedAds::widget([
            'idCat' => $model->category_id,
            'ads' => $model,
        ]); ?>
<section class="similar">
    <div class="container">
        <h2 class="similar__title">Похожие объявления
        </h2>
        <div class="cards">
            <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">
                <div class="single-card__main">
                    <div class="single-card__top">
                        <div class="single-card__overlay"><a class="js-openModal" href="#"
                                                             data-modal="#card-detailundefined"></a><span
                                    class="single-card__view single-card__city"><i
                                        class="fa fa-camera"></i><span>5</span></span>
                        </div>
                        <div class="single-card__top-content"><a class="single-card__city" href="#">Москва</a><a
                                    class="single-card__like" href="#"><i class="fa fa-heart-o"></i></a>
                        </div>
                        <img class="bg-img" src="/theme/images/cards/bag.jpg" alt=""/>
                    </div>
                    <div class="single-card__bottom"><a class="single-card__title" href="#">Рюкзак из натуральной кожи,
                            размеры 30х35 см</a><span class="price price-adaptive price-small">1800₽</span>
                    </div>
                </div>
                <div class="modal modal__detail container modal-js" id="card-detailundefined">
                    <div class="single-card__detail">
                        <button class="button_close js-modalClose">×</button>
                        <div class="single-card__detail-content">
                            <div class="single-card__detail-img"><img class="bg-img" src="assets/images/cards/bag.jpg"
                                                                      alt=""/>
                                <div class="single-card__detail-img-content"><span
                                            class="single-card__view single-card__city"><i
                                                class="fa fa-camera"></i><span>5</span></span>
                                </div>
                            </div>
                            <div class="single-card__detail-main"><a class="button button_small button_gray sm-none"
                                                                     href="#">Мода и стиль</a>
                                <h3 class="single-card__detail-title mb15 mt20">Рюкзак из натуральной крокодильей кожи,
                                    размеры 30х35 см
                                </h3>
                                <div class="single-card__info-second">
                                    <div class="sm-block mr-auto"><a class="button button_small button_gray">Мода и
                                            стиль</a></div>
                                    <span class="single-card__detail-date">Добавлено: 19 марта 2018, 17:15</span>
                                    <div class="single-card__detail-view sm-none"><img class="mr5"
                                                                                       src="assets/images/icon-eye.png"
                                                                                       alt=""/><span>255</span>
                                    </div>
                                    <a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
                                        <svg class="single-card__icon ico ico_gray">
                                            <use xlink:href="assets/images/svg.svg#nav">
                                            </use>
                                        </svg>
                                        <span class="ml5">Санкт - Петербург</span></a>
                                </div>
                                <div class="single-card__info">
                                    <p>Размер: 30/35см</p>
                                    <p>Материал: натуральная кожа супер качество!</p>
                                    <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>
                                    <p>Цвет: чёрная</p>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-end mt10"><a
                                            class="single-card__detail-like mt5 mb5" href="#"><i
                                                class="fa fa-heart-o"></i><span>В избранное</span></a>
                                    <div class="sm-block mr-auto">
                                        <div class="single-card__detail-view"><img class="mr5"
                                                                                   src="assets/images/icon-eye.png"
                                                                                   alt=""/><span>255</span>
                                        </div>
                                    </div>
                                    <a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>
                                </div>
                                <div class="mt10 fw-semi-bold fz18 mb10 lg-none"><span>Похожие объявления:</span></div>
                                <div class="single-card__slider lg-none"><a class="single-card__slider-item"
                                                                            href="#"><img class="bg-img"
                                                                                          src="assets/images/cards/bag-01.jpg"
                                                                                          alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-01.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">
                <div class="single-card__main">
                    <div class="single-card__top">
                        <div class="single-card__overlay"><a class="js-openModal" href="#"
                                                             data-modal="#card-detailundefined"></a><span
                                    class="single-card__view single-card__city"><i
                                        class="fa fa-camera"></i><span>5</span></span>
                        </div>
                        <div class="single-card__top-content"><a class="single-card__city" href="#">Москва</a><a
                                    class="single-card__like" href="#"><i class="fa fa-heart-o"></i></a>
                        </div>
                        <img class="bg-img" src="assets/images/cards/bag.jpg" alt=""/>
                    </div>
                    <div class="single-card__bottom"><a class="single-card__title" href="#">Рюкзак из натуральной кожи,
                            размеры 30х35 см</a><span class="price price-adaptive price-small">1800₽</span>
                    </div>
                </div>
                <div class="modal modal__detail container modal-js" id="card-detailundefined">
                    <div class="single-card__detail">
                        <button class="button_close js-modalClose">×</button>
                        <div class="single-card__detail-content">
                            <div class="single-card__detail-img"><img class="bg-img" src="assets/images/cards/bag.jpg"
                                                                      alt=""/>
                                <div class="single-card__detail-img-content"><span
                                            class="single-card__view single-card__city"><i
                                                class="fa fa-camera"></i><span>5</span></span>
                                </div>
                            </div>
                            <div class="single-card__detail-main"><a class="button button_small button_gray sm-none"
                                                                     href="#">Мода и стиль</a>
                                <h3 class="single-card__detail-title mb15 mt20">Рюкзак из натуральной крокодильей кожи,
                                    размеры 30х35 см
                                </h3>
                                <div class="single-card__info-second">
                                    <div class="sm-block mr-auto"><a class="button button_small button_gray">Мода и
                                            стиль</a></div>
                                    <span class="single-card__detail-date">Добавлено: 19 марта 2018, 17:15</span>
                                    <div class="single-card__detail-view sm-none"><img class="mr5"
                                                                                       src="assets/images/icon-eye.png"
                                                                                       alt=""/><span>255</span>
                                    </div>
                                    <a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
                                        <svg class="single-card__icon ico ico_gray">
                                            <use xlink:href="assets/images/svg.svg#nav">
                                            </use>
                                        </svg>
                                        <span class="ml5">Санкт - Петербург</span></a>
                                </div>
                                <div class="single-card__info">
                                    <p>Размер: 30/35см</p>
                                    <p>Материал: натуральная кожа супер качество!</p>
                                    <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>
                                    <p>Цвет: чёрная</p>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-end mt10"><a
                                            class="single-card__detail-like mt5 mb5" href="#"><i
                                                class="fa fa-heart-o"></i><span>В избранное</span></a>
                                    <div class="sm-block mr-auto">
                                        <div class="single-card__detail-view"><img class="mr5"
                                                                                   src="assets/images/icon-eye.png"
                                                                                   alt=""/><span>255</span>
                                        </div>
                                    </div>
                                    <a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>
                                </div>
                                <div class="mt10 fw-semi-bold fz18 mb10 lg-none"><span>Похожие объявления:</span></div>
                                <div class="single-card__slider lg-none"><a class="single-card__slider-item"
                                                                            href="#"><img class="bg-img"
                                                                                          src="assets/images/cards/bag-01.jpg"
                                                                                          alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-01.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">
                <div class="single-card__main">
                    <div class="single-card__top">
                        <div class="single-card__overlay"><a class="js-openModal" href="#"
                                                             data-modal="#card-detailundefined"></a><span
                                    class="single-card__view single-card__city"><i
                                        class="fa fa-camera"></i><span>5</span></span>
                        </div>
                        <div class="single-card__top-content"><a class="single-card__city" href="#">Москва</a><a
                                    class="single-card__like" href="#"><i class="fa fa-heart-o"></i></a>
                        </div>
                        <img class="bg-img" src="assets/images/cards/bag.jpg" alt=""/>
                    </div>
                    <div class="single-card__bottom"><a class="single-card__title" href="#">Рюкзак из натуральной кожи,
                            размеры 30х35 см</a><span class="price price-adaptive price-small">1800₽</span>
                    </div>
                </div>
                <div class="modal modal__detail container modal-js" id="card-detailundefined">
                    <div class="single-card__detail">
                        <button class="button_close js-modalClose">×</button>
                        <div class="single-card__detail-content">
                            <div class="single-card__detail-img"><img class="bg-img" src="assets/images/cards/bag.jpg"
                                                                      alt=""/>
                                <div class="single-card__detail-img-content"><span
                                            class="single-card__view single-card__city"><i
                                                class="fa fa-camera"></i><span>5</span></span>
                                </div>
                            </div>
                            <div class="single-card__detail-main"><a class="button button_small button_gray sm-none"
                                                                     href="#">Мода и стиль</a>
                                <h3 class="single-card__detail-title mb15 mt20">Рюкзак из натуральной крокодильей кожи,
                                    размеры 30х35 см
                                </h3>
                                <div class="single-card__info-second">
                                    <div class="sm-block mr-auto"><a class="button button_small button_gray">Мода и
                                            стиль</a></div>
                                    <span class="single-card__detail-date">Добавлено: 19 марта 2018, 17:15</span>
                                    <div class="single-card__detail-view sm-none"><img class="mr5"
                                                                                       src="assets/images/icon-eye.png"
                                                                                       alt=""/><span>255</span>
                                    </div>
                                    <a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
                                        <svg class="single-card__icon ico ico_gray">
                                            <use xlink:href="assets/images/svg.svg#nav">
                                            </use>
                                        </svg>
                                        <span class="ml5">Санкт - Петербург</span></a>
                                </div>
                                <div class="single-card__info">
                                    <p>Размер: 30/35см</p>
                                    <p>Материал: натуральная кожа супер качество!</p>
                                    <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>
                                    <p>Цвет: чёрная</p>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-end mt10"><a
                                            class="single-card__detail-like mt5 mb5" href="#"><i
                                                class="fa fa-heart-o"></i><span>В избранное</span></a>
                                    <div class="sm-block mr-auto">
                                        <div class="single-card__detail-view"><img class="mr5"
                                                                                   src="assets/images/icon-eye.png"
                                                                                   alt=""/><span>255</span>
                                        </div>
                                    </div>
                                    <a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>
                                </div>
                                <div class="mt10 fw-semi-bold fz18 mb10 lg-none"><span>Похожие объявления:</span></div>
                                <div class="single-card__slider lg-none"><a class="single-card__slider-item"
                                                                            href="#"><img class="bg-img"
                                                                                          src="assets/images/cards/bag-01.jpg"
                                                                                          alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-01.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">
                <div class="single-card__main">
                    <div class="single-card__top">
                        <div class="single-card__overlay"><a class="js-openModal" href="#"
                                                             data-modal="#card-detailundefined"></a><span
                                    class="single-card__view single-card__city"><i
                                        class="fa fa-camera"></i><span>5</span></span>
                        </div>
                        <div class="single-card__top-content"><a class="single-card__city" href="#">Москва</a><a
                                    class="single-card__like" href="#"><i class="fa fa-heart-o"></i></a>
                        </div>
                        <img class="bg-img" src="assets/images/cards/bag.jpg" alt=""/>
                    </div>
                    <div class="single-card__bottom"><a class="single-card__title" href="#">Рюкзак из натуральной кожи,
                            размеры 30х35 см</a><span class="price price-adaptive price-small">1800₽</span>
                    </div>
                </div>
                <div class="modal modal__detail container modal-js" id="card-detailundefined">
                    <div class="single-card__detail">
                        <button class="button_close js-modalClose">×</button>
                        <div class="single-card__detail-content">
                            <div class="single-card__detail-img"><img class="bg-img" src="assets/images/cards/bag.jpg"
                                                                      alt=""/>
                                <div class="single-card__detail-img-content"><span
                                            class="single-card__view single-card__city"><i
                                                class="fa fa-camera"></i><span>5</span></span>
                                </div>
                            </div>
                            <div class="single-card__detail-main"><a class="button button_small button_gray sm-none"
                                                                     href="#">Мода и стиль</a>
                                <h3 class="single-card__detail-title mb15 mt20">Рюкзак из натуральной крокодильей кожи,
                                    размеры 30х35 см
                                </h3>
                                <div class="single-card__info-second">
                                    <div class="sm-block mr-auto"><a class="button button_small button_gray">Мода и
                                            стиль</a></div>
                                    <span class="single-card__detail-date">Добавлено: 19 марта 2018, 17:15</span>
                                    <div class="single-card__detail-view sm-none"><img class="mr5"
                                                                                       src="assets/images/icon-eye.png"
                                                                                       alt=""/><span>255</span>
                                    </div>
                                    <a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
                                        <svg class="single-card__icon ico ico_gray">
                                            <use xlink:href="assets/images/svg.svg#nav">
                                            </use>
                                        </svg>
                                        <span class="ml5">Санкт - Петербург</span></a>
                                </div>
                                <div class="single-card__info">
                                    <p>Размер: 30/35см</p>
                                    <p>Материал: натуральная кожа супер качество!</p>
                                    <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>
                                    <p>Цвет: чёрная</p>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-end mt10"><a
                                            class="single-card__detail-like mt5 mb5" href="#"><i
                                                class="fa fa-heart-o"></i><span>В избранное</span></a>
                                    <div class="sm-block mr-auto">
                                        <div class="single-card__detail-view"><img class="mr5"
                                                                                   src="assets/images/icon-eye.png"
                                                                                   alt=""/><span>255</span>
                                        </div>
                                    </div>
                                    <a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>
                                </div>
                                <div class="mt10 fw-semi-bold fz18 mb10 lg-none"><span>Похожие объявления:</span></div>
                                <div class="single-card__slider lg-none"><a class="single-card__slider-item"
                                                                            href="#"><img class="bg-img"
                                                                                          src="assets/images/cards/bag-01.jpg"
                                                                                          alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-01.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">
                <div class="single-card__main">
                    <div class="single-card__top">
                        <div class="single-card__overlay"><a class="js-openModal" href="#"
                                                             data-modal="#card-detailundefined"></a><span
                                    class="single-card__view single-card__city"><i
                                        class="fa fa-camera"></i><span>5</span></span>
                        </div>
                        <div class="single-card__top-content"><a class="single-card__city" href="#">Москва</a><a
                                    class="single-card__like" href="#"><i class="fa fa-heart-o"></i></a>
                        </div>
                        <img class="bg-img" src="assets/images/cards/bag.jpg" alt=""/>
                    </div>
                    <div class="single-card__bottom"><a class="single-card__title" href="#">Рюкзак из натуральной кожи,
                            размеры 30х35 см</a><span class="price price-adaptive price-small">1800₽</span>
                    </div>
                </div>
                <div class="modal modal__detail container modal-js" id="card-detailundefined">
                    <div class="single-card__detail">
                        <button class="button_close js-modalClose">×</button>
                        <div class="single-card__detail-content">
                            <div class="single-card__detail-img"><img class="bg-img" src="assets/images/cards/bag.jpg"
                                                                      alt=""/>
                                <div class="single-card__detail-img-content"><span
                                            class="single-card__view single-card__city"><i
                                                class="fa fa-camera"></i><span>5</span></span>
                                </div>
                            </div>
                            <div class="single-card__detail-main"><a class="button button_small button_gray sm-none"
                                                                     href="#">Мода и стиль</a>
                                <h3 class="single-card__detail-title mb15 mt20">Рюкзак из натуральной крокодильей кожи,
                                    размеры 30х35 см
                                </h3>
                                <div class="single-card__info-second">
                                    <div class="sm-block mr-auto"><a class="button button_small button_gray">Мода и
                                            стиль</a></div>
                                    <span class="single-card__detail-date">Добавлено: 19 марта 2018, 17:15</span>
                                    <div class="single-card__detail-view sm-none"><img class="mr5"
                                                                                       src="assets/images/icon-eye.png"
                                                                                       alt=""/><span>255</span>
                                    </div>
                                    <a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
                                        <svg class="single-card__icon ico ico_gray">
                                            <use xlink:href="assets/images/svg.svg#nav">
                                            </use>
                                        </svg>
                                        <span class="ml5">Санкт - Петербург</span></a>
                                </div>
                                <div class="single-card__info">
                                    <p>Размер: 30/35см</p>
                                    <p>Материал: натуральная кожа супер качество!</p>
                                    <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>
                                    <p>Цвет: чёрная</p>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-end mt10"><a
                                            class="single-card__detail-like mt5 mb5" href="#"><i
                                                class="fa fa-heart-o"></i><span>В избранное</span></a>
                                    <div class="sm-block mr-auto">
                                        <div class="single-card__detail-view"><img class="mr5"
                                                                                   src="assets/images/icon-eye.png"
                                                                                   alt=""/><span>255</span>
                                        </div>
                                    </div>
                                    <a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>
                                </div>
                                <div class="mt10 fw-semi-bold fz18 mb10 lg-none"><span>Похожие объявления:</span></div>
                                <div class="single-card__slider lg-none"><a class="single-card__slider-item"
                                                                            href="#"><img class="bg-img"
                                                                                          src="assets/images/cards/bag-01.jpg"
                                                                                          alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-01.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">
                <div class="single-card__main">
                    <div class="single-card__top">
                        <div class="single-card__overlay"><a class="js-openModal" href="#"
                                                             data-modal="#card-detailundefined"></a><span
                                    class="single-card__view single-card__city"><i
                                        class="fa fa-camera"></i><span>5</span></span>
                        </div>
                        <div class="single-card__top-content"><a class="single-card__city" href="#">Москва</a><a
                                    class="single-card__like" href="#"><i class="fa fa-heart-o"></i></a>
                        </div>
                        <img class="bg-img" src="assets/images/cards/bag.jpg" alt=""/>
                    </div>
                    <div class="single-card__bottom"><a class="single-card__title" href="#">Рюкзак из натуральной кожи,
                            размеры 30х35 см</a><span class="price price-adaptive price-small">1800₽</span>
                    </div>
                </div>
                <div class="modal modal__detail container modal-js" id="card-detailundefined">
                    <div class="single-card__detail">
                        <button class="button_close js-modalClose">×</button>
                        <div class="single-card__detail-content">
                            <div class="single-card__detail-img"><img class="bg-img" src="assets/images/cards/bag.jpg"
                                                                      alt=""/>
                                <div class="single-card__detail-img-content"><span
                                            class="single-card__view single-card__city"><i
                                                class="fa fa-camera"></i><span>5</span></span>
                                </div>
                            </div>
                            <div class="single-card__detail-main"><a class="button button_small button_gray sm-none"
                                                                     href="#">Мода и стиль</a>
                                <h3 class="single-card__detail-title mb15 mt20">Рюкзак из натуральной крокодильей кожи,
                                    размеры 30х35 см
                                </h3>
                                <div class="single-card__info-second">
                                    <div class="sm-block mr-auto"><a class="button button_small button_gray">Мода и
                                            стиль</a></div>
                                    <span class="single-card__detail-date">Добавлено: 19 марта 2018, 17:15</span>
                                    <div class="single-card__detail-view sm-none"><img class="mr5"
                                                                                       src="assets/images/icon-eye.png"
                                                                                       alt=""/><span>255</span>
                                    </div>
                                    <a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
                                        <svg class="single-card__icon ico ico_gray">
                                            <use xlink:href="assets/images/svg.svg#nav">
                                            </use>
                                        </svg>
                                        <span class="ml5">Санкт - Петербург</span></a>
                                </div>
                                <div class="single-card__info">
                                    <p>Размер: 30/35см</p>
                                    <p>Материал: натуральная кожа супер качество!</p>
                                    <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>
                                    <p>Цвет: чёрная</p>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-end mt10"><a
                                            class="single-card__detail-like mt5 mb5" href="#"><i
                                                class="fa fa-heart-o"></i><span>В избранное</span></a>
                                    <div class="sm-block mr-auto">
                                        <div class="single-card__detail-view"><img class="mr5"
                                                                                   src="assets/images/icon-eye.png"
                                                                                   alt=""/><span>255</span>
                                        </div>
                                    </div>
                                    <a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>
                                </div>
                                <div class="mt10 fw-semi-bold fz18 mb10 lg-none"><span>Похожие объявления:</span></div>
                                <div class="single-card__slider lg-none"><a class="single-card__slider-item"
                                                                            href="#"><img class="bg-img"
                                                                                          src="assets/images/cards/bag-01.jpg"
                                                                                          alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-01.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">
                <div class="single-card__main">
                    <div class="single-card__top">
                        <div class="single-card__overlay"><a class="js-openModal" href="#"
                                                             data-modal="#card-detailundefined"></a><span
                                    class="single-card__view single-card__city"><i
                                        class="fa fa-camera"></i><span>5</span></span>
                        </div>
                        <div class="single-card__top-content"><a class="single-card__city" href="#">Москва</a><a
                                    class="single-card__like" href="#"><i class="fa fa-heart-o"></i></a>
                        </div>
                        <img class="bg-img" src="assets/images/cards/bag.jpg" alt=""/>
                    </div>
                    <div class="single-card__bottom"><a class="single-card__title" href="#">Рюкзак из натуральной кожи,
                            размеры 30х35 см</a><span class="price price-adaptive price-small">1800₽</span>
                    </div>
                </div>
                <div class="modal modal__detail container modal-js" id="card-detailundefined">
                    <div class="single-card__detail">
                        <button class="button_close js-modalClose">×</button>
                        <div class="single-card__detail-content">
                            <div class="single-card__detail-img"><img class="bg-img" src="assets/images/cards/bag.jpg"
                                                                      alt=""/>
                                <div class="single-card__detail-img-content"><span
                                            class="single-card__view single-card__city"><i
                                                class="fa fa-camera"></i><span>5</span></span>
                                </div>
                            </div>
                            <div class="single-card__detail-main"><a class="button button_small button_gray sm-none"
                                                                     href="#">Мода и стиль</a>
                                <h3 class="single-card__detail-title mb15 mt20">Рюкзак из натуральной крокодильей кожи,
                                    размеры 30х35 см
                                </h3>
                                <div class="single-card__info-second">
                                    <div class="sm-block mr-auto"><a class="button button_small button_gray">Мода и
                                            стиль</a></div>
                                    <span class="single-card__detail-date">Добавлено: 19 марта 2018, 17:15</span>
                                    <div class="single-card__detail-view sm-none"><img class="mr5"
                                                                                       src="assets/images/icon-eye.png"
                                                                                       alt=""/><span>255</span>
                                    </div>
                                    <a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
                                        <svg class="single-card__icon ico ico_gray">
                                            <use xlink:href="assets/images/svg.svg#nav">
                                            </use>
                                        </svg>
                                        <span class="ml5">Санкт - Петербург</span></a>
                                </div>
                                <div class="single-card__info">
                                    <p>Размер: 30/35см</p>
                                    <p>Материал: натуральная кожа супер качество!</p>
                                    <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>
                                    <p>Цвет: чёрная</p>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-end mt10"><a
                                            class="single-card__detail-like mt5 mb5" href="#"><i
                                                class="fa fa-heart-o"></i><span>В избранное</span></a>
                                    <div class="sm-block mr-auto">
                                        <div class="single-card__detail-view"><img class="mr5"
                                                                                   src="assets/images/icon-eye.png"
                                                                                   alt=""/><span>255</span>
                                        </div>
                                    </div>
                                    <a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>
                                </div>
                                <div class="mt10 fw-semi-bold fz18 mb10 lg-none"><span>Похожие объявления:</span></div>
                                <div class="single-card__slider lg-none"><a class="single-card__slider-item"
                                                                            href="#"><img class="bg-img"
                                                                                          src="assets/images/cards/bag-01.jpg"
                                                                                          alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-01.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">
                <div class="single-card__main">
                    <div class="single-card__top">
                        <div class="single-card__overlay"><a class="js-openModal" href="#"
                                                             data-modal="#card-detailundefined"></a><span
                                    class="single-card__view single-card__city"><i
                                        class="fa fa-camera"></i><span>5</span></span>
                        </div>
                        <div class="single-card__top-content"><a class="single-card__city" href="#">Москва</a><a
                                    class="single-card__like" href="#"><i class="fa fa-heart-o"></i></a>
                        </div>
                        <img class="bg-img" src="assets/images/cards/bag.jpg" alt=""/>
                    </div>
                    <div class="single-card__bottom"><a class="single-card__title" href="#">Рюкзак из натуральной кожи,
                            размеры 30х35 см</a><span class="price price-adaptive price-small">1800₽</span>
                    </div>
                </div>
                <div class="modal modal__detail container modal-js" id="card-detailundefined">
                    <div class="single-card__detail">
                        <button class="button_close js-modalClose">×</button>
                        <div class="single-card__detail-content">
                            <div class="single-card__detail-img"><img class="bg-img" src="assets/images/cards/bag.jpg"
                                                                      alt=""/>
                                <div class="single-card__detail-img-content"><span
                                            class="single-card__view single-card__city"><i
                                                class="fa fa-camera"></i><span>5</span></span>
                                </div>
                            </div>
                            <div class="single-card__detail-main"><a class="button button_small button_gray sm-none"
                                                                     href="#">Мода и стиль</a>
                                <h3 class="single-card__detail-title mb15 mt20">Рюкзак из натуральной крокодильей кожи,
                                    размеры 30х35 см
                                </h3>
                                <div class="single-card__info-second">
                                    <div class="sm-block mr-auto"><a class="button button_small button_gray">Мода и
                                            стиль</a></div>
                                    <span class="single-card__detail-date">Добавлено: 19 марта 2018, 17:15</span>
                                    <div class="single-card__detail-view sm-none"><img class="mr5"
                                                                                       src="assets/images/icon-eye.png"
                                                                                       alt=""/><span>255</span>
                                    </div>
                                    <a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
                                        <svg class="single-card__icon ico ico_gray">
                                            <use xlink:href="assets/images/svg.svg#nav">
                                            </use>
                                        </svg>
                                        <span class="ml5">Санкт - Петербург</span></a>
                                </div>
                                <div class="single-card__info">
                                    <p>Размер: 30/35см</p>
                                    <p>Материал: натуральная кожа супер качество!</p>
                                    <p>Форму держит, на змейке внутри, носиться как сумкой так и рюкзаком!</p>
                                    <p>Цвет: чёрная</p>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-end mt10"><a
                                            class="single-card__detail-like mt5 mb5" href="#"><i
                                                class="fa fa-heart-o"></i><span>В избранное</span></a>
                                    <div class="sm-block mr-auto">
                                        <div class="single-card__detail-view"><img class="mr5"
                                                                                   src="assets/images/icon-eye.png"
                                                                                   alt=""/><span>255</span>
                                        </div>
                                    </div>
                                    <a class="button button_red mt5 mb5 ml15">Посмотреть полностью</a>
                                </div>
                                <div class="mt10 fw-semi-bold fz18 mb10 lg-none"><span>Похожие объявления:</span></div>
                                <div class="single-card__slider lg-none"><a class="single-card__slider-item"
                                                                            href="#"><img class="bg-img"
                                                                                          src="assets/images/cards/bag-01.jpg"
                                                                                          alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-01.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-02.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-03.jpg"
                                                                                           alt=""/></a><a
                                            class="single-card__slider-item" href="#"><img class="bg-img"
                                                                                           src="assets/images/cards/bag-04.jpg"
                                                                                           alt=""/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt20">
            <button class="button button_gray button_big">Показать все объявления из этой категории</button>
        </div>
    </div>
</section>


<!--<section class="ad-concrete__content">
    <div class="container">
        <div class="ad-concrete__header">
            <h1 class="ad-concrete__header_title"><?/*= $model->title; */?></h1>
        </div>
        <div class="ad-concrete__content_left">
            <?php /*if (!empty($model['ads_img'])): */?>
                <div class="slider-for">
                    <?php /*foreach ($model['ads_img'] as $item): */?>
                        <div class="item">
                            <a class="fancybox-thumb" rel="fancybox-thumb" href="<?/*= $item->img; */?>">
                                <img src="<?/*= $item->img; */?>" alt="image" draggable="false"/>
                            </a>
                        </div>
                    <?php /*endforeach; */?>
                </div>
                <div class="slider-nav">
                    <?php /*foreach ($model['ads_img'] as $item): */?>
                        <div class="item">
                            <img src="<?/*= $item->img_thumb; */?>" alt="image" draggable="false"/>
                        </div>
                    <?php /*endforeach; */?>
                </div>
            <?php /*else: */?>
                <div class="slider-for">
                    <div class="item">
                        <a class="fancybox-thumb" rel="fancybox-thumb" href="/img/no-img-big.png">
                            <img src='/img/no-img-big.png' alt="<?/*= $item->title; */?>" draggable="false"/>
                        </a>
                    </div>
                </div>
            <?php /*endif; */?>

            <div class="ad-info">
                <?php /*foreach ($model['ads_fields_value'] as $item): */?>
                    <div class="ad-info-row">
                        <span><?/*= \common\classes\Ads::getLabelAdditionalField($item->ads_fields_name); */?></span>
                        <p><?/*= $item->value */?></p>
                    </div>
                <?php /*endforeach; */?>
                <p class="brief-information"><?/*= nl2br($model->content); */?></p>
            </div>

            <p class="average-ad-time">
                <span class="add-ad-time-icon"></span>
                <?/*= \common\classes\DataTime::time($model->dt_update); */?>
            </p>
            <?php /*if ($model->private_business == 0): */?>
                <?/*= \frontend\modules\adsmanager\widgets\ShowUserCountAds::widget([
                    'idAds' => $model->id,
                    'idUser' => $model->user_id,
                ]) */?>
            <?php /*else: */?>
                <?/*= \frontend\modules\adsmanager\widgets\ShowOrgCountAds::widget([
                    'idAds' => $model->id,
                    'idOrg' => $model->business_id,
                ]) */?>
            <?php /*endif; */?>

            <div class="share-ad">
                <a href="" class="write-seller"><span class="mail-1"></span>Написать продавцу</a>
                <div class="favorite__ad">
                    <?php /*if (empty($adsFavorites)): */?>
                        <span class="average-ad-star star-icon" data-gist="ad" data-gistid="<?/*= $model->id; */?>"
                              data-csrf="<?/*= Yii::$app->request->getCsrfToken() */?>"></span>
                        В избранное
                    <?php /*else: */?>
                        <span class="average-ad-star active-star-icon" data-gist="ad" data-gistid="<?/*= $model->id; */?>"
                              data-csrf="<?/*= Yii::$app->request->getCsrfToken() */?>"></span>
                        Из избранного
                    <?php /*endif; */?>
                </div>
                <div class="mini-social">
                    <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                    <script src="//yastatic.net/share2/share.js"></script>
                    <div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus"
                         data-counter=""></div>
                </div>
            </div>


            <div class="msg_box">
                <?php /*if (Yii::$app->user->isGuest): */?>
                    <h3>Авторизируйтесь пожалуйста</h3><a href="<?/*= \yii\helpers\Url::toRoute('/login') */?>"
                                                          class="authorized-btn">Авторизуйтесь</a>
                <?php /*else: */?>
                <form action="">
                    <?/*= \yii\helpers\Html::label('Текст сообщения', 'msg_to_author') */?>
                    <?/*= \yii\helpers\Html::textarea('msg_to_author', null, [
                        'id' => 'msg_to_author',
                        'class' => 'msg_box_area',
                    ]) */?>
                    <?/*= \yii\helpers\Html::hiddenInput('from', Yii::$app->user->id) */?>
                    <?/*= \yii\helpers\Html::hiddenInput('to', $model->user_id) */?>
                    <?/*= \yii\helpers\Html::a('Отправить', null, [
                        'id' => 'send_msg_to_author',
                        'class' => 'btn btn-primary',
                    ]) */?>
                    <?php /*endif; */?>
                </form>
            </div>
        </div>
        <div class="ad-concrete__content_right" id="sidebar">
            <div class="author-column">
                <div class="ad-price">
                    <span class="price"><?/*= number_format($model->price, 0, '.', ' '); */?></span>
                    <span class="rubl-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 510.127 510.127">
              <path d="M34.786,428.963h81.158v69.572c0,3.385,1.083,6.156,3.262,8.322c2.173,2.18,4.951,3.27,8.335,3.27h60.502
                c3.14,0,5.857-1.09,8.152-3.27c2.295-2.166,3.439-4.938,3.439-8.322v-69.572h182.964c3.377,0,6.156-1.076,8.334-3.256
                c2.18-2.178,3.262-4.951,3.262-8.336v-46.377c0-3.365-1.082-6.156-3.262-8.322c-2.172-2.18-4.957-3.27-8.334-3.27H199.628v-42.754
                h123.184c48.305,0,87.73-14.719,118.293-44.199c30.551-29.449,45.834-67.49,45.834-114.125c0-46.604-15.283-84.646-45.834-114.125
                C410.548,14.749,371.116,0,322.812,0H127.535c-3.385,0-6.157,1.089-8.335,3.256c-2.173,2.179-3.262,4.969-3.262,8.335v227.896
                H34.786c-3.384,0-6.157,1.145-8.335,3.439c-2.172,2.295-3.262,5.012-3.262,8.151v53.978c0,3.385,1.083,6.158,3.262,8.336
                c2.179,2.18,4.945,3.256,8.335,3.256h81.158v42.754H34.786c-3.384,0-6.157,1.09-8.335,3.27c-2.172,2.166-3.262,4.951-3.262,8.322
                v46.377c0,3.385,1.083,6.158,3.262,8.336C28.629,427.887,31.401,428.963,34.786,428.963z M199.628,77.179h115.938
                c25.6,0,46.248,7.485,61.953,22.46c15.697,14.976,23.549,34.547,23.549,58.691c0,24.156-7.852,43.733-23.549,58.691
                c-15.705,14.988-36.354,22.473-61.953,22.473H199.628V77.179z"/>
            </svg>
          </span>
                </div>
                <a href="<?/*= \yii\helpers\Url::to([
                    '/message/default/dialog',
                    'username' => \common\classes\UserFunction::getUserLoginById($model->user_id),
                ]) */?>" target="_blank" class="write-author"><span class="open-mail"></span>написать продавцу</a>
                <a href="" class="call-author showPhone" data-id="<?/*= $model->id; */?>"
                   data-csrf="<?/*= Yii::$app->request->csrfToken; */?>"><span class="tel-icon"></span>
                    <div class="phoneUser">095 *** ** ** <span> показать </span></div>
                </a>
                <div class="author-city">
                    <span class="geo-icon"></span>
                    <span>Город:</span>
                    <a href="<?/*= \yii\helpers\Url::to([
                        '/adsmanager/filter/filter_search_view',
                        'cityFilter' => $model['geobase_city']->id,
                    ]) */?>" class="citu"><?/*= $model['geobase_city']->name; */?></a>
                </div>
                <div class="author-favorite">
                    <?php /*if (empty($adsFavorites)): */?>
                        <span class="average-ad-star star-icon" data-gist="ad" data-gistid="<?/*= $model->id; */?>"
                              data-csrf="<?/*= Yii::$app->request->getCsrfToken() */?>"></span>Добавить в избранное
                    <?php /*else: */?>
                        <span class="average-ad-star active-star-icon" data-gist="ad" data-gistid="<?/*= $model->id; */?>"
                              data-csrf="<?/*= Yii::$app->request->getCsrfToken() */?>"></span>Из избранного
                    <?php /*endif; */?>
                </div>
                <div class="user">
                    <div class="thumb">
                        <img src="<?/*= \common\classes\UserFunction::getUser_avatar_url($model->user_id); */?>" alt="">
                    </div>
                    <span>Продавец:</span>
                    <h4><?/*= $model->name; */?></h4>
                </div>
                <a href="<?/*= \yii\helpers\Url::to([
                    '/adsmanager/adsmanager/user_ads',
                    'login' => $model['user']->username,
                ]) */?>" class="all-author-ads"> Все объявления автора</a>
                <p class="shows-ad"><b>Просмотров:</b> <span>всего <b><?/*= $model->views; */?></b></span></p>


            </div>
            <?/*= \frontend\modules\banner\widgets\ShowRightBanner::widget(); */?>

        </div>
        <?/*= \frontend\modules\adsmanager\widgets\RelatedAds::widget([
            'idCat' => $model->category_id,
            'ads' => $model,
        ]); */?>
    </div>
</section>-->