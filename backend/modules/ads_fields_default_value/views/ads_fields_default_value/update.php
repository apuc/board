<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\ads_fields_default_value\models\Ads_fields_default_value */
/* @var $fields common\models\db\AdsFields */

$this->title = 'Update Ads Fields Default Value: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ads Fields Default Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ads-fields-default-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fields' => $fields,
    ]) ?>

</div>
