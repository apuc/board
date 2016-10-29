<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 29.10.2016
 * Time: 15:50
 * @var $order \common\models\db\Help
 * @var $last \common\models\db\Help
 */
use yii\helpers\Url;

?>
<div class="recent-article">
    <div class="recent-article-item">
        <h2>Актуальные статьи</h2>
        <div class="recent-article-item__articles">
            <?php foreach($order as $item): ?>
                <a href="<?= Url::to(['/help/default/view','slug'=>$item->slug]) ?>"><?= $item->title ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="recent-article-item">
        <h2>Последние статьи</h2>
        <div class="recent-article-item__articles">
            <?php foreach($last as $item): ?>
                <a href="<?= Url::to(['/help/default/view','slug'=>$item->slug]) ?>"><?= $item->title ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
