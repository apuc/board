<?php
/**
 * @var $category array
 */
?>

<div class="help-page__content_help-category">
    <div id="cssmenu">
        <ul>
            <?php foreach ($category as $item): ?>
                <li class="<?= (isset($item['child'])) ? 'has-sub' : 'active' ?>"><a href='#' ><span><?= $item['name'] ?></span></a>
                    <?php if (isset($item['child'])): ?>
                        <ul>
                            <?php foreach($item['child'] as $sub): ?>
                                <li><a href='#'><span><?= $sub ?></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>