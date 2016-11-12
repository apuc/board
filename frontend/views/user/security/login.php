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
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */

$this->title = Yii::t('user', 'Sign in');
//$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>



<section class="vhod">
    <div class="container">
        <div class="registration-form">
            <h2 class="title-registration-form"><?= Html::encode($this->title) ?></h2>


            <?php $form = ActiveForm::begin([
                'id'                     => 'login-form',
                'options'                => ['class' => 'reg-form'],
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'validateOnBlur'         => false,
                'validateOnType'         => false,
                'validateOnChange'       => false,
                'fieldConfig' => [
                    'template' => '<div class="form-row">{input}<div class="error">{error}</div></div>',
                    'inputOptions' => ['class' => 'input-reg'],
                ],
            ]) ?>

            <?= $form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'tabindex' => '1']])->textInput( ['placeholder' => 'Введите email или login']) ?>

            <?= $form->field($model, 'password', ['inputOptions' => ['tabindex' => '2']])->passwordInput(['placeholder' => 'Введите пароль'])->label(Yii::t('user', 'Password') . ($module->enablePasswordRecovery ? ' (' . Html::a(Yii::t('user', 'Forgot password?'), ['/user/recovery/request'], ['tabindex' => '5']) . ')' : '')) ?>

            <?/*= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4', 'id' => 'dannie-3']) */?>
            <?/*= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) */?>
            <?= Html::a('Нет аккаунта? Зарегистрируйтесь!', ['/registration']) ?>
            <div class="problem-vhod">
                <div class="checkbox0">
                    <input id="check0" type="checkbox" name="check" name="login-form[rememberMe]" value="1" tabindex="4">
                    <label for="check0"></label>
                </div><p>Запомнить меня</p>
                <a href="<?= \yii\helpers\Url::to(['/user/recovery/request']);?>">Не можете войти?</a>
            </div>

            <div class="row-knopka">
                <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'reg-form-send', 'tabindex' => '3']) ?>
            </div>
            <div class="row-soc-text"><p>или войдите через соц.сеть</p></div>
            <div class="soc">
                <?= Connect::widget([
                    'baseAuthUrl' => ['/user/security/auth'],
                ]) ?>


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