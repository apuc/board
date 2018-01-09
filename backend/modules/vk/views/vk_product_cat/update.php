<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\vk\models\VkProductCat */

$this->title = 'Редактировать категорию: ' . $model->cat_name;
$this->params['breadcrumbs'][] = ['label' => 'VK категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cat_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="vk-product-cat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
