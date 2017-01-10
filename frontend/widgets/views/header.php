<?php
/**
 * @var $count
 */
use yii\helpers\Url;
?>
<section class="header__top">
    <div class="container">
        <div class="header__top_left">
            <h1>
                <a href="/" class="header__top_logo" title="На главную Rubon - бесплатные объявления">
                    На главную RUBON - бесплатные объявления
                </a>
            </h1>
            <div class="append-button">
                <a href="<?= Url::toRoute(['/adsmanager/adsmanager/create'])?>"><span class="plus-icon">+</span>Подать объявление</a>
                <a href="<?= Url::toRoute(['/organizations/default/add'])?>"><span class="plus-icon">+</span>добавить организацию</a>
            </div>
        </div>
        <?php if(Yii::$app->user->isGuest): ?>
            <div class="header__top_user-vhod">
                <a  href="<?= Url::toRoute('/registration') ?>" class="header__regist">Регистрация  </a>
                <a href="<?= Url::toRoute('/login') ?>"  class="header__login">
                    Вход
                    <span class="login-icon"></span>
                </a>
            </div>
        <?php else: ?>
            <div class="header__top_right">
                <div class="header__top_right-buttons">
                    <a href="<?= Url::to(['/personal_area/favorites/ads_favorites'])?>" class="header__top_favorites">
                        <span class="header_top_icon favorites_icon"></span>Избранное
                    </a>
                    <a class="header__top_advert" href="<?= Url::to(['/personal_area/ads/ads_user_active'])?>">
                        <span class="header_top_icon advert_icon"></span> Мои объявления
                    </a>
                    <a class="header__top_msg" href="<?= Url::to(['/personal_area/msg/messages'])?>">
                        <span  class="header_top_icon header-msg_icon"><span class="circle">5</span></span> Мои сообщения
                    </a>
                </div>
                <div class="header__top_user">
                    <a href="#" class="user-pic">
                        <img src="<?= \common\classes\UserFunction::getUser_avatar_url();?>" alt="">
                    </a>
                     <span class="user-name"> <a class="user-name-link" href="#" ><?= \common\classes\UserFunction::getUserName() ?></a>
                     </span>
                </div>
                <div class="header__top_user-list">
                    <a href="<?= Url::toRoute(['/personal_area/ads/ads_user_active']); ?>">Личный кабинет</a>
                    <span class="header__top_user-list-line"></span>
                    <a href="<?= Url::toRoute(['/personal_area/ads/ads_user_active']); ?>">Объявления</a>
                    <a href="<?= Url::to(['/personal_area/favorites/ads_favorites']); ?>">Избранные</a>
                    <a href="">Мои магазины</a>
                    <a href="<?= Url::to(['/personal_area/msg/messages']) ?>">Сообщения</a>
                    <a href="">Счет</a>
                    <a href="<?= \yii\helpers\Url::to(['/user/settings/profile'])?>">Настройки</a>
                    <span class="header__top_user-list-line"></span>
                    <a data-method="post" href="<?= Url::to(['/user/security/logout'])?>">Выйти</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<section class="header__middle-home">
    <div class="container">
        <div class="header__middle-home-left">
            <span>На сайте <a href="<?= Url::to(['/all-ads'])?>"><?= $count; ?></a> объявлений, <a href="#">265</a> организаций</span>
        </div>
        <div class="header__middle-home-right">
            <ul class="home-menu">
                <li><a href="<?= Url::toRoute(['/adsmanager/adsmanager/index'])?>">Объявления</a></li>
                <li><a href="">Организации</a></li>
                <li><a href="">Спецпредложения</a></li>
                <li><a href="<?= Url::to(['/help']) ?>">Помощь</a></li>
            </ul>
        </div>
    </div>
</section>