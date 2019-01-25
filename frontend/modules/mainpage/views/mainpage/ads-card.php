<?php foreach ($ads as $add): ?>
<div class="single-card js-detail-wrap masonry" data-horizontal="1" data-vertical="1">

    <div class="single-card__main">
        <div class="single-card__top">
            <div class="single-card__overlay">
                <a class="js-openModal" href="#" data-modal="#card-detail<?= $add['id']?>"></a>
                <span class="single-card__view single-card__city">
                                    <i class="fa fa-camera"></i>
                                    <span><?= count($add->ads_img)?></span>
                                </span>
            </div>
            <div class="single-card__top-content">
                <?php if($add->isTop()):?>
                    <div class="width100"><span class="single-card__top-label">Top</span></div>
                <?php endif; ?>
                <a class="single-card__city" href="#"><?= $add->geobase_region[0]['name']?></a>
                <span class="single-card__like">
                                    <i class="fa fa-heart-o"></i>
                                </span>
            </div>

            <img class="bg-img" src="<?= (isset($add->ads_img[0])) ? $add->ads_img[0]['img_thumb'] : ''?>" alt=""/>

        </div>
        <div class="single-card__bottom">
            <a class="single-card__title" href="/ads/<?=$add->slug?>"><?= $add['title']?></a>
            <span class="price price-adaptive price-small"><?= $add['price']?>₽</span>
        </div>
    </div>

    <div class="modal modal__detail container modal-js" id="card-detail<?=$add['id']?>">
        <div class="single-card__detail">
            <button class="button_close js-modalClose">×</button>
            <div class="single-card__detail-content">
                <div class="single-card__detail-img"><img class="bg-img" src="<?= (isset($add->ads_img[0])) ? $add->ads_img[0]['img_thumb'] : ''?>" alt=""/>
                    <div class="single-card__detail-img-content"><span class="single-card__view single-card__city"><i class="fa fa-camera"></i><span><?= count($add->ads_img)?></span></span>
                    </div>
                </div>
                <div class="single-card__detail-main"><a class="button button_small button_gray sm-none"><?= $add->categoryAds['name']?></a>
                    <h3 class="single-card__detail-title mb15 mt20"><?= $add['title']?>
                    </h3>
                    <div class="single-card__info-second">
                        <div class="sm-block mr-auto"><a class="button button_small button_gray"><?= $add->categoryAds['name']?></a></div><span class="single-card__detail-date">Добавлено: <?= \common\classes\DataTime::timeNews($add->dt_add) ?></span>
                        <div class="single-card__detail-view sm-none"><img class="mr5" src="/img/home/icon-eye.png" alt=""/><span><?= $add->views?></span>
                        </div><a class="d-flex align-items-center ml-auto mt5 mb5 lg-none" href="#">
                            <svg class="single-card__icon ico ico_gray">
                                <use xlink:href="img/home/svg/svg.svg#nav">
                                </use>
                            </svg><span class="ml5"><?= $add->geobase_city['name']?></span></a>
                    </div>
                    <div class="single-card__info">
                        <?php foreach($add->ads_fields_value as $field): ?>
                            <p><?=$field->fieldName['label']?>: <?=$field->value?></p>
                        <?php endforeach; ?>

                    </div>
                    <div class="d-flex flex-wrap align-items-center justify-content-end mt15"><a class="single-card__detail-like mt5 mb5" href="#"><i class="fa fa-heart-o"></i><span>В избранное</span></a>
                        <div class="sm-block mr-auto">
                            <div class="single-card__detail-view"><img class="mr5" src="/img/home/icon-eye.png" alt=""/><span>255</span>
                            </div>
                        </div><a class="button button_red mt5 mb5 ml15" href="/ads/<?=$add->slug?>">Посмотреть полностью</a>
                    </div>
                    <div class="mt15 fw-semi-bold fz18 mb15 lg-none"><span>Похожие объявления:</span></div>
                    <div class="single-card__slider lg-none">
                        <a class="single-card__slider-item" href="#">
                            <img class="bg-img" src="" alt=""/>
                        </a>
                        <a class="single-card__slider-item" href="#">
                            <img class="bg-img" src="" alt=""/>
                        </a>
                        <a class="single-card__slider-item" href="#">
                            <img class="bg-img" src="" alt=""/>
                        </a>
                        <a class="single-card__slider-item" href="#">
                            <img class="bg-img" src="" alt=""/>
                        </a>
                        <a class="single-card__slider-item" href="#">
                            <img class="bg-img" src="" alt=""/>
                        </a>
                        <a class="single-card__slider-item" href="#">
                            <img class="bg-img" src="" alt=""/>
                        </a>
                        <a class="single-card__slider-item" href="#">
                            <img class="bg-img" src="" alt=""/>
                        </a>
                        <a class="single-card__slider-item" href="#">
                            <img class="bg-img" src="" alt=""/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php endforeach; ?>