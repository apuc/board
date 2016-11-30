<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/*\common\classes\Debug::prn(Yii::$app->controller->module->id);
\common\classes\Debug::prn(Yii::$app->controller->action->id);*/

?>

<section class="header__bottom-home">
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
                                echo 'Выберите категорию';
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
        <form class="header__bottom-home-right" action="/adsmanager/filter/filter_search_view" method="get">
            <input type="text" class="input-search" placeholder="Введите для поиска (поиск по объявлениям)">
            <div class="region"><span class="location-mark"></span> <span class="textSelectRegion"><?= $regionName; ?></span>
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
            </div>
            <div class="city" style="<?= (Yii::$app->request->get('regionFilter')) ? 'display: inline-block;' : ''?>">
                <span class="hotel-icon"></span>
                <span class="textSelectCity"><?= $cityName?></span>
                <div class="city-list">
                    <ul>
                        <?php if(!empty($city)): ?>
                            <?php foreach ($city as $item): ?>
                                <span class="republic selectCity"><?= $item->name; ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <?= Html::hiddenInput('regionFilter', (Yii::$app->request->get('regionFilter')) ? Yii::$app->request->get('regionFilter') : null); ?>
            <?= Html::hiddenInput('cityFilter', (Yii::$app->request->get('cityFilter')) ? Yii::$app->request->get('cityFilter') : null); ?>
            <?= Html::hiddenInput('mainCat', null); ?>

            <button href="" class="button-search">Найти</button>
        </form>
    </div>
</section>


<!--<section class="header__bottom-home">
    <div class="container">
        <form action="/adsmanager/filter/filter_search_view" method="get">
            <div class="header__bottom-home-left">


                <?php /*if((Yii::$app->controller->action->id != 'filter_search_view')):*/?>

                    <div class="category ">
                        <div class="delivery_block1">

                            <div class="delivery_list1">
                                <span class="category-icon"></span>

                                <span class="select-category">Выбрать категорию</span></div>
                            <ul class="cities_list1">
                                <?php
/*                                foreach($category as $item): */?>
                                    <li data-id="<?/*= $item->id;*/?>"><?/*= $item->name; */?></li>
                                <?php /*endforeach; */?>


                            </ul>
                        </div>
                    </div>
                <?php /*endif; */?>

            </div>
            <div class="header__bottom-home-right">
                <input type="hidden" name="mainCat" id=""value="<?/*= (!empty($_GET['mainCat'])) ? $_GET['mainCat'] : ''; */?>">
                <input type="text" class="input-search" placeholder="Введите для поиска">
                <div class="regionFilter">
                    <?php
/*                    echo Html::label(Html::tag('span','Область',['class' => 'large-label-title']),'region-filter', ['class' => 'large-label']) .
                        Html::dropDownList('regionFilter',
                            (!empty($_GET['regionFilter'])) ? $_GET['regionFilter'] : null,
                            ArrayHelper::map($regions, 'id', 'name'),
                            ['class' => 'large-select filterRegCity','id' => 'region-filter','prompt' => 'Выберите область']
                        );
                    */?>
                </div>
                <div class="cityFilterWr">
                    <?php
/*                    if(!empty($_GET['regionFilter'])){
                        echo Html::label(Html::tag('span','Город',['class' => 'large-label-title']),'city-filter', ['class' => 'large-label']) .
                            Html::dropDownList('cityFilter',
                                (!empty($_GET['cityFilter'])) ? $_GET['cityFilter'] : null,
                                ArrayHelper::map($city, 'id', 'name'),
                                ['class' => 'large-select filterRegCity','id' => 'city-filter','prompt' => 'Выберите город']
                            );
                    }
                    */?>
                </div>
                <?/*= Html::hiddenInput('idCat[]', null); */?>

                <input type="submit" class="button-search" name="" id="">

            </div>
        </form>
    </div>
</section>-->