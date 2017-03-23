<?php
use common\classes\DataTime;
use common\classes\EndWord;

$this->registerJsFile('/js/organizations.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

echo $this->render('_menu', ['slug' => $model->slug]);

//\common\classes\Debug::prn($model);
?>

<section class="header-shop-fon">
    <?php if(!empty($model['header'])):?>
        <img src="<?= $model['header']; ?>" alt="">
    <?php else: ?>
        <img src="/img/header-shop-fon.png" alt="">
    <?php endif;?>
    <?php if(!empty($model['logo'])):?>
        <a rel="nofollow" target="_blank" href="<?= $model['site']; ?>" class="logo-organization-wrap">
            <img src="/<?= $model['logo']; ?>" alt="">
        </a>
    <?php else:?>
        <span class="logo-organization-wrap">
            <img src="/img/logo-org.png" alt="">
        </span>
    <?php endif; ?>

    <div class="container">
        <div class="about-shop">
            <h2><?= $model['title']; ?></h2>
            <p><?= $model['phone']; ?> <span><?= $model['schedule']; ?></span></p>
            <p>На сайте с <?= DataTime::dateOrg($model['dt_add']) ?></p>
        </div>
    </div>
    <!--<div class="shop-discount">
        <p>Ремонт со скидкой 15% при покупке квартиры в компании "АСКА Недвижимость"!</p>
    </div>-->
</section>

<section class="shop-content">
    <div class="container">
        <div class="shop-content__left">
            <p class="shop-content__left_about-shop">
                <?= $model->descr;?>
                <?php /*\common\classes\Debug::prn($model); */?>
            </p>
            <div class="shop-content__left_contacts">

                <div class="all-org-contact">
                    <h2>Контакты</h2>
                    <?php if($count > 0):?>
                        <span>У организации <?= $count; ?> <?= EndWord::num2word($count, ['филиал','филиала', 'филиалов'])?></span>
                        <a href="" class="show-more show-more-org" data-id="<?= $model->id?>" data-csrf="<?= Yii::$app->request->csrfToken; ?>">показать все</a>
                    <?php endif; ?>
                </div>
                <div class="cont-tel">
                    <span class="cont-tel_tel-icon"></span>
                    <?php foreach ($phone as $item): ?>
                        <p><?= $item->phone; ?></p>
                    <?php endforeach; ?>
                </div>
                <div class="cont-adress">
                    <span class="cont-adress_geo-icon"></span>
                    <p><?= $model->region_name?>, <?= $model->city_name; ?>, <?= $model->address; ?></p>

                </div>
                <div class="cont-site">
                    <span class="cont-site_global-icon"></span>
                    <a href=""><?= $model->site?></a>
                </div>
                <div class="mail-shop">
                    <span class="mail-icon"></span>
                    <a href=""><?= $model->mail;?></a>
                </div>

                <span class="addFilial"></span>

            </div>
            <div class="shop-soc">
                <h2>Компания в социальных сетях</h2>
                <a href="" class="vk"></a>
                <a href="" class="gp"></a>
                <a href="" class="fb"></a>
                <a href="" class="twi"></a>
            </div>
            <span class="yellow-shops-line"></span>
            <div class="shop-content__left_map">
                <div id="map"></div>
            </div>
        </div>
        <div class="shop-content__right">
            <p><span>Просмотров магазина:</span> <span><?= $model->views?></span></p>
            <h2>Администратор магазина</h2>

            <div class="header__top_user">

                <img class="user-pic" src="<?= \common\classes\UserFunction::getUser_avatar_url($model->user_id); ?>" alt="">

                <span class="user-name"> <span class="user-name-link"><?= \common\classes\UserFunction::getUserName($model->user_id);?></span></span>
            </div>
            <!--<a href="" class="mapsearch-shop-button"><span class="geo-shop-icon"></span>Найти на карте</a>-->
            <a href="" class="favorite-shop-button"><span class="favorite-shop-icon"></span>В избранные магазины</a>
            <!--<a href="" class="complain-shop-button"><span class="complain-icon"></span> Пожаловаться</a>-->
            <a href="" class="write-author"><span class="open-mail"></span>написать продавцу</a>
            <!--<div class="mini-social">
                <a href="" class="mini-social-vk mini-social-icon"></a>
                <a href="" class="mini-social-ok mini-social-icon"></a>
                <a href="" class="mini-social-fb mini-social-icon"></a>
                <a href="" class="mini-social-gp mini-social-icon"></a>
                <a href="" class="mini-social-twi mini-social-icon"></a>
                <a href="" class="mini-social-mailru mini-social-icon"></a>
            </div>-->
            <?= \frontend\modules\banner\widgets\ShowRightBanner::widget(); ?>
        </div>
    </div>
</section>

