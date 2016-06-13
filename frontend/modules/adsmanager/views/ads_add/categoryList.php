<?php
/**
 * @var $category
 */
\common\classes\Debug::prn($category);
?>


    <img src="<?= $category[0];?>" />
<?php
array_shift($category);
foreach($category as $item):
?>
    <span><?= $item; ?></span>

<?php endforeach;
?>

<div class="generalModalCategory">Изменить</div>
