<?php
$this->title = "Пользователя не существует";
?>


<section class="activation">
    <div class="container">
        <h2 class="activation-title">Пользователя с таким Email не существует на нашем сайте!</h2>
        <p class="activatioN-info">Зарегистрируйтесь или войдите под саоими данными</p>
        <div class="reg-form">

            <div class="row-knopka">
                <a class="reg-form-send" href="<?= \yii\helpers\Url::toRoute('/registration') ?>">Регистрация</a>
            </div>
            <div class="row-knopka">
                <a class="reg-form-send" href="<?= \yii\helpers\Url::toRoute('/login') ?>">Вход</a>
            </div>

        </div>
        <!-- <span class="goback">Назад на<a href="" class="goback-link"> главную страницу</a></span> -->
    </div>
</section>