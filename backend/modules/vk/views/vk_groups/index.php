<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\vk\models\VkGroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vk группы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vk-groups-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'domain',
            'name',
            'owner_id',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status === 1 ? 'Активна' : 'Не активна';
                },
            ],
            [
                'label' => 'Получение',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a('Получить', \yii\helpers\Url::to(['get-prod', 'id' => $model->id]), ['class' => 'btn btn-primary']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
