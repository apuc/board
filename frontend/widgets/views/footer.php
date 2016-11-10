<?php
use yii\helpers\Url;
?>
<!-- @@block  =  footer-->
<section class="footer">
    <span class="footer-line"></span>
    <div class="container">
        <div class="footer__left">
            <a href="" class="logo-icon">
                <img src="/img/Logotip_footer.png" alt="">

            </a>
            <p>Copyright  — сайт бесплатных объявлений. Все права защищены</p>
        </div>
        <div class="footer__right">
            <ul class="column-footer">
                <li><a href="<?= Url::to(['/help']) ?>">Помощь</a></li>
                <li><a href="">Топ объявления</a></li>
                <li><a href="">Магазины</a></li>
                <li><a href="">Платные услуги</a></li>
                <li><a href="">Реклама на сайте</a></li>
            </ul>
            <ul class="column-footer">
                <li><a href="">Как продавать и покупать?</a></li>
                <li><a href="">Правила безопастности</a></li>
                <li><a href="">Карта сайта</a></li>
                <li><a href="">Карта регионов</a></li>
                <li><a href="">Популярные запросы</a></li>

            </ul>
            <div class="mob-version">
                <a href="">
					<span class="mob-icon">
						<img src="/img/mobilnik.png" alt=""></span>Мобильная версия</a>
            </div>
        </div>
    </div>
</section>