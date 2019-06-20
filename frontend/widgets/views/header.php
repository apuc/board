<?php
/**
 * Created by PhpStorm.
 * User: KING
 * Date: 12.02.2019
 * Time: 23:52
 */

use frontend\widgets\Connect;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\authclient\widgets\AuthChoice;

$currentCity = \common\classes\GeoFunction::getCurrentCity(true);
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
        <form class="global-search" action="/search">
            <input class="global-search__input" id="global-search" type="search" name="textFilter" placeholder="Поиск..." value="<?= Yii::$app->request->get('textFilter') ?>"/>
            <input class="global-search__submit" id="global-search_submit" type="submit"/>
            <label class="global-search__label" for="global-search_submit">
                <svg class="ico ico_gray ico_small">
                    <use xlink:href="/theme/images/svg.svg#search"></use>
                </svg>
            </label>
        </form>
        <button class="choose-region js-openModal" type="button" data-modal="#modalLocation">
            <svg class="choose-region__icon ico ico_gray">
                <use xlink:href="/theme/images/svg.svg#nav"></use>
            </svg>
            <span class="gray-text"><?=$currentCity?></span>
        </button>
        <a href="<?= (!Yii::$app->user->isGuest) ? \yii\helpers\Url::toRoute(['/cabinet/ad/add']) : '#' ?>"
           class="button button_red mr10 header__btn--first <?= (!Yii::$app->user->isGuest) ?: 'js-openModal'?>"
            <?= (!Yii::$app->user->isGuest) ?: 'data-modal="#modalEnter"'?> >
            Создать, разместить объявление
        </a>
        <!--<a href="<?/*= \yii\helpers\Url::toRoute(['/organizations/default/add']) */?>" class="button button_blue mr20">Создать организацию</a>-->
        <?php if(Yii::$app->user->isGuest): ?>
            <div class="header__profile">
                <a class="header__registration">
                    <svg class="ico ico_gray mr10">
                        <use xlink:href="/theme/images/svg.svg#reg">
                        </use>
                    </svg>
                    <span class="gray-text js-openModal" data-modal="#modalReg">Регистрация</span>
                </a>
                <a class="header__enter red-text js-openModal" href="#" data-modal="#modalEnter">Войти</a>
            </div>
        <?php else: ?>
            <div class="header__cabinet jsBlockDropdown">
                <span class="header__cabinet__name jsOpenDropdown">
                    <?=Yii::$app->user->identity->username?>
                    <img src="/theme/images/svg/small-arrow.svg" alt="" role="presentation"/>
                </span>
                <div class="header__cabinet__dropdown jsShowDropdown">
                    <a href="<?=Url::to(['/cabinet/ads/active'])?>"><img src="/theme/images/svg/user.svg" alt="" role="presentation"/>Личный кабинет</a>
                    <a href="<?=Url::to(['/cabinet/ads'])?>"><img src="/theme/images/svg/obyavleniya.svg" alt="" role="presentation"/>Мои обьявления</a>
                    <a href="<?=Url::to(['/cabinet/favourites'])?>"><img src="/theme/images/svg/favourites.svg" alt="" role="presentation"/>Избранные</a>
                    <a href="<?=Url::to(['/cabinet/profile'])?>"><img src="/theme/images/svg/profile.svg" alt="" role="presentation"/>Профиль</a>
                    <a href="<?=Url::to(['/cabinet/account'])?>"><img src="/theme/images/svg/account.svg" alt="" role="presentation"/>Аккаунт</a>
                    <a href="<?=Url::to(['/cabinet/networks'])?>"><img src="/theme/images/svg/social.svg" alt="" role="presentation"/>Соцсети</a>
                    <a data-method="post" href="<?=Url::to(['/user/security/logout'])?>"><img src="/theme/images/svg/logout.svg" alt="" role="presentation"/>Выйти</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</header>
