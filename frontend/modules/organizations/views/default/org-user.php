<?php
use common\classes\DataTime;
use common\classes\WordFunctions;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Объявления пользователя';
?>

<section class="ad-author__menu">
    <div class="container">
        <ul class="kabinet-header__mnu">
            <li><a href="<?= Url::to(['/adsmanager/adsmanager/user_ads', 'login' => \common\classes\UserFunction::getUserLoginById($user_id)])?>"><span class="shops-ad"></span>Объявления пользователя</a></li>
            <li><a href=""><span class="shops-my"></span>Организации пользователя</a></li>
            <li><a href="<?= \yii\helpers\Url::to(['/message/default/dialog', 'username' => \common\classes\UserFunction::getUserLoginById($user_id) ])?>" target="_blank"><span class="kabinet-header-icon-mail "></span>Связаться с автором</a></li>
        </ul>
    </div>
</section>

<section class="ad-author__content">
    <div class="container">
        <div class="ad-author__content_left">
            <!-- open user-info -->
            <div class="about-seller">
                <div class="user">
                    <div class="thumb">
                        <img src="<?= \common\classes\UserFunction::getUser_avatar_url($user_id); ?>" alt="">
                    </div>
                    <span>Автор:</span>
                    <h4><?= \common\classes\UserFunction::getUserName($user_id);?></h4>
                </div>
                <!--<p class="user-city"><span class="geo-icon"></span>Город: <a href="">Калининград</a></p>-->
                <!--<a href="" class="user-number">Посмотреть номер</a>-->
            </div>
            <!-- close user-info -->
            <!-- open ad -->
            <?php foreach($org as $model): ?>
                <div class="average-ad-item">
                    <a href="<?= Url::to(['/organizations/default/view', 'slug'=>$model['slug']]) ?>" class="average-ad-item-thumb">
                        <?php if(!empty($model['logo'])):?>
                            <img src="/<?= $model['logo']; ?>" alt=""/>
                        <?php else:?>
                            <img src="/img/org-not-logo.jpg" alt=""/>
                        <?php endif; ?>
                    </a>
                    <div class="average-ad-item-content">
                        <div class="top-content">
                            <?php /*if (!Yii::$app->user->isGuest): */?><!--
                                <?php /*if (\common\classes\Ads::getFavorites('org', $model['id'])): */?>
                                    <span class="average-ad-star active-star-icon"
                                          data-csrf="<?/*= Yii::$app->request->getCsrfToken() */?>" data-gist="org"
                                          data-gistid="<?/*= $model['id']; */?>"></span>
                                <?php /*else: */?>
                                    <span class="average-ad-star star-icon"
                                          data-csrf="<?/*= Yii::$app->request->getCsrfToken() */?>" data-gist="org"
                                          data-gistid="<?/*= $model['id']; */?>"></span>
                                <?php /*endif; */?>

                            --><?php /*endif; */?>
                            <!--<span class="average-ad-star active-star-icon  "></span>-->
                            <a href="<?= Url::to(['/organizations/default/view', 'slug'=>$model['slug']]) ?>" class="average-ad-title"><?= $model['title'] ?></a>
                            <p><?= WordFunctions::crop_str_word($model['descr'],10); ?></p>
                        </div>
                        <div class="bottom-content">
                            <div class="left">
                                <p class="average-ad-time">На сайте с <?= DataTime::dateOrg($model['dt_add']) ?></p>
                                <p class="average-ad-geo"> <span class="geo-space"></span><?= $model['city_name'] ?></p>
                            </div>
                            <div class="right">
                                <a href="<?= Url::to(['/organizations/default/all', 'slug' => $model['category_slug']] )?>" class="average-ad-category"><?= $model['category_name'] ?></a>
                                <a href="<?= Url::to(['/organizations/default/all', 'slug' => $model['category_parent_slug']] )?>" class="average-ad-category"><?= $model['category_parent_name'] ?></a>
                                <span class="shops-tel"><span class="tel-icon"></span><?= $model['phone'] ?></span>
                            </div>
                            <!--<a href="<?/*= Url::to(['/organizations/default/view', 'slug'=>$model['slug']]) */?>" class="shops-link">перейти в магазин</a>-->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="pagination">
                <?= LinkPager::widget(
                    [
                        'pagination' => $pagination,
                        'options' => [
                            'class' => '',
                        ],
                        'prevPageCssClass' => 'pagination-prew',
                        'nextPageCssClass' => 'pagination-next',
                        'prevPageLabel' => '',
                        'nextPageLabel' => '',
                        'activePageCssClass' => 'active',

                    ]) ?>
            </div>
        </div>

        <div class="banner-rightbar">
            <?= \frontend\modules\banner\widgets\ShowRightBanner::widget(); ?>
        </div>
    </div>
</section>