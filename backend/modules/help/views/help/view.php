<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\help\models\Help */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Помощь', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="help-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content:ntext',
            'slug',
            'dt_add',
            'dt_update',
            'status',
            'views',
            'category_id',
        ],
    ]) ?>

</div>
