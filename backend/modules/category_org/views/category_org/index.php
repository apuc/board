<?php

use common\models\db\CategoryOrganizations;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\category_org\models\CategoryOrgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории организаций';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-org-index">

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

            'name',
            [
                'attribute' => 'parent_id',
                'format' => 'html',
                'value' => function($model){
                    $parent = CategoryOrganizations::find()->where(['id'=>$model->parent_id])->one();
                    if(!empty($parent)){
                        return CategoryOrganizations::find()->where(['id'=>$model->parent_id])->one()->name;
                    }
                    return "Нет";
                }
            ],
            [
                'attribute' => 'icon',
                'format' => 'html',
                'value' => function($model){
                    return "<img src='$model->icon' width='75px'>";
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
