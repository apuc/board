<?php
use common\classes\DataTime;
use common\classes\WordFunctions;
use yii\helpers\Url;
//\common\classes\Debug::prn($model);
?>


<a href="<?= Url::to(['/organizations/default/view', 'slug'=>$model['slug']]) ?>" class="average-ad-item-thumb">
    <?php if(!empty($model['logo'])):?>
        <img src="/<?= $model['logo']; ?>" alt=""/>
    <?php else:?>
        <img src="img/adpic-1.png" alt=""/>
    <?php endif; ?>


</a>
<div class="average-ad-item-content">
    <div class="top-content">
        <?php if (!Yii::$app->user->isGuest): ?>
            <?php if (\common\classes\Ads::getFavorites('org', $model['id'])): ?>
                <span class="average-ad-star active-star-icon"
                      data-csrf="<?= Yii::$app->request->getCsrfToken() ?>" data-gist="org"
                      data-gistid="<?= $model['id']; ?>"></span>
            <?php else: ?>
                <span class="average-ad-star star-icon"
                      data-csrf="<?= Yii::$app->request->getCsrfToken() ?>" data-gist="org"
                      data-gistid="<?= $model['id']; ?>"></span>
            <?php endif; ?>

        <?php endif; ?>
        <!--<span class="average-ad-star active-star-icon  "></span>-->
        <a href="" class="average-ad-title"><?= $model['title'] ?></a>
        <p><?= WordFunctions::crop_str_word($model['descr'],10); ?></p>
    </div>
    <div class="bottom-content">
        <div class="left">
            <p class="average-ad-time">На сайте с <?= DataTime::dateOrg($model['dt_add']) ?></p>
            <p class="average-ad-geo"> <span class="geo-space"></span><?= $model['city_name'] ?></p>
        </div>
        <div class="right">
            <a href="" class="average-ad-category"><?= $model['category_name'] ?></a>
            <a href="" class="average-ad-category"><?= $model['category_parent_name'] ?></a>
            <span class="shops-tel"><?= $model['phone'] ?></span>
        </div>
        <a href="<?= Url::to(['/organizations/default/view', 'slug'=>$model['slug']]) ?>" class="shops-link">перейти в магазин</a>
    </div>
</div>