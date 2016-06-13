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
</head>
<body>
<?php $this->beginBody() ?>


<?= ShowHeader::widget(); ?>

<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
<?= Alert::widget() ?>

<?= $content ?>


<?= ShowFooter::widget(); ?>
<!-- Modal -->
<div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?= \frontend\widgets\Login::widget(); ?>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">


        <div class="modal-content">
            <div class="modal-header">
                <img src="/img/sticker.png" alt="sticker"/>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Вы разместили объявление, но у вас нет пароля?</h4>
                <a href="#">Нажмите здесь</a>
            </div>
            <div class="modal-body">
                <input class="reg__form--field" type="text" placeholder="Введите ваш email-адрес">
                <input class="reg__form--field" type="text" placeholder="Пароль">
                <input type="checkbox"/></span>
                <p>Запомнить меня</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="reg__form--btn">войти</button>

                <a href="#">Не можете войти?</a>
                <a href="reg.html">Регистрация</a>
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>-->

                <div class="modal-footer__social">

                    <a class="modal-footer__social--link" href="#"><img src="/img/vk-i.png" alt=""/>
                        Войти через ВКонтакте</a>

                    <a class="modal-footer__social--link" href="#"><img src="/img/fb-i.png" alt=""/>
                        Войти через Facebook</a>

                </div>
            </div>
            <div class="modal-footer--underline">
                <img src="/img/modal-under.png" alt=""/>
            </div>
        </div>
    </div>
</div>
<!--close Modal -->
<a href="#" id='Go_Top'><img alt="up" src="/img/up.png"></a>



<!--<div class="wrap">
    <?php
/*    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    */?>

    <div class="container">
        <?/*= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) */?>
        <?/*= Alert::widget() */?>
        <?/*= $content */?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?/*= date('Y') */?></p>

        <p class="pull-right"><?/*= Yii::powered() */?></p>
    </div>
</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
