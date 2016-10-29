<?php
/**
 * @var $category array
 */

use frontend\modules\help\widgets\HelpLeftMenu;

$this->title = "Помощь";

?>
<section class="yellow-line">
</section>
<section class="support-search">
    <div class="container">
        <div class="support_block">
            <h2 class="support_block-title">Служба поддержки</h2>
        </div>
        <div class="search-panel">
            <span class="search-pic"></span>
            <input type="text" class="input-search-ad" placeholder="поиск по объявлениям автомобили">
            <a href="" class="adsearch-button">Поиск</a>
        </div>
    </div>
</section>
<section class="help-page__content">
    <div class="container">
        <?= HelpLeftMenu::widget() ?>
        <div class="help-page__content_all">
            <!-- open .breadcrubs -->
            <article class="breadcrumbs">
                <!-- open .container -->

                <!-- open .bread -->
                <ol class="breadcrumbs__list">
                    <li><a href="#">Служба поддержки Rubon </a></li>
                    <!--<li><a href="#">Работа с объявлениями</a></li>
                    <li>Подача объявления</li>-->
                </ol>
                <!-- close .bread -->

                <!-- close .container -->
            </article>
            <!-- close .breadcrubs -->
            <div class="help-page__content_all-help-answer">
                <h2 class="help-answer_title">Подача объявления</h2>
                <div class="faq">
                    <a href="" class="help-answer_item">Как подать объявление?</a>
                    <a href="" class="help-answer_item">В какой категории подать объявление?</a>
                    <a href="" class="help-answer_item">На какой срок размещается объявление?</a>
                    <a href="" class="help-answer_item">В какой категории подать объявление о покупке товара?</a>
                    <a href="" class="help-answer_item">Сколько объявлений об одном товаре или услуге я могу подать?</a>
                    <a href="" class="help-answer_item">Сколько объявлений можно подать одному пользователю?</a>
                    <a href="" class="help-answer_item">Можно ли подавать одно и то же объявление в разных городах или категориях?</a>
                    <a href="" class="help-answer_item">Почему блокируется объявление о находке или потере вещей?</a>
                    <a href="" class="help-answer_item">Можно ли подавать объявление повторно?</a>
                    <a href="" class="help-answer_item">Нужна ли регистрация, чтобы подать объявление?</a>
                    <a href="" class="help-answer_item">Как правильно составить название объявления?</a>
                    <a href="" class="help-answer_item">Какой город указывать в объявлении?</a>
                    <a href="" class="help-answer_item">Нужно ли указывать номер телефона при подаче объявления?</a>
                    <a href="" class="help-answer_item">Как правильно составить описание объявления?</a>
                    <a href="" class="help-answer_item">Как добавить фото в объявление?</a>
                    <a href="" class="help-answer_item">Как перевернуть фотографии?</a>
                    <a href="" class="help-answer_item">Почему не добавляются фотографии к объявлению?</a>
                    <a href="" class="help-answer_item">Как добавить видео в объявление?</a>
                </div>
                <div class="recent-article">
                    <div class="recent-article-item">
                        <h2>Актуальные статьи</h2>
                        <div class="recent-article-item__articles">
                            <a href="">Почему мое объявление удалено?</a>
                            <a href="">Почему заблокирован мой Профиль?</a>
                            <a href="">Достигнут лимит, не могу опубликовать новое</a>
                        </div>
                    </div>
                    <div class="recent-article-item">
                        <h2>Последние статьи</h2>
                        <div class="recent-article-item__articles">
                            <a href="">Почему мое объявление удалено?</a>
                            <a href="">Почему заблокирован мой Профиль?</a>
                            <a href="">Достигнут лимит, не могу опубликовать новое</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>