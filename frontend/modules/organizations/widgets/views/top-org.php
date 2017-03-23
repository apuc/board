<?php
use yii\helpers\Url;
//\common\classes\Debug::prn($org);
?>

<section class="home-slider white-slider">
    <div class="container">
        <h3>ТОП организаций</h3>
        <a href="<?= Url::toRoute(['/organizations/default/all'])?>">смотреть все</a>
        <div class="owl-model">

            <?php foreach($org as $item):
                /*\common\classes\Debug::prn($item);*/
                ?>
                <div class="slide">
                    <a href="<?= \yii\helpers\Url::to(['/organizations/default/view','slug' => $item->slug])?>" class="slide-link">
                        <?php if(empty($item['logo'])): ?>
                            <img src='/img/no-img.png' alt="<?= $item->title; ?>" title="<?= $item->title; ?>">
                        <?php else: ?>
                            <img src='/<?= $item['logo']; ?>' alt="<?= $item->title; ?>" title="<?= $item->title; ?>">
                        <?php endif; ?>
                        <h4><?= $item->title; ?></h4>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
