<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 24.12.2016
 * Time: 12:24
 * @var $model \common\models\db\Organizations
 * @var $geoInfo \common\classes\Address
 * @var $arraregCity array
 */

use kartik\select2\Select2;
use yii\widgets\ActiveForm;

$this->registerJsFile('/js/organizations.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = "Добавление организации";
?>

<section class="content">
    <div class="container">
        <div class="left">
            <ul class="left-menu">
                <li><a href="">Управление огранизациями </a></li>
                <li><a href="">Создание организации</a></li>
                <li><a href="">Помощь</a></li>
            </ul>
        </div>
        <div class="right">
            <h1>Создать организацию</h1>
            <?php $form = ActiveForm::begin([
                'id' => 'add_org',
                'options' => ['class' => 'content-organizatsii'],
                'fieldConfig' => [
                    'template' => '{label}{input}<div class="memo-error"><p>{error}</p></div><div class="memo"><span class="info-icon"></span><span class="triangle-left"></span>{hint}</div>',
                    'inputOptions' => ['class' => 'jsHint'],
                    'labelOptions' => ['class' => 'label-name'],
                    'errorOptions' => ['class' => 'error'],

                    'options' => ['class' => 'form-line'],
                    'hintOptions' => ['class' => '']

                ], 'errorCssClass' => 'my-error'
            ]); ?>
            <?= $form->field($model, 'user_id')->hiddenInput(['class' => 'form-control', 'value' => Yii::$app->user->id])->label(false); ?>

            <h2>Общая информация</h2>

            <?= $form->field($model, 'title')->textInput(['class' => 'input-name jsHint', 'maxlength' => 70])->hint('<p><b>Добавьте описание вашего товара/услуги,</b> укажите преимущества и важные детали.</p><p>В описании <b>не допускается указание контактных данных.</b></p><p>Описание должно соответствовать заголовку и предлагаемому товару/услуге.</p><p>Не допускаются заглавные буквы (кроме аббревиатур).</p>')->label('Заголовок<span>*</span>'); ?>

            <p class="calc">
                <small>
                    <b id="title-count-res" class="counter-placeholder">70</b> знаков осталось
                </small>
            </p>


            <div class="form-line">
                <label class="label-name">Категория<span>*</span></label>
                <span class="SelectCategory">
                            <!-- <div class="check-category">
                                <div class="check-thumb">
                                    <img src="/img/soska.png" alt="">
                                </div>
                                <div class="check-title myBtn1">
                                    Детский мир - Детская одежда - Одежда для мальчиков
                                </div>
                            </div> -->
                    <div id="showOrgModal" class="place-ad__form">
                        Выбирите рубрику
                        <span class="place-ad__form__search"></span>
                    </div>
                </span>
            </div>

            <?= $form->field($model, 'descr')->textarea(['class' => 'area-name jsHint', 'maxlength' => 4096])->hint('<b>Добавьте описание вашего товара/услуги,</b> укажите преимущества и важные детали.<br>В описании <b>не допускается указание контактных данных.</b><br>Описание должно соответствовать заголовку и предлагаемому товару/услуге.<br>Не допускаются заглавные буквы (кроме аббревиатур).<br><b>Добавьте описание вашего товара/услуги,</b> укажите преимущества и важные детали.<br>В описании <b>не допускается указание контактных данных.</b>Описание должно соответствовать заголовку и предлагаемому товару/услуге.<br>Не допускаются заглавные буквы (кроме аббревиатур).')->label('Описание<span>*</span>'); ?>

            <p class="calc">
                <small>
                    <b id="descr-count-res" class="counter-placeholder">4096</b> знаков осталось
                </small>
            </p>

            <h2>Ваши контактные данные</h2>

            <?= $form->field($model, 'mail')->textInput(['class' => 'input-small jsHint'])->hint('Ваш E-mail')->label('E-mail<span>*</span>'); ?>
            <div class="memo-error">
                <p>E-mail адресс не похож на настоящий</p>
            </div>

            <div class="wrap-line">
                <div class="form-line">
                    <label class="label-name">Город<span>*</span></label>
                    <?= Select2::widget([
                        'name' => 'Organizations[city_id]',
                        'attribute' => 'state_2',
                        'data' => $arraregCity,
                        'value' => $geoInfo['city_id'],
                        //'data' => ['Донецкая область' => ['1'=>'Don','2'=>'Gorl'], 'Rostovskaya' => ['5'=>'rostov']],
                        'options' => ['placeholder' => 'Начните вводить Ваш город ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <?= $form->field($model, 'address')->textInput(['class' => 'input-small jsHint'])->hint('Адрес организации')->label('Адрес<span>*</span>'); ?>
                <?= $form->field($model, 'phone')->textInput(['class' => 'input-small jsHint'])->hint('Ваш телефон')->label('Телефон<span>*</span>'); ?>
                <div class="wrap-line-info">
						<span>
								эти данные будут находитьс в главном  блоке <a href="">Вашей компании</a>
						</span>
                </div>
                <a href="#" data-index="0" class="dopolnitelno dopPhone"> <span class="circle-plus"></span>дополнительный телефон</a>
            </div>
            <a href="#" class="dopolnitelno dopAddress"> <span class="circle-plus"></span>дополнительный адрес</a>
            <?= $form->field($model, 'site')->textInput(['class' => 'input-small'])->hint('Ваш сайт')->label('Сайт'); ?>

            <?= $form->field($model, 'schedule')->textInput(['class' => 'input-small'])->hint('Режим работы')->label('Режим работы'); ?>
            <div class="form-line">
                <label class="label-name">Соц<span>*</span></label>
                <a href="" class="soc-icon">
                    <img src="/img/vk-soc-37.png" alt="">
                </a>
            </div>
            <h2>Настройте дизайн компании</h2>
            <div class="form-line form-line-cover">
                <label class="label-name">Обложка компании<span>*</span></label>
                <div class="cover-block">
                    <img src="/img/cover.png" alt="">
                    <div class="cover-logo">
                        <input type="file" name="file-logo" id="file-logo" class="upload-logo"/>
                        <label for="file-logo"></label>
                        <div class="cover-logo-info">
                            <label for="">Логотип компании*</label>
                            <span>Добавьте Логотип для лучшей узнаваемости Вашего бренда</span>
                        </div>
                    </div>
                    <div class="cover-style">
                        <input type="file" name="file-cover" id="file-cover" class="upload-cover"/>
                        <label for="file-cover"></label>
                        <span>загрузить обложку</span>
                    </div>

                </div>
            </div>
            <button type="submit" class=" publish" name="button">Создать организацию</button>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="categoryOrgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Название модали</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>

