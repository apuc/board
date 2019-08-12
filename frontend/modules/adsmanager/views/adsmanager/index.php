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


<section class="category">
    <div class="container">
        <div class="d-flex align-items-start category-block">
            <?= \frontend\modules\adsmanager\widgets\ShowFilterAds::widget(); ?>


<!--            <div class="mobile-sort">-->
<!--                <div class="mobile-sort__mark">-->
<!--                    <span>Марка</span>-->
<!--                    <button class="btn-arrow">Все</button>-->
<!--                </div>-->
<!--                <div class="mobile-sort__block">-->
<!--                    <div class="mobile-sort__filter sidebar-filter">-->
<!--                        <button class="jsSort"><img src="/theme/images/svg/sort.svg" alt="" role="presentation"/>Сортировка-->
<!--                        </button>-->
<!--                        <button class="jsFilter"><img src="/theme/images/svg/filtr.svg" alt="" role="presentation"/>Еще фильтры-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <div class="category__main">
                <div class="filter-order jsShowSort">
                    <div class="sort-overlay jsCloseSort">
                    </div>
                    <label class="filter-order__radio checkbox checkbox-normal">
                        <input type="radio" name="sort" value="default" <?=!isset(Yii::$app->request->cookies['sortTypeRadio']) ? 'checked':''?>/>
                        <span class="checkbox__main"><i class="fa fa-check"></i></span>По умолчанию
                    </label>
                    <label class="filter-order__radio checkbox checkbox-normal">
                        <input type="radio" name="sort" value="newOld" <?=Yii::$app->request->get('sortTypeRadio') == 'newOld' ? 'checked':''?>/>
                        <span class="checkbox__main"><i class="fa fa-check"></i></span>
                        <pre class="filter-order__radio__arrow">Старые        новые</pre>
                    </label>
                    <label class="filter-order__radio checkbox checkbox-normal">
                        <input type="radio" name="sort" value="ascPrice" <?=Yii::$app->request->get('sortTypeRadio') == 'ascPrice' ? 'checked':''?>/>
                        <span class="checkbox__main"><i class="fa fa-check"></i></span>Дешевле
                    </label>
                    <label class="filter-order__radio checkbox checkbox-normal">
                        <input type="radio" name="sort" value="descPrice" <?=Yii::$app->request->get('sortTypeRadio') == 'descPrice' ? 'checked':''?>/>
                        <span class="checkbox__main"><i class="fa fa-check"></i></span>Дороже
                    </label>
                    <button type="button" class="magic filter-order__radio button button_red mr10 header__btn--first" name="" id="send-filter" value="Применить">Применить</button>
                </div>
                <span class="mobile-category-text">Всего  <?=\api\models\Ads::find()->count()?> обьявлений</span>
                <?php if(!empty($ads)): ?>
                    <?php foreach ($ads as $item): ?>

                        <div class="category-card">

                            <?php if ($item->pictures == []): ?>
                                <img class="category-card__image" src='/img/no-img-big.png' alt="<?= $item->title; ?>">
                            <?php else: ?>
								<a class="" href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>">
									<img class="category-card__image" src='<?= $item->pictures[0]->img_thumb; ?>' alt="<?= $item->title; ?>" role="presentation">
								</a>
                            <?php endif; ?>

                            <div class="category-card__right">
                                <div class="category-card__head">
                                    <a class="category-card__head__name" href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>">
                                        <?= $item->title;?>
									</a>
                                    <div class="category-card__head__price">
                                        <span><?= number_format($item->price, 0, '.', ' '); ?> ₽</span>
                                        <div class="category-card__head__price__heart single-adv__like add-in-fav <?php if($item['is_f']) echo 'in-fav'?>"
                                              data-gist="ad"
                                              data-gistid="<?php if(!Yii::$app->user->isGuest){ echo $item['id'];} else echo -1?>">
                                            <i class="fa <?php if($item['is_f']) echo 'fa-heart'; else echo 'fa-heart-o';?>"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="category-card__data">Добавлено:<br> <?=\common\classes\DataTime::time($item->dt_update); ?></span>
                                <div class="category-card__description">
                                    <?=$item->content?>
                                </div>
                                <div class="category-card__bottom">
                                    <a class="d-flex align-items-center" href="#">
                                        <svg class="category-card__icon ico ico_gray">
                                            <use xlink:href="/theme/images/svg.svg#nav">
                                            </use>
                                        </svg>
                                        <span class="ml5 c-gray fz12"><?= $item['geobase_city']->name; ?></span>
                                    </a>
                                    <div class="ml-auto">
                                        <div class="single-card__detail-view">
                                            <img class="mr5" src="/theme/images/icon-eye.png" alt=""/>
                                            <span><?= $item->views; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
					<?= LinkPager::widget(
						[
							'pagination' => $pagination,
							'options' => [
								'class' => 'nav-pages',
								'tag' => 'div',
							],
							'linkContainerOptions' => [
								'tag' => 'div',
							],
							'maxButtonCount'	=>	5,
							'linkOptions' => ['class' => 'nav-pages__link',],
							'registerLinkTags' => 'a',
							'prevPageCssClass' => 'pagination-prev',
							'nextPageCssClass' => 'pagination-next',
							'prevPageLabel' => 'Назад',
							'nextPageLabel' => 'Вперед',
							'activePageCssClass' => 'active-nav-pages',

						]) ?>
                <?php else :?>
                    <h3 class="search-no-result-text">Ничего не найдено</h3>
                <?php endif;?>



                <?php /* if(Yii::$app->request->get('slug')) : ?>
                   <div class="category-mobile-all-ads d-flex justify-content-center mt20">
                       <a href="<?=\yii\helpers\Url::to(['/obyavleniya/','slug' => Yii::$app->request->get('slug')])?>" class="button button_gray button_big">Показать все объявления из этой категории</a>
                    </div>
                <?php endif; */ ?>
            </div>
            <div class="sidebar">
                <?= \frontend\modules\adsmanager\widgets\ShowVipAdsRight::widget();?>
            </div>
        </div>
    </div>
</section>
