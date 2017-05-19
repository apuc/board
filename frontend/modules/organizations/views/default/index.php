<?php
echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => 'Организации на RUBON',
        'description' => $model->descr,
        'img' => 'http://rub-on.ru/' .  $model->logo,
    ]);
?>

<section class="home-top">
    <div class="container">
        <h2>откройте для себя новые перспективы! </h2>
        <p> Увеличивайте доходы вместе с нами!</p>
        <div class="home-top__knopki">
            <div class="home-top__knopki_left">
                <a href="/" class="home-top__knopka">ДЛЯ ЧАСТНЫХ ЛИЦ</a>
            </div>
            <div class="home-top__knopki_right">
                <span class="home-top__knopka">для ОРГАНИЗАЦИЙ</span>
            </div>
        </div>
    </div>
</section>
<?= \frontend\widgets\ShowOrganizationsSearch::widget(); ?>

<section class="home-content">
    <div class="container">

        <div class="home-contents">

            <?php
            //\common\classes\Debug::prn($category);
            $count = 0;
            $countAllCat = 0;
            $catArr = [];
            foreach ($category as $item):?>



                <?php if ($count == 0): ?>
                    <div class="row">
                <?php endif; ?>

                <div class="home-content-item" data-id="<?= $item['id']; ?>">
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
                $countAllCat++;
                ?>
                <?php if ($count == 5 || $countAllCat == count($category) ):
                    $count = 0;


                    ?>
                    </div>
                    <?php if (!empty($catArr)): ?>
                    <?php foreach ($catArr as $value): ?>
                        <div class="text-about" id="button<?= $value; ?>">
                            <div class="text-about-title">
                                <a href="<?= \yii\helpers\Url::to(['/organizations/default/all', 'slug' => $category["$value"]['slug']]); ?>"><b>Смотреть
                                        все организации</b> в <?= $category["$value"]['name'] ?> </a>
                            </div>
                            <div class="text-about-links">
                                <?php foreach ($category["$value"]['childs'] as $childs): ?>
                                    <a class="text-about-link"
                                       href="<?= \yii\helpers\Url::toRoute(['/organizations/default/all', 'slug' => $childs->slug]); ?>"><?= $childs->name; ?></a>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php endif; ?>


                    <?php $catArr = []; endif; ?>
            <?php endforeach; ?>


        </div>
    </div>
</section>
<?= \frontend\modules\organizations\widgets\ShowNewOrg::widget(); ?>
<?= \frontend\modules\organizations\widgets\ShowTopOrg::widget(); ?>
