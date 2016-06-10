<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\group_ads_fields\models\Group_ads_fields */

$this->title = 'Create Group Ads Fields';
$this->params['breadcrumbs'][] = ['label' => 'Group Ads Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-ads-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
