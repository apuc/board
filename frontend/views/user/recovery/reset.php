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
?>

<section class="email-active resending reset-password">
	<div class="container"><img src="/theme/images/mails/sbrosparol.svg" alt="" role="presentation"/>
		<div class="email-active__text">
			<h2><strong>Поменять пароль</strong>
			</h2>
			<p class="email-active__two">Введите ваш e-mail,<strong>новый пароль</strong>и подтвердите изменения, пройдя по ссылке в письме.
			</p>
			<?php $form = ActiveForm::begin([
				'id'                     => 'password-recovery-form',
				'options'                => ['class' => 'email-active__form'],
				'enableAjaxValidation'   => true,
				'enableClientValidation' => false,
				'fieldConfig' => [
					'template' => '{input}<div class="error">{error}</div>',
				]
			]); ?>

			<?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Введите новый пароль'])->label(Yii::t('user', 'Password')); ?>
			<?= Html::submitButton(Yii::t('user', 'Finish'), ['class' => 'button button button_red']) ?>
			<?php ActiveForm::end(); ?>
			<p class="email-active__three">Пароль нужен для входа в разделы<strong>  Мои объявления, Мои услуги, Мои магазины</strong> и открывает возможность работы с объявлениями:
			</p>
			<ul class="email-active__list">
				<li>редактирование, удаление и обновление;
				</li>
				<li>просмотр сообщений;
				</li>
				<li>просмотр избранных объявлений;
				</li>
				<li>предоставление своих услуг или услуг компании
				</li>
				<li>размещение своего магазина в каталоге.
				</li>
			</ul>
		</div>
	</div>
</section>