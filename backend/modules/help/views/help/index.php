<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\help\models\HelpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Помощь';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="help-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'title',
            'content:ntext',
            /*'slug',*/
            'dt_add',
            [
                'attribute' => 'dt_add',
                'value' => function($model){
                    return date('Y-m-d H:i', $model->dt_add);
                },
            ],
            // 'dt_update',
            // 'status',
            // 'views',
            // 'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
