<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\ShowFooter;
use frontend\widgets\ShowHeader;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= \frontend\widgets\ShowMetrika::widget(); ?>
</head>
<body>
<?php $this->beginBody() ?>


<?= ShowHeader::widget(); ?>
<!--<section class="home-baner">
    <div class="container">
        <div class="baner">
            БАНЕР
        </div>
    </div>
</section>-->
<?= \frontend\modules\banner\widgets\ShowTopBanner::widget(); ?>

<?= \frontend\widgets\ShowSearch::widget(); ?>



<?= $content ?>


<?= ShowFooter::widget(); ?>

<a href="#" class="scrollup_button">Наверх</a>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
