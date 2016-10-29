<?php
use frontend\widgets\AuthUser;

$this->title = "Доска объявлений";


?>


<section class="home-content">
    <div class="container">
        <div class="home-contents">

            <?php foreach($category as $item): ?>
                <div class="home-content-item">
                    <a href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $item['slug']]); ?>" class="content-item-thumb">
                        <img src="<?= $item['img']; ?>" alt="">
                    </a>
                    <div class="content-item-text">
                        <a href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $item['slug']]); ?>" class="text-title" href=""><?= $item['name']; ?></a>
                        <p class="text-about">
                            <?php foreach($item['childs'] as $key=>$value): ?>
                                <a class="text-about-link" href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $value->slug]); ?>"><?= $value->name; ?><?= ($key == count($item['childs'])-1) ? '' : ', '?></a>

                            <?php endforeach ?>
                        </p>
                    </div>
                </div>
            <?php endforeach;?>



        </div>
    </div>
</section>

<section class="home-content">
    <div class="container">

        <div class="home-contents">
            <div class="row">
                <div class="home-content-item" data-id="1">
                    <a href="" class="content-item-thumb">
                        <img src="img/car.png" alt="">
                    </a>
                    <div class="content-item-text">
                        <a class="text-title" href="">Транспорт</a>
                    </div>
                </div>
                <div class="home-content-item" data-id="2">
                    <a href="" class="content-item-thumb">
                        <img src="img/furniture.png" alt="">
                    </a>
                    <div class="content-item-text">
                        <a class="text-title" href="">Для дома и дачи</a>
                        <!--<p class="text-about">Ремонт и строительство, Мебель и интерьер, Бытовая техника, Продукты питания, Посуда и товары для кухни, Растения</p> -->
                    </div>
                </div>
                <div class="home-content-item" data-id="3">
                    <a href="" class="content-item-thumb">
                        <img src="img/house.png" alt="">
                    </a>
                    <div class="content-item-text">
                        <a class="text-title" href="">Недвижтмость</a>
                        <!-- <p class="text-about">Комнаты, Квартиры, Дома, дачи, коттеджи, Земельные участки, Коммерческая недвижимость, Гаражи и машиноместа, Недвижимость за рубежом</p> -->
                    </div>
                </div>
                <div class="home-content-item" data-id="4">
                    <a href="" class="content-item-thumb">
                        <img src="img/diamond.png" alt="">
                    </a>
                    <div class="content-item-text">
                        <a class="text-title" href="">Мода и стиль</a>
                        <!-- <p class="text-about">Одежда, обувь, аксессуары, Часы и украшения, Детская одежда и обувь, Красота и здоровье</p> -->
                    </div>
                </div>
                <div class="home-content-item" data-id="5">
                    <div class="content-item-thumb">
                        <img src="img/comp.png" alt="">
                    </div>
                    <div class="content-item-text">
                        <a  class="text-title" href="">Бытовая электрониика</a>
                        <!-- <p class="text-about">Настольные компьютеры, Аудио и видео, Телефоны, Планшеты и электронные книги, Игры, приставки и программы, Ноутбуки, Оргтехника и расходники, Товары для компьютера, Фототехника</p> -->
                    </div>
                </div>
            </div>

            <div class="text-about" id="button1">
                <div class="text-about-title">
                    <a href=""><b>Смотреть все объявления</b> в Детский мир </a>
                </div>
                <div class="text-about-links">
                    <a class="text-about-link" href="">Запчасти и аксессуары</a>
                    <a class="text-about-link" href=""> Автомобили </a>
                    <a class="text-about-link" href="">Водный транспорт</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                </div>
            </div>

            <div class="text-about" id="button2">
                <div class="text-about-title">
                    <a href=""><b>Смотреть все объявления</b> в Детский мир </a>
                </div>
                <div class="text-about-links">
                    <a class="text-about-link" href="">Запчасти и аксессуары</a>
                    <a class="text-about-link" href=""> Автомобили </a>
                    <a class="text-about-link" href="">Водный транспорт</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                </div>
            </div>

            <div class="text-about" id="button3">
                <div class="text-about-title">
                    <a href=""><b>Смотреть все объявления</b> в Детский мир </a>
                </div>
                <div class="text-about-links">
                    <a class="text-about-link" href="">Запчасти и аксессуары</a>
                    <a class="text-about-link" href=""> Автомобили </a>
                    <a class="text-about-link" href="">Водный транспорт</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                </div>
            </div>

            <div class="text-about" id="button4">
                <div class="text-about-title">
                    <a href=""><b>Смотреть все объявления</b> в Детский мир </a>
                </div>
                <div class="text-about-links">
                    <a class="text-about-link" href="">Запчасти и аксессуары</a>
                    <a class="text-about-link" href=""> Автомобили </a>
                    <a class="text-about-link" href="">Водный транспорт</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                </div>
            </div>

            <div class="text-about" id="button5">
                <div class="text-about-title">
                    <a href=""><b>Смотреть все объявления</b> в Детский мир </a>
                </div>
                <div class="text-about-links">
                    <a class="text-about-link" href="">Запчасти и аксессуары</a>
                    <a class="text-about-link" href=""> Автомобили </a>
                    <a class="text-about-link" href="">Водный транспорт</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                </div>
            </div>
            <div class="row">
                <div class="home-content-item" data-id="6">
                    <a href="" class="content-item-thumb">
                        <img src="img/xobbi.png" alt="">
                    </a>
                    <div class="content-item-text">
                        <a class="text-title" href="">Хобби,отдых и спорт</a>
                        <!-- <p class="text-about">Билеты и путешествия, Велосипеды, Коллекционирование, Музыкальные инструменты, Спорт и отдых, Книги и журналы, Охота и рыбалка, Знакомства</p> -->
                    </div>
                </div>
                <div class="home-content-item" data-id="7">
                    <a href="" class="content-item-thumb">
                        <img src="img/target.png" alt="">
                    </a>
                    <div class="content-item-text">
                        <a class="text-title" href="">Бизнес и услуги</a>
                        <!-- <p class="text-about">Оборудование для бизнеса, Готовый бизнес</p> -->
                    </div>
                </div>
                <div class="home-content-item" data-id="8">
                    <a href="" class="content-item-thumb">
                        <img src="img/animal.png" alt="">
                    </a>
                    <div class="content-item-text">
                        <a class="text-title" href="">Животные</a>
                        <!-- <p class="text-about">Собаки, Кошки, Птицы, Аквариум, Другие животные, Товары для животных</p> -->
                    </div>
                </div>
                <div class="home-content-item" data-id="9">
                    <a href="" class="content-item-thumb">
                        <img src="img/work.png" alt="">
                    </a>
                    <div class="content-item-text">
                        <a class="text-title" href="">Работа</a>
                        <!-- <p class="text-about">Вакансии Резюме</p> -->
                    </div>
                </div>
                <div class="home-content-item" data-id="10">
                    <a href="" class="content-item-thumb">
                        <img src="img/soska.png" alt="">
                    </a>
                    <div class="content-item-text">
                        <a class="text-title" href="">Детский мир</a>
                        <!-- <p class="text-about">Детская одежда</p> -->
                    </div>
                </div>
            </div>
            <div class="text-about" id="button6">
                <div class="text-about-title">
                    <a href=""><b>Смотреть все объявления</b> в Детский мир </a>
                </div>
                <div class="text-about-links">
                    <a class="text-about-link" href="">Запчасти и аксессуары</a>
                    <a class="text-about-link" href=""> Автомобили </a>
                    <a class="text-about-link" href="">Водный транспорт</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                </div>
            </div>

            <div class="text-about" id="button7">
                <div class="text-about-title">
                    <a href=""><b>Смотреть все объявления</b> в Детский мир </a>
                </div>
                <div class="text-about-links">
                    <a class="text-about-link" href="">Запчасти и аксессуары</a>
                    <a class="text-about-link" href=""> Автомобили </a>
                    <a class="text-about-link" href="">Водный транспорт</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                </div>
            </div>

            <div class="text-about" id="button8">
                <div class="text-about-title">
                    <a href=""><b>Смотреть все объявления</b> в Детский мир </a>
                </div>
                <div class="text-about-links">
                    <a class="text-about-link" href="">Запчасти и аксессуары</a>
                    <a class="text-about-link" href=""> Автомобили </a>
                    <a class="text-about-link" href="">Водный транспорт</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                </div>
            </div>

            <div class="text-about" id="button9">
                <div class="text-about-title">
                    <a href=""><b>Смотреть все объявления</b> в Детский мир </a>
                </div>
                <div class="text-about-links">
                    <a class="text-about-link" href="">Запчасти и аксессуары</a>
                    <a class="text-about-link" href=""> Автомобили </a>
                    <a class="text-about-link" href="">Водный транспорт</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                </div>
            </div>

            <div class="text-about" id="button10">
                <div class="text-about-title">
                    <a href=""><b>Смотреть все объявления</b> в Детский мир </a>
                </div>
                <div class="text-about-links">
                    <a class="text-about-link" href="">Запчасти и аксессуары</a>
                    <a class="text-about-link" href=""> Автомобили </a>
                    <a class="text-about-link" href="">Водный транспорт</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                    <a class="text-about-link" href="">Мотоциклы и мототехника</a>
                    <a class="text-about-link" href="">Грузовики и спецтехника</a>
                </div>
            </div>
        </div>
    </div>
