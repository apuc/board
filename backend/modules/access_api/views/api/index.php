<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\access_api\models\AccessApiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Access Apis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-api-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Access Api', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'mail',
            'site',
            'visible_ads',
            // 'api_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
