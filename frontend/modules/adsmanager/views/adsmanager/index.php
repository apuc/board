<?php
/**
 * @var yii\web\View $this
 * @var $ads common\models\db\Ads
 */

use yii\widgets\LinkPager;



$category = (Yii::$app->request->get('slug') ? \common\classes\AdsCategory::getCategoryInfoAll(Yii::$app->request->get('slug')) : ['title'=>'Бесплатные объявления ДНР, ЛНР на rubon', 'description' => 'RUB-ON.ru - крупнейшая доска объявлений ДНР, ЛНР. Огромная база предложений по темам: недвижимость, работа, транспорт, купля/продажа товаров, услуги и многое другое!' ]);
echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => $category['title'],
        'description' => $category['description'],
        'img' => 'https://rub-on.ru/img/Logotip_RUBON.png'
    ]);
?>


<section class="adcontent-main">
    <div class="container">
        <?= \frontend\modules\adsmanager\widgets\ShowFilterAds::widget(); ?>
        <div class="ad-content-main">

            <div class="average-ad">
                <?= $this->render('_sort'); ?>
                <?php if(!empty($ads)): ?>
                    <?php foreach ($ads as $item): ?>

                        <?php
                            //Назначаем статусы для объявления
                            $vip = 0;
                            $pick = 0; //Выделенное объявление
                            $raise = 0;//Поднятое
                            foreach ($item['adsDopStatus'] as $adsStatus){
                                if($adsStatus->status_id == 4 ){
                                    $vip = 1;
                                }
                                if($adsStatus->status_id == 7){
                                    $pick = 1;
                                }
                                if($adsStatus->status_id == 8){
                                    $raise = 1;
                                }
                            }
                        ?>

                    <div class="average-ad-item <?= ($pick == 1) ? 'selected-average-ad-item' : ''?>">
                        <?php  if($item->status != 2): ?>
                            <div class="average-ad-item-hide"></div>
                        <?php endif;?>
                        <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>"
                           class="average-ad-item-thumb">
                            <?php if (empty($item['ads_img'])): ?>
                                <img src='/img/no-img.png' alt="<?= $item->title; ?>">
                            <?php else: ?>
                                <img src='<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>">
                            <?php endif; ?>
                            <?php if($vip == 1): ?>
                                <span><img src="/img/obyavleniya/icons/VIP.png" alt=""></span>
                            <?php endif; ?>
                        </a>
                        <div class="average-ad-item-content">
                            <?php if ($item->status != 2):?>
                                <span class="close-ad">
                                    Объявление закрыто или удалено
                                    <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>">Посмотреть</a>
                                </span>
                            <?php endif; ?>
                                <div class="top-content">
                                    <div class="top-content-left">
                                        <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>" class="average-ad-title"><?= $item->title; ?></a>
                                        <p class="average-ad-geo">
                                            <span class="geo-space"></span>
                                            <a class="addressAds" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'regionFilter' => $item['geobase_region'][0]->id])?>"><?= $item['geobase_region'][0]->name; ?></a> |
                                            <a class="addressAds" href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'cityFilter' => $item['geobase_city']->id])?>"><?= $item['geobase_city']->name; ?></a>
                                        </p>
                                    </div>
                                    <div class="top-content-right">
                                        <span class="average-ad-price"><?= number_format($item->price, 0, '.', ' '); ?>
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
                                        <?php if($pick == 1): ?>
                                            <span class="average-ad-allocated"><img src="img/icons/marker.png" alt=""><span>Выделенное объявление</span></span>
                                        <?php endif; ?>
                                        <?php if($raise == 1): ?>
                                            <span class="average-ad-upper"><img src="img/icons/arrow-top.png" alt=""><span>Объявление поднято</span></span>
                                        <?php endif; ?>
                                    </div>

                                </div>
                                <div class="bottom-content">
                                    <p class="average-ad-time"><?= \common\classes\DataTime::time($item->dt_update); ?></p>
                                    <?php
                                    $listcat = \common\classes\AdsCategory::getListCategoryAllInfo($item->category_id, []);
                                    $listcat = array_reverse($listcat);
                                    $k = 1;
                                    foreach ($listcat as $val): ?>
                                        <a href="<?= \yii\helpers\Url::toRoute(['/obyavleniya/' . $val->slug]); ?>"
                                           class="average-ad-category"><?= $val->name; ?></a>
                                        <?= ($k == count($listcat)) ? '' : '<span class="separatorListCategory">|</span>' ?>
                                        <?php $k++; endforeach ?>
                                    <?php if (!Yii::$app->user->isGuest): ?>
                                        <?php if (\common\classes\Ads::getFavorites('ad', $item->id)): ?>
                                            <span class="average-ad-star active-star-icon"
                                                  data-csrf="<?= Yii::$app->request->getCsrfToken() ?>" data-gist="ad"
                                                  data-gistid="<?= $item->id; ?>"></span>
                                        <?php else: ?>
                                            <span class="average-ad-star star-icon"
                                                  data-csrf="<?= Yii::$app->request->getCsrfToken() ?>" data-gist="ad"
                                                  data-gistid="<?= $item->id; ?>"></span>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                    </div>
                    <!--<div class="average-ad-item">
                        <a href="<?/*= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) */?>"
                           class="average-ad-item-thumb">
                            <?php /*if (empty($item['ads_img'])): */?>
                                <img src='/img/no-img.png' alt="<?/*= $item->title; */?>">
                            <?php /*else: */?>
                                <img src='<?/*= $item['ads_img'][0]->img_thumb; */?>' alt="<?/*= $item->title; */?>">
                            <?php /*endif; */?>
                        </a>
                        <div class="average-ad-item-content">

                                <span class="average-ad-price"><?/*= number_format($item->price, 0, '.', ' '); */?>
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
                                <a href="<?/*= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) */?>" class="average-ad-title"><?/*= $item->title; */?></a>
                                <p class="average-ad-geo">
                                    <span class="geo-space"></span>
                                    <a class="addressAds" href="<?/*= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'regionFilter' => $item['geobase_region'][0]->id])*/?>"><?/*= $item['geobase_region'][0]->name; */?></a> |
                                    <a class="addressAds" href="<?/*= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'cityFilter' => $item['geobase_city']->id])*/?>"><?/*= $item['geobase_city']->name; */?></a>
                                </p>
                            <div class="bottom-content">
                                <p class="average-ad-time"><?/*= \common\classes\DataTime::time($item->dt_update); */?></p>
                                <?php
