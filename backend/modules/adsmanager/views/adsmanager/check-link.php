<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 12.03.2018
 * Time: 1:00
 * @var $has array
 */
?>

<div>
    Google: <?= $has['google'] ? 'Да' : 'Нет' ?>
</div>
<?php if(is_array($has['ya'])): ?>

<?php else: ?>
<div>
    Ya: <?= $has['ya'] ? 'Да' : 'Нет' ?>
</div>
<?php endif; ?>
<div>
    <input type="button" value="Готово" onclick="window.close()">
</div>