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
use yii\widgets\Breadcrumbs;

/*
 * @var $this  yii\web\View
 * @var $form  yii\widgets\ActiveForm
 * @var $model dektrium\user\models\SettingsForm
 */

$this->title = Yii::t('user', 'Account settings');
$this->params['breadcrumbs'][] = $this->title;
echo \frontend\modules\personal_area\widgets\MenuPersonalArea::widget();
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>


<section class="kabinet-setting-account">
    <div class="container">
        <?= $this->render('_menu') ?>
        <div class="kabinet-setting-account__right">

            <!-- open .breadcrubs -->
            <article class="breadcrumbs">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => ['class' => 'breadcrumbs__list']
                ]) ?>
            </article>
            <h2>Настройки аккаунта</h2>
            <?php $form = ActiveForm::begin([
                'id'          => 'account-form',
                'options'     => ['class' => 'form-horizontal setting-account-form'],
                'fieldConfig' => [
                    /*'template'     => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                    'labelOptions' => ['class' => 'col-lg-3 control-label'],*/
                ],
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
            ]); ?>
            <div class="row-form">
                <?= $form->field($model, 'email') ?>
            </div>
            <div class="row-form">
                <?= $form->field($model, 'username') ?>
            </div>
            <div class="row-form">
                <?= $form->field($model, 'new_password')->passwordInput() ?>
            </div>
            <div class="row-form">
            <hr />
            </div>
            <div class="row-form">
                <?= $form->field($model, 'current_password')->passwordInput() ?>
            </div>
            <div class="row-knopka">
                    <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'reg-form-send']) ?><br>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>
