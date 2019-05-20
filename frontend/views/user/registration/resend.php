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
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/*
 * @var yii\web\View                    $this
 * @var dektrium\user\models\ResendForm $model
 */

$this->title = Yii::t('user', 'Request new confirmation message');
?>

<section class="registration">
    <div class="container">
        <div class="registration-form">
            <h2 class="title-registration-form"><?= Html::encode($this->title) ?></h2>

            <?php $form = ActiveForm::begin([
                'id'                     => 'resend-form',
                'options'                => ['class' => 'reg-form'],
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'fieldConfig' => [
                    'template' => '<div class="form-row"><span class="grey-star">*</span>{input}<div class="error">{error}</div></div>',
                    'inputOptions' => ['class' => 'input-reg'],
                ],
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Введите ваш email-адрес']) ?>

            <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'reg-form-send']) ?><br>

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
            </ul>
            <p>Введите ваш email-адрес и подтвердите изменения, пройдя по ссылке в письме, которое мы вам отправим.</p>
        </div>
    </div>
</section>
