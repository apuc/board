<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\vk\models\VkProductCat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vk-product-cat-form">
    <?php //\common\classes\Debug::prn(\common\models\db\Category::getTree(0)) ?>
    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'cat_id')->textInput() ?>

    <?//= $form->field($model, 'cat_name')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'section_id')->textInput() ?>

    <?//= $form->field($model, 'section_name')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'board_cat_id')->textInput() ?>
    <?php
    echo $form->field($model, 'board_cat_id')->widget(Select2::classname(), [
        'data' => \common\models\db\Category::getTree(0),
        'options' => ['placeholder' => 'Выбрать категорию ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
