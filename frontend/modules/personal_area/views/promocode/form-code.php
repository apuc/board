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
                <li><a href="">история</a></li>
                <li class="active">
                    <a href="">ввести промокод</a>
                </li>

            </ul>
        </div>
        <div class="kabinet-history__right">
            <h2>Введите промокод</h2>
            <form action="<?= Url::to(['/personal_area/promocode/add'])?>" method="post">
                <?= \yii\helpers\Html::hiddenInput('_csrf', Yii::$app->request->csrfToken); ?>
                <?= \yii\helpers\Html::textInput('code'); ?>
                <?= \yii\helpers\Html::input('submit', 'Отправить')?>
            </form>

        </div>
    </div>
</section>