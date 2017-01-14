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
            <h2>Возможные причины:</h2>
            <p>удалено пользователем</p>
            <p>не прошло модерацию</p>
            <p>снято с публикации</p>
            <div class="explanation">
                <p>Это мое объявление и я не понимаю почему оно не опубликовано! </p>
            </div>
            <div class="write-admin">
                <a href="" class="write-admin-button write-seller"><span class="red-mail"></span>Написать администрации</a>
            </div>

            <div class="msg_box">
                <?php if(Yii::$app->user->isGuest): ?>
                    <h3>Авторизируйтесь пожалуйста</h3>
                <?php else: ?>
                <form action="">
                    <?= \yii\helpers\Html::label('Текст сообщения','msg_to_author') ?>
                    <?= \yii\helpers\Html::textarea('msg_to_author',null,[
                        'id' => 'msg_to_author',
                        'class' => 'msg_box_area',
                    ]) ?>
                    <?= \yii\helpers\Html::hiddenInput('from',Yii::$app->user->id) ?>
                    <?= \yii\helpers\Html::hiddenInput('ads_id', $model->id) ?>
                    <?= \yii\helpers\Html::hiddenInput('_csrf', Yii::$app->request->csrfToken);  ?>
                    <?= \yii\helpers\Html::a('Отправить',null,[
                        'id' => 'send_msg_to_admin',
                        'class' => 'btn btn-primary'
                    ]) ?>
                    <?php endif; ?>
                </form>
            </div>

            <?= \frontend\modules\adsmanager\widgets\RelatedAds::widget(['idCat' => $model->category_id, 'ads' => $model]); ?>
        </div>
        <div class="ad-error__content_right">
            <?= \frontend\modules\banner\widgets\ShowRightBanner::widget(); ?>
        </div>
    </div>
</section>
