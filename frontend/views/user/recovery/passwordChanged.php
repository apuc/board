<?php
$this->title = $title;
?>

<!--<section class="reg">
    <div class="container">
        <div class="row">
            <div class="reg__content">
                <h3 class="reg__content--subtitle">Ваш пароль был успешно изменен.</h3>
            </div>
            <p class="reg--back">Назад на <a href="/">главную страницу</a></p>
        </div>
    </div>
</section>-->

<section class="activation">
    <div class="container">
        <h2 class="activation-title">Ваш пароль был успешно изменен.</h2>
        <p class="activatioN-info">Для продолжения авторизируйтесь</p>
        <div class="reg-form">
            <div class="row-knopka">
                <a class="reg-form-send" href="<?= \yii\helpers\Url::toRoute('/login') ?>">Вход</a>
            </div>
            <div class="row-knopka">
                <a class="reg-form-send" href="/">Главная</a>
            </div>
        </div>
        <!-- <span class="goback">Назад на<a href="" class="goback-link"> главную страницу</a></span> -->
    </div>
</section>