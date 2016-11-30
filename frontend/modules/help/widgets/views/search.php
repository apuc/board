<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 30.11.2016
 * Time: 11:30
 * @var $search string
 */
use yii\helpers\Url;

?>

<div class="search-panel">
    <span class="search-pic"></span>
    <form action="<?= Url::to(['/help/default/search']) ?>" method="post">
        <input type="text" name="search" class="input-search-ad" placeholder="поиск" value="<?= $search ?>">
        <input type="submit" class="adsearch-button" value="Поиск">
    </form>
</div>
