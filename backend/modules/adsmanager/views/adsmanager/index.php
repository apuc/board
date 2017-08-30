<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\adsmanager\models\AdsmanagerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объявления пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adsmanager-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?/*= Html::a('Create Adsmanager', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            /*'user_id',*/
            /*'category_id',*/
            [
                'attribute'=>'category_id',
                'label' => 'Категория',
                'format' => 'text',
                'content'=>function($model){
                    $listcat = \common\classes\AdsCategory::getListCategory($model->category_id, []);
                    $listcat = array_reverse($listcat);
                    array_shift($listcat);
                    $k = 1;
                    $category = '';
                    foreach($listcat as $val):
                         $category .= $val;
                         ($k == count($listcat)) ? '' : $category .= '<span class="separatorListCategory"> | </span>';
                         $k++;
                    endforeach;
                    return $category;
                }

            ],
            //'dt_add',
            [
                'attribute' => 'dt_add',
                'format' =>  ['date', 'dd.MM.Y'],
                'options' => ['width' => '200']
            ],
            //'dt_update',
            [
                'attribute' => 'dt_update',
                'format' =>  ['date', 'dd.MM.Y'],
                'options' => ['width' => '200']
            ],
             'title',
            // 'content:ntext',
            // 'slug',
             //'status',
            /*[
                'attribute' => 'status',
                'label' => 'Статус',
                'format' => 'html',
                'content' => function($model){
                    $status = \common\models\db\Status::find()->where(['id' => $model->status])->one();
                    return $status->name;

                }
            ],*/

            [
                'attribute' => 'status',
                'label' => 'Статус',
                'format' => 'html',
                'value'     => function ( $model ) {
                    $status = \common\models\db\Status::find()->where(['id' => $model->status])->one();
                    return $status->name;
                },
                'filter'    => Html::activeDropDownList(
                    $searchModel,
                    'status',
                    \yii\helpers\ArrayHelper::map(\common\models\db\Status::find()->all(), 'id', 'name'),
                    [ 'class' => 'form-control', 'prompt' => '' ] ),
            ],

            // 'views',
            // 'vip',
            // 'top',
            // 'cover',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' =>'{view}',
            ],
        ],
    ]); ?>
</div>
