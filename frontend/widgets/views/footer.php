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

<div class="modal modal-big modal-js" id="modalLocation">
    <header class="modal__header">
        <h2 class="modal__title">Выберите город
        </h2>
    </header>
    <div class="modal__body">
        <form class="modal__form-location" id="location"><input class="modal__city-search" type="search" name="city-search" placeholder="Введите город"/>
        </form>
        <div class="city-choise">
            <ul class="city-choise__list">
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Донецк</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Москва</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Магадан</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Курск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Воронеж</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Волгоград</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Санкт-Петербург</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Пекин</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Чайнатаун</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Белгород</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Ростов-на-Дону</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Ставпрополь</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Сибирь</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Кострома</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Большая Лаповка</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Провинция Шаньдун</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Сеул</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Токио</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Мурманск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Луганск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Снежное</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Сибирь</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Кострома</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Большая Лаповка</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Провинция Шаньдун</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Сеул</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Токио</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Мурманск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Луганск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Снежное</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Провинция Шаньдун</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Сеул</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Токио</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Мурманск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Луганск</a>
                </li>
                <li class="city-choise__li"><a class="header-nav__link header-nav__dropdown-link" href="#">Снежное</a>
                </li>
            </ul>
        </div>
    </div>
    <footer class="modal__footer">
        <button class="button button_white modal__btn">Отмена</button>
        <button class="button button_red modal__btn">Выбрать</button>
    </footer>
    <button class="button_close js-modalClose">×</button>
</div>
<div class="modal modal-big modal-js" id="modalReg">
    <div class="modal__content modal__content-two d-flex flex-wrap">
        <div class="modal__left">
            <h2 class="modal__title modal__title-small">Регистрация
            </h2>
            <form class="modal__form mb0"><input class="modal__input modal__input-small" placeholder="Введите e-mail" type="email"/><input class="modal__input modal__input-small" placeholder="Введите логин" type="text"/><input class="modal__input modal__input-small" placeholder="Введите пароль" type="password"/>
                <div class="d-flex align-items-center flex-wrap mb15 mt5">
                    <label class="checkbox mt5 mb5">
                        <input type="checkbox"/><span class="checkbox__main"><i class="fa fa-check"></i></span><span>* Я соглашаюсь с правилами использования сервиса, а также с передачей и обработкой моих данных в RUB-ON. Я подтверждаю своё совершеннолетие и ответственность за размещение объявления</span>
                    </label>
                </div>
                <button class="button button_red modal__btn modal__btn-small">Зарегистрироваться</button>
            </form>
        </div>
        <div class="modal__center"><span>или</span>
        </div>
        <div class="modal__right">
            <div class="pb20"><a class="modal__social button btn-vk" href="#"><span>Регистрация через VK</span><i class="fa fa-vk"></i></a><a class="modal__social button btn-facebook" href="#"><span>Регистрация через Facebook</span><i class="fa fa-facebook"></i></a><a class="modal__social button btn-twitter" href="#"><span>Регистрация через Twitter</span><i class="fa fa-twitter"></i></a><a class="modal__social button btn-google-plus" href="#"><span>Регистрация через Google</span><i class="fa fa-google-plus"></i></a>
            </div>
            <div class="text-center pt20 fz15"><span class="fw-light">Уже зарегистрированы?</span><span class="modal__link js-openModal" data-modal="#modalEnter"> Авторизуйтесь!</span>
            </div>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<div class="modal modal-js" id="modalPassword">
    <div class="modal__content">
        <h2 class="modal__title">Восстановление доступа
        </h2>
        <form class="modal__form"><input class="modal__input" placeholder="E-mail" type="email"/>
            <button class="button button_red modal__btn js-openModal" data-modal="#modalPasswordSuccess">Отправить доступы на почту</button>
        </form>
        <div class="text-center"><span class="fw-light">или</span><span class="modal__link js-openModal" data-modal="#modalEnter"> Войти в личный кабинет</span>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<div class="modal modal-big modal-js" id="modalEnter">
    <div class="modal__content modal__content-two d-flex flex-wrap">
        <div class="modal__left">
            <h2 class="modal__title modal__title-small">Войти в кабинет
            </h2>
            <form class="modal__form mb0"><input class="modal__input modal__input-small" placeholder="Введите e-mail" type="email"/><input class="modal__input modal__input-small" placeholder="Введите пароль" type="password"/>
                <div class="d-flex align-items-center flex-wrap mb15 mt5">
                    <label class="checkbox mt5 mb5">
                        <input type="checkbox"/><span class="checkbox__main"><i class="fa fa-check"></i></span><span>Запомнить меня</span>
                    </label><span class="ml-auto mt5 mb5 c-gray fz12 js-openModal" data-modal="#modalPassword">Не можете войти?</span>
                </div>
                <button class="button button_red modal__btn modal__btn-small">Войти</button>
            </form>
        </div>
        <div class="modal__center"><span>или</span>
        </div>
        <div class="modal__right">
            <div class="pb20"><a class="modal__social button btn-vk" href="#"><span>Войдите через VK</span><i class="fa fa-vk"></i></a><a class="modal__social button btn-facebook" href="#"><span>Войдите через Facebook</span><i class="fa fa-facebook"></i></a><a class="modal__social button btn-twitter" href="#"><span>Войдите через Twitter</span><i class="fa fa-twitter"></i></a><a class="modal__social button btn-google-plus" href="#"><span>Войдите через Google</span><i class="fa fa-google-plus"></i></a>
            </div>
            <div class="text-center pt20 fz15"><span class="fw-light">Нет аккаунта?</span><span class="modal__link js-openModal" data-modal="#modalReg"> Зарегистрируйтесь!</span>
            </div>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<div class="modal modal-js" id="modalPasswordSuccess">
    <div class="modal__content">
        <h2 class="modal__title">Благодарим
        </h2>
        <div class="check-pulse"><i class="fa fa-check"></i></div>
        <p class="modal__text">Ваша заявка на восстановление доступа <br>к личному кабинету успешно отправлена.
        </p>
        <div class="text-center mt30"><span class="modal__link js-openModal" data-modal="#modalEnter"> Войти в личный кабинет</span>
        </div>
    </div>
    <button class="button_close js-modalClose">×</button>
</div>
<div class="modal__overlay js-modalClose"></div>