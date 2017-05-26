<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 12.01.2017
 * Time: 15:58
 * @var $parentCateg \common\models\db\CategoryOrganizations
 * @var $subCateg \common\models\db\CategoryOrganizations
 */
?>

<div class="column-modal-org">
    <div class="select-category-org-parent style-scroll">
        <?php foreach ($parentCateg as $parent): ?>
            <div class="select-category-org-parent-item" data-id="<?= $parent->id ?>"><?= $parent->name ?></div>
        <?php endforeach; ?>
    </div>
</div>
<div class="column-modal-org">
    <div class="select-category-org-child style-scroll">
        <?php foreach ($subCateg as $sub): ?>
            <div class="select-category-org-child-item" data-id="<?= $sub->id ?>"><?= $sub->name ?></div>
        <?php endforeach; ?>
    </div>
</div>

