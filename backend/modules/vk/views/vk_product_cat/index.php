<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\vk\models\VkProductCatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vk категории товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vk-product-cat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'cat_id',
            'cat_name',
            //'section_id',
            'section_name',
            [
                'attribute' => 'board_cat_id',
                'value' => function($model){
                    if(!empty($model->board_cat_id)){
                        return \common\models\db\Category::getNameById($model->board_cat_id);
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
