<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\vk\models\VkProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vk-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vk_id')->textInput() ?>

    <?= $form->field($model, 'owner_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_id')->textInput() ?>

    <?= $form->field($model, 'dt_add')->textInput() ?>

    <?= $form->field($model, 'thumb_photo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
