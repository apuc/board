<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\vk\models\VkGroups */

$this->title = 'Добавить группу';
$this->params['breadcrumbs'][] = ['label' => 'Vk группы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vk-groups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
