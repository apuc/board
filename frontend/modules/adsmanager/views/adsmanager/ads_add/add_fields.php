<?php
/**
 * @var $adsFields
 */

//\common\classes\Debug::prn($adsFields);

if($adsFields[0]['ads_fields_type']->type == 'text'){?>
    <div class="place-ad__container">
        <p class="place-ad__subtitle">
            <?= \yii\helpers\Html::label($adsFields[0]->label, 'name',['class' => 'place-ad__subtitle'])?>
        </p>
        <?= \yii\helpers\Html::textInput('AdsField[' . $adsFields[0]->name . ']', null, ['class' => 'place-ad__field jsHint form-control', 'id' => 'name']) ?>
        <div class="error"><div class="help-block"></div></div>
        <div class="hint-block">ddtlbnt hfpvth</div>
    </div>
    <?php


}

if($adsFields[0]['ads_fields_type']->type == 'select'){
    $arr = [];
    foreach ($adsFields[0]['ads_fields_default_value'] as $item) {
        $arr[$item->id] = $item->value;
    }

    ?>
    <div class="place-ad__container">
        <p class="place-ad__subtitle">
            <?= \yii\helpers\Html::label($adsFields[0]->label, 'name1',['class' => 'place-ad__subtitle'])?>
        </p>
        <?= \yii\helpers\Html::dropDownList('AdsField[' . $adsFields[0]->name . ']', null, $arr, ['class' => 'place-ad__field jsHint form-control', 'id' => 'name1', 'prompt' => 'Выберите']) ?>
        <div class="error"><div class="help-block"></div></div>
        <div class="hint-block">ddtlbnt hfpvth</div>
    </div>
    <?php
}