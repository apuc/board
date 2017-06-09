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
use yii\widgets\MaskedInput;

/*$IpGeoBase = new IpGeoBase();
$IpGeoBase->updateDB();*/

$this->title = "Добавить объявление";

?>

<section class="content">
    <div class="container">
        <div class="left">
            <ul class="left-menu">
                <li><a href="<?= Url::toRoute(['/personal_area/ads/ads_user_active']); ?>">Управление  объявлениями</a></li>
                <li><a href="">Создание нового объявления</a></li>
                <li><a href="">Помощь</a></li>
            </ul>
        </div>
        <div class="right">
            <h1><?= Html::encode($this->title) ?></h1>
            <!--<div class="memo-error"><span class="triangle-left"></span><p>Please choose a username.</p></div>-->
            <?php $form = ActiveForm::begin([
                'id'                     => 'add_ads',
                'options'                => ['class' => 'content-forma'],
                'fieldConfig' => [
                    'template' => '<div class="form-line">{label}{input}<div class="memo-error"><p>{error}</p></div><div class="memo"><span class="info-icon"></span><span class="triangle-left"></span>{hint}</div></div>',
                    'inputOptions' => ['class' => 'input-name jsHint'],
                    'labelOptions' => ['class' => 'label-name'],
                    'errorOptions' => ['class' => 'error'],

                    'options'      => ['class' => 'form-line'],
                    'hintOptions' => ['class' => '']

                ],'errorCssClass' => 'my-error'
            ]); ?>

            <h2 class="soglasie">Общая информация</h2>
            <hr class="lineAddAds" />

            <?= $form->field($model, 'title')->textInput(['maxlength' => 70])->hint('<b>Введите наименование товара, объекта или услуги.</b><br>В заголовке <b>не допускается: номер телефона, электронный адрес, ссылки</b><br>Не допускаются заглавные буквы (кроме аббревиатур).')->label('Заголовок<span>*</span>'); ?>
            <p class="calc">
                <small>
                    <b id="title-count-res" class="counter-placeholder">70</b> знаков осталось
                </small>
            </p>
            <?= $form->field($model, 'user_id')->hiddenInput(['class' => 'form-control', 'value' => Yii::$app->user->id ])->label(false); ?>
            <?= $form->field($model, 'status')->hiddenInput(['class' => 'form-control', 'value' => 1])->label(false); ?>


            <?= $form->field($model, 'category_id',
                ['template' => '<div class=mclass2>{input}<div class="memo-error"><p>{error}</p></div></div>'])
                ->hiddenInput()->label(false); ?>

            <label class="label-name">Категория<span>*</span></label>

            <span class="SelectCategory">
                <div class="place-ad__form select-category-add" >
                    Выбирите рубрику

                </div>
            </span>

            <hr class="lineAddAds" />
            <span id="additional_fields"></span>



            <?php
                if(\common\classes\UserFunction::getUserOrg()){
                    echo $form->field($model, 'private_business')->dropDownList(['0' => 'Частное лицо', '1' => 'Бизнес'],['prompt' => 'Выберите'])
                        ->label('Частное лицо / Бизнес')
                        ->hint('Выберите от кого будет подано объявление');?>
                    <span class="selectBusiness"></span>
            <?php
                }else{
                    echo $form->field($model, 'private_business')->hiddenInput(['value' => 0])->label(false);
                }
            ?>



            <?= $form->field($model, 'content')->textarea(['class' => 'area-name jsHint', 'maxlength' => 4096])->hint('<b>Добавьте описание вашего товара/услуги,</b> укажите преимущества и важные детали.<br>В описании <b>не допускается указание контактных данных.</b><br>Описание должно соответствовать заголовку и предлагаемому товару/услуге.<br>Не допускаются заглавные буквы (кроме аббревиатур).<br><b>Добавьте описание вашего товара/услуги,</b> укажите преимущества и важные детали.<br>В описании <b>не допускается указание контактных данных.</b>Описание должно соответствовать заголовку и предлагаемому товару/услуге.<br>Не допускаются заглавные буквы (кроме аббревиатур).')->label('Описание<span>*</span>'); ?>
            <p class="calc">
                <small>
                    <b id="descr-count-res" class="counter-placeholder">4096</b> знаков осталось
                </small>
            </p>
            <?= $form->field($model, 'price')->textInput()->hint('Пожалуйста, укажите цену. <b>Обратите внимание, что указание нереальной или условной цены (1 руб., 111 руб.) запрещено</b><b>Внимание, цена указывается в российских рублях</b> ')->label('Цена<span>*</span>'); ?>


            <h2 class="soglasie">Фотографии</h2>
            <hr class="lineAddAds" />

            <?php
            $preview = [];
            $previewConfig = [];
            if(!$model->isNewRecord){
                foreach($img as $i){
                    $preview[] = "<img src='$i->img' class='file-preview-image'>";
                    $previewConfig[] = [
                        'caption' => '',
                        'url' => '/secure/about/default/delete_file?id=' . $i->id
                    ];
                }
            }

            //echo '<label class="control-label">Добавить фото</label>';


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
                    'maxFileCount' => 10,
                    'maxFileSize'=> 2000,
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
                        'value' => $geoInfo['city_id'] ,
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




            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(),[
                'options' => [
                    'class' => 'input-name jsHint'
                ],

                'mask' => ['+9 (999) 999-9999', '+99(999) 999-99-99']
            ])->label('Телефон<span>*</span>')->hint('как с Вами связаться?')?>

            <?= $form->field($model, 'mail')->textInput(['readonly' => true])->label('Mail<span>*</span>')->hint('Вы можете указать публичный емейл в личном кабинете')?>

            <h2 class="soglasie">Согласие на обработку данных</h2>
            <hr class="lineAddAds" />
            <div class="content-dannie">
    			<!--<span>
	    			<input id="dannie-2" type="checkbox" name="option2" value="a2">
	    			<label for="dannie-2"></label><p>Разместить мое объявление для дополнительной рекламы в ВК</p>
	    			<a href="" class="soc-icon"></a>
				</span>-->
    			<span>
	    			<input id="dannie-1" type="checkbox" name="option2" value="a2">
	    			<label for="dannie-1"></label><p>* Я соглашаюсь с
                        <a target="_blank" href="<?= Url::to(['/help/default/view', 'slug' => 'obsie-polozenia'])?>">
                            правилами использования сервиса</a>, а также с передачей и обработкой моих данных на RUB-ON. Я подтверждаю своё совершеннолетие и ответственность за размещение объявления</p>
				</span>
            </div>

            <?= Html::submitButton('Oпубликовать', ['class' => 'place-ad_publish publish place-ad__publish', 'disabled' => 'disabled', 'id' => 'saveInfo']) ?>
            <?/*= Html::submitButton('Предпросмотр', ['class' => 'place-ad_publish prew place-ad__publish', 'disabled' => 'disabled']) */?>


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