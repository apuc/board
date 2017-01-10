<?php
use frontend\widgets\AuthUser;
use common\classes\Debug;
$this->title = "Бесплатные объявления Донецка: продажа,покупка,недвижимость";
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Все бесплатные объявления Донецка без посредников. Ежедневное обновления предложений по темам: купля/продажа, работа, недвижимость, авто и многое другое',
]);

$this->registerMetaTag([
    'name' => 'og:title',
    'content' => "Бесплатные объявления Донецка: продажа,покупка,недвижимость",
]);
$this->registerMetaTag([
    'name' => 'og:type',
    'content' => "article",
]);
$this->registerMetaTag([
    'name' => 'og:image',
    'content' => 'http://rub-on.ru.ru/media/img/Logotip_RUBON.png',
]);
$this->registerMetaTag([
    'name' => 'og:url',
    'content' => 'rub-on.ru',
]);
$this->registerMetaTag([
    'name' => 'DC.title',
    'content' => 'Бесплатные объявления Донецка: продажа,покупка,недвижимость',
]);
$this->registerMetaTag([
    'name' => 'DC.creator',
    'content' => 'Art Craft',
]);
$this->registerMetaTag([
    'name' => 'DC.creator.name',
    'content' => 'Art Craft',
]);
$this->registerMetaTag([
    'name' => 'DC.subject',
    'content' => 'Бесплатные объявления Донецка, продажа,покупка,недвижимость',
]);
$this->registerMetaTag([
    'name' => 'DC.description',
    'content' => 'Все бесплатные объявления Донецка без посредников. Ежедневное обновления предложений по темам: купля/продажа, работа, недвижимость, авто и многое другое',
]);
$this->registerMetaTag([
    'name' => 'DC.language',
    'content' => 'ru-RU',
]);



?>
<section class="home-top">
    <div class="container">
        <h2>откройте для себя новые перспективы! </h2>
        <p> Увеличивайте доходы вместе с нами!</p>
        <div class="home-top__knopki">
            <div class="home-top__knopki_left">
                <a href="">ДЛЯ ЧАСТНЫХ ЛИЦ</a>
            </div>
            <div class="home-top__knopki_right">
                <a href="">для ОРГАНИЗАЦИЙ</a>
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
            foreach($category as $item):
            //Debug::prn($item);

            ?>
                <?php if($count == 0): ?>
                    <div class="row">
                <?php endif;?>

                    <div class="home-content-item" data-id="<?= $item['id'];?>">
                        <a href="" class="content-item-thumb">
                            <img src="<?= $item['img']; ?>" alt="">
                        </a>
                        <div class="content-item-text">
                            <a class="text-title" href=""><?= $item['name']; ?></a>
                        </div>
                    </div>

                <?php
                    $catArr[] = $item['id'];
                    $count++;
                ?>
                <?php if($count == 5):
                $count = 0;


                ?>
                    </div>
                    <?php if(!empty($catArr)):?>
                        <?php foreach($catArr as $value): ?>
                            <div class="text-about" id="button<?= $value; ?>">
                                <div class="text-about-title">
                                    <a href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $category["$value"]['slug']]); ?>"><b>Смотреть все объявления</b> в <?= $category["$value"]['name']?> </a>
                                </div>
                                <div class="text-about-links">
                                    <?php foreach($category["$value"]['childs'] as $childs): ?>
                                        <a class="text-about-link" href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $childs->slug]); ?>"><?= $childs->name; ?></a>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        <?php endforeach; ?>

                    <?php endif;?>


                <?php $catArr = []; endif;?>
            <?php   endforeach;?>


        </div>
    </div>
</section>


<?= \frontend\modules\adsmanager\widgets\ShowHomeAds::widget(); ?>
<?= \frontend\modules\adsmanager\widgets\ShowTopAds::widget(); ?>