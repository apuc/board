<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\organization\models\Organizations */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute'=>'logo',
                'format'=>'raw',
                'value'=>function($m) {
                    return Html::img(Yii::$app->getUrlManager()->getHostInfo()."/".$m->logo,['height'=>100]);
                }
            ],
            [
                'attribute'=>'header',
                'format'=>'raw',
                'value'=>function($m) {
                    return Html::img(Yii::$app->getUrlManager()->getHostInfo()."/".$m->header,['height'=>100]);
                }
            ],
            'slug',
            'descr:ntext',
            [
                'attribute'=>'dt_add',
                'value'=>function($m){
                    return date("d-m-Y",$m->dt_add);
                }
            ],
            [
                'attribute'=>'dt_update',
                'value'=>function($m){
                    return date("d-m-Y",$m->dt_update);
                }
            ],
            [
                'attribute'=>'status',
                'value'=>function($m){
                    return ($m->status == 2) ? "Опубликовн" : "Не опубликован";
                }
            ],
            'views',
            [
                'attribute'=>'region_id',
                'value'=>function($m){
                    return $m->region['name'];
                }
            ],
            [
                'attribute'=>'city_id',
                'value'=>function($m){
                    return $m->city['name'];
                }
            ],
            [
                'attribute'=>'vip',
                'value'=>function($m){
                    return ($m->vip == 1) ? "Да" : "Нет";
                }
            ],
            'mail',
            'phone',
            'site',
            'schedule',
            [
                'attribute'=>'vip',
                'value'=>function($m){
                    return ($m->vip == 1) ? "Да" : "Нет";
                }
            ],
            [
             'attribute'=>'category_id',
             'value'=>function($m){
                return $m->category['name'];
             }
            ],
            'address',
        ],
    ]) ?>

</div>
