<?php
/**
 * @var $article \common\models\db\Help
 */

use frontend\modules\help\widgets\HelpArticleList;
use frontend\modules\help\widgets\HelpBread;
use frontend\modules\help\widgets\HelpLeftMenu;
use frontend\modules\help\widgets\HelpRightBlock;
use frontend\modules\help\widgets\SearchForm;
use yii\helpers\Url;

$this->title = $article->title;

?>
<section class="yellow-line">
</section>
<section class="support-search">
    <div class="container">
        <div class="support_block">
            <h2 class="support_block-title">Служба поддержки</h2>
        </div>
        <?= SearchForm::widget() ?>
    </div>
</section>
<section class="help-page__content">
    <div class="container">
        <?= HelpLeftMenu::widget(['category_id' => $article->category_id]) ?>
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
                    <span>Еще нужна помощь?</span>
                    <a href="<?= Url::to(['/help/default/contact']) ?>" class="contact-us">Свяжитесь с нами</a>
                </div>
                <?= HelpRightBlock::widget() ?>
            </div>
        </div>
    </div>
</section>