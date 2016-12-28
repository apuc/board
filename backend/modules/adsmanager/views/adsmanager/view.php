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

    <?php \common\classes\Debug::prn($model); ?>


</div>