/*                                $listcat = \common\classes\AdsCategory::getListCategoryAllInfo($item->category_id, []);
                                $listcat = array_reverse($listcat);
                                $k = 1;
                                foreach ($listcat as $val): */?>
                                    <a href="<?/*= \yii\helpers\Url::toRoute(['/obyavleniya/' . $val->slug]); */?>"
                                       class="average-ad-category"><?/*= $val->name; */?></a>
                                    <?/*= ($k == count($listcat)) ? '' : '<span class="separatorListCategory">|</span>' */?>
                                    <?php /*$k++; endforeach */?>
                                <?php /*if (!Yii::$app->user->isGuest): */?>
                                    <?php /*if (\common\classes\Ads::getFavorites('ad', $item->id)): */?>
                                        <span class="average-ad-star active-star-icon"
                                              data-csrf="<?/*= Yii::$app->request->getCsrfToken() */?>" data-gist="ad"
                                              data-gistid="<?/*= $item->id; */?>"></span>
                                    <?php /*else: */?>
                                        <span class="average-ad-star star-icon"
                                              data-csrf="<?/*= Yii::$app->request->getCsrfToken() */?>" data-gist="ad"
                                              data-gistid="<?/*= $item->id; */?>"></span>
                                    <?php /*endif; */?>

                                <?php /*endif; */?>
                            </div>
                        </div>
                    </div>-->
                <?php endforeach; ?>
                <?php else: ?>
                    <h3 class="title-none_ad">В данной категории объявления отсутствуют</h3>
                    <div class="append-button">

                        <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/create'])?>"><span class="plus-icon">+</span>добавить объявление</a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="right-sidebar">
                <?= \frontend\modules\adsmanager\widgets\ShowVipAdsRight::widget()?>
                <?= \frontend\modules\banner\widgets\ShowRightBanner::widget(['count' => 2]); ?>
            </div>

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

            <div class="seo-text">
                <p><?= $category['description']; ?></p>
            </div>
        </div>
    </div>
</section>
