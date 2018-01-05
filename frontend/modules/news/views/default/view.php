<?php
//\common\classes\Debug::prn($model);
use yii\widgets\Breadcrumbs;

echo \frontend\widgets\ShowSeo::widget(
    [
        'title' => ($model->title) ? $model->title : $model->name,
        'description' => ($model->description) ? $model->description : $model->short_text,
        'img' => $model->img,
    ]);

$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
?>

<section class="news">
    <div class="container">
        <div class="news__left">
            <div class="news__wrap">
                <div class="news-breadcrumbs">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => ['class' => 'breadcrumbs__list']
                    ]) ?>
                </div>
                <div class="news__title">
                    <h1><?= $model->name;?></h1>
                    <div class="news__content_row">
                        <!-- <a href=""><span class="author"></span>Admin</a> -->
                        <!--<a href="#go_comment" class="smoothScroll"><span class="comment"></span>43 комментария</a>-->
                        <p><span class="view"></span><?= $model->views; ?> просмотров</p>
                        <p><span class="date"></span><?= \common\classes\DataTime::timeNews($model->dt_add); ?></p>
                    </div>
                </div>
                <div class="thumb">
                    <img src="<?= $model->img?>" alt="">
                </div>

                <div class="news__content">

                    <?= $model->text; ?>
                    <!--<div class="tags-share">
                        <div class="tags">
                            <h4>Теги:</h4>
                            <a href="">Бла-бла-бла</a>
                            <a href="">Бла-бла-бла</a>
                            <a href="">Бла-бла-бла</a>
                            <a href="">Бла-бла-бла</a>
                        </div>
                        <div class="share">
                            <h4>Поделиться:</h4>
                        </div>
                    </div>-->
                </div>
            </div>
            <!--<div class="comments__wrap" id="go_comment">
                <div class="comments__row">
                    <h2>Комментарии к новости</h2>
                    <a href=""><span class="raiting"></span>Последние впереди</a>
                    <a href=""><span class="comments-icon"></span>Написать свой</a>
                </div>
                <div class="comments">
                    <div class="comments__item">
                        <div class="thumb">
                            <img src="img/news/comments-pic.png" alt="">
                        </div>
                        <div class="content">
                            <div class="content-row">
                                <span class="name">Рубон Рубонович</span>
                                <span class="time">вчера 16:54</span>
                                <a href="">ответить</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa placeat sed fugit ratione adipisci voluptate saepe ullam similique in eveniet, perspiciatis repudiandae, eligendi dolore amet autem hic tenetur, vitae esse laborum ex. Iusto ex adipisci odit ipsum eum maiores doloribus, neque dolor deserunt. Quis hic nihil itaque dolorum error officiis expedita quas repellat, amet tenetur, cum, laboriosam in nam? Inventore necessitatibus, at qui cupiditate id sint quae enim ipsam repellendus doloribus reprehenderit quos tempora maiores nisi voluptatem in molestiae est quibusdam! Maxime nihil ipsa quae dolorem. Perspiciatis earum excepturi placeat numquam nesciunt, atque alias culpa eius, enim, quisquam ea.</p>
                        </div>
                        <div class="comments__item">
                            <div class="thumb">
                                <img src="img/news/comments-pic.png" alt="">
                            </div>
                            <div class="content">
                                <div class="content-row">
                                    <span class="name">Рубон Рубонович</span>
                                    <span class="time">вчера 16:54</span>
                                    <a href="">ответить</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa placeat sed fugit ratione adipisci voluptate saepe ullam similique in eveniet, perspiciatis repudiandae, eligendi dolore amet autem hic tenetur, vitae esse laborum ex. Iusto ex adipisci odit ipsum eum maiores doloribus, neque dolor deserunt. Quis hic nihil itaque dolorum error officiis expedita quas repellat, amet tenetur, cum, laboriosam in nam? Inventore necessitatibus, at qui cupiditate id sint quae enim ipsam repellendus doloribus reprehenderit quos tempora maiores nisi voluptatem in molestiae est quibusdam! Maxime nihil ipsa quae dolorem. Perspiciatis earum excepturi placeat numquam nesciunt, atque alias culpa eius, enim, quisquam ea.</p>
                            </div>
                        </div>
                    </div>
                    <a href="" class="more">Загрузить еще</a>
                </div>

            </div>-->
        </div>
        <?= \frontend\modules\news\widgets\ShowSimilarNews::widget(['id' => $model->id]); ?>
    </div>
</section>