<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.12.2016
 * Time: 13:14
 * @var $post array
 */
use common\models\db\CategoryHelp;

?>

<div>
    <p><b>Категория:</b> <?= CategoryHelp::find()->where(['id'=>$post['category']])->one()->name ?></p>
    <p><b>Email:</b> <?= $post['email'] ?></p>
    <?php if(!empty($post['object_id'])): ?>
        <p><b>ID объявления:</b> <?= $post['object_id'] ?></p>
    <?php endif ?>

    <?php if(!empty($post['name'])): ?>
        <p><b>Имя:</b> <?= $post['name'] ?></p>
    <?php endif ?>
    <p><b>Текст:</b> <?= $post['descr'] ?></p>
</div>
