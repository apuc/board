<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\User $model
 * @var dektrium\user\models\Account $account
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?/*= Html::encode($this->title) */?></h3>
            </div>
            <div class="panel-body">
                <div class="alert alert-info">
                    <p>
                        <?/*= Yii::t('user', 'In order to finish your registration, we need you to enter following fields') */?>:
                    </p>
                </div>
                <?php /*$form = ActiveForm::begin([
                    'id' => 'connect-account-form',
                ]); */?>

                <?/*= $form->field($model, 'email') */?>

                <?/*= $form->field($model, 'username') */?>

                <?/*= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-success btn-block']) */?>

                <?php /*ActiveForm::end(); */?>
            </div>
        </div>
        <p class="text-center">
            <?/*= Html::a(Yii::t('user', 'If you already registered, sign in and connect this account on settings page'), ['/user/settings/networks']) */?>.
        </p>
    </div>
</div>-->


<section class="registration">
    <div class="container">
        <div class="registration-form">
            <h2 class="title-registration-form"><?= Html::encode($this->title) ?></h2>
            <div class="alert alert-info">
                <p>
                    <?= Yii::t('user', 'In order to finish your registration, we need you to enter following fields') ?>:
                </p>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'connect-account-form',
                'options'                => ['class' => 'reg-form form-row-social'],
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'fieldConfig' => [
                    'template' => '<div class="form-row">{label}<span class="grey-star">*</span>{input}<div class="memo-error"><p>{error}</p></div><div class="memo"><span class="info-icon"></span><span class="triangle-left"></span>{hint}</div></div>',
                    'inputOptions' => ['class' => 'input-reg'],
                    'errorOptions' => ['class' => 'error'],
                ],'errorCssClass' => 'my-error'
            ]); ?>

            <?= $form->field($model, 'email')->label('Email') ?>

            <?= $form->field($model, 'username')->label('Логин') ?>



            <div class="row-knopka">
                <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'reg-form-send']) ?>
            </div>


            <?php ActiveForm::end(); ?>
        </div>
        <div class="registration-info">
            <p>Пароль нужен для входа в раздел <br>
                <b>Мои объявления, Мои услуги, <br>Мои магазины</b>
                и другое, где вы сможете <br>работать с объявлениями:</p>
            <ul>
                <li>редактировать, удалять и обновлять</li>
                <li>просматривать сообщения</li>
                <li>просматривать избранные объявления</li>
                <li>предосталять свои услуги или услуги компании</li>
                <li>разместить свой магазин в каталоге</li>
            </ul>
            <p>Введите ваш email-адрес, желаемый пароль <br>и подтвердите изменения, пройдя по ссылке <br>в письме, которое мы вам отправим.</p>
        </div>
    </div>
</section>
