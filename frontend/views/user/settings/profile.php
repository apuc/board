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
use yii\widgets\Breadcrumbs;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
echo $this->render('@frontend/modules/personal_area/views/ads/_menu');
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
            <h2>Настройки Прфиля</h2>
            <!-- close .breadcrubs -->


            <?php $form = \yii\widgets\ActiveForm::begin([
                'id' => 'profile-form',
                'options' => ['class' => 'form-horizontal setting-account-form', 'enctype' => 'multipart/form-data'],
                /*'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                    'labelOptions' => ['class' => 'col-lg-3 control-label'],
                ],*/
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
                'validateOnBlur' => false,
            ]); ?>
            <div class="row-form">
                <?= $form->field($model, 'name') ?>
            </div>
            <div class="row-form">
                <?= $form->field($model, 'public_email') ?>
            </div>
            <div class="row-form">
                <?= $form->field($model, 'website') ?>
            </div>


            <div class="avataPrifile">

                <?php
                if (empty($model->avatar)) {
                    echo $form->field($model, 'avatar', [
                        'template' => '{label}<div class="selectAvatar">
                                    <span>Нажмите для выбора</span>
                                    <img id="blah" src="/img/default_avatar_male.jpg" alt="" width="160px">
                                    {input}</div>'
                    ])->label('Загрузить аватар с компютера')->fileInput();
                } else {
                    echo $form->field($model, 'avatar', [
                        'template' => '{label}<div class="selectAvatar">
                                    <span>Нажмите для выбора</span>
                                    <img id="blah" src="' . $model->avatar . '" alt="" width="160px">
                                    {input}</div>'
                    ])->label('Загрузить аватар с компютера')->fileInput();
                }
                ?>

            </div>


            <!--<div class="row-form">
                <?/*= $form->field($model, 'bio')->textarea() */?>
            </div>-->
            <div class="row-knopka">
                <?= \yii\helpers\Html::submitButton(Yii::t('user', 'Save'), ['class' => 'reg-form-send']) ?>
                <br>

            </div>

            <?php \yii\widgets\ActiveForm::end(); ?>


        </div>
    </div>
</section>