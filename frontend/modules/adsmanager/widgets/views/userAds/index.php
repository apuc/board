<?php
use common\classes\EndWord;
//\common\classes\Debug::prn($ads);
?>
<div class="user-ad-info">
    <span>У продавца<a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/user_ads', 'login' => $userLogin])?>"><?= $count; ?> <?= EndWord::num2word($count, ['объявление','объявления', 'объявлений'])?></a></span>
    <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/user_ads', 'login' => $userLogin])?>">просмотреть все</a>
    <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $ads->slug])?>" class="user-ad-info-pic">
        <?php if(empty($ads['ads_img'])): ?>
            <img src='/img/no-img.png' alt="<?= $ads->title; ?>">
        <?php else: ?>
            <img src='/<?= $ads['ads_img'][0]->img; ?>' alt="<?= $ads->title; ?>">
        <?php endif; ?>
        <p><?= $ads->title;?></p>
        <p><?= $ads->price;?> р</p>
    </a>
    <p class="number-ad">Номер объявления: <span><?= $idAds; ?></span></p>
</div>
