<?php
/**
 * @var $countAds \common\models\db\Ads
 * @var $countMsg \common\models\db\Msg
 */
use yii\helpers\Url;

?>
<section class="header__top">
    <div class="container">
        <div class="header__top_left">

            <button class="mob-append-btn">+</button>
            <div class="mob-append-menu">
                <h3>Начните продавать!</h3>
                <a href="<?= Url::toRoute(['/adsmanager/adsmanager/create']) ?>"><span class="plus-icon">+</span>Подать объявление</a>
                <a href="<?= Url::toRoute(['/organizations/default/add']) ?>"><span class="plus-icon">+</span>добавить организацию</a>
            </div>

            <?php
            $flag = 0;
            if (!Yii::$app->user->isGuest): ?>
                <?php $flag = 1;?>
            <?php endif; ?>
                <button class="mob-menu-btn">
                    <span></span>
                </button>
                <div class="mob-menu-list">
                    <?php if($flag == 1 ): ?>
                        <div class="mob-menu-section">
                            <a href="<?= Url::to(['/personal_area/favorites/ads_favorites']); ?>" class="mob-menu-item">Избранное</a>
                            <a href="<?= Url::toRoute(['/personal_area/ads/ads_user_active']); ?>" class="mob-menu-item">Мои объявления</a>
                            <a href="<?= Url::to(['/message/default']) ?>" class="mob-menu-item">Мои сообщения</a>
                        </div>
                    <?php endif; ?>
                    <div class="mob-menu-section">
                        <a href="<?= Url::toRoute(['/adsmanager/adsmanager/index']) ?>" class="mob-menu-item">Объявления</a>
                        <a href="<?= Url::toRoute(['/organizations/default/all']) ?>" class="mob-menu-item">Организации</a>
                        <a href="<?= Url::to(['/help']) ?>" class="mob-menu-item">Помощь</a>
                    </div>
                    <?php if($flag == 1 ): ?>
                        <div class="mob-menu-section">
                            <a data-method="post" class="mob-menu-item" href="<?= Url::to(['/user/security/logout']) ?>">Выйти</a>
                        </div>
                    <?php endif; ?>
                </div>

            <h1>
                <?php if (Yii::$app->controller->module->id == 'mainpage'): ?>
                <span class="header__top_logo" title="На главную Rubon - бесплатные объявления">
                        RUBON - бесплатные объявления
                    </span>
                <?php else: ?>
                <a href="/" class="header__top_logo" title="На главную Rubon - бесплатные объявления">
                    На главную RUBON - бесплатные объявления
                </a>
                <?php endif; ?>

            </h1>

            <div class="append-button">
                <a href="<?= Url::toRoute(['/adsmanager/adsmanager/create']) ?>"><span class="plus-icon">+</span>Подать объявление</a>
                <a href="<?= Url::toRoute(['/organizations/default/add']) ?>"><span class="plus-icon">+</span>добавить организацию</a>
            </div>
        </div>
        <?php if (Yii::$app->user->isGuest): ?>
            <div class="header__top_user-vhod">
                <a href="<?= Url::toRoute('/registration') ?>" class="header__regist">Регистрация </a>
                <a href="<?= Url::toRoute('/login') ?>" class="header__login">
                    Вход
                    <span class="login-icon"></span>
                </a>
            </div>
        <?php else: ?>
            <div class="header__top_right">
            <div class="header__top_right-buttons">
                <a href="<?= Url::to(['/personal_area/favorites/ads_favorites']);?>" class="header__top_favorites">
                    <span class="header_top_icon favorites_icon "></span>
                    <span class="header-tooltip">Избранное</span>
                </a>
                <a href="<?= Url::to(['/personal_area/ads/ads_user_active']); ?>" class="header__top_advert">
                    <span class="header_top_icon advert_icon "></span>
                    <span class="header-tooltip">Мои объявления</span>
                </a>
                <a href="<?= Url::to(['/message/default']); ?>" class="header__top_msg">
                    <span class="header_top_icon header-msg_icon">
                        <?php if ($countMsg > 0): ?>
                        <span class="circle">
                            <?= $countMsg > 9 ? '9+' : $countMsg ?>
                        </span>
                        <?php endif; ?>

                    </span>
                    <span class="header-tooltip">Мои сообщения</span>
                </a>
            </div>
            <!--<a class="header__top_price">
                <span href="" class=" price_icon"></span>500
                <img src="/img/icons/ruble.png" style="height: 22px; width: 22px; object-fit: cover" alt="">
            </a>-->
            <div class="header__top_user mob-menu-btn">

                <a href="#" class="user-pic">
                    <img src="<?= \common\classes\UserFunction::getUser_avatar_url(); ?>" alt="">
                </a>
                <span class="user-name">
                    <a class="user-name-link" href="#" >
                        <?= \common\classes\UserFunction::getUserName() ?>
                    </a>
                </span>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>

<section class="header__middle-home">
    <div class="container">
        <div class="header__middle-home-left">
            <span>На сайте <a href="<?= Url::to(['/obyavleniya']) ?>"><?= $countAds; ?></a> объявлений, <a
                        href="<?= Url::toRoute(['/organizations/default/all']) ?>"><?= $countOrg ?></a> организаций</span>
        </div>
        <div class="header__middle-home-right">
            <ul class="home-menu">
                <li><a href="<?= Url::toRoute(['/adsmanager/adsmanager/index']) ?>">Объявления</a></li>
                <li><a href="<?= Url::toRoute(['/organizations/default/all']) ?>">Организации</a></li>
                <!--<li>
                    <span class="soon">
                        <img src="/img/soon-popup.png" alt="">
                    </span>
                    <a href="#">Спецпредложения</a>
                </li>-->
                <li><a href="<?= Url::to(['/help']) ?>">Помощь</a></li>
            </ul>
        </div>
    </div>
</section>