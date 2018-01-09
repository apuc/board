<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\vk\models\VkProduct */

$this->title = 'Create Vk Product';
$this->params['breadcrumbs'][] = ['label' => 'Vk Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vk-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
