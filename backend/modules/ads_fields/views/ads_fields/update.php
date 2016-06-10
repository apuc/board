<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\ads_fields\models\Ads_fields */
/* @var $group common\models\db\GroupAdsFields */
/* @var $type common\models\db\AdsFieldsType */
/* @var $selectcat common\models\db\AdsFieldsGroupAdsFields */

$this->title = 'Редактировать поле: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Поля', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="ads-fields-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'group' => $group,
        'type' => $type,
        'selectcat' => $selectcat,
    ]) ?>

</div>
