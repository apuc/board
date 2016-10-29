<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 29.10.2016
 * Time: 13:45
 * @var $title string
 * @var $list \common\models\db\Help
 */
use yii\helpers\Url;

?>
<h2 class="help-answer_title"><?= $title ?></h2>
<div class="faq">
    <?php foreach($list as $item): ?>
        <a href="<?= Url::to(['/help/default/view', 'slug'=>$item->slug]) ?>" class="help-answer_item"><?= $item->title ?></a>
    <?php endforeach; ?>
</div>
