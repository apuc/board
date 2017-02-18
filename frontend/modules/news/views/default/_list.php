
    <span><?= \common\classes\DataTime::dateRus($model['dt_add']); ?></span>
    <div class="thumb">
        <img src="<?= $model['img']; ?>" alt="">
    </div>
    <div class="content">
        <h2><?= $model['name'];?></h2>
        <p><?= $model['short_text']; ?></p>
        <a href="<?= \yii\helpers\Url::to(['view', 'slug' => $model['slug']])?>">читать больше</a>
    </div>
