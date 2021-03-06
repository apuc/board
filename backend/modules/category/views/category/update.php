<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\category\models\Category */
/* @var $category */
/* @var $groupFields */
/* @var $selectGroup */

$this->title = 'Редактировать: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории объявлений', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
        'groupFields' => $groupFields,
        'selectGroup' => $selectGroup,
    ]) ?>

</div>
