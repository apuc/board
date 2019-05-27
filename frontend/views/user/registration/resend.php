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
<section class="email-active resending">
	<div class="container"><img src="/theme/images/mails/activateaccount.svg" alt="" role="presentation"/>
		<div class="email-active__text">
			<h2>Повторная<strong> отправка инструкций</strong>
			</h2>
			<p class="email-active__two">Введите ваш e-mail и подтвердите изменения, пройдя по ссылке в письме.
			</p>
			<?php $form = ActiveForm::begin([
				'id'                     => 'resend-form',
				'options'                => ['class' => 'email-active__form'],
				'enableAjaxValidation'   => true,
				'enableClientValidation' => false,
				'fieldConfig' => [
					'template' => '{input}<div class="error">{error}</div>',
				],
			]); ?>
			<?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Введите e-mail *']) ?>
			<?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'button button button_red']) ?>
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
			</ul>
		</div>
	</div>
</section>

