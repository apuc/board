<?php
/* @var $this yii\web\View */
/* @var $searchModel \frontend\modules\personal_area\models\UserScoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;

$this->title = 'История платежей';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= \frontend\modules\personal_area\widgets\MenuPersonalArea::widget() ?>

<section class="kabinet-history">
    <div class="container">
        <div class="kabinet-history__left">
            <ul>
                <li><a href="<?= Url::toRoute(['/personal_area/score'])?>">история</a></li>
                <li class="active">
                    <a href="">ввести промокод</a>
                </li>

            </ul>
        </div>
        <div class="kabinet-history__right">
            <main class="cabinet-promo">
                <div class="title">
                    <h3>Введите промокод</h3>
                </div>

                <div class="code">
                    <form method="POST" action="<?= Url::to(['/personal_area/promocode/add'])?>">
                        <?= \yii\helpers\Html::hiddenInput('_csrf', Yii::$app->request->csrfToken); ?>
                        <div>
                            <label for="code">Добавьте код</label>
                            <?= \yii\helpers\Html::textInput('code', null, ['id' => 'code']); ?>
                        </div>
                        <img src="/img/icons/ruble1.png" alt="">
                        <?= \yii\helpers\Html::input('submit', 'Отправить',null, ['id' => 'submit'])?>
                        <p>Данный код дает вам возможность поднять свои объявления в ТОП для быстрой и эффективной
                            продажи</p>
                    </form>

                </div>

                <!--<div class="use-code">
                    <h4>Используйте код прямо сейчас:</h4>
                    <div class="use-code__variants">
                        <a href="#">Сделать вип</a>
                        <a href="#">Выделить объявление</a>
                        <a href="#">Поднять объявление</a>
                    </div>
                </div>-->
            </main>

            <!--<h2>Введите промокод</h2>
            <form action="<?/*= Url::to(['/personal_area/promocode/add'])*/?>" method="post">
                <?/*= \yii\helpers\Html::hiddenInput('_csrf', Yii::$app->request->csrfToken); */?>
                <?/*= \yii\helpers\Html::textInput('code'); */?>
                <?/*= \yii\helpers\Html::input('submit', 'Отправить')*/?>
            </form>-->

        </div>
    </div>
</section>