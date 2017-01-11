<?php
/**
 * @var yii\web\View $this
 * @var $ads common\models\db\Ads
 */

use yii\widgets\LinkPager;

$this->title = 'Объявления';
//\common\classes\Debug::prn($ads);
?>


<?/*= \frontend\modules\adsmanager\widgets\ShowSelectCategoryFilter::widget(); */?>
<section class="adcontent-main">
    <div class="container">
        <?= \frontend\modules\adsmanager\widgets\ShowFilterAds::widget(); ?>
        <div class="ad-content-main">

            <!--<div class="search-map">
                <p><span class="geo-pic"></span>Поиск объявлений на карте <span class="rect-new">new</span></p>
            </div>-->
            <div class="average-ad">
                <?= $this->render('_sort'); ?>
                <?php foreach($ads as $item): ?>
                    <div class="average-ad-item">
                        <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>"
                           class="average-ad-item-thumb">
                            <?php if (empty($item['ads_img'])): ?>
                                <img src='/img/no-img.png' alt="<?= $item->title; ?>">
                            <?php else: ?>
                                <img src='/<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>">
                            <?php endif; ?>
                        </a>
                        <div class="average-ad-item-content">

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
                            <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>"
                               class="average-ad-title"><?= $item->title; ?></a>
                            <p class="average-ad-geo">
                                <span class="geo-space"></span>
                                <a class="addressAds" href=""><?= $item['geobase_region'][0]->name; ?></a> |
                                <a class="addressAds" href=""><?= $item['geobase_city']->name; ?></a>
                            </p>


                            <p class="average-ad-time"><?= \common\classes\DataTime::time($item->dt_update); ?></p>
                            <?php
                            $listcat = \common\classes\AdsCategory::getListCategoryAllInfo($item->category_id, []);
                            $listcat = array_reverse($listcat);
                            $k = 1;
                            foreach ($listcat as $val): ?>
                                <a href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $val->slug]); ?>"
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
                <?php endforeach; ?>
            </div>
            <div class="vip-ad">
                <!--<h2 class="title-vip-ad">VIP - объявления</h2>
                <div class="vip-ad-item">
                    <a href="" class="vip-ad-item-thumb">
                        <img src="img/vip-adpic-1.png" alt=""/>
                    </a>
                    <span class="vip-ad-star star-icon "></span>
                    <div class="vip-ad-item-content">
                        <a href="" class="vip-ad-title">3-к квартира, 65 м², 4/9 эт.</a>
                        <p class="vip-ad-geo"> <span class="vip-geo-space"></span>р-н Пролетарский</p>
                        <span class="vip-ad-price">2 500 000 &#8381;</span>
                    </div>
                </div>
                <div class="vip-ad-item">
                    <a href="" class="vip-ad-item-thumb">
                        <img src="img/vip-adpic-2.png" alt=""/>
                    </a>
                    <span class="vip-ad-star star-icon "></span>
                    <div class="vip-ad-item-content">
                        <a href="" class="vip-ad-title">3-к квартира, 65 м², 4/9 эт.</a>
                        <p class="vip-ad-geo"> <span class="vip-geo-space"></span>Тольятти</p>
                        <span class="vip-ad-price">2 500 000 &#8381;</span>
                    </div>
                </div>
                <a href="" class="whatisVIP">Что такое VIP - объявления?</a>-->
                <?= \frontend\modules\reklama\widgets\ShowRightBanner::widget(); ?>
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
            <!--<div class="pagination">
                <ul>
                    <li class="pagination-prew"></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">18</a></li>
                    <li class="pagination-next"></li>
                </ul>
            </div>-->
            <!--<div class="link-category-ad">
                <div class="link-category-ad-item">
                    <h4 class="link-category-ad-item-title">Транспорт</h4>
                    <ul class="link-category-ad-item-column">
                        <li><a href="">Автомобили</a></li>
                        <li><a href="">Мотоциклы</a></li>
                        <li><a href="">Грузовики</a></li>
                        <li><a href="">Водный транспорт</a></li>
                        <li><a href="">Запчасти</a></li>

                    </ul>
                    <h4 class="link-category-ad-item-title">Транспорт</h4>
                    <ul class="link-category-ad-item-column">
                        <li><a href="">Автомобили</a></li>
                        <li><a href="">Мотоциклы</a></li>
                        <li><a href="">Грузовики</a></li>
                        <li><a href="">Водный транспорт</a></li>
                        <li><a href="">Запчасти</a></li>

                    </ul>
                    <h4 class="link-category-ad-item-title">Транспорт</h4>
                    <ul class="link-category-ad-item-column">
                        <li><a href="">Автомобили</a></li>
                        <li><a href="">Мотоциклы</a></li>
                        <li><a href="">Грузовики</a></li>
                        <li><a href="">Водный транспорт</a></li>
                        <li><a href="">Запчасти</a></li>

                    </ul>

                </div>
                <div class="link-category-ad-item">
                    <h4 class="link-category-ad-item-title">Транспорт</h4>
                    <ul class="link-category-ad-item-column">
                        <li><a href="">Автомобили</a></li>
                        <li><a href="">Мотоциклы</a></li>
                        <li><a href="">Грузовики</a></li>
                        <li><a href="">Водный транспорт</a></li>
                        <li><a href="">Запчасти</a></li>

                    </ul>
                    <h4 class="link-category-ad-item-title">Транспорт</h4>
                    <ul class="link-category-ad-item-column">
                        <li><a href="">Автомобили</a></li>
                        <li><a href="">Мотоциклы</a></li>
                        <li><a href="">Грузовики</a></li>
                        <li><a href="">Водный транспорт</a></li>
                        <li><a href="">Запчасти</a></li>

                    </ul>

                </div>
                <div class="link-category-ad-item">
                    <h4 class="link-category-ad-item-title">Транспорт</h4>
                    <ul class="link-category-ad-item-column">
                        <li><a href="">Автомобили</a></li>
                        <li><a href="">Мотоциклы</a></li>
                        <li><a href="">Грузовики</a></li>
                        <li><a href="">Водный транспорт</a></li>
                        <li><a href="">Запчасти</a></li>

                    </ul>
                </div>
            </div>-->
            <!--<div class="seo-text">
                <p>Бесплатные объявления России на Bixti.ru - здесь вы найдете то, что искали! Нажав на кнопку "Подать объявление", вы перейдете на форму, заполнив которую сможете разместить объявление на любую необходимую тематику абсолютно бесплатно и легко. С помощью сайта объявлений Bixti.ru вы можете купить или продать из рук в руки практически все, что угодно</p>
            </div>-->
        </div>
    </div>
</section>
