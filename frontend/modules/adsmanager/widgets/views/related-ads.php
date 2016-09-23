<?php

?>
<div class="org">
    <h2>Похожие объявления </h2>
    <?php foreach($ads as $item):?>
        <div class="org-items">
            <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="slide-link">
                <img src='/<?= $item['ads_img'][0]->img_thumb; ?>' alt="">
                <h4><?= $item->title; ?></h4>
            </a>
        </div>
    <?php endforeach;?>

</div>
