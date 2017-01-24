<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 24.12.2016
 * Time: 12:46
 * @var $org \common\models\db\CategoryOrganizations
 */
?>

<section class="header__bottom-home ">
    <div class="container">
        <div class="header__bottom-home-left">
            <!-- <a class="category-item">
                <span class="category-icon">Выбрать категорию</span>
            </a> -->
            <div class="category ">
                <div class="delivery_block1">

                    <div class="delivery_list1">
                        <span class="category-icon"></span>

                        <span class="select-category">Выбрать категорию</span></div>
                    <ul class="cities_list1">
                        <?php foreach ($org as $item): ?>
                            <li><?= $item->name ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div>
        <form class="header__bottom-home-right">
            <input type="text" class="input-search" placeholder="Введите для поиска">
            <div class="region"><span class="location-mark"></span> Выберите область
                <div class="region-list">
                    <span class="republic">ДНР</span>
                    <span class="republic">ЛНР</span>
                    <span class="russia">Росссия</span>
                    <div class="russia-list">
                        <ul>
                            <span class="republic">московская область</span>
                            <span class="republic">ростовская область</span>
                            <span class="republic">калужская облшать</span>
                            <span class="republic">ленинградская область</span>
                            <span class="republic">курская область</span>
                            <span class="republic">белгородская область</span>
                            <span class="republic">тульская область</span>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="city"><span class="hotel-icon"></span> Выбрать город
                <div class="city-list">
                    <ul>
                        <span class="republic">Балашиха</span>
                        <span class="republic">Бронницы</span>
                        <span class="republic">Домодеово</span>
                        <span class="republic">Дубна</span>
                        <span class="republic">Кашира</span>
                        <span class="republic">Мытищи</span>
                        <span class="republic">Озёры</span>
                        <span class="republic">Подольск</span>
                        <span class="republic">Дубна</span>
                        <span class="republic">Кашира</span>
                        <span class="republic">Мытищи</span>
                        <span class="republic">Озёры</span>
                        <span class="republic">Подольск</span>

                    </ul>
                </div>
            </div>
            <button href="" class="button-search">Найти</button>
        </form>
    </div>
</section>
