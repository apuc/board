<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module      $module
 */

$this->title = Yii::t('user', 'Sign up');
//$this->params['breadcrumbs'][] = $this->title;
?>

<section class="registration">
    <div class="container">
        <div class="registration-form">
            <h2 class="title-registration-form"><?= Html::encode($this->title) ?></h2>
            <?php $form = ActiveForm::begin([
                'id'                     => 'registration-form',
                'options'                => ['class' => 'reg-form'],
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'fieldConfig' => [
                    'template' => '<div class="form-row"><span class="grey-star">*</span>{input}<div class="error">{error}</div></div>',
                    'inputOptions' => ['class' => 'input-reg'],
                ],
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Введите ваш email-адрес']) ?>

            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Введите ваш Login']) ?>

            <?php if ($module->enableGeneratingPassword == false): ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
            <?php endif ?>

            <div class="soglashenie">
                <div class="checkbox0">
                    <input id="check0" type="checkbox" name="check" value="check0" class="ruleRegister">
                    <label for="check0"></label>
                </div>
                <p>* Я соглашаюсь с <a href="">правилами использования сервиса</a>, а также с передачей и обработкой моих данных в ХХХ. Я подтверждаю своё совершеннолетие и ответственность за размещение объявления</p>

            </div>


            <!--<span class="rules">
                <input type="checkbox"  id="dannie-3" class="ruleRegister">
                <label for="dannie-3"></label><p>* Я соглашаюсь с <a href="">правилами использования сервиса</a>, а также с передачей и обработкой моих данных в ХХХ. Я подтверждаю своё совершеннолетие и ответственность за размещение объявления</p>
            </span>-->
            <div class="row-knopka">
                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'reg-form-send', 'disabled' => 'disabled']) ?>
            </div>
            <div class="row-soc-text"><p>или войдите через соц.сеть</p></div>
            <div class="soc">
                <?= Connect::widget([
                    'baseAuthUrl' => ['/user/security/auth'],
                ]) ?>


            </div>
            <?= Html::a('Уже зарегистрированы? Авторизуйтесь!', ['/login']) ?>
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
