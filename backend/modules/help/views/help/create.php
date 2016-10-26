<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\help\models\Help */

$this->title = 'Добавить статью';
$this->params['breadcrumbs'][] = ['label' => 'Помощь', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="help-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
