<?php
/**
 * @var $banner
 * @var $array
 */
//\common\classes\Debug::prn($banner);


foreach ($banner as $item):
?>
    <div class="banner">
        <a href="<?= $array[$item]['link']; ?>">
            <img src="<?= $array[$item]['img']; ?>" alt="<?= $array[$item]['title']; ?>">
        </a>
    </div>

<?php endforeach;



