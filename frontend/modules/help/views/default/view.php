<?php
/**
 * @var $article \common\models\db\Help
 */

use frontend\modules\help\widgets\HelpArticleList;
use frontend\modules\help\widgets\HelpBread;
use frontend\modules\help\widgets\HelpLeftMenu;
use frontend\modules\help\widgets\HelpRightBlock;

$this->title = $article->title;

?>
<section class="yellow-line">
</section>
<section class="support-search">
    <div class="container">
        <div class="support_block">
            <h2 class="support_block-title">Служба поддержки</h2>
        </div>
        <div class="search-panel">
            <span class="search-pic"></span>
            <input type="text" class="input-search-ad" placeholder="поиск по объявлениям автомобили">
            <a href="" class="adsearch-button">Поиск</a>
        </div>
    </div>
</section>
<section class="help-page__content">
    <div class="container">
        <?= HelpLeftMenu::widget(['category_id'=>$article->category_id]) ?>
        <div class="help-page__content_all">
            <!-- open .breadcrubs -->
            <article class="breadcrumbs">
                <!-- open .container -->

                <?= HelpBread::widget() ?>

                <!-- close .container -->
            </article>
            <!-- close .breadcrubs -->
            <div class="help-page__content_all-help-answer">
                <h2 class="help-answer_title"><?= $article->title ?></h2>
                <div class="faq" style="text-align: left;padding-left: 30px">
                   <?= $article->content ?>
                </div>
                <?= HelpRightBlock::widget() ?>
            </div>
        </div>
    </div>
</section>