<?php
/**
 * @var $ads common\models\db\Ads
 */

use yii\widgets\LinkPager;

$this->title = 'Объявления';
//\common\classes\Debug::prn($ads);
?>

<section class="header__bottom-ad">
    <div class="container">
        <div class="category ">
            <a class="category-item myBtn">
                <span class="category-icon">Выбрать категорию</span>
            </a>
        </div>
        <div class="ad-search">
            <span class="search-pic"></span>
            <input type="text" class="input-search-ad" placeholder="поиск по объявлениям автомобили">
            <a href="" class="adsearch-button">Поиск</a>
            <div class="ad-baner">Банер</div>
        </div>
    </div>
</section>
<section class="adcontent">
    <div class="container">
        <div class="delivery_block">
            <div class="delivery_list">
                <div id="btn"></div>
                <span>Автомобили</span></div>
            <ul class="cities_list">
                <li>Детский мир</li>
                <li>Недвижимость</li>
                <li>Транпорт</li>
                <li>Казань</li>
                <li>Ростов-на-Дону</li>
                <li>Волгоград</li>
                <li>Краснодар</li>
                <li>Саратов</li>
                <li>Самара</li>
                <li>Екатеринбург</li>
                <li>Челябинск</li>
                <li>Омск</li>
                <li>Новосибирск</li>
                <li>Красноярск</li>
                <li>Пермь</li>
                <li>Уфа</li>
            </ul>
        </div>
        <div class="yellow-block"></div>
    </div>
