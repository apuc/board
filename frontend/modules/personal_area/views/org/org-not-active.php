<?php
use common\classes\DataTime;
use common\classes\WordFunctions;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;

$this->title = 'Мои организации | Неактивные';

$this->params['breadcrumbs'][] = ['label' => 'Мои организации', 'url' => ['/personal_area/org/org_user_active']];
$this->params['breadcrumbs'][] = ['label' => 'Неактивные'];
$this->registerJsFile('/js/organizations.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
echo \frontend\modules\personal_area\widgets\MenuPersonalArea::widget();
?>

<section class="kabinet-active-ad">
    <div class="container">
        <div class="kabinet-active-ad__left">
            <ul>
                <li><a href="<?= Url::toRoute(['/personal_area/org/org_user_active']); ?>">Управление организациями</a></li>
                <li><a href="<?= Url::toRoute(['/organizations/default/add']); ?>">Добавить организацию</a></li>
            </ul>
            <!--<div class="recent-article-item">
                <h2>Актуальные статьи</h2>
                <div class="recent-article-item__articles">
                    <a href="">Почему мое объявление удалено?</a>
                    <a href="">Почему заблокирован мой Профиль?</a>
                    <a href="">Достигнут лимит, не могу опубликовать новое</a>
                </div>
            </div>-->
        </div>
        <div class="kabinet-active-ad__right">
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
            <div class="kabinet-active-ad__additionaly-option">
                <ul>
                    <li ><a href="<?= Url::toRoute(['/personal_area/org/org_user_active']); ?>">Активные</a></li>
                    <!--<li><a href="">Неактивные</a></li>-->
                    <li class="active"><a href="">На проверке </a></li>
                </ul>
                <?php if(!empty($org)):?>
                <!--<a href="" class="option-2">Снять с публикации</a>
                <a href="" class="option-2"><span class="up-option"></span>Активировать на 60 дней и поднять</a>-->
                <a href="" class="option-2 delete-all-org" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-org="active" data-page="<?= $request->get('page', 1); ?>">Удалить</a>
                <div class="checkbox0">
                    <input id="check0" type="checkbox" name="check" value="check0">
                    <label for="check0"></label>
                </div>
                <?php endif; ?>
            </div>
            <?php if(empty($org)): ?>
                <?= $this->render('/error/error',['title' => 'У Вас нет добавленных организаций', 'link_title' => 'Добавить организацию', 'url' => Url::toRoute(['/organizations/default/add'])]); ?>
            <?php else: ?>
            <div class="kabinet-active-ad__content">
                <?php foreach ($org as $item): ?>
                    <div class="item">
                        <div class="kabinet-active-ad__content_ad">
                            <a href="<?= Url::to(['/organizations/default/view', 'slug'=>$item->slug ]) ?>" class="average-ad-item-thumb">
                                <?php if(!empty($item->logo)):?>
                                    <img src="/<?= $item->logo; ?>" alt=""/>
                                <?php else:?>
                                    <img src="/img/org-not-logo.jpg" alt=""/>
                                <?php endif; ?>
                            </a>
                            <div class="average-ad-item-content">
                                <div class="top-content">
                                    <a href="<?= Url::to(['/organizations/default/view', 'slug'=>$item->slug ]) ?>" class="average-ad-title"><?= $item->title?></a>
                                    <p><?= WordFunctions::crop_str_word($item->descr, 10); ?></p>
                                </div>
                                <div class="bottom-content">
                                    <div class="left">
                                        <p class="average-ad-time">На сайте с <?= DataTime::dateOrg($item->dt_add) ?></p>
                                        <p class="average-ad-geo"> <span class="geo-space"></span><?= $item->city_name ?></p>
                                    </div>
                                    <div class="right">
                                        <a href="<?= Url::to(['/organizations/default/all', 'slug' => $item->category_slug] )?>" class="average-ad-category"><?= $item->category_name ?></a>
                                        <a href="<?= Url::to(['/organizations/default/all', 'slug' => $item->category_parent_slug] )?>" class="average-ad-category"><?= $item->category_parent_name ?></a>
                                        <span class="shops-tel"><?= $item->phone ?></span>
                                    </div>
                                    <!-- <a href="" class="reload-ad"><span class="reload-icon"></span>Обновить</a> -->
                                </div>
                            </div>
                        </div>
                        <!--<div class="ad_progress_bar">
                            <span>срок размещения: 15 дней</span>
                            <div class="bar-two bar-con">
                                <div class="bar" data-percent="80"></div>
                            </div>
                            <span>Осталось 15</span>
                        </div>-->
                        <div class="item-edit-ad">
                            <a href="" class="delete remove-organization" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" data-id="<?=$item->id;?>" data-org="active" data-page="<?= $request->get('page', 1); ?>"> <span class="del-icon"></span>удалить</a>
                            <a href="<?= Url::to(['/organizations/default/update', 'id' => $item->id])?>" class="edit"> <span class="edit-icon"></span>редактировать</a>
                            <!--<a href="" class="remove"> <span class="remove-icon"></span>снятьс публикации</a>-->
                            <!-- <a href="" class="publish-ad"><span class="publish-icon"></span>опубликовать</a> -->
                            <!--<span class="edit-accordion">дополнительно</span>
                            <div class="edit-accordion-list">
                                <a href="">Сделать вип</a>
                                <a href="">Выделить обьявление</a>
                                <a href="">Поднять объявление</a>
                            </div>-->
                        </div>
                        <div class="checkbox">
                            <input id="check<?=$item->id; ?>" class="org-check" type="checkbox" data-id="<?=$item->id; ?>" name="check" value="<?=$item->id; ?>">
                            <label for="check<?=$item->id; ?>"></label>
                        </div>
                    </div>
                <?php endforeach; ?>
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
            <?php endif; ?>
        </div>

    </div>

</section>
