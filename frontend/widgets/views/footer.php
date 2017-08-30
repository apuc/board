<?php
use yii\helpers\Url;
?>


<section class="footer">
    <h2><b>Rubon—</b> сайт объявлений и организаций вашего города. </h2>
    <div class="container">

        <p>Бесплатные объявления ДНР, ЛНР, России на rub-on.ru - здесь вы найдете то, что искали! Нажав на кнопку "Подать объявление", вы перейдете на форму, заполнив которую сможете разместить объявление на любую необходимую тематику абсолютно бесплатно и легко. С помощью сайта объявлений rub-on.ru вы можете купить или продать из рук в руки практически все, что угодно.</p>
        <div class="footer__left">
            <?php if(Yii::$app->controller->module->id == 'mainpage'):?>
                <span class="logo-icon">
                    <img src="/img/Logotip_RUBON.png" alt="">
                </span>
            <?php else: ?>
                <a class="logo-icon" href="/">
                    <img src="/img/Logotip_RUBON.png" alt="">
                </a>
            <?php endif;?>
            <ul class="footer-soc">
                <li>
                    <a rel="nofollow" target="_blank" class="vkontakte" href="https://vk.com/rub_on" title="">
                        <span class="vkontakte-icon"></span>
                    </a>
                </li>
                <li>
                    <a rel="nofollow" target="_blank" class="facebook" href="https://www.facebook.com/groups/rubonru/" title="" data-popup-width="860" data-popup-height="480">
                        <span class="facebook-icon"></span>
                    </a>
                </li>
                <li>
                    <a rel="nofollow" class="twitter" target="_blank"  href="https://twitter.com/ru_bon_ru" title="">
                        <span class="twitter-icon"></span>
                    </a>
                </li>
                <li>
                    <a rel="nofollow" class="google" target="_blank" href="https://plus.google.com/u/0/117466825603530500753" title="">
                        <span class="google-icon"></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer__right">
            <ul class="column-footer">
                <li><a rel="nofollow" href="<?= Url::to(['/help']) ?>">Помощь</a></li>
                <li><a href="">Топ объявления</a></li>
                <li><a rel="nofollow" href="<?= Url::toRoute(['/organizations/default/all']) ?>">Организации</a></li>
                <li><a href="<?= Url::to(['/news/default/index'])?>">Новости</a></li>
                <li><a href="<?= Url::to(['/banner/default/index'])?>">Реклама на сайте</a></li>
            </ul>
            <ul class="column-footer">
                <li><a href="">Как продавать и покупать?</a></li>
                <li><a href="">Правила безопастности</a></li>
                <li><a href="<?= Url::to(['/site/map']) ?>">Карта сайта</a></li>
                <li><a href="">Карта регионов</a></li>
                <li><a href="">Популярные запросы</a></li>

            </ul>
            <!-- <div class="mob-version">
                <a href="">
                    <span class="mob-icon">
                        <img src="img/mobilnik.png" alt=""></span>Мобильная версия</a>
            </div> -->
        </div>
    </div>
</section>
<!--<div class="fixed-social">
    <a href="" class="social-wrap__item vk">
        <img src="/img/soc/vk.png" alt="">
    </a>
    <a href="" class="social-wrap__item fb">
        <img src="/img/soc/fb.png" alt="">
    </a>
    <a href="" class="social-wrap__item ok">
        <img src="/img/soc/ok-icon.png" alt="">
    </a>
    <a href="" class="social-wrap__item insta">
        <img src="/img/soc/insta-icon.png" alt="">
    </a>
    <a href="" class="social-wrap__item twitter">
        <img src="/img/soc/twi-icon.png" alt="">
    </a>
    <a href="" class="social-wrap__item google">
        <img src="/img/soc/google-icon.png" alt="">
    </a>
    <a href="" class="social-wrap__item pinterest">
        <img src="/img/soc/pinter-icon.png" alt="">
    </a>
</div>-->

