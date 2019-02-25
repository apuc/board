<?php

use frontend\widgets\AuthUser;
use common\classes\Debug;

//$this->registerJsFile('/js/jquery-2.1.3.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => 'Бесплатные объявления ДНР, ЛНР: продажа,покупка,недвижимость',
        'description' => 'Все бесплатные объявления ДНР, ЛНР без посредников. Ежедневное обновления предложений по темам: купля/продажа, работа, недвижимость, авто и многое другое',
        'img' => 'https://rub-on.ru/img/Logotip_RUBON.png',
    ]);
?>
<!--<section class="home-top">
    <div class="container">
        <h2>откройте для себя новые перспективы! </h2>
        <p> Увеличивайте доходы вместе с нами!</p>
        <div class="home-top__knopki">
            <div class="home-top__knopki_left">
                <span class="home-top__knopka">ДЛЯ ЧАСТНЫХ ЛИЦ</span>
            </div>
            <div class="home-top__knopki_right">
                <a href="<? /*= \yii\helpers\Url::to(['/organizations/default/index'])*/ ?>" class="home-top__knopka">для ОРГАНИЗАЦИЙ</a>
            </div>
        </div>
    </div>
</section>

<? /*= \frontend\widgets\ShowSearch::widget(); */ ?>
    <section class="home-content">
        <div class="container">

            <div class="home-contents">

                <?php
/*                $count = 0;
                $catArr = [];
                $countAllCat = 0;
                foreach($category as $item): */ ?>
                    <div class="home-content-item" data-id="<? /*= $item['id'];*/ ?>">
                        <a href="" class="content-item-thumb">
                            <img src="<? /*= $item['img']; */ ?>" alt="<? /*= $item['name']; */ ?>" title="<? /*= $item['name']; */ ?>">
                        </a>
                        <div class="content-item-text">
                            <a class="text-title" href=""><? /*= $item['name']; */ ?></a>
                        </div>
                    </div>
                <?php
/*                    $catArr[] = $item['id'];
                    $count++;
                    if($count == 2 || $countAllCat == count($category)):
                        $count = 0;

                        if(!empty($catArr)):
                            foreach($catArr as $value): */ ?>
                                <div class="text-about" data-id="<? /*= $value; */ ?>">
                                    <div class="text-about-title">
                                        <a href="<? /*= \yii\helpers\Url::toRoute(['/obyavleniya/' . $category["$value"]['slug']]); */ ?>"><b>Смотреть все объявления</b> в <? /*= $category["$value"]['name']*/ ?> </a>
                                    </div>
                                    <div class="text-about-links">
                                        <?php /*foreach($category["$value"]['childs'] as $childs): */ ?>
                                            <a class="text-about-link" href="<? /*= \yii\helpers\Url::toRoute(['/obyavleniya/' . $childs->slug]); */ ?>"><? /*= $childs->name; */ ?></a>
                                        <?php /*endforeach; */ ?>
                                    </div>
                                </div>
                            <?php /*endforeach;

                        endif;
                        $catArr = [];
                    endif;
                endforeach; */ ?>


            </div>
        </div>
    </section>
<? /*= \frontend\modules\adsmanager\widgets\ShowVipAdsSlider::widget(); */ ?>
<? /*= \frontend\modules\adsmanager\widgets\ShowHomeAds::widget(); */ ?>
--><? /*= \frontend\modules\adsmanager\widgets\ShowTopAds::widget(); */ ?>


