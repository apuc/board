<?php
echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => 'Реклама RUB-ON | Доска безплатных объявлений',
        'description' => 'Реклама',
        'img' => 'http://rub-on.ru/img/Logotip_RUBON.png'
    ]);
?>


<section class="coming-soon">
    <div class="container">
        <h3>По всем вопросам размещения рекламы и сотрудничества обращайтесь:</h3>
        <div class="coming-soon__row">
            <ul class="footer-soc">
                <li>
                    <a class="vkontakte" target="_blank" href="https://vk.com/rub_on" title="">
                        <span class="vkontakte-icon"></span>
                    </a>
                </li>
                <li>
                    <a class="facebook" target="_blank" href="https://www.facebook.com/groups/rubonru/" title="" data-popup-width="860" data-popup-height="480">
                        <span class="facebook-icon"></span>
                    </a>
                </li>
                <li>
                    <a class="twitter" target="_blank" href="https://twitter.com/ru_bon_ru" title="">
                        <span class="twitter-icon"></span>
                    </a>
                </li>
                <li>
                    <a class="google" target="_blank" href="https://plus.google.com/u/0/117466825603530500753" title="">
                        <span class="google-icon"></span>
                    </a>
                </li>
            </ul>
            <p>Скайп: <span>live:2f28e37c28236b91</span></p>
            <p>Mail: <span>support@rub-on.ru</span></p>
        </div>
        <div class="coming-soon__row">
            <h3>Или востпользуйтесь быстрым способом</h3>
            <a href="" class="open_modals">Написать нам</a>
            <a href="" class="open_modals">Заказать звонок</a>
        </div>

        <div class="page-pic">
            <img src="/img/reclama-zaglushka.png" alt="">
        </div>

    </div>
</section>
<div id="callback-form" class=" modals_div">
    <h2>Заказать звонок</h2>
    <form action="">
        <input type="text" placeholder="Ваше имя">
        <input type="text" placeholder="Номер телефона">
        <button  class="open_modal2">Отправить</button>
    </form>
</div>
<div id="callback-form-thx" class="modals_div">
    <div class="pic">
        <img src="/img/confim.png" alt="">
    </div>
    <h2>Спасибо</h2>
    <h2>Ваша заявка отправлена</h2>
</div>
<div id="overlay"></div>