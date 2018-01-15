<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 09.01.2018
 * Time: 23:36
 * @var $model \common\models\db\VkUserGroups
 * @var $count integer
 * @var $info array
 * @var $userCompany \common\models\db\Organizations
 */
use yii\helpers\Html;

?>

<div class="group-item">
    <?php echo $this->render('_update_group', ['group' => $model, 'userCompany' => $userCompany]) ?>
</div>
