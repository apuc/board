<?php
if(!empty($ads)):
?>

<div class="org">
    <h2>Похожие объявления </h2>
    <?php foreach($ads as $item):?>
        <div class="org-items">
            <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="slide-link">
                <?php if(empty($item['ads_img'])): ?>
                    <img src='/img/no-img.png' alt="<?= $item->title; ?>" title="<?= $item->title; ?>">
                <?php else: ?>
                    <img src='/<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>" title="<?= $item->title; ?>">
                <?php endif; ?>
                <h4><?= $item->title; ?></h4>
            </a>
        </div>
    <?php endforeach;?>

</div>
<?php endif; ?>