</section>
<section class="adcontent-main">
    <div class="container">
        <div class="ad-charasteristics">
            <form action="" class="ad-charasteristics-form">

                <label for="" class="large-label"><span class="large-label-title">Марка</span></label>
                <label for="" class="small-label"><span class="large-label-title">Марка</span></label>
                <select class="small-select small-select-1" name="">
                    <option value="">BMV</option>
                    <option value="">BMV</option>
                    <option value="">BMV</option>
                </select>
                <select class="small-select small-select-2" name="">
                    <option value="">6 серия</option>
                    <option value="">5 серия</option>
                    <option value="">BMV</option>
                </select>


                <label class="large-label" for="large-1"><span class="large-label-title">Тип кузова</span></label>
                <select class="large-select" name="" id="large-1">
                    <option value="">Микроавтобус</option>
                    <option value="">Грузовик</option>
                    <option value="">самокат</option>
                </select>
                <label class="large-label" for="large-2"><span class="large-label-title">Пробег тыс. км</span></label>
                <select class="large-select" name="" id="large-2">
                    <option value="">Микроавтобус</option>
                    <option value="">Грузовик</option>
                    <option value="">самокат</option>
                </select>
                <label class="large-label" for="large-3"><span class="large-label-title">Коробка передач</span></label>
                <select class="large-select" name="" id="large-3">
                    <option value="">Микроавтобус</option>
                    <option value="">Грузовик</option>
                    <option value="">самокат</option>
                </select>
                <label class="large-label" for="large-4"><span class="large-label-title">Тип двигателя</span></label>
                <select class="large-select" name="" id="large-4">
                    <option value="">Микроавтобус</option>
                    <option value="">Грузовик</option>
                    <option value="">самокат</option>
                </select>
                <label class="large-label" for="large-5"><span class="large-label-title">Объем двигателя л.</span></label>
                <select class="large-select" name="" id="large-5">
                    <option value="">Микроавтобус</option>
                    <option value="">Грузовик</option>
                    <option value="">самокат</option>
                </select>
            </form>
            <form action="" class="ad-charasteristics-form-type">
                <h3 class="ad-charasteristics-form-type-title">Тип:</h3>
				<span class="line-type"><input id="type-1" type="checkbox" class="input-checkbox">
					<label for="type-1" class="label-checkbox"></label>
					<p class="text-type">все</p>
				</span>
				<span class="line-type"><input id="type-2" type="checkbox" class="input-checkbox">
					<label for="type-2" class="label-checkbox"></label>
					<p class="text-type">частные</p>
				</span>
				<span class="line-type"><input id="type-3" type="checkbox" class="input-checkbox">
					<label for="type-3" class="label-checkbox"></label>
					<p class="text-type">бизнес</p>
				</span>
            </form>
            <form action=""  class="ad-charasteristics-form-dop">
                <h3 class="ad-charasteristics-form-type-title">Дополнительно:</h3>
				<span class="line-type">
					<input id="dop-1" type="radio" class="input-checkbox">
					<label for="dop-1" class="label-checkbox"></label>
					<p class="text-type">только с фото</p>
				</span>
				<span class="line-type">
					<input id="dop-2" type="radio" class="input-checkbox">
					<label for="dop-2" class="label-checkbox"></label>
					<p class="text-type">по названиям</p>
				</span>
            </form>
            <form action=""  class="ad-charasteristics-form-priece">
                <h3 class="ad-charasteristics-form-type-title">Стоимость:</h3>

            </form>
        </div>
        <div class="ad-content-main">
            <div class="nachalo">
                <p>в начале:</p>
                <a class="price-category" data-method="post" href="<?= \yii\helpers\Url::to(['index'])?>">самые новые</a>
                <a class="price-category" data-method="post" href="<?= \yii\helpers\Url::to(['index', 'sort' => 'cheap'])?>">дешевые</a>
                <a class="price-category" data-method="post" href="<?= \yii\helpers\Url::to(['index', 'sort' => 'dear'])?>">дорогие</a>
            </div>
            <div class="search-map">
                <p><span class="geo-pic"></span>Поиск объявлений на карте <span class="rect-new">new</span></p>
            </div>
            <div class="average-ad">
                <?php foreach($ads as $item): ?>
                    <div class="average-ad-item">
                        <a href="" class="average-ad-item-thumb">
                            <img src="/<?= $item['ads_img'][0]->img_thumb; ?>" alt=""/>
                        </a>
                        <div class="average-ad-item-content">
                            <span class="average-ad-star active-star-icon  "></span>
                            <p class="average-ad-time"><?= \common\classes\DataTime::time($item->dt_update); ?></p>
                            <?php
                                $listcat = \common\classes\AdsCategory::getListCategory($item->category_id, []);
                                $listcat = array_reverse($listcat);
                                array_shift($listcat);
                            $k = 1;
                                foreach($listcat as $val): ?>
                                    <a href="" class="average-ad-category"><?= $val; ?></a>
                                    <?= ($k == count($listcat)) ? '' : '<span class="separatorListCategory">|</span>'?>


                                <?php $k++; endforeach; ?>

                            <a href="" class="average-ad-title"><?= $item->title; ?></a>
                            <p class="average-ad-geo">
                                <span class="geo-space"></span>
                                <a class="addressAds" href=""><?= $item['geobase_region'][0]->name; ?> | </a>
                                <a class="addressAds" href=""><?= $item['geobase_city'][0]->name; ?></a>
                            </p>
                            <span class="average-ad-price"><?= $item->price; ?> &#8381;</span>
                        </div>
                    </div>
                <?php endforeach; ?>


               <!-- <div class="average-ad-item">
                    <a href="" class="average-ad-item-thumb">
                        <img src="img/adpic-2.png" alt=""/>
                    </a>
                    <div class="average-ad-item-content">
                        <span class="average-ad-star star-icon "></span>
                        <p class="average-ad-time">Сегодня 20:00</p><a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                        <a href="" class="average-ad-title">2-х комнатная квартира, 63 м², 2/5 этаж</a>
                        <p class="average-ad-geo"> <span class="geo-space"></span>Речной вокзал 1.9 км, ул. Дыбенко д.16 корп.1</p>
                        <span class="average-ad-price">2 500 000 &#8381;</span>
                    </div>
                </div>
                <div class="average-ad-item">
                    <a href="" class="average-ad-item-thumb">
                        <img src="img/adpic-3.png" alt=""/>
                    </a>
                    <div class="average-ad-item-content">
                        <span class="average-ad-star star-icon "></span>
                        <p class="average-ad-time">Сегодня 20:00</p><a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                        <a href="" class="average-ad-title">2-х комнатная квартира, 63 м², 2/5 этаж</a>
                        <p class="average-ad-geo"> <span class="geo-space"></span>Речной вокзал 1.9 км, ул. Дыбенко д.16 корп.1</p>
                        <span class="average-ad-price">5 500 000 &#8381;</span>
                    </div>
                </div>
                <div class="average-ad-item">
                    <a href="" class="average-ad-item-thumb">
                        <img src="img/adpic-2.png" alt=""/>
                    </a>
                    <div class="average-ad-item-content">
                        <span class="average-ad-star star-icon "></span>
                        <p class="average-ad-time">Сегодня 20:00</p><a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                        <a href="" class="average-ad-title">2-х комнатная квартира, 63 м², 2/5 этаж</a>
                        <p class="average-ad-geo"> <span class="geo-space"></span>Речной вокзал 1.9 км, ул. Дыбенко д.16 корп.1</p>
                        <span class="average-ad-price">2 500 000 &#8381;</span>
                    </div>
                </div>
                <div class="average-ad-item">
                    <a href="" class="average-ad-item-thumb">
                        <img src="img/adpic-1.png" alt=""/>
                    </a>
                    <div class="average-ad-item-content">
                        <span class="average-ad-star star-icon "></span>
                        <p class="average-ad-time">Сегодня 20:00</p><a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                        <a href="" class="average-ad-title">2-х комнатная квартира, 63 м², 2/5 этаж</a>
                        <p class="average-ad-geo"> <span class="geo-space"></span>Речной вокзал 1.9 км, ул. Дыбенко д.16 корп.1</p>
                        <span class="average-ad-price">2 500 000 &#8381;</span>
                    </div>
                </div>-->
            </div>
            <div class="vip-ad">
                <h2 class="title-vip-ad">VIP - объявления</h2>
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
                <a href="" class="whatisVIP">Что такое VIP - объявления?</a>
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
            <div class="link-category-ad">
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
            </div>
            <div class="seo-text">
                <p>Бесплатные объявления России на Bixti.ru - здесь вы найдете то, что искали! Нажав на кнопку "Подать объявление", вы перейдете на форму, заполнив которую сможете разместить объявление на любую необходимую тематику абсолютно бесплатно и легко. С помощью сайта объявлений Bixti.ru вы можете купить или продать из рук в руки практически все, что угодно</p>
            </div>
        </div>
    </div>
</section>
