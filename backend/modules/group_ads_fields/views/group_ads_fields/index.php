<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\group_ads_fields\models\Group_ads_fieldsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Group Ads Fields';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-ads-fields-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Group Ads Fields', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'widgets_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
