<?php
/**
 * @var $category
 * @var $parent_category
 * @var $title
 */
use common\classes\AdsCategory;

?>

<div class="column column-change" data-parent="0" >
    <h3 class="title">Рубрики</h3>

    <?php foreach($category as $item): ?>
        <span class="heading heading-change" data-category="<?= $item->id?>">
            <?= $item->name; ?>
            <?= (AdsCategory::getParentCategory($item->id)) ? '<span class="caret"></span>' : '' ?>
        </span>
    <?php endforeach;?>
</div>
<div class="column column-change" data-parent="1">
    <h3 class="title title-change"><?= $title; ?></h3>
    <?php foreach($parent_category as $item): ?>
        <span class="heading heading-change" data-category="<?= $item->id?>">
            <?= $item->name; ?>
            <?= (AdsCategory::getParentCategory($item->id)) ? '<span class="caret"></span>' : '' ?>
        </span>
    <?php endforeach;?>

</div>
<div class="column title-change" data-parent="2">
    <!--<h3 class="title title-change">заголовок</h3>

    <span class="heading heading-change">рубрика<span class="caret"></span></span>-->
</div>
