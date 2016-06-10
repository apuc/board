<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ads_fields_default_value\models\Ads_fields_default_valueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ads Fields Default Values';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-fields-default-value-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ads Fields Default Value', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'value',
            'ads_field_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
