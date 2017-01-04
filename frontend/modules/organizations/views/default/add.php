<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 24.12.2016
 * Time: 12:24
 */

$this->title = "Добавление организации";
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
<section class="content">
    <div class="container">
        <div class="left">
            <ul class="left-menu">
                <li><a href="">Управление огранизациями </a></li>
                <li><a href="">Создание организации</a></li>
                <li><a href="">Помощь</a></li>
            </ul>
        </div>
        <div class="right">
            <h1>Создать организацию</h1>
            <form action="" class="content-organizatsii">
                <h2>Общая информация</h2>
                <div class="form-line">
                    <label class="label-name">Заголовок<span>*</span></label>
                    <input class="input-name"  type="text" required>
                    <p class="calc">
                        <small>
                            <b class="counter-placeholder">70</b> знаков осталось</small>
                    </p>

                </div>
                <label class="label-name">Категория<span>*</span></label>
        <span class="SelectCategory">
            <div class="place-ad__form select-category-add">
                Выбирите рубрику
                <span class="place-ad__form__search"></span>
            </div>
        </span>
                <div class="form-line">
                    <label class="label-name">О нас<span>*</span></label>
                    <textarea class="area-name"></textarea>
                    <p class="calc">
                        <small>
                            <b class="counter-placeholder" >4096</b> знаков осталось</small>
                    </p>
                </div>
                <h2>Ваши контактные данные</h2>
                <div class="form-line">
                    <label class="label-name">Е-mail<span>*</span></label>
                    <input class="input-small" type="email" required>
                </div>
                <div class="wrap-line">
                    <div class="form-line">
                        <label class="label-name">Местонахождение<span>*</span></label>
                        <input class="input-small" type="email" required>
                    </div>
                    <div class="form-line">
                        <label class="label-name">Телефон<span>*</span></label>
                        <input class="input-small" type="email" required>
                    </div>
                </div>
                <a href="" class="dopolnitelno"> <span class="circle-plus"></span>дополнительный адрес</a>
                <div class="form-line">
                    <label class="label-name">Сайт<span>*</span></label>
                    <input class="input-small" type="email" required>
                </div>
                <div class="form-line">
                    <label class="label-name">Режим работы<span>*</span></label>
                    <input class="input-small" type="email" required>
                </div>
                <h2>Настройте дизайн компании</h2>
                <div class="form-line">
                    <label class="label-name">Обложка компании<span>*</span></label>
                    <div class="cover-block">
                        <img src="img/cover.png" alt="">
                        <div class="cover-logo">
                            <input type="file" name="file-logo" id="file-logo" class="upload-logo" />
                            <label for="file-logo"></label>
                        </div>
                        <input type="file" name="file-cover" id="file-cover" class="upload-cover" />
                        <label for="file-cover">загрузить обложку</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
