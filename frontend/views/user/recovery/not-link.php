<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 09.06.2017
 * Time: 11:47
 */

$this->title =  Yii::t('user', 'Invalid or expired link');
?>

<section class="activation">
    <div class="container">
        <h2 class="activation-title"><?= Yii::t('user', 'Recovery link is invalid or expired. Please try requesting a new one.')?></h2>
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


