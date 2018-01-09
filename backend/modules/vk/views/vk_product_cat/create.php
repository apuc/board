<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\vk\models\VkProductCat */

$this->title = 'Добавить категорию VK';
$this->params['breadcrumbs'][] = ['label' => 'Vk категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vk-product-cat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
