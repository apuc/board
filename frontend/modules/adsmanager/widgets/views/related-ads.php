<?php
if (!empty($ads)):
    if ($slider == false):
        ?>

        <div class="org">
            <h2>Похожие объявления </h2>
            <?php foreach ($ads as $item): ?>
                <div class="org-items">
                    <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>"
                       class="slide-link">
                        <?php if (empty($item['ads_img'])): ?>
                            <img src='/img/no-img.png' alt="<?= $item->title; ?>" title="<?= $item->title; ?>">
                        <?php else: ?>
                            <img src='<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>"
                                 title="<?= $item->title; ?>">
                        <?php endif; ?>
                        <h4><?= $item->title; ?></h4>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="mt10 fw-semi-bold fz18 mb10 lg-none">
            <span>Похожие объявления:</span>
        </div>
        <div class="single-card__slider lg-none">
            <?php foreach ($ads as $item):?>
                <a class="single-card__slider-item" href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>">
                    <?php if (empty($item['ads_img'])): ?>
                        <img class="bg-img" src='/img/no-img.png' alt="<?= $item->title; ?>" title="<?= $item->title; ?>">
                    <?php else: ?>
                        <img class="bg-img" src='<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>"
                             title="<?= $item->title; ?>">
                    <?php endif; ?>
                </a>
            <?php endforeach;?>

        </div>
    <?php endif; ?>
<?php endif; ?>