<?php
/**
 * @var $category common\models\db\Category
 */
?>

<section class="place-ad">
    <div class="container">
        <!--<div class="row">-->
        <h1 class="place-ad__title">Подать бесплатное объявление</h1>
        <div class="place-ad__container">
            <p class="place-ad__subtitle">заголовок*</p>
            <input class="place-ad__field" type="text" placeholder="Введите заголовок объявления">
            <span class="place-ad__reminder">70 знаков осталось</span>
        </div>
        <div class="place-ad__container">
            <p class="place-ad__subtitle">Рубрика*</p>
            <span class="SelectCategory">
                <div class="place-ad__form generalModalCategory" >
                    Выбирите рубрику
                    <span class="place-ad__form__search"></span>
                </div>
            </span>

        </div>
        <div class="place-ad__container">
            <p class="place-ad__subtitle">описание*</p>
            <textarea class="place-ad__descr"></textarea>
        </div>
        <div class="place-ad__container">
            <p class="place-ad__subtitle">фотографии*</p>
            <div class="place-ad__photo">
                <div class="place-ad__photo__container">
                    <div class="place-ad__photo__container__img">
                        <img src="img/new-shop1.png" alt="">
                    </div>
                    <div class="place-ad__photo__container__actions">
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-hand-down"></span></button>
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-trash"></span></button>
                    </div>
                </div>
                <div class="place-ad__photo__container">
                    <div class="place-ad__photo__container__img">
                        <img src="img/new-shop1.png" alt="">
                    </div>
                    <div class="place-ad__photo__container__actions">
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-hand-down"></span></button>
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-trash"></span></button>
                    </div>
                </div>
                <div class="place-ad__photo__container">
                    <div class="place-ad__photo__container__img">
                        <img src="img/new-shop1.png" alt="">
                    </div>
                    <div class="place-ad__photo__container__actions">
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-hand-down"></span></button>
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-trash"></span></button>
                    </div>
                </div>
            </div>
            <a class="place-ad__add-photo" href="#">загрузить фото</a>
                <span class="place-ad__counter">
                    <img src="img/cheked.png" alt="">
                    выбрано файлов:<span> 3</span></span>
            <a class="place-ad__counter" href="#">
                <img src="img/close.png" alt="">
                удалить</a>
            <p class="place-ad__notice">Объявления с фото получают больше откликов</p>
        </div>
        <div class="place-ad__container">
            <p class="place-ad__subtitle">город*</p>
            <input class="place-ad__field" type="text" placeholder="Введите заголовок объявления">
        </div>
        <div class="place-ad__container">
            <p class="place-ad__subtitle">имя*</p>
            <input class="place-ad__field" type="text" placeholder="Введите заголовок объявления">
        </div>
        <div class="place-ad__container">
            <p class="place-ad__subtitle">e-mail*</p>
            <input class="place-ad__field" type="text" placeholder="Введите заголовок объявления">
        </div>
        <div class="place-ad__container">
            <p class="place-ad__subtitle">номер телефона*</p>
            <input class="place-ad__field" type="text" placeholder="Введите заголовок объявления">
        </div>
        <div class="place-ad__container">

            <p class="place-ad__subtitle"></p>
            <input type="checkbox" id="1_1">
            <label for="1_1">
                <span></span>
                РАЗМЕСТИТЬ МОЕ ОБЪЯВЛЕНИЕ ДЛЯ ДОПОЛНИТЕЛЬНОЙ
                РЕКЛАВМЫ В ВК
            </label>

            <a class="place-ad__social" href="#">
                <img src="img/vk-i.png" alt="">
            </a>

        </div>
        <div class="place-ad__container">

            <p class="place-ad__subtitle"></p>
            <input type="checkbox" id="1_2">
            <label for="1_2">
                <span></span>
                * Я соглашаюсь с правилами использования сервиса,
                а также с передачей и обработкой моих данных.
                Я подтверждаю своё совершеннолетие и
                ответственность за размещение объявления
            </label>
        </div>

        <div class="place-ad__links">
            <a class="place-ad__publish" href="#">опубликавать</a>
            <a class="place-ad__view" href="#">Просмотреть</a>
        </div>
        <!--</div>-->
    </div>
</section>

<div class="modal fade" id="modalType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="/img/sticker.png" alt="sticker"/>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Выберите рубрику</h3>
            </div>
            <div class="modal-body modal-flex">

            </div>
            <div class="modal-footer--underline">
                <img src="/img/modal-under.png" alt=""/>
            </div>
        </div>
    </div>
</div>