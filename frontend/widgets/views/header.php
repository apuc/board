<?php
/**
 * @var $countAds \common\models\db\Ads
 * @var $countMsg \common\models\db\Msg
 * @var $userInfo \frontend\models\user\UserDec
 */
use yii\helpers\Url;

?>

<header class="header">
    <div class="container container_flex"><a class="logo" href="/"><img class="logo__img" src="/img/header-logo.png" width="175" height="47" alt="RUBON" title=""/></a>
        <form class="global-search"><input class="global-search__input" id="global-search" type="search" placeholder="Поиск..."/><input class="global-search__submit" id="global-search_submit" type="submit"/>
            <label class="global-search__label" for="global-search_submit">
                <svg class="ico ico_gray ico_small">
                    <use xlink:href="/img/home/svg/svg.svg#search">
                    </use>
                </svg>
            </label>
        </form>
        <button class="choose-region js-openModal" type="button" data-modal="#modalLocation">
            <svg class="choose-region__icon ico ico_gray">
                <use xlink:href="/img/home/svg/svg.svg#nav">
                </use>
            </svg><span class="gray-text">Регион</span>
        </button><a class="button button_red mr10 header__btn--first" href="<?= Url::toRoute(['/adsmanager/adsmanager/create']) ?>">Дать объявление</a>
        <a class="button button_blue mr20" href="<?= Url::toRoute(['/organizations/default/add']) ?>">Создать организацию</a>
        <div class="header__profile"><a class="header__registration" href="">
                <svg class="ico ico_gray mr10">
                    <use xlink:href="/img/home/svg/svg.svg#reg">
                    </use>
                </svg><span class="gray-text js-openModal" data-modal="#modalReg">Регистрация</span></a><a class="header__enter red-text js-openModal" href="#" data-modal="#modalEnter">Войти</a>
        </div>
    </div>
</header>


<!--<nav class="header-nav">-->
<!--    <button class="header-nav__btn js-btn-menu"><span></span><span></span><span></span>-->
<!--    </button>-->
<!--    <div class="container">-->
<!--        <div class="header-nav__wrap">-->
<!---->
<!--            --><?php //foreach($category as $cat): ?>
<!--            <div class="header-nav__item-wrap js-showCategoryList">-->
<!--                <div class="header-nav__item">-->
<!--                    <a class="header-nav__link header-nav__link-category" href="--><?=''// Url::to(["/obyavleniya/{$cat['slug']}"]) ?><!--">-->
<!--                        <img class="header-nav__svg" src="/img/home/svg/car.svg" alt="" width="25" height="25" role="presentation"/>-->
<!--                        <span>--><?=''// $cat['name'] ?><!--</span>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="header-nav__dropdown">-->
<!--                --><?php //$categoryGroups = array_chunk($cat['childs'],7) ?>
<!---->
<!--                    --><?php //foreach ($categoryGroups as $group): ?>
<!--                    <ul class="header-nav__dropdown-list">-->
<!--                        --><?php //foreach ($group as $item): ?>
<!--                        <li class="header-nav__dropdown-li">-->
<!--                            <a class="header-nav__link header-nav__dropdown-link" href="--><?//= Url::to(["/obyavleniya/{$item['slug']}"]) ?><!--">-->
<!--                                --><?=''// $item['name'] ?>
<!--                            </a>-->
<!--                        </li>-->
<!--                        --><?php //endforeach; ?>
<!--                    </ul>-->
<!--                    --><?php //endforeach; ?>
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            --><?php //endforeach;?>
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->




<header class="header-mobile">
    <div class="mobile-btn-menu js-btn-menu"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
    </div><a class="logo" href="/"><img class="logo__img" src="/img/header-logo.png" width="175" height="47" alt="RUBON" title=""/></a>
    <svg class="ico_gray mobile-search-open js-search-open">
        <use xlink:href="/img/home/svg.svg#search"></use>
    </svg>
    <div class="mobile-search js-mobile-search">
        <form class="mobile-search__main"><input class="mobile-search__input" type="search" placeholder="Поиск"/>
            <label class="mobile-search__label" for="global-search_submit">
                <svg class="ico ico_gray">
                    <use xlink:href="/img/home/svg.svg#search">
                    </use>
                </svg>
            </label>
        </form>
        <button class="mobile-search__close js-search-close">×
        </button>
    </div>
</header>



<nav class="nav-mobile">

    <ul class="nav-mobile__list js-nav-mobile" id="main-menu">
        <li class="nav-mobile__li js-openModal" data-modal="#modalLocation">
            <div class="choose-region">
                <svg class="ico ico ico_gray mr20">
                    <use xlink:href="/img/home/svg.svg#nav">
                    </use>
                </svg><span class="gray-text">Санкт-Петербург</span>
            </div>
        </li>
        <li class="nav-mobile__li js-openModal" data-modal="#modalEnter">
            <svg class="ico ico_gray mr20">
                <use xlink:href="/img/home/svg.svg#reg">
                </use>
            </svg><span class="gray-text">Войти в личный кабинет</span>
        </li>
        <li class="nav-mobile__li bg-red js-menu-link" data-menulink="#categoriesOne">
            <div class="category-icon ico mr20"><span></span><span></span><span></span><span></span>
            </div><span class="c-white">Категории</span>
        </li>
        <li class="nav-mobile__li"><a href="#">
                <div class="nav-mobile__plus ico bg-red mr20">+
                </div><span class="c-red">Дать объявление</span></a>
        </li>
        <li class="nav-mobile__li"><a href="#">
                <div class="nav-mobile__plus ico bg-blue mr20">+
                </div><span class="c-blue">Создать организацию</span></a>
        </li>
    </ul>

    <ul class="nav-mobile__list js-nav-mobile" id="categoriesOne">

        <li class="nav-mobile__li js-menu-link" data-menulink="#main-menu">
            <i class="fa fa-angle-left mr20"></i>
            <span>Назад</span>
        </li>

        <?php foreach ($category as $cat):?>
        <li class="nav-mobile__li js-menu-link" data-menulink="#category<?=$cat['id']?>">
            <img class="nav-mobile__svg mr20" src="/img/home/svg/car.svg" alt="" width="25" height="25" role="presentation"/>
            <span><?= $cat['name'] ?></span>
            <i class="fa fa-angle-right"></i>
        </li>

        <li>
            <li>

            <ul class="nav-mobile__list js-nav-mobile" id="category<?=$cat['id']?>">
                <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne">
                    <i class="fa fa-angle-left mr20"></i>
                    <span>Назад</span>
                    <span class="ml-auto c-main"><?= $cat['name']?></span>
                </li>
                <?php foreach($cat['childs'] as $child):?>
                <li class="nav-mobile__li">
                    <a href="#">
<!--                        <div class="nav-mobile__img">-->
<!--                            <img src="assets/images/nav/nav1.png" alt=""/>-->
<!--                        </div>-->
                        <span>
                            <span><?= $child['name'] ?></span>
                            <span class="c-red"> (1150)</span>
                        </span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            </li>
        </li>
        <?php endforeach; ?>

    </ul>
</nav>