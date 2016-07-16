<?php
use yii\helpers\Url;
?>


<section class="header__top">
    <div class="container">
        <div class="header__top_left">
            <div class="header__top_logo">
                <a href="/"><img src='/img/logo.png' alt=""></a>
            </div>
            <div class="header__top_count-ad">
                <p>На сайте <a href="">5 000 000</a> объявлений</p>
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
                    <span href="" class=" price_icon"></span>500 &#8381;
                </a>
                <div class="header__top_user">
                    <a href="<?= Url::toRoute(['/profile'])?>" class="header_user">
                        <span class="user-pic">
                            <img src='/img/user_pic.png' alt="">
                        </span>
                        <span class="user-name"><?=Yii::$app->user->identity->username; ?></span>
                    </a>
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
                <a href="" >Добавить магазин</a>
            </div>
            <div class="dobavit-home">
                <span class="icon-plus"></span>
                <a href="<?= Url::toRoute(['/adsmanager/adsmanager/create'])?>">Подать объявление</a>
            </div>
        </div>
        <div class="header__middle-home-right">
            <ul class="home-menu">
                <li><a href="<?= Url::toRoute(['/adsmanager/adsmanager/index'])?>">Объявления</a></li>
                <li><a href="">Магазины</a></li>
                <li><a href="">Спецпредложения</a></li>
                <li><a href="">Помощь</a></li>
            </ul>
        </div>
    </div>
</section>

<!-- end header__middle-home.html-->


<!--<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="header__location">
                <p>город: <span>Донецк</span></p>
            </div>

            <div class="header__check">
                <?php
/*
                if(Yii::$app->user->isGuest):
                    */?>
                    <a href="#" data-toggle="modal" data-target="#loginForm" class="header__check--enter">войти</a>
                    <a href="<?/*= Url::toRoute('/registration') */?>" class="header__check--enter">регистрация</a>
                <?php /*else: */?>
                    <a href="<?/*= Url::toRoute('/profile') */?>" class="header__check--enter">личный кабинет</a>
                    <a data-method="post" href="/user/logout" class="header__check--enter">Выйти</a>
                <?php /*endif; */?>

                <a href="#" class="header__check--help">помощь</a>
            </div>

            <!--logo menu
            <div class="header__logo">
                <div class="header__logo--img">
                    <a href="index.html"><img src="/img/logo.png" alt=""/></a>

                </div>
                <div class="header__logo--menu">
                    <ul>
                        <li><a href="#">НОВЫЕ</a></li>
                        <li><a href="#">СРОЧНО</a></li>
                        <li><a href="#">ОТДАМ ДАРОМ</a></li>
                        <li><a href="#">куда пойти??</a></li>
                    </ul>
                </div>
            </div>
            <!--close logo menu-->
            <!--small menu
            <div class="header__menu">
                <!--dropdown button
                <div class="header__menu--dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="drop-lines"></span>
                        КАТАЛОГ ПРЕДЛОЖЕНИЙ
                        <span class="drop-arrow"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Действие</a></li>
                        <li><a href="#">Другое действие</a></li>
                        <li><a href="#">Что-то иное</a></li>
                        <li><a href="#">Отдельная ссылка</a></li>
                    </ul>
                </div>
                <!--close dropdown button
                <div class="header__menu--search">
                    <form action="">
                        <span class="search__submit"></span>
                        <input class="search__text" type="text" placeholder="ПОИСК">
                    </form>
                </div>
                <div class="header__menu--add">
                    <div class="header__menu--add__shop">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="/img/store-i.png" alt="Магазин"/>
                            ДОБАВИТЬ <br>
                            МАГАЗИН</a>
                    </div>
                    <div class="header__menu--add__adv">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="/img/adv-i.png" alt="объявления"/>
                            ПОДАТЬ <br>
                            ОЪЯВЛЕНИЕ</a>
                    </div>
                </div>
            </div>
            <!--close small menu-->
            <!--big menu
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="#">
                                    <img src="/img/services-m.png" alt="услуги">
                                    <span>услуги</span></a>
                            </li>
                            <li><a href="#">
                                    <img src="/img/cars-m.png" alt="авто">
                                    <span>авто</span></a>
                            </li>
                            <li><a href="#">
                                    <img src="/img/realty-m.png" alt="недвижимость">
                                    <span>недвижимость</span></a>
                            </li>
                            <li><a href="#">
                                    <img src="/img/job-m.png" alt="работа">
                                    <span>работа</span></a>
                            </li>
                            <li><a href="#">
                                    <img src="/img/togo-m.png" alt="куда пойти">
                                    <span>куда пойти</span></a>
                            </li>
                            <li><a href="#">
                                    <img src="/img/shops-m.png" alt="магазины">
                                    <span>магазины</span></a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.navbar-collapse -
                </div>
                <!-- /.container-fluid --
            </nav>
            <!--close big menu--
        </div>
    </div>
</header>-->
