<div class="news__right">
    <div class="other-news">
        <h3>Читайте также</h3>
        <?php foreach ($model as $item): ?>
            <a href="<?= \yii\helpers\Url::to(['view', 'slug' => $item->slug]); ?>" class="other-news__items">
                <small><span class="date"></span><?= \common\classes\DataTime::timeNews($item->dt_add); ?></small>
                <p><?= $item->short_text; ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</div>