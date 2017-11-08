<?php
/**
 * @var $countAds \common\models\db\Ads
 * @var $countMsg \common\models\db\Msg
 */
use yii\helpers\Url;

//\common\classes\Debug::prn(Yii::$app->controller->module->id)

?>
<!--<section class="header__top">
    <div class="container">
        <div class="header__top_left">
            <h1>
                <?php /*if (Yii::$app->controller->module->id == 'mainpage'): */?>
                    <span class="header__top_logo" title="На главную Rubon - бесплатные объявления">
                        RUBON - бесплатные объявления
                    </span>
                <?php /*else: */?>
                    <a href="/" class="header__top_logo" title="На главную Rubon - бесплатные объявления">
                        На главную RUBON - бесплатные объявления
                    </a>
                <?php /*endif; */?>

            </h1>
            <div class="append-button">
                <a href="<?/*= Url::toRoute(['/adsmanager/adsmanager/create']) */?>"><span class="plus-icon">+</span>Подать
                    объявление</a>
                <a href="<?/*= Url::toRoute(['/organizations/default/add']) */?>"><span class="plus-icon">+</span>добавить
                    организацию</a>
            </div>
        </div>
        <?php /*if (Yii::$app->user->isGuest): */?>
            <div class="header__top_user-vhod">
                <a href="<?/*= Url::toRoute('/registration') */?>" class="header__regist">Регистрация </a>
                <a href="<?/*= Url::toRoute('/login') */?>" class="header__login">
                    Вход
                    <span class="login-icon"></span>
                </a>
            </div>
        <?php /*else: */?>
            <div class="header__top_right">
                <div class="header__top_right-buttons">
                    <a href="<?/*= Url::to(['/personal_area/favorites/ads_favorites']) */?>" class="header__top_favorites">
                        <span class="header_top_icon favorites_icon"></span>Избранное
                    </a>
                    <a class="header__top_advert" href="<?/*= Url::to(['/personal_area/ads/ads_user_active']) */?>">
                        <span class="header_top_icon advert_icon"></span> Мои объявления
                    </a>
                    <a class="header__top_msg" href="<?/*= Url::to(['/message/default']) */?>">
                        <span class="header_top_icon header-msg_icon">
                            <?php /*if ($countMsg > 0): */?>
                                <span class="circle">
                                    <?/*= $countMsg > 9 ? '9+' : $countMsg */?>
                                </span>
                            <?php /*endif; */?>
                        </span> Мои сообщения
                    </a>
                </div>
                <div class="header__top_user">
                    <a href="#" class="user-pic">
                        <img src="<?/*= \common\classes\UserFunction::getUser_avatar_url(); */?>" alt="">
                    </a>
                    <span class="user-name"> <a class="user-name-link"
                                                href="#"><?/*= \common\classes\UserFunction::getUserName() */?></a>
                     </span>
                </div>
                <div class="header__top_user-list">
                    <a href="<?/*= Url::toRoute(['/personal_area/ads/ads_user_active']); */?>">Личный кабинет</a>
                    <span class="header__top_user-list-line"></span>
                    <a href="<?/*= Url::toRoute(['/personal_area/ads/ads_user_active']); */?>">Объявления</a>
                    <a href="<?/*= Url::to(['/personal_area/favorites/ads_favorites']); */?>">Избранные</a>
                    <a href="">Мои магазины</a>
                    <a href="<?/*= Url::to(['/message/default']) */?>">Сообщения</a>
                    <a href="">Счет</a>
                    <a href="<?/*= \yii\helpers\Url::to(['/user/settings/profile']) */?>">Настройки</a>
                    <span class="header__top_user-list-line"></span>
                    <a data-method="post" href="<?/*= Url::to(['/user/security/logout']) */?>">Выйти</a>
                </div>
            </div>
        <?php /*endif; */?>
    </div>
</section>-->

