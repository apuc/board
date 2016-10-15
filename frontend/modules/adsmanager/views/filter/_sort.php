<div class="nachalo">
    <p>в начале:</p>
    <a class="price-category" data-method="post" href="<?= \yii\helpers\Url::current(['sort' => null])?>">самые новые</a>
    <a class="price-category" data-method="post" href="<?= \yii\helpers\Url::current(['sort' => 'cheap'])?>">дешевые</a>
    <a class="price-category" data-method="post" href="<?= \yii\helpers\Url::current([ 'sort' => 'dear'])?>">дорогие</a>
</div>