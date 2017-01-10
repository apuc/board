<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 05.01.2017
 * Time: 13:21
 * @var $model \common\models\db\Organizations
 * @var $geoInfo \common\classes\Address
 * @var $arraregCity array
 */
use kartik\select2\Select2;
use yii\helpers\Html;

?>
<br>
<div class="wrap-line">
    <div class="form-line">
        <label class="label-name">Город<span>*</span></label>
        <?= Select2::widget([
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
        ?>
    </div>
    <?= Html::label('Адрес',null,['class'=>'label-name']) ?>
    <?= Html::textInput('address[]',null,['class'=>'input-small jsHint']) ?>
    <?= Html::label('Телефон',null,['class'=>'label-name']) ?>
    <?= Html::textInput('phone[]',null,['class'=>'input-small jsHint']) ?>
<!--    --><?/*= $form->field($model, 'address')->textInput(['class' => 'input-small jsHint'])->hint('Адрес организации')->label('Адрес<span>*</span>'); */?>
<!--    --><?/*= $form->field($model, 'phone')->textInput(['class' => 'input-small jsHint'])->hint('Ваш телефон')->label('Телефон<span>*</span>'); */?>
    <div class="wrap-line-info">
						<span>
								эти данные будут находитьс в главном  блоке <a href="">Вашей компании</a>
						</span>
    </div>
    <a href="#" data-index="0" class="dopolnitelno dopPhone"> <span class="circle-plus"></span>дополнительный телефон</a>
</div>
