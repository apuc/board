<?php
$categoryList = \common\classes\AdsCategory::getListCategoryAllInfo($model->category_id, []);
$categoryList = array_reverse($categoryList);
//Debug::prn($categoryList);

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Все объявления', 'url' => ['/adsmanager/adsmanager/index']];
foreach($categoryList as $item){
    $this->params['breadcrumbs'][] = ['label' => $item->name, 'url' => ['/all-ads/' . $item->slug]];
}
$this->params['breadcrumbs'][] = $this->title;
use yii\widgets\Breadcrumbs;
?>

<section class="ad-concrete-header">
    <div class="container">
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
    </div>
</section>
<section class="ad-error__title">
    <div class="container">
        <h2>Объявление недоступно</h2>
    </div>
</section>
<section class="ad-error__content">
    <div class="container">
        <div class="ad-error__content_left">
            <div class="explanation">
                <p>Вы пытаетесь отредактирвать не свое объявление</p>
            </div>
            <?= \frontend\modules\adsmanager\widgets\RelatedAds::widget(['idCat' => $model->category_id, 'ads' => $model]); ?>
        </div>
        <div class="ad-error__content_right">
            <div class="banner-1"></div>
        </div>
    </div>
</section>
