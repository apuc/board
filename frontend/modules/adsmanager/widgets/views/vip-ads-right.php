<div class="vip-ad">
    <h2 class="title-vip-ad">VIP - объявления</h2>
    <?php foreach ($ads as $item): ?>
        <div class="vip-ad-item">
            <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="vip-ad-item-thumb">
                <?php if(empty($item['ads_img'])): ?>
                    <img src='/img/no-img.png' alt="<?= $item->title; ?>">
                <?php else: ?>
                    <img src='<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>">
                <?php endif; ?>
            </a>
            <!--<span class="vip-ad-star star-icon "></span>-->
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
            <div class="vip-ad-item-content">
                <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="vip-ad-title">
                    <?= $item->title?>
                </a>
                <p class="average-ad-geo">
                    <span class="geo-space"></span>
                    <a class="addressAds" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'regionFilter' => $item['geobase_region'][0]->id])?>"><?= $item['geobase_region'][0]->name; ?></a> |
                    <a class="addressAds" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'cityFilter' => $item['geobase_city']->id])?>"><?= $item['geobase_city']->name; ?></a>
                </p>
                <!--<p class="vip-ad-geo"><span class="vip-geo-space"></span>р-н Пролетарский</p>-->
                <span class="vip-ad-price"><?= $item->price?> &#8381;</span>
            </div>
        </div>
    <?php endforeach; ?>

    <!--<a href="" class="whatisVIP">Что такое VIP - объявления?</a>-->


</div>