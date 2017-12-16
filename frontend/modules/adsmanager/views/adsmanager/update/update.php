<?php
/**
 * @var $category common\models\db\Category
 * @var $model common\models\db\Ads
 * @var $region
 * @var $userInfo
 */
use common\classes\Debug;
use himiklab\ipgeobase\IpGeoBase;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
/*$IpGeoBase = new IpGeoBase();
$IpGeoBase->updateDB();*/

$this->title = "Редактировать объявление";
//Debug::prn($model);
?>

<section class="content">
    <div class="container">
        <div class="left">
            <ul class="left-menu">
                <li><a href="">Управление  объявлениями</a></li>
                <li><a href="">Создание нового объявления</a></li>
                <li><a href="">Помощь</a></li>
            </ul>
        </div>
        <div class="right">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin([
                'id'                     => 'add_ads',
                'options'                => ['class' => 'content-forma'],
                'fieldConfig' => [
                    'template' => '<div class="form-line">{label}{input}<div class="error">{error}</div><div class="memo"><span class="info-icon"></span><span class="triangle-left"></span>{hint}</div></div>',
                    'inputOptions' => ['class' => 'input-name jsHint'],
                    'labelOptions' => ['class' => 'label-name'],
                    'errorOptions' => ['class' => 'help-block'],
                    'options'      => ['class' => 'form-line'],
                    'hintOptions' => ['class' => '']

                ],
            ]); ?>
            <?= $form->field($model, 'id')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'dt_send_msg')->hiddenInput(['value' => 0])->label(false); ?>
            <h2 class="soglasie">Общая информация</h2>
            <hr class="lineAddAds" />

            <?= $form->field($model, 'title')->textInput()->hint('<b>Введите наименование товара, объекта или услуги.</b><br>В заголовке <b>не допускается: номер телефона, электронный адрес, ссылки</b><br>Не допускаются заглавные буквы (кроме аббревиатур).')->label('Заголовок<span>*</span>'); ?>
            <?= $form->field($model, 'user_id')->hiddenInput(['class' => 'form-control', 'value' => Yii::$app->user->id ])->label(false); ?>
            <?= $form->field($model, 'status')->hiddenInput(['class' => 'form-control', 'value' => 1])->label(false); ?>



            <label class="label-name">Категория<span>*</span></label>

            <span class="SelectCategory">
                <div class="check-category">
                    <div class="check-thumb">
                        <img src="<?= $category[0];?>" />
                    </div>
                    <div class="check-title myBtn1">
                        <?php
                        array_shift($category);
                        foreach($category as $key=>$item):
                            ?>
                            <?= $item; ?> <?= ($key == count($category)-1) ? '' : '-'?>
                        <?php endforeach;
                        ?>
                    </div>
                </div>

            <div class="btnCategoryEdit"><span class="select-category-add">Изменить</span></div>
            </span>
            <?= $form->field($model, 'category_id',
                ['template' => '<div class=mclass2>{input}<div class="error">{error}</div></div>'])
                ->hiddenInput()->label(false); ?>
            <hr class="lineAddAds" />
            <span id="additional_fields">
                <?= $adsFields; ?>
            </span>


            <?= $form->field($model, 'content')->textarea(['class' => 'area-name jsHint'])->hint('<b>Добавьте описание вашего товара/услуги,</b> укажите преимущества и важные детали.<br>В описании <b>не допускается указание контактных данных.</b><br>Описание должно соответствовать заголовку и предлагаемому товару/услуге.<br>Не допускаются заглавные буквы (кроме аббревиатур).<br><b>Добавьте описание вашего товара/услуги,</b> укажите преимущества и важные детали.<br>В описании <b>не допускается указание контактных данных.</b>Описание должно соответствовать заголовку и предлагаемому товару/услуге.<br>Не допускаются заглавные буквы (кроме аббревиатур).')->label('Описание<span>*</span>'); ?>

            <?= $form->field($model, 'price')->textInput()->hint('Цена')->label('Цена<span>*</span>'); ?>


            <h2 class="soglasie">Фотографии</h2>
            <hr class="lineAddAds" />

            <?php
            $preview = [];
            $previewConfig = [];
            if(!$model->isNewRecord){
                foreach($model['ads_img'] as $i){
                    $preview[] = "<img src='$i->img' class='file-preview-image'>";
                    $previewConfig[] = [
                        'caption' => '',
                        'url' => '/site/delete_file?id=' . $i->id
                    ];
                }
            }



            echo FileInput::widget([
                'name' => 'file[]',
                'id' => 'input-5',
                'attribute' => 'attachment_1',
                'value' => '@frontend/media/img/1.png',
                'options' => [
                    'multiple' => true,
                    'showCaption' => false,
                    'showUpload' => false,
                    'uploadAsync'=> false,
                ],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['/site/upload_file']),
                    'language' => "ru",
                    'previewClass' => 'hasEdit',
                    'uploadAsync'=> false,
                    'showUpload' => false,
                    'dropZoneEnabled' => false,
                    'overwriteInitial' => false,
                    'initialPreview' => $preview,
                    'initialPreviewConfig' => $previewConfig
                ],
            ]);

            ?>


            <h2 class="soglasie">Ваши контактные данные</h2>
            <hr class="lineAddAds" />

            <div class="form-line field-ads-name required">
                <div class="form-line">
                    <label class="label-name">Местонахождение<span>*</span></label>
                    <?= Select2::widget([
                        'name' => 'Ads[city_id]',
                        'attribute' => 'state_2',
                        'data' => $arraregCity,
                        'value' => $model->city_id ,
                        //'data' => ['Донецкая область' => ['1'=>'Don','2'=>'Gorl'], 'Rostovskaya' => ['5'=>'rostov']],
                        'options' => ['placeholder' => 'Начните вводить Ваш город ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
            </div>

            <?= $form->field($model, 'name')->textInput()->label('Имя<span>*</span>')->hint('как к вам обращаться')?>

            <?= $form->field($model, 'phone')->textInput()->label('Телефон<span>*</span>')->hint('как с Вами связаться?')?>

            <?= $form->field($model, 'mail')->textInput(['readonly' => true])->label('Mail<span>*</span>')->hint('Вы можете указать публичный емейл в личном кабинете')?>

            <h2 class="soglasie">Согласие на обработку данных</h2>
            <hr class="lineAddAds" />
            <div class="content-dannie">
    			<span>
	    			<input id="dannie-1" type="checkbox" name="option2" value="a2">
	    			<label for="dannie-1"></label><p>* Я соглашаюсь с <a href="">правилами использования сервиса</a>, а также с передачей и обработкой моих данных в ХХХ. Я подтверждаю своё совершеннолетие и ответственность за размещение объявления</p>
				</span>
            </div>

            <?= Html::submitButton('Oпубликавать', ['class' => 'place-ad_publish publish place-ad__publish', 'disabled' => 'disabled', 'id' => 'saveInfo']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>



<div class="modal modal-wide fade" id="modalType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h2>Выберите категорию</h2>
                <span class="krest close"> &times;</span>
            </div>
            <div class="modal-body modal-flex">

            </div>


        </div>
    </div>
</div>