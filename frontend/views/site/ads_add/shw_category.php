<?php
/**
 * @var $category
 * @var $title
 */
use common\classes\AdsCategory;
?>

<h3 class="title title-change"><span class="arrow-back"></span><?= $title; ?></h3>
<div class="obvertka style-scroll">
<?php

foreach ($category as $item) :?>
    <span class="heading heading-change" data-category="<?= $item->id?>">
        <?= $item->name; ?>
        <?= (AdsCategory::getParentCategory($item->id)) ? '<span class="caret"></span>' : '' ?>
    </span>
<?php endforeach; ?>
</div>