<?php
//\common\classes\Debug::prn($ads);
use common\classes\DataTime;
use common\classes\WordFunctions;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;

$this->title = 'Избранные организации';
$this->params['breadcrumbs'][] = ['label' => 'Мои организации', 'url' => ['']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('/js/organizations.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<?= $this->render('../ads/_menu')?>
<section class="kabinet-favorite-organizatsii">
    <div class="container">
        <div class="kabinet-favorite-left">
            <?php if(!empty($category)): ?>
                <ul>
                    <?php foreach($category as $item):?>
                        <li><a href="<?= Url::to(['/personal_area/favorites/org_favorites', 'id-cat'=>$item['cat_id']])?>"><?= $item['name'];?> <span class="count"><?= $item['count']; ?></span></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="kabinet-favorite-right">
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

            <div class="top-menu">
                <?= $this->render('_favorites_menu'); ?>
                <?php if(!empty($org)):?>
                    <a href="" class="delete-knopka delete-favorites-org" data-ads="org" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-page="<?= $request->get('page', 1); ?>">Удалить из избранного</a>
                    <div class="checkbox0">
                        <input id="check0" type="checkbox" name="check" value="check0">
                        <label for="check0"></label>
                    </div>
                <?php endif;?>
            </div>
            <?php if(empty($org)): ?>
                <?= $this->render('/error/error',['title' => 'У Вас нет ни одной организации в закладках', 'link_title' => 'Найти организацию', 'url' => Url::toRoute(['/organizations/default/all'])]); ?>
            <?php else: ?>
                <!-- close .breadcrubs -->
                <?php //\common\classes\Debug::prn($org); ?>
                <?php foreach($org as $item): //\common\classes\Debug::prn($item);?>
                    <div class="kabinet-favorite-right-item">
                        <!-- item -->
                        <div class="average-ad-item">
                            <a href="<?= Url::to(['/organizations/default/view', 'slug'=>$item->org_info->slug]) ?>" class="average-ad-item-thumb">
                                <?php if(!empty($item->org_info->logo)):?>
                                    <img src="/<?= $item->org_info->logo; ?>" alt=""/>
                                <?php else:?>
                                    <img src="img/adpic-1.png" alt=""/>
                                <?php endif; ?>
                            </a>
                            <div class="average-ad-item-content">
                                <div class="top-content">
                                    <a href="<?= Url::to(['/organizations/default/view', 'slug'=>$item->org_info->slug]) ?>" class="average-ad-title"><?= $item->org_info->title ?></a>
                                    <p><?= WordFunctions::crop_str_word($item->org_info->descr,10); ?></p>
                                </div>
                                <div class="bottom-content">
                                    <div class="left">
                                        <p class="average-ad-time">На сайте с <?= DataTime::dateOrg($item->org_info->dt_add) ?></p>
                                        <p class="average-ad-geo"> <span class="geo-space"></span><?= $item->org_info->city_name ?></p>
                                    </div>
                                    <div class="right">
                                        <a href="" class="average-ad-category"><?= $item->org_info->category_name ?></a>
                                        <a href="" class="average-ad-category"><?= $item->org_info->category_parent_name ?></a>
                                        <span class="shops-tel"><?= $item->org_info->phone ?></span>
                                    </div>
                                    <a href="" class="shops-link">перейти в магазин</a>
                                </div>
                            </div>
                        </div>
                        <!-- item -->
                        <div class="checkbox0">
                            <input id="check<?=$item->org_info->id; ?>" type="checkbox" class="org-check" name="check" value="<?= $item->id?>">
                            <label for="check<?=$item->org_info->id; ?>"></label>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="pagination">
                <?= LinkPager::widget(
                    [
                        'pagination' => $pagination,
                        'options' => [
                            'class' => '',
                        ],
                        'prevPageCssClass' => 'pagination-prew',
                        'nextPageCssClass' => 'pagination-next',
                        'prevPageLabel' => '',
                        'nextPageLabel' => '',
                        'activePageCssClass' => 'active',

                    ]) ?>
            </div>
        </div>

    </div>
</section>
