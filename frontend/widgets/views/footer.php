<?php
use yii\helpers\Url;
?>

<footer class="footer">
    <div class="container">
        <div class="footer__head">
            <h2 class="footer__title"><strong>Rubon</strong> — сайт объявлений и организаций ДНР, ЛНР - здесь вы найдете то, что искали!
            </h2>
        </div>
        <div class="d-flex justify-content-between">
            <div class="footer__body">
                <nav class="footer__list"><a class="footer__link" href="#">Транспорт</a><a class="footer__link" href="#">Дом и сад</a><a class="footer__link" href="#">Недвижимость</a><a class="footer__link" href="#">Мода и стиль</a><a class="footer__link" href="#">Электроника</a><a class="footer__link" href="#">Бизнес и услуги</a><a class="footer__link" href="#">Работа</a><a class="footer__link" href="#">Животные</a><a class="footer__link" href="#">Хобби, отдых и спорт</a><a class="footer__link" href="#">Детский мир</a><span class="footer__link"></span><a class="footer__link" href="#">Организации</a>
                </nav>
                <nav class="footer__list"><a class="footer__link" href="#">Новости</a><a class="footer__link" href="#">Реклама на сайте</a><a class="footer__link" href="#">Карта сайта</a>
                </nav>
            </div>
            <div class="footer__body">
                <nav class="footer__list"><a class="footer__link" href="#">Как продавать и покупать?</a><a class="footer__link" href="#">Правила безопастности</a><a class="footer__link" href="#">Обратная связь</a>
                </nav>
            </div>
        </div>
        <div class="footer__bottom">
            <p class="footer__copyright lg-none">© 2018 Rubon
            </p>
            <nav class="footer__faq"><a class="footer__faq-link" href="#">Как продавать и покупать?</a><a class="footer__faq-link" href="#">Правила безопастности</a><a class="footer__faq-link" href="#">Обратная связь</a><a class="footer__faq-link" href="#">Помощь</a>
            </nav>
            <div class="lg-block mt20 sm-none">
                <p>© 2018 Rubon</p>
            </div>
            <div class="social"><span class="mr10">Мы в соцсетях</span><a class="social__link bg-vk" href="https://vk.com/rub_on"><i class="fa fa-vk"></i></a><a class="social__link bg-facebook" href="https://vk.com/rub_on"><i class="fa fa-facebook"></i></a><a class="social__link bg-twitter" href="https://vk.com/rub_on"><i class="fa fa-twitter"></i></a><a class="social__link bg-youtube" href="https://vk.com/rub_on"><i class="fa fa-youtube"></i></a>
            </div>
            <div class="sm-block width100 text-center">
                <p>© 2018 Rubon</p>
            </div>
        </div>
    </div>
</footer>
<!--<section class="footer">
    <h2><b>Rubon—</b> сайт объявлений и организаций вашего города. </h2>
    <div class="container">

        <p>Бесплатные объявления ДНР, ЛНР, России на rub-on.ru - здесь вы найдете то, что искали! Нажав на кнопку "Подать объявление", вы перейдете на форму, заполнив которую сможете разместить объявление на любую необходимую тематику абсолютно бесплатно и легко. С помощью сайта объявлений rub-on.ru вы можете купить или продать из рук в руки практически все, что угодно.</p>
        <div class="footer__left">
            <?php /*if(Yii::$app->controller->module->id == 'mainpage'):*/?>
                <span class="logo-icon">
                    <img src="/img/Logotip_RUBON.png" alt="">
                </span>
            <?php /*else: */?>
                <a class="logo-icon" href="/">
                    <img src="/img/Logotip_RUBON.png" alt="">
                </a>
            <?php /*endif;*/?>
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
                <li><a rel="nofollow" href="<?/*= Url::to(['/help']) */?>">Помощь</a></li>
                <li><a href="">Топ объявления</a></li>
                <li><a rel="nofollow" href="<?/*= Url::toRoute(['/organizations/default/all']) */?>">Организации</a></li>
                <li><a href="<?/*= Url::to(['/news/default/index'])*/?>">Новости</a></li>
                <li><a href="<?/*= Url::to(['/banner/default/index'])*/?>">Реклама на сайте</a></li>
            </ul>
            <ul class="column-footer">
                <li><a href="">Как продавать и покупать?</a></li>
                <li><a href="">Правила безопастности</a></li>
                <li><a href="<?/*= Url::to(['/site/map']) */?>">Карта сайта</a></li>
                <li><a href="">Карта регионов</a></li>
                <li><a href="">Популярные запросы</a></li>

            </ul>
            <!-- <div class="mob-version">
                <a href="">
                    <span class="mob-icon">
                        <img src="img/mobilnik.png" alt=""></span>Мобильная версия</a>
            </div>
        </div>
    </div>
</section>-->


