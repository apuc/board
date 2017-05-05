<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 05.01.2017
 * Time: 13:21
 * @var $model \common\models\db\Organizations
 * @var $geoInfo \common\classes\Address
 * @var $arraregCity array
 * @var $code string
 */
use kartik\select2\Select2;
use yii\helpers\Html;

?>
<div class="wrap-line" style="margin-top: 10px">
    <!--<div class="form-line">
        <label class="label-name">Город<span>*</span></label>
        <?/*= Select2::widget([
            'name' => 'Organizations[city_id]',
            'attribute' => 'state_2',
            'data' => $arraregCity,
            'value' => $geoInfo['city_id'],
            //'data' => ['Донецкая область' => ['1'=>'Don','2'=>'Gorl'], 'Rostovskaya' => ['5'=>'rostov']],
            'options' => ['placeholder' => 'Начните вводить Ваш город ...', 'id'=>'test'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        */?>
    </div>-->
    <div class="form-line">
        <?= Html::label('Город',null,['class'=>'label-name']) ?>
        <?= Html::dropDownList('city['.$code.']',$geoInfo,$arraregCity,['id'=>$code]) ?>
    </div>
    <div class="form-line">
        <?= Html::label('Адрес',null,['class'=>'label-name']) ?>
        <?= Html::textInput('address['.$code.']',null,['class'=>'input-small jsHint']) ?>
    </div>
    <div class="form-line">
        <?= Html::label('Телефон',null,['class'=>'label-name']) ?>
        <?= Html::textInput('orgPhone['.$code.'][]',null,['class'=>'input-small jsHint']) ?>
    </div>
<!--    --><?/*= $form->field($model, 'address')->textInput(['class' => 'input-small jsHint'])->hint('Адрес организации')->label('Адрес<span>*</span>'); */?>
<!--    --><?/*= $form->field($model, 'phone')->textInput(['class' => 'input-small jsHint'])->hint('Ваш телефон')->label('Телефон<span>*</span>'); */?>
    <a href="" class="delete-block delAddress"> <span class="delete-line"></span>удалить блок</a>
    <a href="#" data-index="<?= $code ?>" class="dopolnitelno dopPhone"> <span class="circle-plus"></span>дополнительный телефон</a>
</div>
