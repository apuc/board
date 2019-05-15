<?php
use common\classes\Debug;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<div class="filter sidebar-filter-pc jsStickyFilter" id="sidebar-filter-pc">
    <div class="sidebar-inner">
    <form action="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view'])?>" class="ad-charasteristics-form" id="filterForm" method="get">


            <div class="tab-content pc-tab-content">
                <div class="tab-item" id="oldCar">
                    <div class="sidebar-inner__tab-item">
                    </div>
                </div>
                <div class="tab-item tab-item-active" id="newCar">
                    <div class="sidebar-inner__tab-item">
                        <?php
                        if(!empty($parentCategory)): ?>
                            <div class="select mb10">
                                <?= Html::dropDownList('idCat[]',
                                        $selectParentCategory,
                                        ArrayHelper::map($parentCategory, 'id', 'name'),
                                        ['class' => 'select2-js filterCategory','id' => 'parent-category-filter','data-placeholder' => 'Выберите','prompt' => 'Выберите', ]
                                    );?>
                            </div>
                        <?php endif; ?>

                        <?php
                        if(!empty($parentParentCategory)):?>
                            <div class="select mb10">
                                <?= Html::dropDownList('idCat[]',
                                        $selectParentParentCategory,
                                        ArrayHelper::map($parentParentCategory, 'id', 'name'),
                                        ['class' => 'select2-js filterCategory','id' => 'parent-parent-category-filter','data-placeholder' => 'Выберите','prompt' => 'Выберите',]
                                    );
                                ?>
                            </div>
                        <?php endif; ?>
                        <div class="aditionlFieldsFilter">
                            <?php
                            if(!empty($adsFieldsAll)){
                                echo $adsFieldsAll;
                            }
                            ?>
                        </div>
                        <div class="hr mt15 mb25"></div>


                        <div class="filter__price">
                            <input type="number" name="minPrice" value="<?= (Yii::$app->request->get('minPrice')) ?: Yii::$app->request->get('minPrice')?>" id="price" maxlength="10" placeholder="Цена от, ₽">
                            <input type="number" name="maxPrice" value="<?= (Yii::$app->request->get('maxPrice')) ?: Yii::$app->request->get('maxPrice')?>" id="price2" maxlength="10" placeholder="до">
                        </div>

                        <div class="hr mt25 mb20"></div>

                        <div class="d-flex justify-content-between">
                            <label class="checkbox checkbox-normal mt5 mb5">
                                <input type="checkbox" name="justInMyCity" <?= (Yii::$app->request->get('justInMyCity')) ? 'checked' : ''?> />
                                <span class="checkbox__main">
                                        <i class="fa fa-check"></i>
                                    </span>
                                <span>Искать только в моем городе</span>
                            </label>
                        </div>
                        <?php if(false): ?>
                            <div class="hr mt25 mb20"></div>

                            <div class="d-flex justify-content-between">
                                <label class="checkbox checkbox-normal mt5 mb5">
                                    <input type="checkbox"/>
                                    <span class="checkbox__main">
                                        <i class="fa fa-check"></i>
                                    </span>
                                    <span>Частные</span>
                                </label>
                                <label class="checkbox checkbox-normal mt5 mb5">
                                    <input type="checkbox"/>
                                    <span class="checkbox__main">
                                        <i class="fa fa-check"></i>
                                    </span>
                                    <span>Автодилеры</span>
                                </label>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <div class="hr mt15 mb25"></div>

        <?= Html::hiddenInput('mainCat', $selectMainCat); ?>
        <?= Html::hiddenInput('regionFilter', (Yii::$app->request->get('regionFilter')) ? Yii::$app->request->get('regionFilter') : null); ?>
        <?= Html::hiddenInput('cityFilter', \common\classes\GeoFunction::getCurrentCity()); ?>
        <?= Html::hiddenInput('textFilter', (Yii::$app->request->get('textFilter')) ? Yii::$app->request->get('textFilter') : null); ?>
        <?= Html::hiddenInput('sortTypeRadio', (Yii::$app->request->get('sortTypeRadio')) ? Yii::$app->request->get('sortTypeRadio') : null); ?>
        <div class="mb10">
            <div class="button button_blue mr20" style="width: 100%">Найдено <span id="countAds"></span> объявлений</div>
        </div>
        <div class="mb10">
            <input type="submit" class="button button_red mr10 header__btn--first" name="" id="send-filter" value="Применить" style="width: 100%">
        </div>
    </form>
    </div>
