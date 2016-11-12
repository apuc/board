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
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title = 'Восстановление доступа';
//$this->params['breadcrumbs'][] = $this->title;
?>

<!--<section class="reg">
    <div class="container">
        <div class="row">
             <h3 class="reg__title"><?/*= Html::encode($this->title) */?></h3>


                <?php /*$form = ActiveForm::begin([
                    'id'                     => 'password-recovery-form',
                    'options'                => ['class' => 'reg__form'],
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'fieldConfig' => [
                        'template' => '{input}<span><img src="/img/star-i.png" alt="star"/></span><div class="error">{error}</div>',
                        'inputOptions' => ['class' => 'reg__form--field'],
                    ],
                ]); */?>

                <?/*= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Введите ваш email-адрес']) */?>

                <?/*= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'reg__form--btn']) */?><br>

                <?php /*ActiveForm::end(); */?>
        </div>
    </div>
</section>-->
<section class="vhod">
    <div class="container">
        <div class="registration-form">
            <h2 class="title-registration-form"><?= Html::encode($this->title) ?></h2>
            <!--<form class="reg-form" action="" method="post">
                <div class="form-row">

                    <input class="input-reg" type="email" placeholder="Ввведите ваш email-адрес">
                </div>
                <div class="row-knopka">
                    <button  type="submit" class="reg-form-send">сбросить пароль</button>
                </div>
                <div class="row-knopka-2">или
                    <button  type="submit" class="reg-form-send-2">Войти</button>

                </div>
            </form>-->
                <?php $form = ActiveForm::begin([
                    'id'                     => 'password-recovery-form',
                    'options'                => ['class' => 'reg-form'],
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'fieldConfig' => [
                        'template' => '{input}<div class="error">{error}</div>',
                        'inputOptions' => ['class' => 'input-reg'],
                    ],
                ]); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Введите ваш email-адрес']) ?>
                <div class="row-knopka">
                    <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'reg-form-send']) ?><br>
                </div>
                <div class="row-knopka-2">или
                    <a href="<?= Url::toRoute('/login') ?>" class="reg-form-send-2">Войти</a>

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