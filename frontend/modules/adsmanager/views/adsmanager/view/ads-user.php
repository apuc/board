<?php
use yii\widgets\LinkPager;

$this->title = 'Объявления пользователя';
?>

<section class="ad-author__menu">
    <div class="container">
        <ul class="kabinet-header__mnu">
            <li><a href=""><span class="kabinet-header-icon-mail "></span>Связаться с автором</a></li>
            <li><a href=""><span class="kabinet-header-icon-delivery "></span>Мои магазины</a></li>
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
                <p class="user-city"><span class="geo-icon"></span>Город: <a href="">Калининград</a></p>
                <a href="" class="user-number">Посмотреть номер</a>
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
                            <img src='/<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>">
                        <?php endif; ?>
                    </a>

                    <div class="average-ad-item-content">
                        <p class="average-ad-time"><?= \common\classes\DataTime::time($item->dt_update); ?></p>
                        <?php
                        $listcat = \common\classes\AdsCategory::getListCategoryAllInfo($item->category_id, []);
                        $listcat = array_reverse($listcat);
                        $k = 1;
                        foreach($listcat as $val): ?>
                            <a href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $val->slug]); ?>" class="average-ad-category"><?= $val->name; ?></a>
                            <?= ($k == count($listcat)) ? '' : '<span class="separatorListCategory">|</span>'?>
                            <?php $k++; endforeach ?>
                        <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="average-ad-title"><?= $item->title; ?></a>
                        <p class="average-ad-geo">
                            <span class="geo-space"></span>
                            <a class="addressAds" href=""><?= $item['geobase_region'][0]->name; ?> | </a>
                            <a class="addressAds" href=""><?= $item['geobase_city']->name; ?></a>
                        </p>
                        <span class="average-ad-price"><?= $item->price; ?>
                            <span class="rubl-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 64.002 64.002">
                                          <path d="M54.628,9.375c-6.044-6.045-14.08-9.374-22.627-9.374c-8.548,0-16.583,3.329-22.627,9.374C3.329,15.419,0,23.454,0,32.001
                                            s3.329,16.582,9.374,22.626c6.044,6.045,14.079,9.374,22.627,9.374c8.547,0,16.583-3.329,22.627-9.374
                                            c6.045-6.044,9.374-14.079,9.374-22.626S60.673,15.419,54.628,9.375z M53.214,53.213c-5.666,5.667-13.2,8.788-21.213,8.788
                                            c-8.014,0-15.547-3.121-21.213-8.788C5.121,47.547,2,40.014,2,32.001s3.121-15.546,8.788-21.212
                                            c5.666-5.667,13.199-8.788,21.213-8.788c8.013,0,15.547,3.121,21.213,8.788c5.667,5.666,8.788,13.199,8.788,21.212
                                            S58.881,47.547,53.214,53.213z"/>
                                          <path d="M31.001,16.001h-6h-1H23v18h-4v2L23,36v4.001h-4v2h4v6h2v-6h7v-2h-7v-4.002l5.909-0.002
                                            c0.054,0.005,0.392,0.033,0.923,0.033c1.749,0,5.594-0.308,8.304-2.784c1.9-1.735,2.864-4.173,2.864-7.245s-0.964-5.51-2.864-7.245
                                            C36.603,15.527,31.14,15.983,31.001,16.001z M38.796,31.763c-2.875,2.633-7.655,2.248-7.795,2.238H25V18l6.091-0.003
                                            c0.047-0.005,4.806-0.403,7.696,2.235c1.469,1.341,2.213,3.283,2.213,5.769C41.001,28.483,40.259,30.422,38.796,31.763z"/>
                                      </svg>
                                </span>
                            </span>
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
        <div class="ad-author__content_right">
            <div class="banner-1"></div>
            <div class="banner-2"></div>
        </div>
    </div>
</section>

