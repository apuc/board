<?php
use yii\helpers\Url;
?>


<section class="footer">
    <h2><b>Rubon—</b> сайт объявлений. </h2>
    <div class="container">
        <p>Бесплатные объявления на Rubon.ru - здесь вы найдете то, что искали! Нажав на кнопку "Подать объявление", вы перейдете на форму, заполнив которую, сможете разместить объявление на любую необходимую тематику легко и абсолютно бесплатно. С помощью сайта объявлений Olx Украина вы сможете купить или продать из рук в руки практически все, что угодно.</p>
        <div class="footer__left">
            <a href="/" class="logo-icon">
                <img src="/img/Logotip_RUBON.png" alt="">
            </a>
            <ul class="footer-soc">
                <li>
                    <a class="vkontakte " href="https://vk.com/rub_on" title="">
                        <span class="vkontakte-icon"></span>
                    </a>
                </li>
                <li>
                    <a class="facebook " href="https://www.facebook.com/groups/rubonru/" title="" data-popup-width="860" data-popup-height="480">
                        <span class="facebook-icon"></span>
                    </a>
                </li>
                <li>
                    <a class="twitter " href="https://twitter.com/ru_bon_ru" title="">
                        <span class="twitter-icon"></span>
                    </a>
                </li>
                <li>
                    <a class="google " href="https://plus.google.com/u/0/117466825603530500753" title="">
                        <span class="google-icon"></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer__right">
            <ul class="column-footer">
                <li><a href="<?= Url::to(['/help']) ?>">Помощь</a></li>
                <li><a href="">Топ объявления</a></li>
                <li><a href="">Организации</a></li>
                <li><a href="">Платные услуги</a></li>
                <li><a href="<?= Url::to(['/banner/default/index'])?>">Реклама на сайте</a></li>
            </ul>
            <ul class="column-footer">
                <li><a href="">Как продавать и покупать?</a></li>
                <li><a href="">Правила безопастности</a></li>
                <li><a href="">Карта сайта</a></li>
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
