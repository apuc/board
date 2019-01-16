<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\organization\models\OrganizationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Организации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить организацию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'title',
            [
               'attribute'=>'logo',
               'format'=>'raw',
               'value'=>function($m) {
                   return Html::img(Yii::$app->getUrlManager()->getHostInfo()."/".$m->logo,['height'=>100]);
               }
            ],

            'slug',
            // 'descr:ntext',
            // 'dt_add',
            // 'dt_update',
            // 'status',
            // 'views',
            // 'region_id',
            // 'city_id',
            // 'user_id',
            // 'mail',
            // 'phone',
            // 'site',
            // 'schedule',
            // 'vip',
            // 'category_id',
            // 'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
