<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.01.2017
 * Time: 11:33
 * @var $catOrg \common\models\db\CategoryOrganizations
 * @var $org \common\models\db\Organizations
 */

use common\classes\WordFunctions;
use frontend\modules\organizations\widgets\CategoryBar;
use frontend\widgets\ShowTree;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->registerJsFile('/js/organizations.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
//\common\classes\Debug::prn(\common\classes\OrganizationInfo::getAllInfoCatBySlug(Yii::$app->request->get()));
$this->title = "Все организации";
//$this->params['breadcrumbs'][] = ['label' => $this->title];
if(Yii::$app->request->get()){
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/organizations/default/all']];
    $categ = \common\classes\OrganizationInfo::getAllInfoCatBySlug(Yii::$app->request->get());
    if(!empty($categ['parent_categ'])){
        $this->params['breadcrumbs'][] = ['label' => $categ['parent_categ']['name'], 'url' => ['/organizations/default/all', 'slug' => $categ['parent_categ']['slug']]];

    }
    $this->params['breadcrumbs'][] = ['label' => $categ['categ']['name']];
}
else{
    $this->params['breadcrumbs'][] = ['label' => $this->title];
}

?>
<?= \frontend\widgets\ShowOrganizationsSearch::widget(['class_c' => 'adpage']) ?>

<section class="all-shops__content">
    <div class="container">
        <?= ShowTree::widget([
            'model' => $catOrg,
            'wrap' => '<div class="all-shops__content_left"><div id="cssmenu-1">{tree}</div></div>',
            'tpl' => '<ul>{items}</ul>',
            'item_tpl' => '<li class="has-sub">{item}</li>',
            'item_tpl_last' => '<li class="{active}">{item}</li>',
            /*'item' => '<a href="{slug}">{small_icon}<span class="bow-tie icon"></span>{name}</a>',*/
            'active' => 'active',
            'active_field' => 'slug',
            'active_value' => Yii::$app->request->get('slug'),
            'item' => '<a href="{link}"><span class="icon"><img src="{small_icon}" alt=""></span>{name}</a>',
            'item_fields' => [
                [
                    'key'=>'link',
                    'value'=> Url::to(['/organizations/default/all','slug'=>'{slug}'])
                ]
            ]
        ]) ?>
        <div class="all-shops__content_right">
            <!-- open .breadcrubs -->
            <article class="breadcrumbs">
                <!-- open .container -->

                <!-- open .bread -->
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => ['class' => 'breadcrumbs__list']
                ]) ?>
                <!-- close .bread -->

                <!-- close .container -->
            </article>
            <!-- close .breadcrubs -->
            <!--<span class="count-shops">Все магазины в России: 12 267</span>-->
            <div class="average-ad">
                <?= \yii\widgets\ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_list',

                    'itemOptions' => [
                        'tag' => 'div',
                        'class' => 'average-ad-item',
                    ],
                    'emptyText' => '<div class="average-ad-item search-warning">
						<div class="search-warning-pic">
							<img src="/img/search-warning.png" alt="">
						</div>
						<div class="average-ad-item-content">
							<span class="search-warning-title">По вашему запросу ничего не найдено. </span>

						</div>
						<div class="search-recomendation">
							<p><b>Рекомендации:</b></p>
							<p>Убедитесь, что все слова написаны без ошибок.</p>
							<p>Попробуйте использовать другие ключевые слова.</p>
							<p>Попробуйте использовать более популярные ключевые слова.</p>
						</div>
						<div class="append-button">

                        <a href="' . \yii\helpers\Url::to(['/organizations/default/add']) . '"><span class="plus-icon">+</span>добавить организацию</a>
                    </div>
					</div>
                    ',
                    'emptyTextOptions' => [
                        'tag' => 'div',
                    ],
                    'layout' => "{items}<div class=\"pagination\">{pager}</div>",
                    'pager' => [
                        'options' => [
                            'class' => '',
                        ],
                        'prevPageCssClass' => 'pagination-prew',
                        'nextPageCssClass' => 'pagination-next',
                        'prevPageLabel' => '',
                        'nextPageLabel' => '',
                        'activePageCssClass' => 'active',
                        'maxButtonCount' => 5,
                    ],
                ])?>

            </div>
            <div class="right-sidebar">
                <?= \frontend\modules\banner\widgets\ShowRightBanner::widget(); ?>
            </div>

        </div>
    </div>
</section>