<div class="modal__overlay js-modalClose"></div>
<div class="modal modal-big modal-js" id="modalLocation">
    <header class="modal__header">
        <h2 class="modal__title">Выберите город</h2>
    </header>
    <div class="modal__body">
        <form class="modal__form-location" id="location">
            <input class="modal__city-search" id="citySearch" type="search" name="city-search" placeholder="Введите город"/>
        </form>
        <div class="city-choise">
            <ul class="city-choise__list" id="cityList">
                <?php foreach ($city as $item): ?>
                <li class="city-choise__li">
                    <a class="header-nav__link header-nav__dropdown-link" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'cityFilter' => $item->id])?>"><?= $item->name;?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<?php if(!empty($modelLogin)): ?>
<div class="modal modal-big modal-js" id="modalEnter">
    <div class="modal__content modal__content-two d-flex flex-wrap">
        <div class="modal__left">
            <h2 class="modal__title modal__title-small">Войти в кабинет</h2>
            <?php $form = ActiveForm::begin([
                'action' => \yii\helpers\Url::to(['/login']),
                'id'                     => 'login-form',
                'options'                => ['class' => 'modal__form mb0'],
                'enableAjaxValidation'   => true,
                'enableClientValidation' => true,
                'validateOnBlur'         => false,
                'validateOnType'         => false,
                'validateOnChange'       => false,
                'fieldConfig' => [
                    'template' => '{error}{input}',
                    'inputOptions' => ['class' => 'modal__input modal__input-small'],
                    'errorOptions' => ['class' => 'error'],
                ],'errorCssClass' => 'my-error'
            ]) ?>

            <?= $form->field($modelLogin, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'tabindex' => '1']])->textInput( ['placeholder' => 'Введите email или login']) ?>

            <?= $form->field($modelLogin, 'password', ['inputOptions' => ['tabindex' => '2']])->passwordInput(['placeholder' => 'Введите пароль'])?>



            <div class="d-flex align-items-center flex-wrap mb15 mt5">
                <?= $form->field($modelLogin, 'rememberMe', ['inputOptions' => ['tabindex' => '3']])->checkbox([
                    'label' => 'Запомни меня',
                    'labelOptions' => ['class' => 'mt5 mb5 c-gray fz12'],
                ]); ?>
                <span class="ml-auto mt5 mb5 c-gray fz12 js-openModal" data-modal="#modalPassword">
                    Не можете войти?
                </span>
            </div>

            <div class="row-knopka">
                <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'button button_red modal__btn modal__btn-small', 'tabindex' => '3']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
        <div class="modal__center"><span>или</span>
        </div>
        <div class="modal__right">
            <div class="pb20">

                <?php $authAuthChoice = AuthChoice::begin(['baseAuthUrl' => ['/user/security/auth'], 'autoRender' => false]); ?>
                <?php foreach ($authAuthChoice->getClients() as $client):
                    $title  = '';
                    $class  = '';
                    $icon = '';
                    switch ($client->getName()){
                        case 'vkontakte':$title = 'Войдите через VK'; $class='btn-vk'; $icon = 'fa-vk'; break;
                        case 'facebook':$title = 'Войдите через Facebook'; $class='btn-facebook'; $icon = 'fa-facebook'; break;
                        case 'twitter':$title = 'Войдите через Twitter'; $class='btn-twitter'; $icon = 'fa-twitter'; break;
                        case 'google':$title = 'Войдите через Google'; $class='btn-google-plus'; $icon = 'fa-google-plus'; break;
                    }
                    ?>
                    <?= Html::a( "<span>$title</span><i class='fa $icon'></i>", ['/user/security/auth', 'authclient'=> $client->name, ],
                            ['class' => "modal__social button $class"]) ?>
                <?php endforeach; ?>

                <?php AuthChoice::end(); ?>
            </div>
            <div class="text-center pt20 fz15">
                <span class="fw-light">Нет аккаунта?</span>
                <span class="modal__link js-openModal" data-modal="#modalReg">
                    Зарегистрируйтесь!
                </span>
            </div>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<?php endif;?>
