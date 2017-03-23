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

$this->registerJsFile('/js/organizations.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = "Организации";
?>
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
                <ol class="breadcrumbs__list">
                    <li><a href="#">Служба поддержки XXX </a></li>
                    <li><a href="#">Работа с объявлениями</a></li>
                    <li>Подача объявления</li>
                </ol>
                <!-- close .bread -->

                <!-- close .container -->
            </article>
            <!-- close .breadcrubs -->
            <span class="count-shops">Все магазины в России: 12 267</span>
            <div class="average-ad">
                <?= \yii\widgets\ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_list',

                    'itemOptions' => [
                        'tag' => 'div',
                        'class' => 'average-ad-item',
                    ],
                    'emptyText' => 'Список пуст',
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



               <!-- <?php /*foreach ($org as $item): */?>
                    <!-- item
                    <div class="average-ad-item">
                        <a href="<?/*= Url::to(['/organizations/default/view', 'slug'=>$item->slug]) */?>" class="average-ad-item-thumb">
                            <img src="img/adpic-1.png" alt=""/>
                        </a>
                        <div class="average-ad-item-content">
                            <div class="top-content">
                                <span class="average-ad-star active-star-icon  "></span>
                                <a href="" class="average-ad-title"><?/*= $item->title */?></a>
                                <p><?/*= WordFunctions::crop_str_word($item->descr,10); */?></p>
                            </div>
                            <div class="bottom-content">
                                <div class="left">
                                    <p class="average-ad-time">На сайте с <?/*= date('d-m-Y', $item->dt_add) */?></p>
                                    <p class="average-ad-geo"> <span class="geo-space"></span><?/*= $item->city_name */?></p>
                                </div>
                                <div class="right">
                                    <a href="" class="average-ad-category"><?/*= $item->category_name */?></a>
                                    <a href="" class="average-ad-category"><?/*= $item->category_parent_name */?></a>
                                    <span class="shops-tel"><?/*= $item->phone */?></span>
                                </div>
                                <a href="<?/*= Url::to(['/organizations/default/view', 'slug'=>$item->slug]) */?>" class="shops-link">перейти в магазин</a>
                            </div>
                        </div>
                    </div>
                    <!-- item
                --><?php /*endforeach; */?>

            </div>
            <!-- <div class="open-shops">
              <a href="">открыть магазин - бесплатно</a>
            </div> -->
        </div>
    </div>
</section>
