<?php
/**
 * Created by PhpStorm.
 * User: KING
 * Date: 12.02.2019
 * Time: 23:52
 */

//\common\classes\Debug::prn($category);

?>
<header class="header">
    <div class="container container_flex">
        <a class="logo" href="/">
            <img class="logo__img" src="/theme/images/logo.png" width="175" height="47" alt="RUBON" title=""/>
        </a>
        <button class="header__category js-btn-category">
            <div class="category-close jsCategoryClose">
                <span></span>
                <span></span>
            </div>
            <img class="mr10" src="/theme/images/ico-caregory.png" alt=""/>
            <span>Категории</span>
        </button>
        <form class="global-search">
            <input class="global-search__input" id="global-search" type="search" placeholder="Поиск..."/>
            <input class="global-search__submit" id="global-search_submit" type="submit"/>
            <label class="global-search__label" for="global-search_submit">
                <svg class="ico ico_gray ico_small">
                    <use xlink:href="/theme/images/svg.svg#search">
                    </use>
                </svg>
            </label>
        </form>
        <button class="choose-region js-openModal" type="button" data-modal="#modalLocation">
            <svg class="choose-region__icon ico ico_gray">
                <use xlink:href="/theme/images/svg.svg#nav">
                </use>
            </svg>
            <span class="gray-text">Регион</span>
        </button>
        <a href="<?= \yii\helpers\Url::toRoute(['/adsmanager/adsmanager/create']) ?>" class="button button_red mr10 header__btn--first">
            Дать объявление
        </a>
        <a href="<?= \yii\helpers\Url::toRoute(['/organizations/default/add']) ?>" class="button button_blue mr20">Создать организацию</a>
        <div class="header__profile">
            <a class="header__registration" href="#">
                <svg class="ico ico_gray mr10">
                    <use xlink:href="assets/images/svg.svg#reg">
                    </use>
                </svg>
                <span class="gray-text js-openModal" data-modal="#modalReg">Регистрация</span>
            </a>
            <a class="header__enter red-text js-openModal" href="#" data-modal="#modalEnter">Войти</a>
        </div>
    </div>
</header>
<div class="modal__overlay js-modalClose"></div>
<div class="modal modal-big modal-js" id="modalLocation">
    <header class="modal__header">
        <h2 class="modal__title">Выберите город
        </h2>
    </header>
    <div class="modal__body">
        <form class="modal__form-location" id="location"><input class="modal__city-search" type="search" name="city-search" placeholder="Введите город"/>
        </form>
        <div class="city-choise">
            <ul class="city-choise__list">
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Донецк</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Москва</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Магадан</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Курск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Воронеж</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Волгоград</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Санкт-Петербург</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Пекин</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Чайнатаун</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Белгород</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Ростов-на-Дону</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Ставпрополь</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Сибирь</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Кострома</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Большая Лаповка</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Провинция Шаньдун</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Сеул</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Токио</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Мурманск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Луганск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Снежное</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Сибирь</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Кострома</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Большая Лаповка</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Провинция Шаньдун</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Сеул</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Токио</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Мурманск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Луганск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Снежное</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Провинция Шаньдун</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Сеул</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Токио</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Мурманск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Луганск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Снежное</a>
                </li>
            </ul>
        </div>
    </div>
    <footer class="modal__footer">
        <button class="button button_white modal__btn">Отмена</button>
        <button class="button button_red modal__btn">Выбрать</button>
    </footer>
    <button class="button_close js-modalClose">×</button>
