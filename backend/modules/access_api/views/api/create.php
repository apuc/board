<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\access_api\models\AccessApi */

$this->title = 'Create Access Api';
$this->params['breadcrumbs'][] = ['label' => 'Access Apis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-api-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
