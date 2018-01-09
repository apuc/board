<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\vk\models\VkProduct */

$this->title = 'Update Vk Product: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Vk Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vk-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
