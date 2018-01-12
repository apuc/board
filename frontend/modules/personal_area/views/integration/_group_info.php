<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 09.01.2018
 * Time: 23:36
 * @var $model \common\models\db\VkUserGroups
 * @var $count integer
 */
use yii\helpers\Html;

?>

<div>
    <span><?= Html::img($model->photo) ?></span>
    <span><?= $model->name ?></span>
    <div>
        <?php if ($count): ?>
            <span>Кол-во товаров: <?= $count ?></span>
        <?php else: ?>
            <span>Товаров не найдено</span>
        <?php endif; ?>
    </div>
    <form action="#">
        <input type="button" value="Удалить" id="del_vk_btn">
    </form>
</div>
