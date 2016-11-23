<?php

$this->title = "Регистрация";
use yii\helpers\Html;
?>
<!--<section class="activation">
    <div class="container">
        <h2 class="activation-title">Сейчас вы должны активировать ваш аккаунт!</h2>
        <p class="activatioN-info">Перейдите по ссылке, которую мы Вам только что выслали. Если не найдёте письма в почте, проверьте Спам.</p>
        <form class="reg-form" action="" method="post">

            <div class="row-knopka">
                <a href="http://www.<?/*= $link; */?>" class="reg-form-send">проверить e-mail</a>
            </div>

        </form>
        <span class="goback">Назад на<a href="/" class="goback-link"> главную страницу</a></span>
        <h3 class="activation-title">Не получили письмо?</h3>
        <form class="reg-form" action="" method="post">

            <div class="row-knopka">
                <a href="<?/*= \yii\helpers\Url::toRoute('/resend'); */?>" class="reg-form-send">Отправить еще раз</a>
            </div>

        </form>
    </div>
</section>-->


<section class="activation">
    <div class="container">
        <h2 class="activation-title">Теперь вы должны активировать ваш аккаунт!!</h2>
        <p class="activatioN-info">Перейдите по ссылке, которую мы Вам только что выслали. Если не найдёте письма в почте, проверьте Спам.</p>
        <form class="reg-form" action="" method="post">

            <div class="row-knopka">
                <a href="http://www.<?= $link; ?>" class="reg-form-send">проверить e-mail</a>

            </div>
            <div class="row-knopka">
                <a href="<?= \yii\helpers\Url::toRoute('/resend'); ?>" class="reg-form-send">Отправить еще раз</a>
            </div>

        </form>
        <!-- <span class="goback">Назад на<a href="" class="goback-link"> главную страницу</a></span> -->
    </div>
</section>