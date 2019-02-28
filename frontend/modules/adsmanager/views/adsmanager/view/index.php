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
