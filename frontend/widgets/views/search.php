<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/*\common\classes\Debug::prn(Yii::$app->controller->module->id);
\common\classes\Debug::prn(Yii::$app->controller->action->id);*/

?>

<section class="header__bottom-home <?= $class; ?>">
    <div class="container">
        <div class="header__bottom-home-left">
            <!-- <a class="category-item">
                <span class="category-icon">Выбрать категорию</span>
            </a> -->
            <div class="category ">
                <div class="delivery_block1">

                    <div class="delivery_list1">
                        <span class="category-icon"></span>

                        <span class="select-category filter-selected-cat" data-id="<?= empty($currentCategory) ? 0 : $currentCategory->id; ?>">
                            <?php
                            if(empty($currentCategory)){
                                echo 'Выбрать категорию';
                            }else{
                                echo $currentCategory->name;
                            } ?></span></div>

                    <ul class="cities_list1">
                        <?php
                        foreach($category as $item): ?>
                            <li data-id="<?= $item->id;?>"><?= $item->name; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div>
        <form class="header__bottom-home-right" action="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view'])?>" method="get">
            <input type="text" class="input-search textSearch" value="<?= (Yii::$app->request->get('textFilter')) ? Yii::$app->request->get('textFilter') : null?>" placeholder="Введите для поиска (поиск по объявлениям)">
            <div class="region"><span class="location-mark"></span> <span class="textSelectRegion"><?= $regionName; ?></span>

            </div>
            <div class="region-list">
                <span class="republic selectRegion" reg-id="21">ДНР</span>
                <span class="republic selectRegion" reg-id="19">ЛНР</span>
                <span class="russia">Росссия</span>
                <div class="russia-list">
                    <ul>
                        <?php foreach($regions as $item ):?>
                            <span class="republic selectRegion" reg-id="<?= $item->id; ?>"><?= $item->name;?></span>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="city" style="<?= (Yii::$app->request->get('regionFilter')) ? 'display: inline-block;' : ''?>">
                <span class="hotel-icon"></span>
                <span class="textSelectCity"><?= $cityName?></span>
            </div>
            <div class="city-list">
                <ul>
                    <?php if(!empty($city)): ?>
                        <?php foreach ($city as $item): ?>
                            <span class="republic selectCity"><?= $item->name; ?></span>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <?= Html::hiddenInput('regionFilter', (Yii::$app->request->get('regionFilter')) ? Yii::$app->request->get('regionFilter') : null); ?>
            <?= Html::hiddenInput('cityFilter', (Yii::$app->request->get('cityFilter')) ? Yii::$app->request->get('cityFilter') : null); ?>
            <?= Html::hiddenInput('mainCat', (Yii::$app->request->get('mainCat')) ? Yii::$app->request->get('mainCat') : null); ?>
            <?= Html::hiddenInput('textFilter', (Yii::$app->request->get('textFilter')) ? Yii::$app->request->get('textFilter') : null); ?>

            <button class="button-search searchForm">Найти</button>
        </form>
    </div>
</section>
