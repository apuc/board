<?php
use common\classes\EndWord;
//\common\classes\Debug::prn($ads);
?>
<div class="user-ad-info">
    <span>У продавца<a href=""><?= $count; ?> <?= EndWord::num2word($count, ['объявление','объявления', 'объявлений'])?></a></span>
    <a href="">просмотреть все</a>
    <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $ads->slug])?>" class="user-ad-info-pic">
        <img src="/<?= $ads['ads_img'][0]->img_thumb;?>" alt="">
        <p><?= $ads->title;?></p>
        <p><?= $ads->price;?> р</p>
    </a>
    <p class="number-ad">Номер объявления: <span><?= $idAds; ?></span></p>
</div>
