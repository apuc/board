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
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Reset your password');
//$this->params['breadcrumbs'][] = $this->title;
?>
<!--123
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?/*= Html::encode($this->title) */?></h3>
            </div>
            <div class="panel-body">
                <?php /*$form = ActiveForm::begin([
                    'id'                     => 'password-recovery-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                ]); */?>

                <?/*= $form->field($model, 'password')->passwordInput() */?>

                <?/*= Html::submitButton(Yii::t('user', 'Finish'), ['class' => 'btn btn-success btn-block']) */?><br>

                <?php /*ActiveForm::end(); */?>
            </div>
        </div>
    </div>
</div>-->


<section class="vhod">
    <div class="container">
        <div class="registration-form">
            <h2 class="title-registration-form"><?= Html::encode($this->title) ?></h2>
            <?php $form = ActiveForm::begin([
                'id'                     => 'password-recovery-form',
                'options'                => ['class' => 'reg-form'],
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'fieldConfig' => [
                    'template' => '<div class="form-row"><span class="grey-star">*</span>{input}<div class="memo-error"><p>{error}</p></div><div class="memo"><span class="info-icon"></span><span class="triangle-left"></span>{hint}</div></div>',
                    'inputOptions' => ['class' => 'input-reg'],
                    'errorOptions' => ['class' => 'error'],
                ],'errorCssClass' => 'my-error'
            ]); ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Введите новый пароль'])->label(Yii::t('user', 'Password')); ?>


            <div class="row-knopka">
                <?= Html::submitButton(Yii::t('user', 'Finish'), ['class' => 'reg-form-send']) ?>
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