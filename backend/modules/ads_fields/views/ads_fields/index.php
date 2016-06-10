<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ads_fields\models\Ads_fieldsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-fields-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить поле', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type_id',
            'label',
            'template',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
