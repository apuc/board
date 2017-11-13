<?php
use frontend\widgets\AuthUser;
use common\classes\Debug;
$this->registerJsFile('/js/jquery-2.1.3.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => 'Бесплатные объявления ДНР, ЛНР: продажа,покупка,недвижимость',
        'description' => 'Все бесплатные объявления Донецка, Луганска, Горловки, ДНР, ЛНР без посредников. Ежедневное обновления предложений по темам: купля/продажа, работа, недвижимость, авто и многое другое',
        'img' => 'http://rub-on.ru/img/Logotip_RUBON.png'
    ]);
?>
<section class="home-top">
    <div class="container">
        <h2>откройте для себя новые перспективы! </h2>
        <p> Увеличивайте доходы вместе с нами!</p>
        <div class="home-top__knopki">
            <div class="home-top__knopki_left">
                <span class="home-top__knopka">ДЛЯ ЧАСТНЫХ ЛИЦ</span>
            </div>
            <div class="home-top__knopki_right">
                <a href="<?= \yii\helpers\Url::to(['/organizations/default/index'])?>" class="home-top__knopka">для ОРГАНИЗАЦИЙ</a>
            </div>
        </div>
    </div>
</section>

<?= \frontend\widgets\ShowSearch::widget(); ?>
    <section class="home-content">
        <div class="container">

            <div class="home-contents">

                <?php
                $count = 0;
                $catArr = [];
                $countAllCat = 0;
                foreach($category as $item): ?>
                    <div class="home-content-item" data-id="<?= $item['id'];?>">
                        <a href="" class="content-item-thumb">
                            <img src="<?= $item['img']; ?>" alt="<?= $item['name']; ?>" title="<?= $item['name']; ?>">
                        </a>
                        <div class="content-item-text">
                            <a class="text-title" href=""><?= $item['name']; ?></a>
                        </div>
                    </div>
                <?php
                    $catArr[] = $item['id'];
                    $count++;
                    if($count == 2 || $countAllCat == count($category)):
                        $count = 0;

                        if(!empty($catArr)):
                            foreach($catArr as $value): ?>
                                <div class="text-about" data-id="<?= $value; ?>">
                                    <div class="text-about-title">
                                        <a href="<?= \yii\helpers\Url::toRoute(['/obyavleniya/' . $category["$value"]['slug']]); ?>"><b>Смотреть все объявления</b> в <?= $category["$value"]['name']?> </a>
                                    </div>
                                    <div class="text-about-links">
                                        <?php foreach($category["$value"]['childs'] as $childs): ?>
                                            <a class="text-about-link" href="<?= \yii\helpers\Url::toRoute(['/obyavleniya/' . $childs->slug]); ?>"><?= $childs->name; ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach;

                        endif;
                        $catArr = [];
                    endif;
                endforeach; ?>


            </div>
        </div>
    </section>

<?= \frontend\modules\adsmanager\widgets\ShowHomeAds::widget(); ?>
<?= \frontend\modules\adsmanager\widgets\ShowTopAds::widget(); ?>