<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\category_help\models\CategoryHelp */

$this->title = 'Добавить категорию';
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-help-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
