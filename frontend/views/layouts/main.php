<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\FrontAsset;
use frontend\widgets\ShowFooter;
use frontend\widgets\ShowHeader;
use yii\helpers\Html;
use common\widgets\Alert;

FrontAsset::register($this);
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
<body class="body">
<?php $this->beginBody() ?>
    <?= ShowHeader::widget(); ?>
        <main class="main">
            <?= Alert::widget() ?>
            <?= $content ?>
        </main>
    <?= ShowFooter::widget(); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
