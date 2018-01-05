<?php
use common\classes\DataTime;
use yii\widgets\LinkPager;

echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => $model->title,
        'description' => $model->descr,
        'img' => 'http://rub-on.ru/' .  $model->logo,
    ]);

//Debug::prn($model);



echo $this->render('_menu', ['slug' => $model->slug]);

//\common\classes\Debug::prn($model);
?>

<section class="header-shop-fon">
    <div class="container">
        <div class="header-fons-log">
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
        </div>

    </div>
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
<section class="header-shop_bottom">
    <div class="container">
        <!--<div class="nachalo">
            <p>в начале:</p>
            <a class="price-category"  href="">самые новые</a>
            <a class="price-category" href="">дешевые</a>
            <a class="price-category"  href="">дорогие</a>
        </div>-->
        <?= $this->render('../../../adsmanager/views/adsmanager/_sort')?>

    </div>
    <div class="search-map">
        <p><span class="geo-pic"></span>Найти компанию на карте <span class="rect-new">Скоро</span></p>
    </div>
</section>
<section class="shop-content">
    <div class="container">
        <div class="shop-content__left">

            <?php if(!empty($ads)): ?>
                <?php foreach ($ads as $item): ?>
                    <div class="average-ad-item">
                        <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>"
                           class="average-ad-item-thumb">
                            <?php if (empty($item['ads_img'])): ?>
                                <img src='/img/no-img.png' alt="<?= $item->title; ?>">
                            <?php else: ?>
                                <img src='<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>">
                            <?php endif; ?>
                        </a>
                        <div class="average-ad-item-content">

                                <span class="average-ad-price"><?= number_format($item->price, 0, '.', ' ');; ?>
                                    <span class="rubl-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 510.127 510.127">
											<path d="M34.786,428.963h81.158v69.572c0,3.385,1.083,6.156,3.262,8.322c2.173,2.18,4.951,3.27,8.335,3.27h60.502
												c3.14,0,5.857-1.09,8.152-3.27c2.295-2.166,3.439-4.938,3.439-8.322v-69.572h182.964c3.377,0,6.156-1.076,8.334-3.256
												c2.18-2.178,3.262-4.951,3.262-8.336v-46.377c0-3.365-1.082-6.156-3.262-8.322c-2.172-2.18-4.957-3.27-8.334-3.27H199.628v-42.754
												h123.184c48.305,0,87.73-14.719,118.293-44.199c30.551-29.449,45.834-67.49,45.834-114.125c0-46.604-15.283-84.646-45.834-114.125
												C410.548,14.749,371.116,0,322.812,0H127.535c-3.385,0-6.157,1.089-8.335,3.256c-2.173,2.179-3.262,4.969-3.262,8.335v227.896
												H34.786c-3.384,0-6.157,1.145-8.335,3.439c-2.172,2.295-3.262,5.012-3.262,8.151v53.978c0,3.385,1.083,6.158,3.262,8.336
												c2.179,2.18,4.945,3.256,8.335,3.256h81.158v42.754H34.786c-3.384,0-6.157,1.09-8.335,3.27c-2.172,2.166-3.262,4.951-3.262,8.322
												v46.377c0,3.385,1.083,6.158,3.262,8.336C28.629,427.887,31.401,428.963,34.786,428.963z M199.628,77.179h115.938
												c25.6,0,46.248,7.485,61.953,22.46c15.697,14.976,23.549,34.547,23.549,58.691c0,24.156-7.852,43.733-23.549,58.691
												c-15.705,14.988-36.354,22.473-61.953,22.473H199.628V77.179z"/>
										</svg>
									</span>
                                </span>
                            <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>" class="average-ad-title"><?= $item->title; ?></a>
                            <p class="average-ad-geo">
                                <span class="geo-space"></span>
                                <a class="addressAds" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'regionFilter' => $item['geobase_region'][0]->id])?>"><?= $item['geobase_region'][0]->name; ?></a> |
                                <a class="addressAds" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'cityFilter' => $item['geobase_city']->id])?>"><?= $item['geobase_city']->name; ?></a>
                            </p>
                            <div class="bottom-content">
                                <p class="average-ad-time"><?= \common\classes\DataTime::time($item->dt_update); ?></p>
                                <?php
                                $listcat = \common\classes\AdsCategory::getListCategoryAllInfo($item->category_id, []);
                                $listcat = array_reverse($listcat);
                                $k = 1;
                                foreach ($listcat as $val): ?>
                                    <a href="<?= \yii\helpers\Url::toRoute(['/obyavleniya/' . $val->slug]); ?>"
                                       class="average-ad-category"><?= $val->name; ?></a>
                                    <?= ($k == count($listcat)) ? '' : '<span class="separatorListCategory">|</span>' ?>
                                    <?php $k++; endforeach ?>
                                <?php if (!Yii::$app->user->isGuest): ?>
                                    <?php if (\common\classes\Ads::getFavorites('ad', $item->id)): ?>
                                        <span class="average-ad-star active-star-icon"
                                              data-csrf="<?= Yii::$app->request->getCsrfToken() ?>" data-gist="ad"
                                              data-gistid="<?= $item->id; ?>"></span>
                                    <?php else: ?>
                                        <span class="average-ad-star star-icon"
                                              data-csrf="<?= Yii::$app->request->getCsrfToken() ?>" data-gist="ad"
                                              data-gistid="<?= $item->id; ?>"></span>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h3 class="title-none_ad">Компания не разместила ни одного объявления</h3>
                <!--<div class="append-button">

                    <a href="<?/*= \yii\helpers\Url::to(['/adsmanager/adsmanager/create'])*/?>"><span class="plus-icon">+</span>добавить объявление</a>
                </div>-->
            <?php endif; ?>
            <div class="pagination">
                <?= LinkPager::widget(
                    [
                        'pagination' => $pagination,
                        'options' => [
                            'class' => '',
                        ],
                        'prevPageCssClass' => 'pagination-prew',
                        'nextPageCssClass' => 'pagination-next',
                        'prevPageLabel' => '',
                        'nextPageLabel' => '',
                        'activePageCssClass' => 'active',

                    ]) ?>
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

