<?php if(!empty($ads)): ?>
    <div class="sidebar__main mt15">
        <div class="d-flex align-items-center">
            <img class="mr10" src="assets/images/crown.png" alt=""/>
            <span class="fz20 fw-bold">VIP-объявления</span>
        </div>
        <?php foreach ($ads as $item): ?>
            <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="sidebar-card">
                <?php if(empty($item['ads_img'])): ?>
                    <img class="card-company__img mb5 mt15" src='/img/no-img.png' alt="<?= $item->title; ?>">
                <?php else: ?>
                    <img class="card-company__img mb5 mt15" src='<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>">
                <?php endif; ?>
                <h3 class="card-company__title-second mb5 fz16"><?= $item->title; ?></h3>
                <span class="price price-smaller"><?= number_format($item->price, 0, '.', ' '); ?> ₽</span>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
