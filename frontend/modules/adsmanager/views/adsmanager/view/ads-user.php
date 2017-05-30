<?php
use yii\widgets\LinkPager;

$this->title = 'Объявления пользователя';
?>

<section class="ad-author__menu">
    <div class="container">
        <ul class="kabinet-header__mnu">
            <li><a href=""><span class="shops-ad"></span>Объявления пользователя</a></li>
            <li><a href="<?= \yii\helpers\Url::to(['/organizations/default/user_org', 'login' => \common\classes\UserFunction::getUserLoginById($user_id)])?>"><span class="shops-my"></span>Организации пользователя</a></li>
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
            <?php foreach($ads as $item): ?>
            <div class="ad-author__content_left-item">
                <div class="kabinet-active-ad__content_ad">
                    <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="average-ad-item-thumb">
                        <?php if(empty($item['ads_img'])): ?>
                            <img src='/img/no-img.png' alt="<?= $item->title; ?>">
                        <?php else: ?>
                            <img src='<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>">
                        <?php endif; ?>
                    </a>

                    <div class="average-ad-item-content">
                        <div class="top-content">
                            <span class="average-ad-price"><?= $item->price; ?>
                                <span class="rubl-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 510.127 510.127">
                                      <path d="M34.786,428.963h81.158v69.572c0,3.385,1.083,6.156,3.262,8.322c2.173,2.18,4.951,3.27,8.335,3.27h60.502
                                        c3.14,0,5.857-1.09,8.152-3.27c2.295-2.166,3.439-4.938,3.439-8.322v-69.572h182.964c3.377,0,6.156-1.076,8.334-3.256
                                        c2.18-2.178,3.262-4.951,3.262-8.336v-46.377c0-3.365-1.082-6.156-3.262-8.322c-2.172-2.18-4.957-3.27-8.334-3.27H199.628v-42.754
                                        h123.184c48.305,0,87.73-14.719,118.293-44.199c30.551-29.449,45.834-67.49,45.834-114.125c0-46.604-15.283-84.646-45.834-114.125
                                        C410.548,14.749,371.116,0,322.812,0H127.535c-3.385,0-6.157,1.089-8.335,3.256c-2.173,2.179-3.262,4.969-3.262,8.335v227.896
                                        H34.786c-3.384,0-6.157,1.145-8.335,3.439c-2.172,2.295-3.262,5.012-3.262,8.151v53.978c0,3.385,1.083,6.158,3.262,8.336
                                        c2.179,2.18,4.945,3.256,8.335,3.256h81.158v42.754H34.786c-3.384,0-6.157,1.09-8.335,3.27c-2.172,2.166-3.262,4.951-3.262,8.322
                                        v46.377c0,3.385,1.083,6.158,3.262,8.336C28.629,427.887,31.401,428.963,34.786,428.963z M199.628,77.179h115.938
                                        c25.6,0,46.248,7.485,61.953,22.46c15.697,14.976,23.549,34.547,23.549,58.691c0,24.156-7.852,43.733-23.549,58.691
                                        c-15.705,14.988-36.354,22.473-61.953,22.473H199.628V77.179z"/>
                                    </svg>
                                </span>
                            </span>
                            <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="average-ad-title"><?= $item->title; ?></a>
                            <p class="average-ad-geo">
                                <span class="geo-space"></span>
                                <a class="addressAds" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'regionFilter' => $item['geobase_region'][0]->id])?>"><?= $item['geobase_region'][0]->name; ?></a> |
                                <a class="addressAds" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'cityFilter' => $item['geobase_city']->id])?>"><?= $item['geobase_city']->name; ?></a>
                            </p>
                        </div>
                        <div class="bottom-content">
                            <p class="average-ad-time"><?= \common\classes\DataTime::time($item->dt_update); ?></p>
                            <?php
                            $listcat = \common\classes\AdsCategory::getListCategoryAllInfo($item->category_id, []);
                            $listcat = array_reverse($listcat);
                            $k = 1;
                            foreach($listcat as $val): ?>
                                <a href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $val->slug]); ?>" class="average-ad-category"><?= $val->name; ?></a>
                                <?= ($k == count($listcat)) ? '' : '<span class="separatorListCategory">|</span>'?>
                                <?php $k++; endforeach ?>
                        </div>



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

