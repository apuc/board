<?php
/**
 * @var $count
 */

use yii\helpers\Url;



?>


<section class="header__top">
    <div class="container">
        <div class="header__top_left">
            <div class="header__top_logo">
                <a href="/"><img src='/img/logo.png' alt=""></a>
            </div>
            <div class="header__top_count-ad">
                <p>На сайте <a href="<?= Url::toRoute(['/adsmanager/adsmanager/index'])?>"><?= $count; ?></a> объявлений</p>
            </div>
        </div>
        <?php if(Yii::$app->user->isGuest): ?>
            <div class="header__top_user-vhod">
                <a  href="<?= Url::toRoute('/registration') ?>" class="header__regist">
                    <span class="header_top_icon regist-user"></span> Регистрация
                </a>
                <a href="<?= Url::toRoute('/login') ?>"  class="header__login">
                    <span class="header_top_icon login-header"></span>Вход
                </a>
            </div>
        <?php else: ?>
            <div class="header__top_right">
                <a href="#" class="header__top_favorites">
                    <span href="" class="header_top_icon favorites_icon favorites_icon_press"><span class="circle">5</span></span>Избранное
                </a>
                <a class="header__top_advert">
                    <span href="" class="header_top_icon advert_icon advert_icon_press"><span class="circle">5</span></span> Мои объявления
                </a>
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

                <div class="header__top_user">

                    <a href="" class="user-pic">
                        <img src="<?= \common\classes\UserFunction::getUser_avatar_url();?>" alt="">
                    </a>
                    <span class="user-name">
                        <a class="user-name-link" href="" ><?=Yii::$app->user->identity->username; ?></a>
                    </span>
                    <!--<span class="private-cabinet">
                        <a href=""><span class="header_top_icon msg-icon"></span>сообщения</a>
                        <a data-method="post" href="<?/*= Url::to(['/site/logout']); */?>"><span class="header_top_icon exit-icon"></span>выход</a>
                    </span>-->
                </div>
                <div class="header__top_user-list">
                    <a href="<?= Url::toRoute(['/personal_area/ads/ads_user_active']); ?>">Личный кабинет</a>
                    <span class="header__top_user-list-line"></span>
                    <a href="<?= Url::toRoute(['/personal_area/ads/ads_user_active']); ?>">Мои объявления</a>
                    <a href="<?= Url::to(['/personal_area/favorites/ads_favorites']); ?>">Избранные</a>
                    <a href="">Мои магазины</a>
                    <a href="<?= Url::to(['/personal_area/msg/messages']) ?>">Сообщения</a>
                    <a href="">Счет</a>
                    <a href="">Настройки</a>
                    <span class="header__top_user-list-line"></span>
                    <a data-method="post" href="<?= Url::to(['/user/security/logout'])?>">Выйти</a>
                </div>

            </div>
        <?php endif; ?>
    </div>
</section>

<!-- end header.html-->
<!-- start header__middle-home.html-->
<section class="header__middle-home">
    <div class="container">
        <div class="header__middle-home-left">
            <div class="dobavit-home">
                <span class="icon-plus"></span>
                <a href="" >Добавить организацию</a>
            </div>
            <div class="dobavit-home">
                <span class="icon-plus"></span>
                <a href="<?= Url::toRoute(['/adsmanager/adsmanager/create'])?>">Подать объявление</a>
            </div>
        </div>
        <div class="header__middle-home-right">
            <ul class="home-menu">
                <li><a href="<?= Url::toRoute(['/adsmanager/adsmanager/index'])?>">Объявления</a></li>
                <li><a href="">Организации</a></li>
                <li><a href="">Спецпредложения</a></li>
                <li><a href="">Помощь</a></li>
            </ul>
        </div>
    </div>
</section>


