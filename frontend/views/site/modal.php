<?php
/**
 * @var $category
 */
?>
<div class="first-modal">
<?php foreach($category as $item): ?>
    <div class="modal-body__container modal-item" data-category="<?= $item->id; ?>">
        <div class="modal-body__container__img thumb">
            <img src="<?= $item->icon; ?>" alt="">
        </div>
        <span class="modal-body__container__subtitle"><?= $item->name; ?></span>
    </div>
<?php endforeach; ?>
</div>