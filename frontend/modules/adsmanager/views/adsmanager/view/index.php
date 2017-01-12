<?php
use common\classes\Debug;
use frontend\modules\adsmanager\widgets\Msg;
use yii\widgets\Breadcrumbs;


$categoryList = \common\classes\AdsCategory::getListCategoryAllInfo($model->category_id, []);
$categoryList = array_reverse($categoryList);
//Debug::prn($categoryList);

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Все объявления', 'url' => ['/adsmanager/adsmanager/index']];
foreach($categoryList as $item){
    $this->params['breadcrumbs'][] = ['label' => $item->name, 'url' => ['/all-ads/' . $item->slug]];
}
$this->params['breadcrumbs'][] = $this->title;
//Debug::prn($model);
?>


<?/*= \frontend\modules\adsmanager\widgets\ShowSelectCategoryFilter::widget(); */?>

<section class="ad-concrete-header">
    <div class="container">
        <!-- open .breadcrubs -->
        <article class="breadcrumbs">
            <!-- open .container -->
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => ['class' => 'breadcrumbs__list']
            ]) ?>
            <!-- close .container -->
        </article>
        <!-- close .breadcrubs -->
    </div>
</section>



<section class="ad-concrete__content">
    <div class="container">
        <div class="ad-concrete__header">
            <!-- <a href="" class="edit-ad"><span class="edit-ad-icon"></span>Редактировать объявление</a> -->
            <h1 class="ad-concrete__header_title"><?= $model->title; ?></h1>
        </div>
        <div class="ad-concrete__content_left">


            <!-- open gallery -->
            <?php if(!empty($model['ads_img'])): ?>
                <div class="slider-for">
                    <?php foreach( $model['ads_img'] as $item ):?>
                        <div class="item">
                            <a class="fancybox-thumb" rel="fancybox-thumb" href="/<?= $item->img;?>" >
                                <img src="/<?= $item->img;?>" alt="image"  draggable="false"/>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="slider-nav">
                    <?php foreach( $model['ads_img'] as $item ):?>
                        <div class="item">
                            <img src="/<?= $item->img_thumb;?>" alt="image"  draggable="false"/>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <!-- close gallery -->

            <!-- open ad-info  -->
            <div class="ad-info">
                <?php foreach( $model['ads_fields_value'] as $item ): ?>
                    <div class="ad-info-row">
                        <span><?= \common\classes\Ads::getLabelAdditionalField($item->ads_fields_name);?></span>
                        <p><?= $item->value?></p>
                    </div>
                <?php endforeach; ?>
                <p class="brief-information"><?= $model->content; ?></p>
            </div>
            <!-- close ad-info  -->
            <!-- open user-ad-info  -->
            <p class="average-ad-time"><span class="add-ad-time-icon"></span><?=\common\classes\DataTime::time($model->dt_update);?></p>
            <?= \frontend\modules\adsmanager\widgets\ShowUserCountAds::widget(['idAds' => $model->id, 'idUser'=> $model->user_id])?>

            <div class="share-ad">
                <a href="" class="write-seller"><span class="mail-1"></span>Написать продавцу</a>
                <div class="favorite__ad">
                    <?php if(empty($adsFavorites)): ?>
                        <span class="average-ad-star star-icon" data-gist="ad" data-gistid="<?= $model->id; ?>" data-csrf="<?= Yii::$app->request->getCsrfToken()?>"></span>
                        В избранное
                    <?php else: ?>
                        <span class="average-ad-star active-star-icon" data-gist="ad" data-gistid="<?= $model->id; ?>" data-csrf="<?= Yii::$app->request->getCsrfToken()?>"></span>
                        Из избранного
                    <?php endif; ?>
                </div>
                <!--<a href="" class="coplain-seller"><span class="coplain-icon"></span>Пожаловаться</a>-->
                <a href="" class="share-seller"><span class="share-icon"></span>Поделиться</a>
                <div class="mini-social">
                    <a href="" class="mini-social-vk mini-social-icon"></a>
                    <a href="" class="mini-social-ok mini-social-icon"></a>
                    <a href="" class="mini-social-fb mini-social-icon"></a>
                    <a href="" class="mini-social-gp mini-social-icon"></a>
                    <a href="" class="mini-social-twi mini-social-icon"></a>
                    <a href="" class="mini-social-mailru mini-social-icon"></a>
                </div>
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
                    <?= \yii\helpers\Html::hiddenInput('to',$model->user_id) ?>
                    <?= \yii\helpers\Html::a('Отправить',null,[
                        'id' => 'send_msg_to_author',
                        'class' => 'btn btn-primary'
                    ]) ?>
                <?php endif; ?>
                </form>
            </div>

            <?= \frontend\modules\adsmanager\widgets\RelatedAds::widget(['idCat' => $model->category_id, 'ads' => $model]); ?>
        </div>
        <div class="ad-concrete__content_right" id="sidebar">

            <div class="author-column" >
                <div class="ad-price">
                    <span class="price"><?= $model->price; ?></span>
                    <span class="rubl-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 510.127 510.127">
              <path d="M34.786,428.963h81.158v69.572c0,3.385,1.083,6.156,3.262,8.322c2.173,2.18,4.951,3.27,8.335,3.27h60.502
                c3.14,0,5.857-1.09,8.152-3.27c2.295-2.166,3.439-4.938,3.439-8.322v-69.572h182.964c3.377,0,6.156-1.076,8.334-3.256
                c2.18-2.178,3.262-4.951,3.262-8.336v-46.377c0-3.365-1.082-6.156-3.262-8.322c-2.172-2.18-4.957-3.27-8.334-3.27H199.628v-42.754
                h123.184c48.305,0,87.73-14.719,118.293-44.199c30.551-29.449,45.834-67.49,45.834-114.125c0-46.604-15.283-84.646-45.834-114.125
                C410.548,14.749,371.116,0,322.812,0H127.535c-3.385,0-6.157,1.089-8.335,3.256c-2.173,2.179-3.262,4.969-3.262,8.335v227.896
                H34.786c-3.384,0-6.157,1.145-8.335,3.439c-2.172,2.295-3.262,5.012-3.262,8.151v53.978c0,3.385,1.083,6.158,3.262,8.336
                c2.179,2.18,4.945,3.256,8.335,3.256h81.158v42.754H34.786c-3.384,0-6.157,1.09-8.335,3.27c-2.172,2.166-3.262,4.951-3.262,8.322
                v46.377c0,3.385,1.083,6.158,3.262,8.336C28.629,427.887,31.401,428.963,34.786,428.963z M199.628,77.179h115.938
                c25.6,0,46.248,7.485,61.953,22.46c15.697,14.976,23.549,34.547,23.549,58.691c0,24.156-7.852,43.733-23.549,58.691
                c-15.705,14.988-36.354,22.473-61.953,22.473H199.628V77.179z"/>
            </svg>
          </span>
                </div>
                <a href="" class="write-author"><span class="open-mail"></span>написать продавцу</a>
                <a href="" class="call-author showPhone" data-id="<?= $model->id; ?>" data-csrf="<?= Yii::$app->request->csrfToken; ?>"><span class="tel-icon"></span><div class="phoneUser">095 *** ** ** <span> показать </span></div></a>
                <div class="author-city">
                    <span class="geo-icon"></span>
                    <span>Город:</span>
                    <a href="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view', 'regionFilter' => $model['geobase_city']->id])?>" class="citu"><?= $model['geobase_city']->name; ?></a>
                </div>
                <div class="author-favorite">
                <?php if(empty($adsFavorites)): ?>
                    <span class="average-ad-star star-icon" data-gist="ad" data-gistid="<?= $model->id; ?>" data-csrf="<?= Yii::$app->request->getCsrfToken()?>"></span>Добавить в избранное
                <?php else: ?>
                    <span class="average-ad-star active-star-icon" data-gist="ad" data-gistid="<?= $model->id; ?>" data-csrf="<?= Yii::$app->request->getCsrfToken()?>"></span>Из избранного
                <?php endif; ?>
                </div>
                <div class="user">
                    <div class="thumb">
                        <img src="<?= \common\classes\UserFunction::getUser_avatar_url($model->user_id); ?>" alt="">
                    </div>
                    <span>Автор:</span>
                    <h4><?= \common\classes\UserFunction::getUserName($model->user_id);?></h4>
                </div>
                <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/user_ads', 'login' => $model['user']->username])?>" class="all-author-ads"> Все объявления автора</a>
                <p class="shows-ad"><b>Просмотров:</b> <span>всего <b><?= $model->views;?></b></span></p>
                <!--<div class="author-function-button">
                    <a href="" class="medal">
                        <span class="medal-popup">cделать VIP</span>
                    </a>
                    <a href="" class="paint-roller">
                        <span class="paint-rolle-popup">выделить</span>
                    </a>
                    <a href="" class="line-chart-1">
                        <span class="line-chart-popup">поднять в ТОП</span>
                    </a>
                </div>-->
                <?= \frontend\modules\banner\widgets\ShowRightBanner::widget(); ?>
            </div>

            <!-- <div class="banner-2">
              <a href="">
                <img src="img/banner-test.png" alt="">
              </a>
            </div> -->
        </div>
    </div>
</section>