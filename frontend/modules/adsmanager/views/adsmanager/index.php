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
    <div class="mobile-filter jsMobileFilter">
        <button class="mobile-filter__close jsCloseFilter"><span></span><span></span>
        </button>
        <h2 class="mobile-filter__head">Фильтр
        </h2>
        <div class="mobile-filter__private-dealers">
            <button class="jsActivePrivateDealers active-private-dealers">Все
            </button>
            <button class="jsActivePrivateDealers">Частные
            </button>
            <button class="jsActivePrivateDealers">Автодилеры
            </button>
        </div>
        <div class="mark filter-style jsShowFilterOpen" data-sethtml="mark">
            <p>Марка
            </p><span class="btn-arrow jsSetFlag">Все</span>
        </div>
        <div class="mobile-filter-open jsHideFilterOpen">
            <button class="mobile-filter-open__close jsCloseFilterAll"><span></span><span></span>
            </button>
            <h2 class="mobile-filter-open__head">Марка
            </h2>
            <div class="mobile-filter-open__block jsSearchFlag" data-flag="mark">
                <button class="jsShowFlag">AC
                </button>
                <button class="jsShowFlag">Acura
                </button>
                <button class="jsShowFlag">Alfa Romeo
                </button>
                <button class="jsShowFlag">Alpina
                </button>
                <button class="jsShowFlag">AM General
                </button>
                <button class="jsShowFlag">Ariel
                </button>
            </div>
            <!--+e('button').ok.jsSetHtml ОК-->
        </div>
        <div class="model filter-style jsShowFilterOpen" data-sethtml="model">
            <p>Модель
            </p><span class="btn-arrow jsSetFlag">Все</span>
        </div>
        <div class="mobile-filter-open jsHideFilterOpen">
            <button class="mobile-filter-open__close jsCloseFilterAll"><span></span><span></span>
            </button>
            <h2 class="mobile-filter-open__head">Модель
            </h2>
            <div class="mobile-filter-open__block jsSearchFlag" data-flag="model">
                <button class="jsShowFlag">AC
                </button>
                <button class="jsShowFlag">Acura
                </button>
                <button class="jsShowFlag">Alfa Romeo
                </button>
                <button class="jsShowFlag">Alpina
                </button>
                <button class="jsShowFlag">AM General
                </button>
                <button class="jsShowFlag">Ariel
                </button>
            </div>
            <!--+e('button').ok.jsSetHtml ОК-->
        </div>
        <div class="carcase filter-style jsShowFilterOpen" data-sethtml="carcase">
            <p>Тип кузова
            </p><span class="btn-arrow jsSetFlag">Любой</span>
        </div>
        <div class="mobile-filter-open jsHideFilterOpen">
            <button class="mobile-filter-open__close jsCloseFilterAll"><span></span><span></span>
            </button>
            <h2 class="mobile-filter-open__head">Тип кузова
            </h2>
            <div class="mobile-filter-open__block jsSearchFlag" data-flag="carcase">
                <button class="jsShowFlag">AC
                </button>
                <button class="jsShowFlag">Acura
                </button>
                <button class="jsShowFlag">Alfa Romeo
                </button>
                <button class="jsShowFlag">Alpina
                </button>
                <button class="jsShowFlag">AM General
                </button>
                <button class="jsShowFlag">Ariel
                </button>
            </div>
            <!--+e('button').ok.jsSetHtml ОК-->
        </div>
        <div class="box filter-style jsShowFilterOpen" data-sethtml="box">
            <p>Коробка
            </p><span class="btn-arrow jsSetFlag">Любая</span>
        </div>
        <div class="mobile-filter-open jsHideFilterOpen">
            <button class="mobile-filter-open__close jsCloseFilterAll"><span></span><span></span>
            </button>
            <h2 class="mobile-filter-open__head">Коробка
            </h2>
            <div class="mobile-filter-open__block jsSearchFlag" data-flag="box">
                <button class="jsShowFlag">AC
                </button>
                <button class="jsShowFlag">Acura
                </button>
                <button class="jsShowFlag">Alfa Romeo
                </button>
                <button class="jsShowFlag">Alpina
                </button>
                <button class="jsShowFlag">AM General
                </button>
                <button class="jsShowFlag">Ariel
                </button>
            </div>
            <!--+e('button').ok.jsSetHtml ОК-->
        </div>
        <div class="engine filter-style jsShowFilterOpen" data-sethtml="engine">
            <p>Тип двигателя
            </p><span class="btn-arrow jsSetFlag">Любой</span>
        </div>
        <div class="mobile-filter-open jsHideFilterOpen">
            <button class="mobile-filter-open__close jsCloseFilterAll"><span></span><span></span>
            </button>
            <h2 class="mobile-filter-open__head">Тип двигателя
            </h2>
            <div class="mobile-filter-open__block jsSearchFlag" data-flag="engine">
                <button class="jsShowFlag">AC
                </button>
                <button class="jsShowFlag">Acura
                </button>
                <button class="jsShowFlag">Alfa Romeo
                </button>
                <button class="jsShowFlag">Alpina
                </button>
                <button class="jsShowFlag">AM General
                </button>
                <button class="jsShowFlag">Ariel
                </button>
            </div>
            <!--+e('button').ok.jsSetHtml ОК-->
        </div>
        <div class="filter-price filter-style jsShowFilterOpen">
            <p>Цена
            </p><span class="btn-arrow jsSetPrice">Любая</span>
        </div>
        <div class="mobile-filter-open jsHideFilterOpen">
            <button class="mobile-filter-open__close jsCloseFilterAll"><span></span><span></span>
            </button>
            <h2 class="mobile-filter-open__head">Цена, руб
            </h2>
            <div class="mobile-filter-open__inputs filter__price jsSearchPrice">
                <div class="mobile-filter-open__inputs__inp">
                    <input class="jsFromPrice" type="number"/>
                </div>
                <div class="mobile-filter-open__inputs__inp">
                    <input class="jsToPrice" type="number"/>
                </div>
            </div>
            <button class="mobile-filter-open__ok jsGetPrice">ОК
            </button>
        </div>
        <div class="mobile-filter__buttons">
            <button class="mobile-filter__buttons__reset jsResetFilter">Сбросить
            </button>
            <button class="mobile-filter__buttons__show jsShowAllProducts">Показать 48 300
            </button>
        </div>
    </div>
    <div class="container">
        <div class="d-flex align-items-start category-block">
            <?= \frontend\modules\adsmanager\widgets\ShowFilterAds::widget(); ?>
            <div class="tab-content mobile-tab-content">
                <div class="tab-item" id="oldCar">
                    <div class="category__tab-item">
                    </div>
                </div>
                <div class="tab-item tab-item-active" id="newCar">
                    <div class="category__tab-item">
                        <div class="select mb10">
                            <select class="select2-js" data-placeholder="Легковые автомобили">
                                <option></option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                            </select>
                        </div>
                        <div class="select mb10">
                            <select class="select2-js" data-placeholder="Марка">
                                <option></option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                            </select>
                        </div>
                        <div class="select mb10">
                            <select class="select2-js" data-placeholder="Модель">
                                <option></option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                            </select>
                        </div>
                        <div class="select mb10">
                            <select class="select2-js" data-placeholder="Тип кузова">
                                <option></option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                            </select>
                        </div>
                        <div class="select mb10">
                            <select class="select2-js" data-placeholder="Коробка">
                                <option></option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                            </select>
                        </div>
                        <div class="select mb10">
                            <select class="select2-js" data-placeholder="Типы двигателя">
                                <option></option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                                <option>AC</option>
                                <option>Acura</option>
                                <option>Alfa Romeo</option>
                                <option>Alpina</option>
                                <option>AM General</option>
                                <option>Ariel</option>
                            </select>
                        </div>
                        <div class="hr mt15 mb25"></div>
                        <div class="category__price">
                            <input type="number" placeholder="Цена от, ₽"/>
                            <input type="number" placeholder="до"/>
                        </div>
                        <div class="hr mt25 mb20"></div>
                        <div class="d-flex justify-content-between">
                            <label class="checkbox checkbox-normal mt5 mb5">
                                <input type="checkbox"/><span class="checkbox__main"><i class="fa fa-check"></i></span><span>Частные</span>
                            </label>
                            <label class="checkbox checkbox-normal mt5 mb5">
                                <input type="checkbox"/><span class="checkbox__main"><i class="fa fa-check"></i></span><span>Автодилеры</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-sort">
                <div class="mobile-sort__mark"><span>Марка</span>
                    <button class="btn-arrow">Все
                    </button>
                </div>
                <div class="mobile-sort__block">
                    <div class="mobile-sort__filter sidebar-filter">
                        <button class="jsSort"><img src="/theme/images/svg/sort.svg" alt="" role="presentation"/>Сортировка
                        </button>
                        <button class="jsFilter"><img src="/theme/images/svg/filtr.svg" alt="" role="presentation"/>Еще фильтры
                        </button>
                    </div>
                </div>
            </div>
            <div class="category__main">
                <div class="filter-order jsShowSort">
                    <div class="sort-overlay jsCloseSort">
                    </div>
                    <label class="filter-order__radio checkbox checkbox-normal jsCloseSort"><input type="radio" name="sort"/><span class="checkbox__main"><i class="fa fa-check"></i></span>По умолчанию
                    </label>
                    <label class="filter-order__radio checkbox checkbox-normal jsCloseSort"><input type="radio" name="sort"/><span class="checkbox__main"><i class="fa fa-check"></i></span><pre class="filter-order__radio__arrow">Новые        старые</pre>
                    </label>
                    <label class="filter-order__radio checkbox checkbox-normal jsCloseSort"><input type="radio" name="sort"/><span class="checkbox__main"><i class="fa fa-check"></i></span>Дешевле
                    </label>
                    <label class="filter-order__radio checkbox checkbox-normal jsCloseSort"><input type="radio" name="sort"/><span class="checkbox__main"><i class="fa fa-check"></i></span>Дороже
                    </label>
                </div>
                <span class="mobile-category-text">Всего  <?=\api\models\Ads::find()->count()?> обьявлений</span>
                <?php if(!empty($ads)): ?>
                    <?php foreach ($ads as $item): ?>

                        <div class="category-card">

                            <?php if (empty($item['ads_img'])): ?>
                                <img class="category-card__image" src='/img/no-img.png' alt="<?= $item->title; ?>">
                            <?php else: ?>
                                <img class="category-card__image" src='<?= $item['ads_img'][0]->img_thumb; ?>' alt="<?= $item->title; ?>" role="presentation">
                            <?php endif; ?>

                            <div class="category-card__right">
                                <div class="category-card__head">
                                    <a class="category-card__head__name" href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view', 'slug' => $item->slug]) ?>">
                                        <?= $item->title;?></a>
                                    <div class="category-card__head__price">
                                        <span><?= number_format($item->price, 0, '.', ' '); ?> ₽</span>
                                        <div class="category-card__head__price__heart single-adv__like add-in-fav <?php if($item['is_f']) echo 'in-fav'?>"
                                              data-gist="ad"
                                              data-gistid="<?php if(!Yii::$app->user->isGuest){ echo $item['id'];} else echo -1?>">
                                            <i class="fa <?php if($item['is_f']) echo 'fa-heart-o'; else echo 'fa-heart';?>"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="category-card__data">Добавлено:<br> <?=\common\classes\DataTime::time($item->dt_update); ?></span>
                                <div class="category-card__description">
                                    <?php foreach ($item['ads_fields_value'] as $value): ?>
                                            <span><?= $value->value ?></span>
                                    <?php endforeach; ?>
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
                <?php endif;?>

                <?= LinkPager::widget(
                    [
                        'pagination' => $pagination,
                        'options' => [
                            'class' => 'nav-pages',
                            'tag' => 'div',
                        ],
                        'linkContainerOptions' => [
                            'tag' => 'a',
                        ],
                        'linkOptions' => ['class' => 'nav-pages__link',],
                        'registerLinkTags' => 'a',
                        'prevPageCssClass' => 'pagination-prew',
                        'nextPageCssClass' => 'pagination-next',
                        'prevPageLabel' => 'Назад',
                        'nextPageLabel' => 'Вперед',
                        'activePageCssClass' => 'active-nav-pages',

                    ]) ?>
                <div class="category-mobile-all-ads d-flex justify-content-center mt20">
                    <button class="button button_gray button_big">Показать все объявления из этой категории</button>
                </div>
            </div>
            <div class="sidebar">
                <?= \frontend\modules\adsmanager\widgets\ShowVipAdsRight::widget();?>

            </div>
        </div>
    </div>
</section>
