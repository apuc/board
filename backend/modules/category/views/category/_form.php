<?php

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\category\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'icon')->textInput(['maxlength' => true]) */?>

    <div class="imgUpload">
        <div class="media__upload_img"><img src="<?=$model->icon;?>" width="100px"/></div>

        <?php
        echo InputFile::widget([
            'language'   => 'ru',
            'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
            'filter'     => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
            'name'       => 'Category[icon]',
            'id' => 'category-icon',
            'template'      => '<div class="input-group">{input}<span class="span-btn">{button}</span></div>',
            'options'       => ['class' => 'form-control itemImg', 'maxlength' => '255'],
            'buttonOptions' => ['class' => 'btn btn-primary'],
            'value' => $model->icon,
            'buttonName' => 'Выбрать изображение'
        ]);
        ?>
    </div>

    <?/*= $form->field($model, 'slug')->textInput(['maxlength' => true]) */?>
    <?= $form->field($model, 'parent_id')->dropDownList($category) ?>

    <?/*= $form->field($model, 'description')->textarea(['rows' => 6]) */?>

    <?php echo $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
            'preset' => 'full',
            'inline' => false,
            'path' => 'frontend/web/media/upload',
        ]),
    ]);?>

    <?= $form->field($model, 'show_menu')->checkbox() ?>
    <span class="imagesMenu <?= ($model->show_menu == 1) ? 'imagesMenuShow': ''?>">

        <?/*= $form->field($model, 'images')->textInput(['maxlength' => true]) */?>
        <div class="imgUpload">
            <div class="media__upload_img"><img src="<?=$model->images;?>" width="100px"/></div>

            <?php
            echo InputFile::widget([
                'language'   => 'ru',
                'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
                'filter'     => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
                'name'       => 'Category[images]',
                'id' => 'category-images',
                'template'      => '<div class="input-group">{input}<span class="span-btn">{button}</span></div>',
                'options'       => ['class' => 'form-control itemImg', 'maxlength' => '255'],
                'buttonOptions' => ['class' => 'btn btn-primary'],
                'value' => $model->images,
                'buttonName' => 'Выбрать изображение'
            ]);
            ?>
        </div>
    </span>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
