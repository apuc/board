<?php
use common\classes\Debug;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>

<div class="mobile-filter jsMobileFilter">
    <form action="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view'])?>" class="ad-charasteristics-form tab-content" id="filterMobileForm" method="get">
        <button class="mobile-filter__close jsCloseFilter"><span></span><span></span>
        </button>
        <h2 class="mobile-filter__head">Фильтр
        </h2>
        <div class="mobile-filter__private-dealers">
            <button class="jsActivePrivateDealers active-private-dealers">Все
            </button>
    <!--            <button class="jsActivePrivateDealers">Частные-->
    <!--            </button>-->
    <!--            <button class="jsActivePrivateDealers">Автодилеры-->
    <!--            </button>-->
        </div>
    <!--        <div class="mark filter-style jsShowFilterOpen" data-sethtml="mark">-->
    <!--            <p>Марка-->
    <!--            </p><span class="btn-arrow jsSetFlag">Все</span>-->
    <!--        </div>-->
<!--        <div class="mobile-filter-open jsHideFilterOpen">-->
<!--            <button class="mobile-filter-open__close jsCloseFilterAll"><span></span><span></span>-->
<!--            </button>-->
<!--            <h2 class="mobile-filter-open__head">Категория-->
<!--            </h2>-->
<!--            <div class="mobile-filter-open__block jsSearchFlag" data-flag="mark">-->
<!--                <button class="jsShowFlag">AC-->
<!--                </button>-->
<!--                <button class="jsShowFlag">Acura-->
<!--                </button>-->
<!--                <button class="jsShowFlag">Alfa Romeo-->
<!--                </button>-->
<!--                <button class="jsShowFlag">Alpina-->
<!--                </button>-->
<!--                <button class="jsShowFlag">AM General-->
<!--                </button>-->
<!--                <button class="jsShowFlag">Ariel-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
		<?php
		if(!empty($parentCategory)): ?>
		<input id="parentCategoryMobile" type="hidden" name="idCat[]">
        <div class="model filter-style jsShowFilterOpen" data-sethtml="category">
            <p>Категория</p>
            <span class="btn-arrow jsSetFlag">Все</span>
        </div>
        <div class="mobile-filter-open jsHideFilterOpen">
            <div class="mobile-filter-open__close jsCloseFilterAll"><span></span><span></span></div>
            <h2 class="mobile-filter-open__head">Категория</h2>
            <div class="mobile-filter-open__block jsSearchFlag" data-flag="category">

					<?php foreach ($parentCategory as $category) : ?>

						<span class="jsShowFlag parentCategoryMobile" data-id="<?=$category->id?>"><?=$category->name ?></span>

					<?php endforeach;?>

		<?php endif; ?>
		<?php
		if(!empty($parentCategory)): ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if(!empty($parentParentCategory)): ?>
			<input id="childrenCategoryMobile" type="hidden" name="idCat[]">
			<div class="model filter-style jsShowFilterOpen" data-sethtml="subcategory">
				<p>Подкатегория</p>
				<span class="btn-arrow jsSetFlag">Все</span>
			</div>
			<div class="mobile-filter-open jsHideFilterOpen">
				<div class="mobile-filter-open__close jsCloseFilterAll"><span></span><span></span></div>
				<h2 class="mobile-filter-open__head">Подкатегория</h2>
				<div class="mobile-filter-open__block jsSearchFlag" data-flag="subcategory">

				<?php foreach ($parentParentCategory as $category) : ?>

					<span class="jsShowFlag childrenCategoryMobile" data-id="<?=$category->id?>"><?=$category->name ?></span>

				<?php endforeach;?>

		<?php endif; ?>

		<?php if(!empty($parentParentCategory)): ?>
            </div>
        </div>
		<?php endif; ?>

        <div class="filter-price filter-style jsShowFilterOpen">
            <p>Цена
            </p><span class="btn-arrow jsSetPrice">Любая</span>
        </div>
        <div class="mobile-filter-open jsHideFilterOpen">
            <button class="mobile-filter-open__close jsCloseFilterAll"><span></span><span></span>
            </button>
            <h2 class="mobile-filter-open__head">Цена, руб
            </h2>
            <div class="mobile-filter-open__inputs filter__price jsSearchPrice">
                <div class="mobile-filter-open__inputs__inp">
                    <input class="jsFromPrice"
                           type="number"
                           name="maxPrice"
                           value="<?= (Yii::$app->request->get('minPrice')) ?: Yii::$app->request->get('minPrice')?>"
                           id="price" maxlength="10"
                    />
                </div>
                <div class="mobile-filter-open__inputs__inp">
                    <input class="jsToPrice"
                           type="number"
                           name="maxPrice"
                           value="<?= (Yii::$app->request->get('maxPrice')) ?: Yii::$app->request->get('maxPrice')?>"
                           id="price2"
                           maxlength="10"
                    />
                </div>
            </div>
            <div class="mobile-filter-open__ok jsGetPrice"><span>ОК</span></div>
        </div>
		<?= Html::hiddenInput('mainCat', $selectMainCat); ?>
        <div class="mobile-filter__buttons">
            <button class="mobile-filter__buttons__reset jsResetFilter">Сбросить</button>
            <button type="submit" class="mobile-filter__buttons__show jsShowAllProducts" name="" id="send-mobile-filter">Показать</button>
        </div>
    </form>
</div>