<?php /** @var \frontend\models\user\RecoveryForm $modelForgot */
if(!empty($modelForgot)): ?>
<div class="modal modal-js" id="modalPassword">
    <div class="modal__content">
        <h2 class="modal__title">Восстановление доступа</h2>
        <?php
        $modelForgot->setScenario(\frontend\models\user\RecoveryForm::SCENARIO_REQUEST);
        $form = ActiveForm::begin([
            'action' => Url::to(['/forgot']),
            'id'                     => 'password-recovery-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'options'                => ['class' => 'modal__form'],
            'fieldConfig' => [
                'template' => '<div class="error">{error}</div>{input}',
                'inputOptions' => ['class' => 'input-reg'],
            ],
        ]); ?>

        <?= $form->field($modelForgot, 'email')
            ->textInput(['autofocus' => true, 'placeholder' => 'Введите ваш email-адрес', 'class' => 'modal__input'])->label(false) ?>

        <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'button button_red modal__btn']) ?><br>

        <?php ActiveForm::end(); ?>

        <div class="text-center">
            <span class="fw-light">или</span>
            <span class="modal__link js-openModal" data-modal="#modalEnter"> Войти в личный кабинет</span>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<?php endif;?>
<?php if(!empty($modelRegistration)):?>
<div class="modal modal-big modal-js" id="modalReg">
    <div class="modal__content modal__content-two d-flex flex-wrap">
        <div class="modal__left">
            <h2 class="modal__title modal__title-small">Регистрация</h2>
            <?php $form = ActiveForm::begin([
                'action' => Url::to(['/registration']),
                'id'                     => 'registration-form',
                'options'                => ['class' => 'modal__form mb0'],
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'fieldConfig' => [
                    'template' => '{error}{input}{hint}',
                    'inputOptions' => ['class' => 'modal__input modal__input-small'],
                    'errorOptions' => ['class' => 'error'],
                ],
//                'errorCssClass' => 'my-error'
            ]); ?>

            <?= $form->field($modelRegistration, 'email')->textInput(['placeholder' => 'Введите ваш email-адрес']) ?>

            <?= $form->field($modelRegistration, 'username')->textInput(['placeholder' => 'Введите ваш Login']) ?>

            <?= $form->field($modelRegistration, 'password')->passwordInput(['placeholder' => 'Введите ваш пароль']) ?>
            <div class="d-flex align-items-center flex-wrap mb15 mt5">
                <label class="checkbox mt5 mb5">
                    <input type="checkbox"/><span class="checkbox__main"><i class="fa fa-check"></i></span><span>* Я соглашаюсь с правилами использования сервиса, а также с передачей и обработкой моих данных в RUB-ON. Я подтверждаю своё совершеннолетие и ответственность за размещение объявления</span>
                </label>
            </div>

            <div class="row-knopka">
                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'button button_red modal__btn modal__btn-small']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
        <div class="modal__center"><span>или</span>
        </div>
        <div class="modal__right">
            <div class="pb20">
                <?php $authAuthChoice = AuthChoice::begin(['baseAuthUrl' => ['/user/security/auth'], 'autoRender' => false]); ?>
                <?php foreach ($authAuthChoice->getClients() as $client):
                    $title  = '';
                    $class  = '';
                    $icon = '';
                    switch ($client->getName()){
                        case 'vkontakte':$title = 'Войдите через VK'; $class='btn-vk'; $icon = 'fa-vk'; break;
                        case 'facebook':$title = 'Войдите через Facebook'; $class='btn-facebook'; $icon = 'fa-facebook'; break;
                        case 'twitter':$title = 'Войдите через Twitter'; $class='btn-twitter'; $icon = 'fa-twitter'; break;
                        case 'google':$title = 'Войдите через Google'; $class='btn-google-plus'; $icon = 'fa-google-plus'; break;
                    }
                    ?>
                    <?= Html::a( "<span>$title</span><i class='fa $icon'></i>", ['/user/security/auth', 'authclient'=> $client->name, ],
                    ['class' => "modal__social button $class"]) ?>
                <?php endforeach; ?>

                <?php AuthChoice::end(); ?>
            </div>
            <div class="text-center pt20 fz15"><span class="fw-light">Уже зарегистрированы?</span><span class="modal__link js-openModal" data-modal="#modalEnter"> Авторизуйтесь!</span>
            </div>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<?php endif;?>
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
        <div class="nav-open__detail d-none" id="nav-open-<?= $item['id']; ?>">
            <div class="nav-open__detail-text">
                <span class="nav-open__title"><?= $item['name']; ?></span>
                <nav class="nav-open__list">
                    <?php foreach ($item['children'] as $value): ?>
                    <a class="nav-open__list-item" href="<?= \yii\helpers\Url::toRoute(['/obyavleniya/' . $value['slug']]); ?>"><?= $value['name']; ?></a>
                    <?php endforeach; ?>
                </nav>
            </div>
            <div class="nav-open__detail-img">
                <img src="/theme/images/categories/<?=$item['slug']?>.png" alt=""/>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</nav>
