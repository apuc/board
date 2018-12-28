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
	<meta name="google-site-verification" content="gB7f7x-z9nhl8cg1ZaI_fJBaIMY9QBt48ILGCDyL1gw" />
	<meta name="yandex-verification" content="ec3f9f08e34a263c" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= \frontend\widgets\ShowMetrika::widget(); ?>
</head>
<body>
<?php $this->beginBody() ?>


<?= ShowHeader::widget(); ?>





<?= Alert::widget() ?>

<?= $content ?>


<?= ShowFooter::widget(); ?>

<!--<a href="#" class="scrollup_button">Наверх</a>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
