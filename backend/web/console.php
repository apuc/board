<?php
echo '<a href="/secure/vk/vk_groups">Назад</a>';
echo '<br>';


if($_GET['p']=='parser'){

    // параметры вводимые в консоли, только уже в виде масива
    $_SERVER['argv'] = [
        0 => __FILE__,
        1 => 'parser',
    ];
    //if(!empty($_GET['id'])) $_SERVER['argv'][1] .= ' '.$_GET['id'];
    // к-во элементов массива argv
    $_SERVER['argc'] = 2;

    require '../../yii';

}

/*if($_GET['p']=='vk/get-group-info'){

    // параметры вводимые в консоли, только уже в виде масива
    $_SERVER['argv'] = [ 0=>__FILE__, 1=>'vk/get-group-info'];
    //if(!empty($_GET['id'])) $_SERVER['argv'][1] .= ' '.$_GET['id'];
    // к-во элементов массива argv
    $_SERVER['argc'] = 2;

    require '../../yii';

}*/