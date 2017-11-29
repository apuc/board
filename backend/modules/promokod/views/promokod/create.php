<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\promokod\models\Promokod */

$this->title = 'Create Promokod';
$this->params['breadcrumbs'][] = ['label' => 'Promokods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promokod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
