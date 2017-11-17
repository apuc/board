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
                <!--<li><a href="">пополнить кошелек</a></li>
                <li><a href="">оплатить услугу</a></li>-->
                <li class="active"><a href="">история</a></li>
                <li class=""><a href="">ввести промокод</a></li>

            </ul>
        </div>
        <div class="kabinet-history__right">
            <h2>История операций</h2>
            <!--<div class="kabinet-history__right-nav">
                <ul>
                    <li class="active"><a href="" >Все операции <span class="count">(10)</span></a></li>
                    <li><a href="">Пополнения<span class="count">(1)</span></a></li>
                    <li><a href="">Платежи</a></li>
                </ul>
            </div>-->
            <div class="table-block">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout'=>"{items}\n{pager}",
                    //'filterModel' => $searchModel,
                    'columns' => [
                        /*['class' => 'yii\grid\SerialColumn'],*/

                        /*'user_id',*/
                        /*'category_id',*/
                        //'dt_add',
                        [
                            'attribute' => 'dt_add',
                            'label' => 'Дата',
                            'format' =>  ['date', 'dd.MM.Y'],
                            'options' => ['width' => '200']
                        ],

                        'name',
                        'sum',
                        /*[
                            'class' => 'yii\grid\ActionColumn',
                            'template' =>'{view}',
                        ],*/
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</section>