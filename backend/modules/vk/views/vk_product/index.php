<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\vk\models\VkProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vk товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vk-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>-->
    <!--    --><? //= Html::a('Create Vk Product', ['create'], ['class' => 'btn btn-success']) ?>
    <!--</p>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'owner_id',
                'value' => function ($model) {
                    return \common\models\db\VkGroups::find()->where(['owner_id' => $model->owner_id])->one()->name;
                },
            ],
            'title',
            [
                'attribute' => 'thumb_photo',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img($model->thumb_photo, ['width' => '100px']);
                },
            ],
            [
                'attribute' => 'cat_id',
                'value' => function ($model) {
                    return \common\models\db\VkProductCat::find()->where(['cat_id' => $model->cat_id])->one()->cat_name;
                },
            ],
            [
                'attribute' => 'price',
                'value' => function ($model) {
                    return $model->price . ' ' . $model->currency;
                },
            ],
            // 'description:ntext',
            // 'price',
            // 'currency',
            // 'cat_id',
            // 'dt_add',
            // 'thumb_photo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
