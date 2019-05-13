<?php
$this->title = 'Ваш аккаунт был успешно активирован';
?>

<section class="activation">
    <div class="container">
        <h2 class="activation-title">Ваш аккаунт был успешно активирован.</h2>
        <p class="activatioN-info">Для продолжения</p>
        <div class="reg-form">

            <div class="row-knopka">
                <a class="reg-form-send" href="<?= \yii\helpers\Url::to(['/cabinet/ads/active']); ?>">Личный кабинет</a>
            </div>
            <div class="row-knopka">
                <a href="/" class="reg-form-send">Главная страница</a>
            </div>

        </div>

    </div>
</section>