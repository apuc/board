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
<?= \frontend\modules\adsmanager\widgets\ShowSelectCategoryFilter::widget(); ?>
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
            <h2>Возможные причины:</h2>
            <p>удалено пользователем</p>
            <p>не прошло модерацию</p>
            <p>снято с публикации</p>
            <div class="explanation">
                <p>Это мое объявление и я не понимаю почему оно не опубликовано! </p>
            </div>
            <div class="write-admin">
                <a href="" class="write-admin-button"><span class="red-mail"></span>Написать администрации</a>
            </div>
            <?= \frontend\modules\adsmanager\widgets\RelatedAds::widget(['idCat' => $model->category_id, 'ads' => $model]); ?>
        </div>
        <div class="ad-error__content_right">
            <div class="banner-1"></div>
        </div>
    </div>
</section>
