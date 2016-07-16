<?php
use frontend\widgets\AuthUser;

$this->title = "Доска объявлений";


?>

<section class="header__bottom-home">
    <div class="container">
        <div class="header__bottom-home-left">
            <a class="category-item myBtn">
                <span class="category-icon">Выбрать категорию</span>
            </a>
        </div>
        <div class="header__bottom-home-right">
            <input type="text" class="input-search" placeholder="Введите для поиска">
            <a href="" class="button-search">Найти</a>
        </div>
    </div>
</section>
<section class="home-content">
    <div class="container">
        <div class="home-contents">

            <?php foreach($category as $item): ?>
                <div class="home-content-item">
                    <a href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $item['slug']]); ?>" class="content-item-thumb">
                        <img src="<?= $item['img']; ?>" alt="">
                    </a>
                    <div class="content-item-text">
                        <a href="<?= $item['slug']; ?>" class="text-title" href=""><?= $item['name']; ?></a>
                        <p class="text-about">
                            <?php foreach($item['childs'] as $key=>$value):?>
                                <a class="text-about-link" href="<?= $value->slug?>"><?= $value->name; ?></a>
                                <?= ($key == count($item['childs'])-1) ? '' : ','?>
                            <?php endforeach ?>
                        </p>
                    </div>
                </div>
            <?php endforeach;?>



        </div>
    </div>
</section>
<section class="home-slider">
    <div class="container">
        <h3>Лучшее на сегодня</h3>
        <a href="">смотреть еще</a>
        <div class="owl-model">
            <div class="slide">
                <a href="#" class="slide-link">
                    <img src='img/car1.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
                <p>1 250 000 &#8381;</p>
            </div>
            <div class="slide">
                <a href="#" class="slide-link">
                    <img src='img/car2.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
                <p>1 250 000 &#8381;</p>
            </div>
            <div class="slide">
                <a href="#" class="slide-link">
                    <img src='img/car3.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
                <p>1 250 000 &#8381;</p>
            </div>
            <div class="slide">
                <a href="#" class="slide-link">
                    <img src='img/car4.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
                <p>1 250 000 &#8381;</p>
            </div>
            <div class="slide">
                <a href="#" class="slide-link">
                    <img src='img/car2.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
                <p>1 250 000 &#8381;</p>
            </div>
            <div class="slide">
                <a href="#" class="slide-link">
                    <img src='img/car1.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
                <p>1 250 000 &#8381;</p>
            </div>
            <div class="slide">
                <a href="#" class="slide-link">
                    <img src='img/car1.png' alt="">
                    <h4>Mercedes-Benz C-класс 1.6 AT, 2011, седан</h4>
                </a>
                <p>1 250 000 &#8381;</p>
            </div>
        </div>
    </div>
</section>
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