<?php
use frontend\widgets\AuthUser;
use common\classes\Debug;
$this->title = "Доска объявлений";


?>

<section class="home-content">
    <div class="container">

        <div class="home-contents">

            <?php
            $count = 0;
            $catArr = [];
            foreach($category as $item):
            //Debug::prn($item);

            ?>
                <?php if($count == 0): ?>
                    <div class="row">
                <?php endif;?>

                    <div class="home-content-item" data-id="<?= $item['id'];?>">
                        <a href="" class="content-item-thumb">
                            <img src="<?= $item['img']; ?>" alt="">
                        </a>
                        <div class="content-item-text">
                            <a class="text-title" href=""><?= $item['name']; ?></a>
                        </div>
                    </div>

                <?php
                    $catArr[] = $item['id'];
                    $count++;
                ?>
                <?php if($count == 5):
                $count = 0;


                ?>
                    </div>
                    <?php if(!empty($catArr)):?>
                        <?php foreach($catArr as $value): ?>
                            <div class="text-about" id="button<?= $value; ?>">
                                <div class="text-about-title">
                                    <a href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $category["$value"]['slug']]); ?>"><b>Смотреть все объявления</b> в <?= $category["$value"]['name']?> </a>
                                </div>
                                <div class="text-about-links">
                                    <?php foreach($category["$value"]['childs'] as $childs): ?>
                                        <a class="text-about-link" href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $childs->slug]); ?>"><?= $childs->name; ?></a>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        <?php endforeach; ?>

                    <?php endif;?>


                <?php $catArr = []; endif;?>
            <?php   endforeach;?>


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