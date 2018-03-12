<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 10.03.2018
 * Time: 1:42
 * @var $model \common\models\db\Ads
 */
$checkUrl = \yii\helpers\Url::to(['check-search', 'id' => $model->id]);
?>

<div>
    Ya:(<?= $model->check_ya === null ? 'Нет': 'Да' ?>)
</div>
<div>
    Google:(<?= $model->check_google === null ? 'Нет': 'Да' ?>)
</div>
<div>
    <?= \yii\helpers\Html::a('Проверить', 'javascript: new_window_search("'.$checkUrl.'")') ?>
</div>
