<?php
use common\classes\Debug;
use common\classes\DataTime;
use frontend\modules\adsmanager\widgets\Msg;
use yii\widgets\Breadcrumbs;

$this->registerJsFile('/js/jquery-2.1.3.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$categoryList = \common\classes\AdsCategory::getListCategoryAllInfo($model->category_id, []);


echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => $model->title . ' - ' . $categoryList[0]['name'] . ' ' . $model['geobase_city']->name . ' на RUBON',
        'description' => $model->content,
        'img' => (empty($model['ads_img'][0]->img)) ? 'http://rub-on.ru/img/Logotip_RUBON.png' : $model['ads_img'][0]->img
    ]);
$categoryList = array_reverse($categoryList);

foreach($categoryList as $item){
    $this->params['breadcrumbs'][] = ['label' => $item->name, 'url' => ['/obyavleniya/' . $item->slug],'class'=>'nav-adv__item'];
}
$this->params['breadcrumbs'][] = $model->title;

?>


<section class="nav-adv">
    <div class="container">
        <nav class="nav-adv__wrap">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </nav>
    </div>
</section>

<section class="single-adv">
    <div class="container">
        <h2 class="single-adv__title lg-none"><?= $model->title; ?>
        </h2>
        <div class="single-adv__wrap">
            <div class="single-adv__left">
                <div class="single-adv__sliders">

                    <?php foreach($model->ads_img as $item): ?>
                    <div class="single-adv__slider-main">
                        <div class="single-adv__slider-main-item">
                            <a class="single-adv__slider-main-increase fancybox" data-fancybox="gallery1" href="assets/images/cards/detail-img1.jpg">
                                <img src="<?=$item->img?>" alt=""/>
                            </a>
                            <img src="<?=$item->img?>"/>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div class="single-adv__slider-second">
                        <?php foreach($model->ads_img as $item): ?>
                        <div class="single-adv__slider-second-item">
                            <img src="<?=$item->img?>"/>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="single-adv__right">
                <div class="d-flex align-items-center"><span class="price"><?= $model['price']?> ₽</span>
                    <div class="sm-block ml-auto"><a class="single-adv__like" href="#"><i class="fa fa-heart-o"></i></a>
                    </div>
                </div>
                <div class="single-adv__like-and-date"><span class="date mt15">Добавлено: <?=DataTime::timeNews($model['dt_add'])?></span><a class="single-adv__like sm-none" href="#"><i class="fa fa-heart-o"></i><span>Добавить в избранное</span></a>
                </div>
                <div class="lg-block">
                    <h2 class="single-adv__title"><?= $model->title; ?>
                    </h2>
                </div>
                <div class="single-adv__btns">
                    <button class="button button_big-v button_red-border mb10 sm-none">Написать продавцу</button>
                    <div class="sm-block">
                        <button class="button button_big-v button_red-border">Написать</button>
                    </div>
                    <button class="button button_big-v button_red">Показать номер</button>
                </div>
                <div class="offer-user mt30 mb30 lg-none">
                    <div class="offer-user__avatar"><span>ВК</span>
                    </div><a class="offer-user__info" href="#"><span class="offer-user__name"><?=$model['name']?></span><span class="offer-user__count">(<?=$userAdsCount?> объявлений)</span></a>
                </div>
                <div class="d-flex align-items-center"><a class="d-flex align-items-center" href="#">
                        <svg class="single-adv__icon ico ico_gray">
                            <use xlink:href="assets/images/svg.svg#nav">
                            </use>
                        </svg><span class="ml5 c-gray fz13"><?= $model->city['name']?></span></a>
                    <div class="ml-auto">
                        <div class="single-card__detail-view"><img class="mr5" src="/img/home/icon-eye.png" alt=""/><span><?=$model['views']?></span></div>
                    </div>
                </div>
            </div>
            <div class="single-adv__left">
                <div class="single-adv__bottom-item">
                    <div class="single-adv__bottom-title sm-none"><span>Описание</span>
                    </div>
                    <div class="single-adv__bottom-content single-adv__desc">
                        <p><?= $model['content']?></p>
                    </div>
                </div>
                <div class="single-adv__bottom-item lg-none">
                    <div class="single-adv__bottom-title d-flex align-items-center"><span>Узнайте больше</span>
                    </div>
                    <div class="single-adv__bottom-content">
                        <button class="button button_red-border mr10">Показать номер</button>
                        <button class="button button_red">Написать продавцу</button>
                    </div>
                </div>
                <div class="single-adv__bottom-item lg-flex">
                    <div class="offer-user">
                        <div class="offer-user__avatar"><span>ВК</span>
                        </div><a class="offer-user__info" href="#"><span class="offer-user__name"><?=$model['name']?></span><span class="offer-user__count">(<?=$userAdsCount?> объявлений)</span></a>
                    </div>
                </div>
                <div class="single-adv__bottom-item">
                    <div class="single-adv__bottom-title d-flex align-items-center"><span>Поделиться</span>
                    </div>
                    <div class="single-adv__bottom-content d-flex">
                        <div class="social"><a class="social__link bg-vk" href="https://vk.com/rub_on"><i class="fa fa-vk"></i></a><a class="social__link bg-facebook" href="https://vk.com/rub_on"><i class="fa fa-facebook"></i></a><a class="social__link bg-odnoklassniki" href="https://vk.com/rub_on"><i class="fa fa-odnoklassniki"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="similar">
    <div class="container">
        <h2 class="similar__title">Похожие объявления
        </h2>
        <div class="cards">
           <?= $this->renderFile('@frontend/modules/mainpage/views/mainpage/ads-card.php',['ads'=>$similarAds])?>
        </div>
        <div class="d-flex justify-content-center mt20">
            <button class="button button_gray button_big">Показать все объявления из этой категории</button>
        </div>
    </div>
</section>

