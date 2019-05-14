<?php
/**
 * @var $products array
 */
?>

<?php foreach ($products as $product): ?>
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
                    <div class="single-card__like add-in-fav <?php if($product->is_f) echo 'in-fav'?>"
                          data-gist="ad"
                          data-gistid="<?php if(!Yii::$app->user->isGuest){ echo $product->id;} else echo -1?>">
                     <i class="fa <?php if($product->is_f) echo 'fa-heart'; else echo 'fa-heart-o'?>"></i>
                    </div>
                </div>
                <!--<div class="single-card__gif-content">
                    <span class="single-card__gif-label">Gif</span>
                </div>-->
                <?php if (empty($product['ads_img'])): ?>
                    <img class="bg-img" src='/img/no-img.png' alt="<?= $product->title; ?>">
                <?php else: ?>
                    <img class="bg-img" src="<?= $product['ads_img'][0]->img; ?>" alt="<?= $product->title; ?>" />
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
                        <?php if (empty($product['ads_img'])): ?>
                            <img class="bg-img" src='/img/no-img.png' alt="<?= $product->title; ?>">
                        <?php else: ?>
                            <img class="bg-img" src="<?= $product['ads_img'][0]->img; ?>" alt="<?= $product->title; ?>" />
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
                                <span class="ml5"><?= $product['geobase_city']->name; ?></span>
                            </a>
                        </div>
                        <div class="single-card__info">
                            <?= \yii\helpers\StringHelper::truncate(strip_tags($product->content),150,'...');?>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-end mt10">
<!--                            <a class="single-card__detail-like mt5 mb5" href="#">-->
<!--                                <i class="fa fa-heart-o"></i><span>В избранное</span>-->
<!--                            </a>-->
                            <div class="single-card__detail-like mt5 mb5 add-in-fav <?php if($product->is_f) echo 'in-fav'?>"
                                  data-gist="ad"
                                  data-gistid="<?php if(!Yii::$app->user->isGuest){ echo $product->id;} else echo -1?>">
                                 <i class="fa <?php if($product->is_f) echo 'fa-heart'; else echo 'fa-heart-o';?>"></i>
                                 <span>Избранное</span>
                            </div>
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

                        <?= \frontend\modules\adsmanager\widgets\RelatedAds::widget(
                            [
                                'ads' => $product,
                                'idCat' => $product->category_id,
                                'limit' => 10,
                                'slider' => true
                            ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>