<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\access_api\models\AccessApi */

$this->title = 'Update Access Api: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Access Apis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="access-api-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