</div>
<div class="modal modal-big modal-js" id="modalEnter">
    <div class="modal__content modal__content-two d-flex flex-wrap">
        <div class="modal__left">
            <h2 class="modal__title modal__title-small">Войти в кабинет
            </h2>
            <form class="modal__form mb0"><input class="modal__input modal__input-small" placeholder="Введите e-mail" type="email"/><input class="modal__input modal__input-small" placeholder="Введите пароль" type="password"/>
                <div class="d-flex align-items-center flex-wrap mb15 mt5">
                    <label class="checkbox mt5 mb5">
                        <input type="checkbox"/><span class="checkbox__main"><i class="fa fa-check"></i></span><span>Запомнить меня</span>
                    </label><span class="ml-auto mt5 mb5 c-gray fz12 js-openModal" data-modal="#modalPassword">Не можете войти?</span>
                </div>
                <button class="button button_red modal__btn modal__btn-small">Войти</button>
            </form>
        </div>
        <div class="modal__center"><span>или</span>
        </div>
        <div class="modal__right">
            <div class="pb20"><a class="modal__social button btn-vk" href="#"><span>Войдите через VK</span><i class="fa fa-vk"></i></a><a class="modal__social button btn-facebook" href="#"><span>Войдите через Facebook</span><i class="fa fa-facebook"></i></a><a class="modal__social button btn-twitter" href="#"><span>Войдите через Twitter</span><i class="fa fa-twitter"></i></a><a class="modal__social button btn-google-plus" href="#"><span>Войдите через Google</span><i class="fa fa-google-plus"></i></a>
            </div>
            <div class="text-center pt20 fz15"><span class="fw-light">Нет аккаунта?</span><span class="modal__link js-openModal" data-modal="#modalReg"> Зарегистрируйтесь!</span>
            </div>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<div class="modal modal-js" id="modalPassword">
    <div class="modal__content">
        <h2 class="modal__title">Восстановление доступа
        </h2>
        <form class="modal__form"><input class="modal__input" placeholder="E-mail" type="email"/>
            <button class="button button_red modal__btn js-openModal" data-modal="#modalPasswordSuccess">Отправить доступы на почту</button>
        </form>
        <div class="text-center"><span class="fw-light">или</span><span class="modal__link js-openModal" data-modal="#modalEnter"> Войти в личный кабинет</span>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<div class="modal modal-big modal-js" id="modalReg">
    <div class="modal__content modal__content-two d-flex flex-wrap">
        <div class="modal__left">
            <h2 class="modal__title modal__title-small">Регистрация
            </h2>
            <form class="modal__form mb0"><input class="modal__input modal__input-small" placeholder="Введите e-mail" type="email"/><input class="modal__input modal__input-small" placeholder="Введите логин" type="text"/><input class="modal__input modal__input-small" placeholder="Введите пароль" type="password"/>
                <div class="d-flex align-items-center flex-wrap mb15 mt5">
                    <label class="checkbox mt5 mb5">
                        <input type="checkbox"/><span class="checkbox__main"><i class="fa fa-check"></i></span><span>* Я соглашаюсь с правилами использования сервиса, а также с передачей и обработкой моих данных в RUB-ON. Я подтверждаю своё совершеннолетие и ответственность за размещение объявления</span>
                    </label>
                </div>
                <button class="button button_red modal__btn modal__btn-small">Зарегистрироваться</button>
            </form>
        </div>
        <div class="modal__center"><span>или</span>
        </div>
        <div class="modal__right">
            <div class="pb20"><a class="modal__social button btn-vk" href="#"><span>Регистрация через VK</span><i class="fa fa-vk"></i></a><a class="modal__social button btn-facebook" href="#"><span>Регистрация через Facebook</span><i class="fa fa-facebook"></i></a><a class="modal__social button btn-twitter" href="#"><span>Регистрация через Twitter</span><i class="fa fa-twitter"></i></a><a class="modal__social button btn-google-plus" href="#"><span>Регистрация через Google</span><i class="fa fa-google-plus"></i></a>
            </div>
            <div class="text-center pt20 fz15"><span class="fw-light">Уже зарегистрированы?</span><span class="modal__link js-openModal" data-modal="#modalEnter"> Авторизуйтесь!</span>
            </div>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<div class="modal modal-js" id="modalPasswordSuccess">
    <div class="modal__content">
        <h2 class="modal__title">Благодарим
        </h2>
        <div class="check-pulse"><i class="fa fa-check"></i></div>
        <p class="modal__text">Ваша заявка на восстановление доступа <br>к личному кабинету успешно отправлена.
        </p>
        <div class="text-center mt30"><span class="modal__link js-openModal" data-modal="#modalEnter"> Войти в личный кабинет</span>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<nav class="nav-open">
    <div class="container d-flex">
        <div class="nav-open__main">
            <?php foreach ($category as $item):?>
            <a class="nav-open__item nav-open-js" href="#nav-open-<?= $item['id'];?>">
                <img class="nav-open__img" src="<?= $item['img']?>" alt="" role="presentation"/>
                <span><?= $item['name']; ?></span>
            </a>
            <?php endforeach; ?>
        </div>
        <?php foreach ($category as $item):?>
        <div class="nav-open__detail" id="nav-open-<?= $item['id']; ?>">
            <div class="nav-open__detail-text">
                <span class="nav-open__title"><?= $item['name']; ?></span>
                <nav class="nav-open__list">
                    <?php foreach ($item['childs'] as $value): ?>
                    <a class="nav-open__list-item" href="<?= \yii\helpers\Url::toRoute(['/obyavleniya/' . $value['slug']]); ?>"><?= $value['name']; ?></a>
                    <?php endforeach; ?>
                </nav>
            </div>
            <div class="nav-open__detail-img">
                <div class="nav-open__circle">
                </div><img src="assets/images/nav/baby-transport.png" alt=""/>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</nav>
