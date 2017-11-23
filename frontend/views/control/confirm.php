<?php
switch ($act){
    case 'vip': $act = "VIP";break;
}
?>

<div>
    Вы действительно хотите сделать объявление
    <?= $act; ?>
    ?

    <a href="#" class="publish yes-control-ads" data-id="<?= $id;?>" data-act="<?= $act; ?>">Да<span></span></a>
    <a href="#" class="publish no-control-ads">Нет<span></span></a>

</div>