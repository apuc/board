<?php
switch ($act){
    case 'vip': $act = "vip"; $name = 'vip'; break;
    case 'pick': $act = "pick"; $name = 'выделенным'; break;
    case 'raise': $act = "raise"; $name = 'поднятым'; break;
}
?>

<div class="modal-wrap">
    <p>
    <?php if($act == 'raise'): ?>
        Вы действительно хотите поднять объявление
    <?php else: ?>
        Вы действительно хотите сделать объявление
        <?= $name; ?>

    <?php endif; ?>
    ?
    </p>
    <a href="#" class="publish yes-control-ads" data-id="<?= $id;?>" data-act="<?= $act; ?>">Да<span></span></a>
    <a href="#" class="publish no-control-ads">Нет<span></span></a>

</div>