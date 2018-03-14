<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 13.03.2018
 * Time: 23:16
 * @var $ad \common\models\db\Ads
 */
?>
<![CDATA[
<header>
    <h1><?= $ad->title ?></h1>
</header>
<p>
    <?= $ad->content ?>
</p>
<?php foreach ($ad->adsImgs as $img): ?>
    <img src="<?= $img->img ?>" />
<?php endforeach; ?>
]]>
