<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 08.01.2018
 * Time: 1:01
 * @var $count integer
 */

?>

<div>
    <h2><?= $count ?> продуктов получено</h2>
    <?= \yii\helpers\Html::a('Назад', \yii\helpers\Url::to(['index']), ['class' => 'btn btn-primary']) ?>
</div>
