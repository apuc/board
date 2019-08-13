
<?php
/**
* @var $arraregCity;
 */

use kartik\select2\Select2;

echo \yii\helpers\Html::beginForm();

echo \yii\helpers\Html::label('Страница');
echo \yii\helpers\Html::textInput('page');

echo "<br />";

echo \yii\helpers\Html::label('Город');
echo Select2::widget([
    'name' => 'city_id',
    'attribute' => 'state_2',
    'data' => $arraregCity,
    //'value' => $geoInfo['city_id'] ,
    //'data' => ['Донецкая область' => ['1'=>'Don','2'=>'Gorl'], 'Rostovskaya' => ['5'=>'rostov']],
    'options' => ['placeholder' => 'Начните вводить Ваш город ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

echo \yii\helpers\Html::submitInput('Save');

echo \yii\helpers\Html::endForm();