<header class="header-mobile">
    <div class="mobile-btn-menu js-btn-menu"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
    </div><a class="logo" href="/"><img class="logo__img" src="/theme/images/logo.png" width="175" height="47" alt="RUBON" title=""/></a>
    <svg class="ico_gray mobile-search-open js-search-open">
        <use xlink:href="/theme/images/svg.svg#search"></use>
    </svg>
    <div class="mobile-search js-mobile-search">
        <form class="mobile-search__main"><input class="mobile-search__input" type="search" placeholder="Поиск"/>
            <label class="mobile-search__label" for="global-search_submit">
                <svg class="ico ico_gray">
                    <use xlink:href="/theme/images/svg.svg#search">
                    </use>
                </svg>
            </label>
        </form>
        <button class="mobile-search__close js-search-close">×
        </button>
    </div>
</header>
<nav class="nav-mobile">
    <ul class="nav-mobile__list js-nav-mobile " id="main-menu">
        <li class="nav-mobile__overlay js-btn-menu">
        </li>
        <li class="nav-mobile__li js-openModal" data-modal="#modalLocation">
            <div class="choose-region">
                <svg class="ico ico ico_gray mr20">
                    <use xlink:href="/theme/images/svg.svg#nav"></use>
                </svg><span class="gray-text"><?=$currentCity?></span>
            </div>
        </li>
        <?php if(Yii::$app->user->isGuest): ?>
            <li class="nav-mobile__li js-openModal" data-modal="#modalEnter">
                <svg class="ico ico_gray mr20">
                    <use xlink:href="/theme/images/svg.svg#reg"></use>
                </svg><span class="gray-text">Войти в личный кабинет</span>
            </li>
        <?php else: ?>
            <li class="nav-mobile__li js-menu-link" data-menulink="#cabinet">
                <svg class="ico ico_gray mr20">
                    <use xlink:href="/theme/images/svg.svg#reg"></use>
                </svg>
                <span class="gray-text"><?=Yii::$app->user->identity->username?></span>
            </li>
        <?php endif;?>
        <ul class="nav-mobile__list js-nav-mobile" id="cabinet">
            <li class="nav-mobile__li js-menu-link" data-menulink="#main-menu"><i class="fa fa-angle-left mr20"></i><span>Назад</span></li>
