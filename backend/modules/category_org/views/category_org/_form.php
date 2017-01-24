<?php

use common\models\db\CategoryOrganizations;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\InputFile;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\category_org\models\CategoryOrg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-org-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'icon')->textInput(['maxlength' => true]) */?>
    <?= Html::label('Иконка','categoryorg-icon', ['class'=>'control-label']) ?>
    <div class="imgUpload">
        <div class="media__upload_img"><img src="<?=$model->icon;?>" width="100px"/></div>
        <?php
        echo InputFile::widget([
            'language'   => 'ru',
            'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
            'filter'     => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
            'name'       => 'CategoryOrg[icon]',
            'id' => 'categoryorg-icon',
            'template'      => '<div class="input-group">{input}<span class="span-btn">{button}</span></div>',
            'options'       => ['class' => 'form-control itemImg', 'maxlength' => '255'],
            'buttonOptions' => ['class' => 'btn btn-primary'],
            'value' => $model->icon,
            'buttonName' => 'Выбрать изображение',
        ]);
        ?>
    </div>
    <br><br>
    <?= Html::label('Маленькая иконка','categoryorg-small_icon', ['class'=>'control-label']) ?>
    <div class="imgUpload">
        <div class="media__upload_img"><img src="<?=$model->small_icon;?>" width="100px"/></div>
        <?php
        echo InputFile::widget([
            'language'   => 'ru',
            'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
            'filter'     => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
            'name'       => 'CategoryOrg[small_icon]',
            'id' => 'categoryorg-small_icon',
            'template'      => '<div class="input-group">{input}<span class="span-btn">{button}</span></div>',
            'options'       => ['class' => 'form-control itemImg', 'maxlength' => '255'],
            'buttonOptions' => ['class' => 'btn btn-primary'],
            'value' => $model->small_icon,
            'buttonName' => 'Выбрать изображение',
        ]);
        ?>
    </div>
    <br><br>
    <?/*= $form->field($model, 'slug')->textInput(['maxlength' => true]) */?>

    <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(CategoryOrganizations::find()->all(),'id','name'), [
            'prompt' => 'Выбрать'
    ]) ?>

    <?/*= $form->field($model, 'descr')->textarea(['rows' => 6]) */?>
    <?php echo $form->field($model, 'descr')->widget(CKEditor::className(),[
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
            'preset' => 'full',
            'inline' => false,
            'path' => 'frontend/web/media/upload',
        ]),
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
