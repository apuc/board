<?php

/* @var $this yii\web\View */
/* @var $countUser */
/* @var $adsCountActive */

use yii\helpers\Url;

$this->title = 'Rub-on панель управления | Главная';
?>
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
        <div class="inner">
            <h3><?= $countUser; ?></h3>

            <p>Подтвержденных пользователей</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="<?= Url::to(['/user/admin']); ?>" class="small-box-footer">
            Подробнее <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3><?= $adsCountActive; ?></h3>

            <p>Активных бъявлений<br /> на сайте</p>
        </div>
        <div class="icon">
            <i class="fa fa-dashboard"></i>
        </div>
        <a href="<?= Url::to(['/adsmanager']) ?>" class="small-box-footer">
            Подробнее <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>