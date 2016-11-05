<?php
/**
 * @var $category array
 * @var $list \common\models\db\Help
 * @var $title string
 */

use frontend\modules\help\widgets\HelpArticleList;
use frontend\modules\help\widgets\HelpBread;
use frontend\modules\help\widgets\HelpLeftMenu;
use frontend\modules\help\widgets\HelpRightBlock;
use yii\helpers\Html;

$this->title = "Служба поддержки Rubon";

?>
<!--<section class="yellow-line">
</section>-->
<section class="support-search">
    <div class="container">
        <h1 class="title-registration-form"><?= Html::encode($this->title) ?></h1>
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
        <?= HelpLeftMenu::widget() ?>
        <div class="help-page__content_all">
            <!-- open .breadcrubs -->
            <article class="breadcrumbs">
                <!-- open .container -->

                <?= HelpBread::widget() ?>

                <!-- close .container -->
            </article>
            <!-- close .breadcrubs -->
            <div class="help-page__content_all-help-answer">
                <?= HelpArticleList::widget(['title'=>$title, 'list'=>$list]) ?>
                <?= HelpRightBlock::widget() ?>
            </div>
        </div>
    </div>
</section>