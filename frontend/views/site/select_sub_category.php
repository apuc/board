<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 12.01.2017
 * Time: 16:27
 * @var $parentCateg \common\models\db\CategoryOrganizations
 * @var $subCateg \common\models\db\CategoryOrganizations
 */
?>

<div class="selected-sub-categ">
    <img src="<?= $parentCateg->icon ?>" alt="">
    <span class="parent"><?= $parentCateg->name ?></span> /
    <span class="child"><?= $subCateg->name ?></span>
</div>
<span class="place-ad__form__search">Изменить</span>