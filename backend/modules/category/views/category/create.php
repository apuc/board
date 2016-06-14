<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\category\models\Category */
/* @var $category */
/* @var $groupFields */

$this->title = 'Добавить категорию';
$this->params['breadcrumbs'][] = ['label' => 'Категории объявлений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
        'groupFields' => $groupFields,
    ]) ?>

</div>
