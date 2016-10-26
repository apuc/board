<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<div class="ad-charasteristics">
    <!--<div id="jsfilter_ajax_cont">
        <div id="sel_block_arrow"></div>
        Найдено объявлений:
        <span id="jsfilter_ajax_output"></span>.
        <a href="#">Показать</a>
    </div>-->
    <form action="/adsmanager/filter/filter_search_view" class="ad-charasteristics-form" id="filterform" method="get">
        <!--<input type="hidden" name="_csrf" value="<?/*= Yii::$app->request->getCsrfToken(); */?>">-->
        <input type="hidden" name="mainCat" id=""value="<?= (!empty($_GET['mainCat'])) ? $_GET['mainCat'] : ''; ?>">

        <div class="parentCategoryFieldsFilter">
            <?php
            if(!empty($parentCategory)){
                echo Html::label(Html::tag('span','Подкатегория',['class' => 'large-label-title']),'parent-category-filter', ['class' => 'large-label']) .
                    Html::dropDownList('idCat[]',
                        (!empty($_GET['idCat'][0])) ? $_GET['idCat'][0] : null,
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
                        (!empty($_GET['idCat'][1])) ? $_GET['idCat'][1] : null,
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

        <!--<div class="ad-charasteristics-form-type">
            <h3 class="ad-charasteristics-form-type-title">Тип:</h3>
				<span class="line-type"><input id="type-1" type="checkbox" class="input-checkbox">
					<label for="type-1" class="label-checkbox"></label>
					<p class="text-type">все</p>
				</span>
				<span class="line-type"><input id="type-2" type="checkbox" class="input-checkbox">
					<label for="type-2" class="label-checkbox"></label>
					<p class="text-type">частные</p>
				</span>
				<span class="line-type"><input id="type-3" type="checkbox" class="input-checkbox">
					<label for="type-3" class="label-checkbox"></label>
					<p class="text-type">бизнес</p>
				</span>
        </div>-->
        <!--<div  class="ad-charasteristics-form-dop">
            <h3 class="ad-charasteristics-form-type-title">Дополнительно:</h3>
				<span class="line-type">
					<input id="dop-1" type="checkbox" class="input-checkbox">
					<label for="dop-1" class="label-checkbox"></label>
					<p class="text-type">только с фото</p>
				</span>
				<span class="line-type">
					<input id="dop-2" type="checkbox" class="input-checkbox">
					<label for="dop-2" class="label-checkbox"></label>
					<p class="text-type">по названиям</p>
				</span>
        </div>-->


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

        <input type="submit" name="" id="" value="Применить">
    </form>
</div>