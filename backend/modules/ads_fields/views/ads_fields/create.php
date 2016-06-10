<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\ads_fields\models\Ads_fields */
/* @var $group common\models\db\GroupAdsFields */
/* @var $type common\models\db\AdsFieldsType */

$this->title = 'Добавить поле';
$this->params['breadcrumbs'][] = ['label' => 'Поля', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'group' => $group,
        'type' => $type,
    ]) ?>

</div>
