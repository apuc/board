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
        <?= Html::a('Опубликовать', ['publication', 'id' => $model->id], [
            'class' => 'btn btn-success',
        ]) ?>
        <?= Html::a('Снять с публикации', ['remove_publication', 'id' => $model->id], [
            'class' => 'btn btn-warning',
        ]) ?>

        <?= Html::a('Удалить', ['delete_publication', 'id' => $model->id], [
            'class' => 'btn btn-danger',
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'user_id',
            //'category_id',
            [
                'attribute'=>'category_id',
                'label' => 'Категория',
                'format' => 'html',
                'value'=>function($model){
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
            //'dt_update',
            'title',
            'content:ntext',
            'price',
            'phone',

            //'slug',
            //'status',
            //'views',
            //'vip',
           // 'top',
           // 'cover',
        ],
    ]) ?>

    <div>
        <h2>Дополнительные поля</h2>
        <div class="ad-info">
            <?php foreach( $model['ads_fields_value'] as $item ): ?>
                <div class="ad-info-row">
                    <span><?= \common\classes\Ads::getLabelAdditionalField($item->ads_fields_name);?></span>
                    <p><?= $item->value?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div>
        <h2>Изображения</h2>
        <?php if(!empty($model['ads_img'])):?>
            <?php
                foreach ($model['ads_img'] as $item):
            ?>
                <div class="ads_img">
                    <img src="<?= $item->img; ?>" alt="">
                    <a href="#" data-id="<?= $item->id; ?>" class="deleteImgBack deleteImgAjax"></a>
                </div>
            <?php endforeach; ?>
        <?php else:?>
            <p>Пользователь не загрузил фото</p>
        <?php endif; ?>
    </div>


</div>
