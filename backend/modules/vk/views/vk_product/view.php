<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\vk\models\VkProduct */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Vk товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$photos = \common\models\db\VkProductPhoto::find()->where(['vk_product_id' => $model->id])->all();
?>
<div class="vk-product-view">

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
            'vk_id',
            [
                'attribute' => 'owner_id',
                'value' => \common\models\db\VkGroups::find()->where(['owner_id' => $model->owner_id])->one()->name
            ],
            'title',
            'description:ntext',
            'price',
            'currency',
            [
                'attribute' => 'cat_id',
                'value' => \common\models\db\VkProductCat::find()->where(['cat_id' => $model->cat_id])->one()->cat_name
            ],
            [
                'attribute' => 'dt_add',
                'value' => date('Y-m-d', $model->dt_add)
            ],
            [
                'attribute' => 'thumb_photo',
                'format' => 'html',
                'value' => Html::img($model->thumb_photo, ['width' => '100px'])
            ],
        ],
    ]) ?>
    <div>
        <?php foreach ((array)$photos as $photo): ?>
            <?= Html::img($photo->photo, ['width' => '200px']); ?>
        <?php endforeach; ?>
    </div>
</div>
