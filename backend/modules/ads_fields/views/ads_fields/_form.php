<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\ads_fields\models\Ads_fields */
/* @var $form yii\widgets\ActiveForm */
/* @var $group common\models\db\GroupAdsFields */
/* @var $type common\models\db\AdsFieldsType */
/* @var $selectcat common\models\db\AdsFieldsGroupAdsFields */

/*\common\classes\Debug::prn(\yii\helpers\ArrayHelper::index($selectcat, 'group_ads_fields_id'));*/

?>
<div class="ads-fields-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_id')->dropDownList(\yii\helpers\ArrayHelper::map($type, 'id', 'type'),['prompt' => 'Выберите тип']) ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'template')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'hint')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($group, 'group_id')->dropDownList(\yii\helpers\ArrayHelper::map($group, 'id', 'name'),['prompt' => 'Выберите категорию','multiple'=>true]) */?>

    <?= Html::dropDownList('group_id', $selectcat, \yii\helpers\ArrayHelper::map($group, 'id', 'name'), ['prompt' => 'Выберите группу полей','multiple'=>true, 'class' => 'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