<div class="filter sidebar-filter-pc jsStickyFilter" id="sidebar-filter-pc">
    <div class="sidebar-inner">
    <form action="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view'])?>" class="ad-charasteristics-form tab-content" id="filterForm" method="get">


		<div class="tab-content pc-tab-content">
<!--                <div class="tab-item" id="oldCar">-->
<!--                    <div class="sidebar-inner__tab-item">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="tab-item tab-item-active" id="newCar">-->
                    <div class="sidebar-inner__tab-item">
                        <?php
                        if(!empty($parentCategory)): ?>
                            <div class="select mb10">
<!--								--><?php //Debug::prn(ArrayHelper::map($parentCategory, 'id', 'name')) ?>

<!--								--><?php //echo
//									\kartik\select2\Select2::widget([
//										'id'	=>	'main_select',
//										'name' => 'main_select',
//										'data' => ArrayHelper::map($parentCategory, 'id', 'name'),
//										'pluginLoading'	=>	false,
//										'options' => [
//											'placeholder' => 'Выберите',
//										],
//										'pluginOptions'	=>	[
//											'allowClear' => false,
////											'containerCssClass'	=>	'error',
////											'dropdownCssClass'	=>	'test'
//										],
//									]);
//								?>
								<?= Html::dropDownList('main_select',
									null,
									ArrayHelper::map($parentCategory, 'id', 'name'),
									['class' => 'select2-js filterCategory','id' => 'main_select','data-placeholder' => 'Выберите','prompt' => 'Выберите', ]
								);?>

								<?= \kartik\depdrop\DepDrop::widget([
										'name'		=>	'first_sub_select',
										'options'	=>	[
												'id' => 'first_sub_select',
												'placeholder' => 'Выберите',
										],
										'pluginOptions'	=>	[
												'url'		=>	\yii\helpers\Url::to(['/filter/first_sub_select']),
												'depends'	=>	['main_select']
										]

									]);
								?>
								<?= \kartik\depdrop\DepDrop::widget([
									'name'		=>	'second_sub_select',
									'options'	=>	[
										'id' => 'second_sub_select',
										'placeholder' => 'Выберите',
									],
									'pluginOptions'	=>	[
										'url'		=>	\yii\helpers\Url::to(['/filter/second_sub_select']),
										'depends'	=>	['first_sub_select'],
									],
									'pluginEvents' => [
										"depdrop:afterChange"=>"function(event, id, value) { console.log($.post, value, id); }",
									]

								]);
								?>


<!--                                --><?//= Html::dropDownList('idCat[]',
//                                        $selectParentCategory,
//                                        ArrayHelper::map($parentCategory, 'id', 'name'),
//                                        ['class' => 'select2-js filterCategory','id' => 'parent-category-filter','data-placeholder' => 'Выберитеt','prompt' => 'Выберите', ]
//                                    );?>
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
<!--                </div>-->
            </div>

        <div class="hr mt15 mb25"></div>

        <?= Html::hiddenInput('mainCat', $selectMainCat); ?>
        <?= Html::hiddenInput('regionFilter', (Yii::$app->request->get('regionFilter')) ? Yii::$app->request->get('regionFilter') : null); ?>
        <?= Html::hiddenInput('cityFilter', \common\classes\GeoFunction::getCurrentCity()); ?>
        <?= Html::hiddenInput('textFilter', (Yii::$app->request->get('textFilter')) ? Yii::$app->request->get('textFilter') : null); ?>
        <?= Html::hiddenInput('sortTypeRadio', (Yii::$app->request->get('sortTypeRadio')) ? Yii::$app->request->get('sortTypeRadio') : null); ?>
<!--        <div class="mb10">-->
<!--            <div class="button button_blue mr20" style="width: 100%">Найдено <span id="countAds"></span> объявлений</div>-->
<!--        </div>-->
        <div class="mb10">
            <input type="submit" class="button button_red mr10 header__btn--first" name="" id="send-filter" value="Применить" style="width: 100%">
        </div>
    </form>
    </div>
</div>

<div class="mobile-sort">
<!--    <div class="mobile-sort__mark">-->
<!--        <span>Марка</span>-->
<!--        <button class="btn-arrow">Все</button>-->
<!--    </div>-->
    <div class="mobile-sort__block">
        <div class="mobile-sort__filter sidebar-filter">
            <button class="jsSort"><img src="/theme/images/svg/sort.svg" alt="" role="presentation"/>Сортировка
            </button>
            <button class="jsFilter"><img src="/theme/images/svg/filtr.svg" alt="" role="presentation"/>Еще фильтры
            </button>
        </div>
    </div>
</div>
<?php if(false):?>
<div class="ad-charasteristics">
    <form action="<?= \yii\helpers\Url::to(['/adsmanager/filter/filter_search_view'])?>" class="ad-charasteristics-form" id="filterForm" method="get">
        <input type="hidden" name="mainCat" id="" value="<?= (!empty($_GET['mainCat'])) ? $_GET['mainCat'] : ''; ?>">

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
        <?= Html::hiddenInput('cityFilter', (Yii::$app->request->get('cityFilter')) ? Yii::$app->request->get('cityFilter') : null); ?>c
        <?= Html::hiddenInput('textFilter', (Yii::$app->request->get('textFilter')) ? Yii::$app->request->get('textFilter') : null); ?>

        <input type="submit" class="apply-button" name="" id="" value="Применить">
    </form>
</div>
<?php endif; ?>