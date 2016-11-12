<?php
/**
 * @var $category array
 */
use yii\helpers\Url;
$menu = new \frontend\modules\help\widgets\HelpLeftMenu();
$menu->category_id = $category_id;
?>

<div class="help-page__content_help-category">
    <div id="cssmenu">
        <!--<ul>

            <?php /*foreach ($category as $key=>$item): */?>
                <li class="<?/*= (isset($item['child'])) ? 'has-sub' : 'active' */?>">
                    <a href='<?/*= Url::to(['/help/default/category', 'id'=>$key]) */?>' ><span><?/*= $item['name'] */?></span></a>
                    <?php /*if (isset($item['child'])): */?>
                        <ul>
                            <?php /*foreach($item['child'] as $k=>$sub): */?>
                                <li><a href='<?/*= Url::to(['/help/default/category', 'id'=>$k]) */?>'><span><?/*= $sub */?></span></a></li>
                            <?php /*endforeach; */?>
                        </ul>
                    <?php /*endif; */?>
                </li>
            <?php /*endforeach; */?>
        </ul>-->

        <?php $menu->get_tree($category,0) ?>
    </div>

</div>