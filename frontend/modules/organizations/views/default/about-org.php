<?php
use common\classes\DataTime;
use common\classes\EndWord;

$this->registerJsFile('/js/organizations.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => 'О компании | ' . $model->title . ' - ' . ' на RUBON',
        'description' => $model->descr,
        'img' => 'http://rub-on.ru/' .  $model->logo,
    ]);


echo $this->render('_menu', ['slug' => $model->slug]);

//\common\classes\Debug::prn($model);
?>

<section class="header-shop-fon">
    <?php if(!empty($model['header'])):?>
        <img src="/<?= $model['header']; ?>" alt="">
    <?php else: ?>
        <img src="/img/header-shop-fon.jpg" alt="">
    <?php endif;?>
    <?php if(!empty($model['logo'])):?>
        <a rel="nofollow" target="_blank" href="<?= $model['site']; ?>" class="logo-organization-wrap">
            <img src="/<?= $model['logo']; ?>" alt="">
        </a>
    <?php else:?>
        <span class="logo-organization-wrap">
            <img src="/img/org-not-logo-min.jpg" alt="">
        </span>
    <?php endif; ?>

    <div class="container">
        <div class="about-shop">
            <h2><?= $model['title']; ?></h2>
            <p><?= $model['phone']; ?> <span><?= $model['schedule']; ?></span></p>
            <p>На сайте с <?= DataTime::dateOrg($model['dt_add']) ?></p>
        </div>
    </div>
    <div class="search-map">
        <p><span class="geo-pic"></span>Найти компанию на карте <span class="rect-new">Скоро</span></p>
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

                <div class="shop-conacts__row">
                    <div class="tel-geo__wrap">
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
                    </div>
                    <div class="cont-site">
                        <span class="cont-site_global-icon"></span>
                        <a href="<?= $model->site?>" target="_blank"><?= $model->site?></a>
                    </div>
                    <div class="mail-shop">
                        <span class="mail-icon"></span>
                        <a href=""><?= $model->mail;?></a>
                    </div>
                </div>

                <span class="addFilial"></span>

            </div>

            <div class="shop-soc">
                <?php if(empty($model['link_vk']) && empty($model['link_google']) && empty($model['link_fb']) && empty($model['link_tw'])): ?>
                    <h2>Компания не указала ссылки в социальных сетях</h2>
                <?php else: ?>
                    <h2>Компания в социальных сетях</h2>
                    <?php if($model['link_vk']):?><a href="<?= $model['link_vk']; ?>" rel="nofollow" target="_blank" class="vk"></a><?php endif;?>
                    <?php if($model['link_google']):?><a href="<?= $model['link_google']; ?>" rel="nofollow" target="_blank" class="gp"></a><?php endif;?>
                    <?php if($model['link_fb']):?><a href="<?= $model['link_fb']; ?>" rel="nofollow" target="_blank" class="fb"></a><?php endif;?>
                    <?php if($model['link_tw']):?><a href="<?= $model['link_tw']; ?>" rel="nofollow" target="_blank" class="twi"></a><?php endif;?>
                <?php endif;?>
            </div>
            <span class="yellow-shops-line"></span>
            <!--<div class="shop-content__left_map">
                <div id="map"></div>
            </div>-->
        </div>
        <div class="shop-content__right shop-content__right_padding">
            <p><span>Просмотров магазина:</span> <span><?= $model->views?></span></p>
            <h2>Администратор магазина</h2>

            <div class="header__top_user">

                <img class="user-pic" src="<?= \common\classes\UserFunction::getUser_avatar_url($model->user_id); ?>" alt="">

                <span class="user-name"> <span class="user-name-link"><?= \common\classes\UserFunction::getUserName($model->user_id);?></span></span>
            </div>
            <!--<a href="" class="mapsearch-shop-button"><span class="geo-shop-icon"></span>Найти на карте</a>-->
            <span class="favorite-shop-button">
                <?php if(empty($orgFavorites)): ?>
                    <span class="average-ad-star star-icon" data-gist="org" data-gistid="<?= $model->id; ?>" data-csrf="<?= Yii::$app->request->getCsrfToken()?>"></span>
                    В избранное
                <?php else: ?>
                    <span class="average-ad-star active-star-icon" data-gist="org" data-gistid="<?= $model->id; ?>" data-csrf="<?= Yii::$app->request->getCsrfToken()?>"></span>
                    Из избранного
                <?php endif; ?>
           </span>
            <!--<a href="" class="complain-shop-button"><span class="complain-icon"></span> Пожаловаться</a>-->
            <a href="<?= \yii\helpers\Url::to(['/message/default/dialog', 'username' => \common\classes\UserFunction::getUserLoginById($model->user_id) ])?>" target="_blank" class="write-author"><span class="open-mail"></span>написать продавцу</a>
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

