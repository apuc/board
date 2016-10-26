<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 19.10.2016
 * Time: 15:03
 * @var $users array
 */
?>
<?= $this->render('../ads/_menu')?>
<div style="float: left;width: 100%;position: relative;">
    <?php $data = (isset($_GET['user_id'])) ? ['users' => $users, 'user' => $_GET['user_id']] : ['users' => $users] ?>
    <?= \frontend\modules\msg\widgets\PrivateMessageKushalpandyaWidget::widget($data) ?>
</div>

