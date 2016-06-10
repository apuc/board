<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\ads_fields_default_value\models\Ads_fields_default_value */
/* @var $fields common\models\db\AdsFields */

$this->title = 'Create Ads Fields Default Value';
$this->params['breadcrumbs'][] = ['label' => 'Ads Fields Default Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-fields-default-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fields' => $fields,
    ]) ?>

</div>