</section>


<?= \frontend\modules\adsmanager\widgets\ShowHomeAds::widget(); ?>
<section class="new-organization">
    <div class="container">
        <h3>Новые организации</h3>
        <a href="">смотреть еще</a>
        <div class="org">
            <div class="org-items">
                <a href="#" class="slide-link">
                    <img src='img/car2.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
            </div>
            <div class="org-items">
                <a href="#" class="slide-link">
                    <img src='img/car3.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
            </div>
            <div class="org-items">
                <a href="#" class="slide-link">
                    <img src='img/car4.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
            </div>
            <div class="org-items">
                <a href="#" class="slide-link">
                    <img src='img/car2.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
            </div>
            <div class="org-items">
                <a href="#" class="slide-link">
                    <img src='img/car1.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
            </div>
            <div class="org-items">
                <a href="#" class="slide-link">
                    <img src='img/car1.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="specials">
    <div class="container">
        <h3>Новые организации</h3>
        <a href="">смотреть еще</a>
        <div class="specials-row">
            <div class="specials-items">
                <div class="specials-items-thumb">
                    <img src="img/skidka.png" alt="">
                    <span class="percent"> -30%</span>
                    <span class="vip">VIP</span>
					<span class="offer">
						<p>Москва   ВДНХ  Домодедовская   Марьино  Южная <br>Время продаж ограничено!</p>
						<a href="" class="more-offer">Подробнее</a>
					</span>
                </div>
                <div class="specials-items-title">
                    <h3>Название акции</h3>
                    <p>1500<span class="yellow-triangle">1200</span></p>

                </div>
            </div>
            <div class="specials-items">
                <div class="specials-items-thumb">
                    <img src="img/skidka.png" alt="">
                    <span class="percent"> -30%</span>
                    <span class="vip">VIP</span>
					<span class="offer">
						<p>Москва   ВДНХ  Домодедовская   Марьино  Южная <br>Время продаж ограничено!</p>
						<a href="" class="more-offer">Подробнее</a>
					</span>
                </div>
                <div class="specials-items-title">
                    <h3>Название акции</h3>
                    <p>1500<span class="yellow-triangle">1200</span></p>

                </div>
            </div>
            <div class="specials-items">
                <div class="specials-items-thumb">
                    <img src="img/skidka.png" alt="">
                    <span class="percent"> -30%</span>
                    <span class="vip">VIP</span>
					<span class="offer">
						<p>Москва   ВДНХ  Домодедовская   Марьино  Южная <br>Время продаж ограничено!</p>
						<a href="" class="more-offer">Подробнее</a>
					</span>
                </div>
                <div class="specials-items-title">
                    <h3>Название акции</h3>
                    <p>1500<span class="yellow-triangle">1200</span></p>

                </div>
            </div>
            <div class="specials-items">
                <div class="specials-items-thumb">
                    <img src="img/skidka.png" alt="">
                    <span class="percent"> -30%</span>
                    <span class="vip">VIP</span>
					<span class="offer">
						<p>Москва   ВДНХ  Домодедовская   Марьино  Южная <br>Время продаж ограничено!</p>
						<a href="" class="more-offer">Подробнее</a>
					</span>
                </div>
                <div class="specials-items-title">
                    <h3>Название акции</h3>
                    <p>1500<span class="yellow-triangle">1200</span></p>

                </div>
            </div>
        </div>
    </div>
</section>