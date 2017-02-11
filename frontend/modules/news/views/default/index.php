<?php
use yii\widgets\ListView;

echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => 'Новости бесплптной доски объявлений RUB-ON',
        'description' => 'Читайте новости бесплптной доски объявлений RUB-ON. Будь в курсе событий происходящих на сайте RUB-ON.ru',
        'img' => 'http://rub-on.ru/img/Logotip_RUBON.png',
    ]);
$this->params['breadcrumbs'][] = ['label' => 'Новости'];

?>

<section class="all-news">
    <div class="container">
        <h1>Новости</h1>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_list',

            'itemOptions' => [
                'tag' => 'div',
                'class' => 'all-news__item',
            ],
            'emptyText' => 'Список пуст',
            'layout' => "{items}<div class=\"pagination\">{pager}</div>",
            'pager' => [
                'options' => [
                    'class' => '',
                ],
                'prevPageCssClass' => 'pagination-prew',
                'nextPageCssClass' => 'pagination-next',
                'prevPageLabel' => '',
                'nextPageLabel' => '',
                'activePageCssClass' => 'active',
                'maxButtonCount' => 5,
            ],
        ]);
        ?>
</section>