</div>
<?php if(false):?>
<div class="ad-charasteristics">
    <form action="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view'])?>" class="ad-charasteristics-form" id="filterForm" method="get">
        <input type="hidden" name="mainCat" id=""value="<?= (!empty($_GET['mainCat'])) ? $_GET['mainCat'] : ''; ?>">

        <div class="parentCategoryFieldsFilter">
            <?php
            if(!empty($parentCategory)){
                echo Html::label(Html::tag('span','Подкатегория',['class' => 'large-label-title']),'parent-category-filter', ['class' => 'large-label']) .
                    Html::dropDownList('idCat[]',
                        /*(!empty($_GET['idCat'][0])) ? $_GET['idCat'][0] : null*/
                        $selectParentCategory,
                        ArrayHelper::map($parentCategory, 'id', 'name'),
                        ['class' => 'large-select filterCategory','id' => 'parent-category-filter','prompt' => 'Выберите']
                    );
            }
            ?>
        </div>
        <div class="parentParentCategoryFieldsFilter">
            <?php
            if(!empty($parentParentCategory)){
                echo Html::label(Html::tag('span','Подкатегория',['class' => 'large-label-title']),'parent-category-filter', ['class' => 'large-label']) .
                    Html::dropDownList('idCat[]',
                        $selectParentParentCategory,
                        ArrayHelper::map($parentParentCategory, 'id', 'name'),
                        ['class' => 'large-select filterCategory','id' => 'parent-parent-category-filter','prompt' => 'Выберите']
                    );
            }
            ?>
        </div>
        <div class="aditionlFieldsFilter">
            <?php
                if(!empty($adsFieldsAll)){
                    echo $adsFieldsAll;
                }
            ?>
        </div>

        <div class="ad-charasteristics-form-type">
            <h3 class="ad-charasteristics-form-type-title">Тип:</h3>
            <span class="line-type">
                <input id="type-2" name="private" <?= (Yii::$app->request->get('private')) ? 'checked' : ''?> type="checkbox" class="input-checkbox filterType">
					<label for="type-2" class="label-checkbox"></label>
					<p class="text-type">частные</p>
				</span>
            <span class="line-type"><input id="type-3" name="business" <?= (Yii::$app->request->get('business')) ? 'checked' : ''?> type="checkbox" class="input-checkbox filterType">
					<label for="type-3" class="label-checkbox"></label>
					<p class="text-type">бизнес</p>
				</span>
        </div>

        <div  class="ad-charasteristics-form-priece jsfilter_ajax_cont">
            <h3 class="ad-charasteristics-form-type-title">Стоимость:</h3>
            <div id="options">
                <label for="price">
                    от
                    <input type="text" selprice="<?= $selMinPrice; ?>" name="minPrice" value="<?= $minmax['min']?>" id="price" maxlength="10">
                </label>
                <label for="price2">
                    до
                    <input type="text" selprice="<?= $selMaxPrice; ?>" name="maxPrice" value="<?= $minmax['max']?>" id="price2" maxlength="10">
                </label>
                <div id="slider_price"></div>
            </div>
        </div>

        <?= Html::hiddenInput('mainCat', $selectMainCat); ?>
        <?= Html::hiddenInput('regionFilter', (Yii::$app->request->get('regionFilter')) ? Yii::$app->request->get('regionFilter') : null); ?>
        <?= Html::hiddenInput('cityFilter', (Yii::$app->request->get('cityFilter')) ? Yii::$app->request->get('cityFilter') : null); ?>
        <?= Html::hiddenInput('textFilter', (Yii::$app->request->get('textFilter')) ? Yii::$app->request->get('textFilter') : null); ?>

        <input type="submit" class="apply-button" name="" id="" value="Применить">
    </form>
</div>
<?php endif; ?>