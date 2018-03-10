<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 10.03.2018
 * Time: 1:42
 * @var $model \common\models\db\Ads
 */
$yaCheckUrl = \yii\helpers\Url::to(['check-ya', 'id' => $model->id]);
?>

<div>
    Ya:(<?= $model->check_ya === null ? 'Нет': 'Есть' ?>)
    <br>
    <?= \yii\helpers\Html::a('Проверить', 'javascript: new_window("'.$yaCheckUrl.'")') ?>
</div>

