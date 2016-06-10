<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\group_ads_fields\models\Group_ads_fields */

$this->title = 'Update Group Ads Fields: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Group Ads Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="group-ads-fields-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