<section class="index-main">
    <div class="container">
        <div class="cards">
            <?php foreach ($arr['ads'] as $product):

                ?>
                <div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">
                    <div class="single-card__main">
                        <div class="single-card__top">
                            <div class="single-card__overlay">
                                <button class="gifer-play-button"></button>
                                <a class="js-openModal" href="#" data-modal="#card-detail<?= $product->id; ?>"></a><span
                                        class="single-card__view single-card__city"><i
                                            class="fa fa-camera"></i><span><?= count($product->ads_img);?></span></span>
                            </div>
                            <div class="single-card__top-content">
                                <a class="single-card__city" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'cityFilter' => $product['geobase_city']->id])?>">
                                    <?= $product['geobase_city']->name; ?>
                                </a>
                                <a class="single-card__like" href="#"><i class="fa fa-heart-o"></i></a>
                            </div>
                            <!--<div class="single-card__gif-content">
                                <span class="single-card__gif-label">Gif</span>
                            </div>-->
                            <?php if (empty($item['ads_img'])): ?>
                                <img class="bg-img" src='/img/no-img.png' alt="<?= $product->title; ?>">
                            <?php else: ?>
                                <img class="bg-img" src="<?= $product['ads_img'][0]->img_thumb; ?>" alt="<?= $product->title; ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="single-card__bottom">
                            <a class="single-card__title" href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $product->slug]) ?>">
                                <?= $product->title; ?>
                            </a>
                            <span class="price price-adaptive price-small"><?= $product->price; ?>₽</span>
                        </div>
                    </div>
                    <div class="modal modal__detail container modal-js" id="card-detail<?= $product->id?>">
                        <div class="single-card__detail">
                            <button class="button_close js-modalClose">×</button>
                            <div class="single-card__detail-content">
                                <div class="single-card__detail-img">
                                    <?php if (empty($item['ads_img'])): ?>
                                        <img class="bg-img" src='/img/no-img.png' alt="<?= $product->title; ?>">
                                    <?php else: ?>
                                        <img class="bg-img" src="<?= $product['ads_img'][0]->img_thumb; ?>" alt="<?= $product->title; ?>" />
                                    <?php endif; ?>
                                    <div class="single-card__detail-img-content">
                                        <span class="single-card__view single-card__city">
                                            <i class="fa fa-camera"></i>
                                            <span><?= count($product->ads_img);?></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="single-card__detail-main">
                                    <?php
                                    $listcat = \common\classes\AdsCategory::getListCategoryAllInfo($product->category_id, []);
                                    $listcat = array_reverse($listcat);
                                    ?>
                                    <?php
                                    foreach ($listcat as $val): ?>
                                        <a href="<?= \yii\helpers\Url::toRoute(['/obyavleniya/' . $val->slug]); ?>"
                                           class="button button_small button_gray sm-none"><?= $val->name; ?></a>
                                    <?php endforeach ?>

                                    <h3 class="single-card__detail-title mb15 mt20">
                                        <?= $product->title; ?>
                                    </h3>
                                    <div class="single-card__info-second">
                                        <div class="sm-block mr-auto">
                                            <?php
                                            foreach ($listcat as $val):?>
                                                <a href="<?= \yii\helpers\Url::toRoute(['/obyavleniya/' . $val->slug]); ?>"
                                                   class="button button_small button_gray"><?= $val->name; ?></a>
                                                <?php endforeach ?>
                                        </div>
                                        <span class="single-card__detail-date">Добавлено: <?= \common\classes\DataTime::time($product->dt_update); ?></span>
                                        <div class="single-card__detail-view sm-none">
                                            <img class="mr5" src="/theme/images/icon-eye.png" alt=""/>
                                            <span><?= $product->views?></span>
                                        </div>
                                        <a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
                                            <svg class="single-card__icon ico ico_gray">
                                                <use xlink:href="/theme/images/svg.svg#nav">
                                                </use>
                                            </svg>
                                            <span class="ml5"><?= $product['geobase_city']->name; ?></span></a>
                                    </div>
                                    <div class="single-card__info">
                                        <?= \yii\helpers\StringHelper::truncate(strip_tags($product->content),150,'...');?>
                                    </div>
                                    <div class="d-flex flex-wrap align-items-center justify-content-end mt10">
                                        <a class="single-card__detail-like mt5 mb5" href="#">
                                            <i class="fa fa-heart-o"></i><span>В избранное</span>
                                        </a>
                                        <div class="sm-block mr-auto">
                                            <div class="single-card__detail-view">
                                                <img class="mr5" src="/theme/images/icon-eye.png" alt=""/>
                                                <span><?= $product->views; ?></span>
                                            </div>
                                        </div>
                                        <a class="button button_red mt5 mb5 ml15" href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $product->slug]) ?>">
                                            Посмотреть полностью
                                        </a>
                                    </div>
                                    <div class="mt10 fw-semi-bold fz18 mb10 lg-none">
                                        <span>Похожие объявления:</span>
                                    </div>
                                    <div class="single-card__slider lg-none">
                                        <a class="single-card__slider-item" href="#">
                                            <img class="bg-img" src="assets/images/cards/bag-01.jpg" alt=""/>
                                        </a>
                                        <a class="single-card__slider-item" href="#">
                                            <img class="bg-img" src="assets/images/cards/bag-02.jpg" alt=""/>
                                        </a>
                                        <a class="single-card__slider-item" href="#">
                                            <img class="bg-img" src="assets/images/cards/bag-03.jpg" alt=""/>
                                        </a>
                                        <a class="single-card__slider-item" href="#">
                                            <img class="bg-img" src="assets/images/cards/bag-04.jpg" alt=""/>
                                        </a>
                                        <a class="single-card__slider-item" href="#">
                                            <img class="bg-img" src="assets/images/cards/bag-01.jpg" alt=""/>
                                        </a>
                                        <a class="single-card__slider-item" href="#">
                                            <img class="bg-img" src="assets/images/cards/bag-02.jpg" alt=""/>
                                        </a>
                                        <a class="single-card__slider-item" href="#">
                                            <img class="bg-img" src="assets/images/cards/bag-03.jpg" alt=""/>
                                        </a>
                                        <a class="single-card__slider-item" href="#">
                                            <img class="bg-img" src="assets/images/cards/bag-04.jpg" alt=""/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="d-flex justify-content-center mt20">
            <button class="button button_gray button_big">Показать еще</button>
        </div>
    </div>
</section>