<!--            <li class="nav-mobile__li js-menu-link">-->
<!--                <a href="--><?//=Url::to(['/cabinet/ads/active'])?><!--"><img class="nav-mobile__svg mr20" src="/theme/images/svg/user.svg" width="25" height="25" alt="" role="presentation"/>Личный кабинет</a>-->
<!--            </li>-->
            <li class="nav-mobile__li js-menu-link">
                <a href="<?=Url::to(['/cabinet/ads/active'])?>">
                    <img class="nav-mobile__svg mr20" src="/theme/images/svg/obyavleniya.svg" width="25" height="25" alt="" role="presentation"/>Мои обьявления</a>
            </li>
            <li class="nav-mobile__li js-menu-link"><a href="<?=Url::to(['/cabinet/favourites'])?>"><img class="nav-mobile__svg mr20" src="/theme/images/svg/favourites.svg" width="25" height="25" alt="" role="presentation"/>Избранные</a>
            </li>
            <li class="nav-mobile__li js-menu-link"><a href="<?=Url::to(['/cabinet/profile'])?>"><img class="nav-mobile__svg mr20" src="/theme/images/svg/profile.svg" width="25" height="25" alt="" role="presentation"/>Профиль</a>
            </li>
            <li class="nav-mobile__li js-menu-link"><a href="<?=Url::to(['/cabinet/account'])?>"><img class="nav-mobile__svg mr20" src="/theme/images/svg/account.svg" width="25" height="25" alt="" role="presentation"/>Аккаунт</a>
            </li>
            <li class="nav-mobile__li js-menu-link"><a href="<?=Url::to(['/cabinet/networks'])?>"><img class="nav-mobile__svg mr20" src="/theme/images/svg/social.svg" width="25" height="25" alt="" role="presentation"/>Соцсети</a>
            </li>
            <li class="nav-mobile__li js-menu-link"><a data-method="post" href="<?=Url::to(['/user/security/logout'])?>"><img class="nav-mobile__svg mr20" src="/theme/images/svg/logout.svg" width="25" height="25" alt="" role="presentation"/>Выйти</a>
            </li>
        </ul>
        <li class="nav-mobile__li bg-red js-menu-link" data-menulink="#categoriesOne"$>
            <div class="category-icon ico mr20"><span></span><span></span><span></span><span></span>
            </div><span class="c-white">Категории</span>
        </li>
        <li class="nav-mobile__li">
            <a href="<?= (!Yii::$app->user->isGuest) ? \yii\helpers\Url::toRoute(['/cabinet/ad/add']) : '#' ?>"
               class="<?= (!Yii::$app->user->isGuest) ?: 'js-openModal'?>"
               <?= (!Yii::$app->user->isGuest) ?: 'data-modal="#modalEnter"'?>
            >
                <div class="nav-mobile__plus ico bg-red mr20">+
                </div>
                <span class="c-red">Создать, разместить объявление</span>
            </a>
        </li>
    </ul>
    <ul class="nav-mobile__list js-nav-mobile" id="categoriesOne">
        <li class="nav-mobile__li js-menu-link" data-menulink="#main-menu">
            <i class="fa fa-angle-left mr20"></i>
            <span>Назад</span>
        </li>
        <?php foreach ($category as $cat):?>
            <li class="nav-mobile__li js-menu-link" data-menulink="#category<?=$cat['id']?>">
                <img class="nav-mobile__svg mr20" src="<?= $cat['img']; ?>" alt="" width="25" height="25" role="presentation"/>
                <span><?= $cat['name'];?></span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <ul class="nav-mobile__list js-nav-mobile" id="category<?=$cat['id']?>">
                    <li class="nav-mobile__li js-menu-link" data-menulink="#categoriesOne">
                        <i class="fa fa-angle-left mr20"></i>
                        <span>Назад</span>
                        <span class="ml-auto c-main"><?=$cat['name'];?></span>
                    </li>
                    <?php foreach ($cat['children'] as $item): ?>
                        <li class="nav-mobile__li">
                            <a href="<?= \yii\helpers\Url::toRoute(['/obyavleniya/' . $item['slug']]); ?>">
                                <div class="nav-mobile__img">
                                    <img src="<?= $item->icon; ?>" alt=""/>
                                </div>
                                <span>
                                    <span><?= $item->name; ?></span>
                                    <span class="c-red"><?=$item->countAds?></span>
                                </span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>