<section class="header__top">
    <div class="container">
        <div class="header__top_left">

            <button class="mob-append-btn">+</button>
            <div class="mob-append-menu">
                <h3>Начните продавать!</h3>
                <a href="<?= Url::toRoute(['/adsmanager/adsmanager/create']) ?>"><span class="plus-icon">+</span>Подать объявление</a>
                <a href="<?= Url::toRoute(['/organizations/default/add']) ?>"><span class="plus-icon">+</span>добавить организацию</a>
            </div>
            <?php if (!Yii::$app->user->isGuest): ?>
                <button class="mob-menu-btn">
                    <span></span>
                </button>
                <div class="mob-menu-list">
                    <div class="mob-menu-section">
                        <a href="" class="mob-menu-item">Избранное</a>
                        <a href="" class="mob-menu-item">Мои объявления</a>
                        <a href="" class="mob-menu-item">Мои сообщения</a>
                    </div>
                    <div class="mob-menu-section">
                        <a href="" class="mob-menu-item">Объявления</a>
                        <a href="" class="mob-menu-item">Организации</a>
                        <a href="" class="mob-menu-item">Помощь</a>
                    </div>
                    <div class="mob-menu-section">
                        <a href="" class="mob-menu-item">Новости</a>
                        <a href="" class="mob-menu-item">Реклама на сайте</a>
                        <a href="" class="mob-menu-item">Как продавать и покупать?</a>
                        <a href="" class="mob-menu-item">Правила безопастности</a>
                        <a href="" class="mob-menu-item">Карта сайта</a>
                        <a href="" class="mob-menu-item">Карта регионов</a>
                        <a href="" class="mob-menu-item">Популярные запросы</a>
                    </div>
                </div>
            <?php endif; ?>
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
                        <span class="circle">9+</span>

                        <?php if ($countMsg > 0): ?>
                        <span class="circle">
                            <?= $countMsg > 9 ? '9+' : $countMsg ?>
                        </span>
                        <?php endif; ?>

                    </span>
                    <span class="header-tooltip">Мои сообщения</span>
                </a>
            </div>
            <a class="header__top_price">
                <span href="" class=" price_icon"></span>500
                <span class="rubl-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 64.002 64.002">
                <path d="M54.628,9.375c-6.044-6.045-14.08-9.374-22.627-9.374c-8.548,0-16.583,3.329-22.627,9.374C3.329,15.419,0,23.454,0,32.001
                s3.329,16.582,9.374,22.626c6.044,6.045,14.079,9.374,22.627,9.374c8.547,0,16.583-3.329,22.627-9.374
                c6.045-6.044,9.374-14.079,9.374-22.626S60.673,15.419,54.628,9.375z M53.214,53.213c-5.666,5.667-13.2,8.788-21.213,8.788
                c-8.014,0-15.547-3.121-21.213-8.788C5.121,47.547,2,40.014,2,32.001s3.121-15.546,8.788-21.212
                c5.666-5.667,13.199-8.788,21.213-8.788c8.013,0,15.547,3.121,21.213,8.788c5.667,5.666,8.788,13.199,8.788,21.212
                S58.881,47.547,53.214,53.213z"/>
                <path d="M31.001,16.001h-6h-1H23v18h-4v2L23,36v4.001h-4v2h4v6h2v-6h7v-2h-7v-4.002l5.909-0.002
                c0.054,0.005,0.392,0.033,0.923,0.033c1.749,0,5.594-0.308,8.304-2.784c1.9-1.735,2.864-4.173,2.864-7.245s-0.964-5.51-2.864-7.245
                C36.603,15.527,31.14,15.983,31.001,16.001z M38.796,31.763c-2.875,2.633-7.655,2.248-7.795,2.238H25V18l6.091-0.003
                c0.047-0.005,4.806-0.403,7.696,2.235c1.469,1.341,2.213,3.283,2.213,5.769C41.001,28.483,40.259,30.422,38.796,31.763z"/>
                </svg>
              </span>
            </a>
            <div class="header__top_user mob-menu-btn">

                <a href="#" class="user-pic">
                    <img src="img/user_pic.png" alt="">
                </a>
                <span class="user-name"> <a class="user-name-link" href="#" >Alex Wayn</a>
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