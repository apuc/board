<?php

use common\models\db\Category;
use common\models\db\GeobaseCity;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>


<?php
echo Html::beginForm();
echo Html::label('Вставте урл');
echo Html::textInput('url');

echo "<br />";

echo Html::label('Выберите категорию');
echo Select2::widget(
    [
        'name' => 'category',
        'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

$city = GeobaseCity::find()
    ->select([
        '`geobase_city`.`name` as value',
        '`geobase_city`.`name` as  label',
        '`geobase_city`.`id` as id',
        '`geobase_region`.`name` as region_name',
        '`geobase_region`.`id` as region_id'
    ])
    ->leftJoin('`geobase_region`', '`geobase_region`.`id` = `geobase_city`.`region_id`')
    ->orderBy('`geobase_region`.`name`')
    ->addOrderBy('`geobase_city`.`name`')
    ->asArray()
    ->all();

$i = 0;
$data = [];
foreach ($city as $item) {
    $data[$item['region_name']][$item['id']] = $item['value'];
}
echo Html::label('Выберите город');
echo Select2::widget([
    'name' => 'city_id',
    'data' => $data,
    //'data' => ['Донецкая область' => ['1'=>'Don','2'=>'Gorl'], 'Rostovskaya' => ['5'=>'rostov']],
    'options' => ['placeholder' => 'Начните вводить Ваш город ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
echo Html::submitInput('Спарсить');
echo Html::endForm();


