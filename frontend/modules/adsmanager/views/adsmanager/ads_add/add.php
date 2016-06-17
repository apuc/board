<?php
/**
 * @var $category common\models\db\Category
 * @var $model common\models\db\Ads
 * @var $region
 * @var $userInfo
 */
use common\classes\Debug;
use himiklab\ipgeobase\IpGeoBase;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
/*$IpGeoBase = new IpGeoBase();
$IpGeoBase->updateDB();*/

?>

<section class="place-ad">
    <div class="container">
        <!--<div class="row">-->
        <h1 class="place-ad__title">Подать бесплатное объявление</h1>

        <?php $form = ActiveForm::begin([
            'id'                     => 'add_ads',
            'options'                => ['class' => 'add__ads'],
            'fieldConfig' => [
                'template' => '<div class="place-ad__container"><p class="place-ad__subtitle">{label}</p>{input}<div class="error">{error}</div>{hint}</div>',
                'inputOptions' => ['class' => 'jsHint'],
                'labelOptions' => ['class' => 'place-ad__subtitle'],
                'errorOptions' => ['class' => 'help-block'],
                'options'      => ['class' => 'form-group'],
                'hintOptions' => ['class' => 'hint-block']

            ],
        ]); ?>

        <?= $form->field($model, 'title')->textInput(['class' => 'form-control place-ad__field jsHint'])->hint('Привет')->label('ЗАГОЛОВОК*'); ?>
        <?= $form->field($model, 'user_id')->hiddenInput(['class' => 'form-control', 'value' => Yii::$app->user->id ])->label(false); ?>
        <?= $form->field($model, 'status')->hiddenInput(['class' => 'form-control', 'value' => 1])->label(false); ?>

        <div class="place-ad__container">
            <?= $form->field($model, 'category_id',
                ['template' => '<div class=mclass2>{input}<div class="error">{error}</div></div>'])
                ->hiddenInput()->label(false); ?>
            <p class="place-ad__subtitle">Рубрика*</p>

            <span class="SelectCategory">
                <div class="place-ad__form generalModalCategory" >
                    Выбирите рубрику
                    <span class="place-ad__form__search"></span>
                </div>
            </span>

        </div>
        <span id="additional_fields"></span>
        <?= $form->field($model, 'content')->textarea(['class' => 'place-ad__descr jsHint'])->hint('Описанеи')->label('ОПИСАНИЕ*'); ?>

        <?= $form->field($model, 'price')->textInput(['class' => 'place-ad__field jsHint'])->hint('Цена')->label('Цена*'); ?>


        <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map($region, 'id', 'name'),
            'language' => 'ru',
            'options' => [
                'placeholder' => 'выберите регион',
                'class' => 'place-ad__field jsHint',
            ],
            'pluginOptions' => [
                'allowClear' => false,
                'class' => 'place-ad__field jsHint',
                'width' => '54%',

            ],
            'pluginEvents' => [
                "change" => "function() {
                     var idcat = $(this).val();
                     $('#select2-ads-city_id-container').html('Выберите город');
                     $.ajax({
                        type: 'POST',
                        url: \"/adsmanager/ads_add/select_cyti\",
                        data: 'id=' + idcat,
                        success: function (data) {
                            var arr = JSON.parse(data);

                            $(\"#ads-city_id\").empty();
                            $(\"#ads-city_id\").append( $('<option value=\"\">Выберите город</option>'));
                            $.each(arr, function(key, value) {
                                $(\"#ads-city_id\").append( $('<option value=\"' + key + '\">' + value + '</option>'));
                            });

                            $(\"#select2-ads-city_id-result-3pxi-1\").remove();

                            $('li.select2-results__option').each(function(){
                                $(this).attr('aria-selected','false');
                            });

                        }
                    });

                 }",
                "select2:unselect" => "function() { alert(123); }",
            ]
            ])->label('Регион')->hint('12312');
        ?>

        <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map($city, 'id', 'name'),
            'language' => 'ru',
            'options' => [
                'placeholder' => 'выберите город',
                'class' => 'place-ad__field jsHint',
            ],
            'pluginOptions' => [
                'allowClear' => false,
                'class' => 'place-ad__field jsHint',
                'width' => '54%',

            ],
            'pluginEvents' => [
                "select2:opening" => "function() {
                    $('.select2-results__option').each(function(){
                                $(this).attr('aria-selected','false');
                            });
                 }",
            ]
        ])->label('Регион')->hint('12312');
        ?>


        <?= $form->field($model, 'name')->textInput(['class' => 'place-ad__field jsHint'])->label('Имя*')->hint('как к вам обращаться')?>

        <?= $form->field($model, 'phone')->textInput(['class' => 'place-ad__field jsHint'])->label('Телефон*')->hint('как с Вами связаться?')?>

        <?= $form->field($model, 'mail')->textInput(['class' => 'place-ad__field jsHint','readonly' => true])->label('Mail*')->hint('Вы можете указать публичный емейл в личном кабинете')?>

        <div class="place-ad__container">

            <p class="place-ad__subtitle"></p>
            <input type="checkbox" id="1_2">
            <label for="1_2">
                <span></span>
                * Я соглашаюсь с правилами использования сервиса,
                а также с передачей и обработкой моих данных.
                Я подтверждаю своё совершеннолетие и
                ответственность за размещение объявления
            </label>
        </div>

        <div class="place-ad__links">
            <?= Html::submitButton('опубликавать', ['class' => 'place-ad__publish', 'disabled' => 'disabled']) ?>
        </div>

        <?php ActiveForm::end(); ?>




       <!-- <div class="place-ad__container">
            <p class="place-ad__subtitle">фотографии*</p>
            <div class="place-ad__photo">
                <div class="place-ad__photo__container">
                    <div class="place-ad__photo__container__img">
                        <img src="img/new-shop1.png" alt="">
                    </div>
                    <div class="place-ad__photo__container__actions">
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-hand-down"></span></button>
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-trash"></span></button>
                    </div>
                </div>
                <div class="place-ad__photo__container">
                    <div class="place-ad__photo__container__img">
                        <img src="img/new-shop1.png" alt="">
                    </div>
                    <div class="place-ad__photo__container__actions">
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-hand-down"></span></button>
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-trash"></span></button>
                    </div>
                </div>
                <div class="place-ad__photo__container">
                    <div class="place-ad__photo__container__img">
                        <img src="img/new-shop1.png" alt="">
                    </div>
                    <div class="place-ad__photo__container__actions">
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-hand-down"></span></button>
                        <button type="button" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-trash"></span></button>
                    </div>
                </div>
            </div>
            <a class="place-ad__add-photo" href="#">загрузить фото</a>
                <span class="place-ad__counter">
                    <img src="img/cheked.png" alt="">
                    выбрано файлов:<span> 3</span></span>
            <a class="place-ad__counter" href="#">
                <img src="img/close.png" alt="">
                удалить</a>
            <p class="place-ad__notice">Объявления с фото получают больше откликов</p>
        </div>-->

        <div class="place-ad__container">

            <p class="place-ad__subtitle"></p>
            <input type="checkbox" id="1_1">
            <label for="1_1">
                <span></span>
                РАЗМЕСТИТЬ МОЕ ОБЪЯВЛЕНИЕ ДЛЯ ДОПОЛНИТЕЛЬНОЙ
                РЕКЛАВМЫ В ВК
            </label>

            <a class="place-ad__social" href="#">
                <img src="img/vk-i.png" alt="">
            </a>

        </div>
        <div class="place-ad__container">

            <p class="place-ad__subtitle"></p>
            <input type="checkbox" id="1_2">
            <label for="1_2">
                <span></span>
                * Я соглашаюсь с правилами использования сервиса,
                а также с передачей и обработкой моих данных.
                Я подтверждаю своё совершеннолетие и
                ответственность за размещение объявления
            </label>
        </div>

        <div class="place-ad__links">
            <a class="place-ad__publish" href="#">опубликавать</a>
            <a class="place-ad__view" href="#">Просмотреть</a>
        </div>
        <!--</div>-->
    </div>
</section>

<div class="modal fade" id="modalType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="/img/sticker.png" alt="sticker"/>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Выберите рубрику</h3>
            </div>
            <div class="modal-body modal-flex">

            </div>
            <div class="modal-footer--underline">
                <img src="/img/modal-under.png" alt=""/>
            </div>
        </div>
    </div>
</div>