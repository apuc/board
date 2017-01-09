<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\adsmanager\models\Adsmanager */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Adsmanagers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adsmanager-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Опубликовать', ['update', 'id' => $model->id], [
            'class' => 'btn btn-primary',
            'data' => [
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Снять с публикации', ['remove_publication', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'user_id',
            //'category_id',
            //'dt_add',
            //'dt_update',
            'title',
            'content:ntext',
            //'slug',
            //'status',
            //'views',
            //'vip',
           // 'top',
           // 'cover',
        ],
    ]) ?>
    <div>
        <?php if(!empty($model['ads_img'])):?>
            <?php
                foreach ($model['ads_img'] as $item):
            ?>
                <div class="ads_img">
                    <img src="/<?= $item->img; ?>" alt="">
                </div>
            <?php endforeach; ?>
        <?php else:?>
            <p>Пользователь не загрузил фото</p>
        <?php endif; ?>
    </div>
</div>
