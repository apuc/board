<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\category_help\models\CategoryHelp */

$this->title = 'Create Category Help';
$this->params['breadcrumbs'][] = ['label' => 'Category Helps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-help-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