<header class="header-mobile">
    <div class="mobile-btn-menu js-btn-menu"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
    </div><a class="logo" href="/"><img class="logo__img" src="assets/images/logo.png" width="175" height="47" alt="RUBON" title=""/></a>
    <svg class="ico_gray mobile-search-open js-search-open">
        <use xlink:href="assets/images/svg.svg#search"></use>
    </svg>
    <div class="mobile-search js-mobile-search">
        <form class="mobile-search__main"><input class="mobile-search__input" type="search" placeholder="Поиск"/>
            <label class="mobile-search__label" for="global-search_submit">
                <svg class="ico ico_gray">
                    <use xlink:href="assets/images/svg.svg#search">
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
        <li class="nav-mobile__overlay js-btn-menu">
        </li>
        <li class="nav-mobile__li js-openModal" data-modal="#modalLocation">
            <div class="choose-region">
                <svg class="ico ico ico_gray mr20">
                    <use xlink:href="assets/images/svg.svg#nav">
                    </use>
                </svg><span class="gray-text">Санкт-Петербург</span>
            </div>
        </li>
        <li class="nav-mobile__li js-openModal" data-modal="#modalEnter">
            <svg class="ico ico_gray mr20">
                <use xlink:href="assets/images/svg.svg#reg">
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
        <li class="nav-mobile__li js-menu-link" data-menulink="#main-menu"><i class="fa fa-angle-left mr20"></i><span>Назад</span>
        </li>
        <li class="nav-mobile__li js-menu-link" data-menulink="#category0"><img class="nav-mobile__svg mr20" src="assets/images/svg/car.svg" alt="" width="25" height="25" role="presentation"/><span>Транспорт</span><i class="fa fa-angle-right"></i>
        </li>
        <li><li>
            <ul class="nav-mobile__list js-nav-mobile" id="category0">
                <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne"><i class="fa fa-angle-left mr20"></i><span>Назад</span><span class="ml-auto c-main">Мода и стиль</span>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav1.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav2.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav3.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav4.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav5.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav6.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav7.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav8.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav9.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav10.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav11.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav12.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav13.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav14.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav15.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav16.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
            </ul></li>
        </li>
        <li class="nav-mobile__li js-menu-link" data-menulink="#category1"><img class="nav-mobile__svg mr20" src="assets/images/svg/chair.svg" alt="" width="25" height="25" role="presentation"/><span>Дом и сад</span><i class="fa fa-angle-right"></i>
        </li>
        <li><li>
            <ul class="nav-mobile__list js-nav-mobile" id="category1">
                <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne"><i class="fa fa-angle-left mr20"></i><span>Назад</span><span class="ml-auto c-main">Мода и стиль</span>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav1.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav2.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav3.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav4.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav5.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav6.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav7.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav8.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav9.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav10.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav11.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav12.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav13.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav14.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav15.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav16.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
            </ul></li>
        </li>
        <li class="nav-mobile__li js-menu-link" data-menulink="#category2"><img class="nav-mobile__svg mr20" src="assets/images/svg/key.svg" alt="" width="25" height="25" role="presentation"/><span>Недвижимость</span><i class="fa fa-angle-right"></i>
        </li>
        <li><li>
            <ul class="nav-mobile__list js-nav-mobile" id="category2">
                <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne"><i class="fa fa-angle-left mr20"></i><span>Назад</span><span class="ml-auto c-main">Мода и стиль</span>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav1.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav2.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav3.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav4.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav5.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav6.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav7.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav8.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav9.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav10.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav11.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav12.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav13.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav14.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav15.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav16.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
            </ul></li>
        </li>
        <li class="nav-mobile__li js-menu-link" data-menulink="#category3"><img class="nav-mobile__svg mr20" src="assets/images/svg/necktie.svg" alt="" width="25" height="25" role="presentation"/><span>Мода и стиль</span><i class="fa fa-angle-right"></i>
        </li>
        <li><li>
            <ul class="nav-mobile__list js-nav-mobile" id="category3">
                <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne"><i class="fa fa-angle-left mr20"></i><span>Назад</span><span class="ml-auto c-main">Мода и стиль</span>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav1.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav2.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav3.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav4.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav5.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav6.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav7.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav8.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav9.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav10.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav11.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav12.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav13.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav14.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav15.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav16.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
            </ul></li>
        </li>
        <li class="nav-mobile__li js-menu-link" data-menulink="#category4"><img class="nav-mobile__svg mr20" src="assets/images/svg/devices.svg" alt="" width="25" height="25" role="presentation"/><span>Электроника</span><i class="fa fa-angle-right"></i>
        </li>
        <li><li>
            <ul class="nav-mobile__list js-nav-mobile" id="category4">
                <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne"><i class="fa fa-angle-left mr20"></i><span>Назад</span><span class="ml-auto c-main">Мода и стиль</span>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav1.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav2.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav3.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav4.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav5.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav6.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav7.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav8.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav9.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav10.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav11.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav12.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav13.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav14.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav15.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav16.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
            </ul></li>
        </li>
        <li class="nav-mobile__li js-menu-link" data-menulink="#category5"><img class="nav-mobile__svg mr20" src="assets/images/svg/ball.svg" alt="" width="25" height="25" role="presentation"/><span>Хобби, отдых и спорт</span><i class="fa fa-angle-right"></i>
        </li>
        <li><li>
            <ul class="nav-mobile__list js-nav-mobile" id="category5">
                <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne"><i class="fa fa-angle-left mr20"></i><span>Назад</span><span class="ml-auto c-main">Мода и стиль</span>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav1.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav2.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav3.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav4.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav5.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav6.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav7.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav8.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav9.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav10.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav11.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav12.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav13.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav14.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav15.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav16.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
            </ul></li>
        </li>
        <li class="nav-mobile__li js-menu-link" data-menulink="#category6"><img class="nav-mobile__svg mr20" src="assets/images/svg/business.svg" alt="" width="25" height="25" role="presentation"/><span>Бизнес и услуги</span><i class="fa fa-angle-right"></i>
        </li>
        <li><li>
            <ul class="nav-mobile__list js-nav-mobile" id="category6">
                <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne"><i class="fa fa-angle-left mr20"></i><span>Назад</span><span class="ml-auto c-main">Мода и стиль</span>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav1.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav2.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav3.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav4.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav5.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav6.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav7.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav8.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav9.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav10.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav11.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav12.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav13.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav14.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav15.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav16.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
            </ul></li>
        </li>
        <li class="nav-mobile__li js-menu-link" data-menulink="#category7"><img class="nav-mobile__svg mr20" src="assets/images/svg/paw.svg" alt="" width="25" height="25" role="presentation"/><span>Животные</span><i class="fa fa-angle-right"></i>
        </li>
        <li><li>
            <ul class="nav-mobile__list js-nav-mobile" id="category7">
                <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne"><i class="fa fa-angle-left mr20"></i><span>Назад</span><span class="ml-auto c-main">Мода и стиль</span>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav1.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav2.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav3.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav4.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav5.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav6.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav7.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav8.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav9.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav10.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav11.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav12.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav13.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav14.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav15.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav16.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
            </ul></li>
        </li>
        <li class="nav-mobile__li js-menu-link" data-menulink="#category8"><img class="nav-mobile__svg mr20" src="assets/images/svg/job.svg" alt="" width="25" height="25" role="presentation"/><span>Работа</span><i class="fa fa-angle-right"></i>
        </li>
        <li><li>
            <ul class="nav-mobile__list js-nav-mobile" id="category8">
                <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne"><i class="fa fa-angle-left mr20"></i><span>Назад</span><span class="ml-auto c-main">Мода и стиль</span>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav1.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav2.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav3.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav4.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav5.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav6.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav7.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav8.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav9.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav10.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav11.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav12.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav13.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav14.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav15.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav16.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
            </ul></li>
        </li>
        <li class="nav-mobile__li js-menu-link" data-menulink="#category9"><img class="nav-mobile__svg mr20" src="assets/images/svg/bear.svg" alt="" width="25" height="25" role="presentation"/><span>Детский мир</span><i class="fa fa-angle-right"></i>
        </li>
        <li><li>
            <ul class="nav-mobile__list js-nav-mobile" id="category9">
                <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne"><i class="fa fa-angle-left mr20"></i><span>Назад</span><span class="ml-auto c-main">Мода и стиль</span>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav1.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav2.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav3.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav4.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav5.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav6.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav7.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav8.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav9.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav10.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav11.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav12.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav13.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav14.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav15.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="nav-mobile__li"><a href="#">
                        <div class="nav-mobile__img"><img src="assets/images/nav/nav16.png" alt=""/>
                        </div><span><span>Аксессуары</span><span class="c-red"> (1150)</span></span><i class="fa fa-angle-right"></i></a>
                </li>
            </ul></li>
        </li>
    </ul>
</nav>
