<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\adsmanager\models\AdsmanagerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объявления пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adsmanager-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <? /*= Html::a('Create Adsmanager', ['create'], ['class' => 'btn btn-success']) */ ?>
    </p>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            /*'user_id',*/
            /*'category_id',*/
            [
                'attribute' => 'pars',
                'label' => 'Откуда',
                'format' => 'raw',
                'content' => function ($model) {
                    $html = '';
                    if ($model->pars == 1) {
                        $html = '<span class="rubon">P</span>';
                    }
                    if ($model->pars == 0) {
                        if ($model->site_id == 0) {
                            $html = '<span class="rubon">R</span>';
                        } else {
                            $site = \backend\modules\access_api\models\AccessApi::find()->where(['id' => $model->site_id])->one();
                            $html = "<span>$site->site</span>";
                        }

                    }
                    return $html;
                },
            ],
            [
                'attribute' => 'category_id',
                'label' => 'Категория',
                'format' => 'text',
                'filter' => \kartik\select2\Select2::widget([
                    'data' => \common\classes\AdsCategory::getCategoryTree(0),
                    'name' => 'AdsmanagerSearch[category_id]',
                    'options' => [
                        'placeholder' => 'Выберите категорию',
                        'value' => $searchModel->category_id
                    ]
                ]),
                'content' => function ($model) {
                    $listcat = \common\classes\AdsCategory::getListCategory($model->category_id, []);
                    $listcat = array_reverse($listcat);
                    array_shift($listcat);
                    $k = 1;
                    $category = '';
                    foreach ($listcat as $val):
                        $category .= $val;
                        ($k == count($listcat)) ? '' : $category .= '<span class="separatorListCategory"> | </span>';
                        $k++;
                    endforeach;
                    return $category;
                },

            ],
            //'dt_add',
            [
                'attribute' => 'dt_add',
                'format' => ['date', 'dd.MM.Y'],
                'options' => ['width' => '100'],
            ],
            //'dt_update',
            [
                'attribute' => 'dt_update',
                'format' => ['date', 'dd.MM.Y'],
                'options' => ['width' => '100'],
            ],
            'title',
			[
				'attribute' => 'user.email',
				'label' => 'Пользователь',
				'format' => 'text',
				'filter' => \kartik\select2\Select2::widget([
					'data' => \common\models\User::getUsersEmails(),
					'name' => 'AdsmanagerSearch[user_id]',
					'options' => [
						'placeholder' => 'Выберите пользователя',
						'value' => $searchModel->mail
					]
				]),
			],
            // 'content:ntext',
            // 'slug',
            //'status',
            /*[
                'attribute' => 'status',
                'label' => 'Статус',
                'format' => 'html',
                'content' => function($model){
                    $status = \common\models\db\Status::find()->where(['id' => $model->status])->one();
                    return $status->name;

                }
            ],*/

            [
                'attribute' => 'status',
                'label' => 'Статус',
                'format' => 'html',
                'value' => function ($model) {
                    $status = \common\models\db\Status::find()->where(['id' => $model->status])->one();
                    return $status->name;
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'status',
                    \yii\helpers\ArrayHelper::map(\common\models\db\Status::find()->all(), 'id', 'name'),
                    ['class' => 'form-control', 'prompt' => '']),
            ],

            // 'views',
            // 'vip',
            // 'top',
            // 'cover',
            [
                'label' => 'Сети',
                'format' => 'raw',
                'value' => function ($model) {
                    return $this->render('_soc-link', ['slug' => $model->slug, 'model' => $model]);
                },
            ],
            [
                'label' => 'Индексация',
                'format' => 'raw',
                'value' => function ($model) {
                    return $this->render('_search_system', ['model' => $model]);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
<SCRIPT LANGUAGE="JavaScript">
    <!--
    var newWinSearch;
    function new_window_search(link) {
        newWinSearch = window.open(link, 'newwin', 'top=15, left=20, menubar=0, toolbar=0, location=0, directories=0, status=0, scrollbars=1, resizable=0, width=400, height=400');
        //newWin.onload = function () {
        //    newWin.document.write("Публикация...");
        //    newWin.close();
        //}
    }
    // -->
</SCRIPT>