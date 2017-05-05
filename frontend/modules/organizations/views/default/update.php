<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/js/organizations.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = "Редактирование организации";
?>

<section class="content">
    <div class="container">
        <div class="left">
            <ul class="left-menu">
                <li><a href="<?= \yii\helpers\Url::to(['/personal_area/org/org_user_active'])?>">Управление огранизациями </a></li>
                <li><a href="">Создание организации</a></li>
                <!--<li><a href="">Помощь</a></li>-->
            </ul>
        </div>
        <div class="right">
            <h1>Создать организацию</h1>
            <?php $form = ActiveForm::begin([
                'id' => 'add_org',
                'options' => ['class' => 'content-organizatsii'],
                'fieldConfig' => function ($model, $attribute) {
                    $tpl = '{label}{input}<div class="memo-error"><p>{error}</p></div><div class="memo"><span class="info-icon"></span><span class="triangle-left"></span>{hint}</div>';
                    $opt = ['class' => 'form-line'];
                    if ($attribute == 'header') {
                        $tpl = '{input}<label for="file-cover"></label><span>загрузить обложку</span>';
                        $opt = [];
                    }
                    if($attribute == 'logo'){
                        $tpl = '{input}<label for="file-logo"></label>';
                        $opt = [];
                    }
                    return [
                        'template' => $tpl,
                        'inputOptions' => ['class' => 'jsHint'],
                        'labelOptions' => ['class' => 'label-name'],
                        'errorOptions' => ['class' => 'error'],

                        'options' => $opt,
                        'hintOptions' => ['class' => '']

                    ];
                },
                'errorCssClass' => 'my-error'
            ]); ?>
            <?= $form->field($model, 'user_id')->hiddenInput(['class' => 'form-control', 'value' => Yii::$app->user->id])->label(false); ?>

            <h2>Общая информация</h2>

            <?= $form->field($model, 'title')->textInput(['class' => 'input-name jsHint', 'maxlength' => 70])->hint('<p>укажите название Вашей организации</p><p>В описании <b>не допускается указание контактных данных.</b></p><p>Не допускаются заглавные буквы (кроме аббревиатур).</p>')->label('Заголовок<span>*</span>'); ?>

            <p class="calc">
                <small>
                    <b id="title-count-res" class="counter-placeholder"><?= 70 - iconv_strlen($model->title); ?></b> знаков осталось
                </small>
            </p>

            <?= $form->field($model, 'category_id')->hiddenInput(['id' => 'category_input'])->label(false) ?>
            <div class="form-line">
                <label class="label-name">Категория<span>*</span></label>
                <span class="SelectCategory">
                    <div id="showOrgModal" class="place-ad__form">
                       <div id="showOrgModal" class="place-ad__form">
                            <div class="selected-sub-categ">
                                <div class="selected-sub-categ-thumb"><img src="<?= $categoryList[0];?>" /></div>

                                <div class="selected-sub-categ-title">
                                    <?php
                                    array_shift($categoryList);
                                    foreach($categoryList as $key=>$item):
                                        ?>
                                        <?= $item; ?> <?= ($key == count($categoryList)-1) ? '' : '/'?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <span class="place-ad__form__search">Изменить</span>
                       </div>
                    </div>
                </span>
            </div>


            <?= $form->field($model, 'descr')->textarea(['class' => 'area-name jsHint', 'maxlength' => 4096])->hint('<b>Добавьте описание Вашей организации,</b> укажите преимущества и важные детали.<br>В описании <b>не допускается указание контактных данных.</b><br>Описание должно соответствовать заголовку.<br>Не допускаются заглавные буквы (кроме аббревиатур).')->label('Описание<span>*</span>'); ?>

            <p class="calc">
                <small>
                    <b id="descr-count-res" class="counter-placeholder"><?= 4096 - iconv_strlen($model->descr); ?></b> знаков осталось
                </small>
            </p>

            <h2>Ваши контактные данные</h2>

            <?= $form->field($model, 'mail')->textInput(['class' => 'input-small jsHint'])->hint('Укажите E-mail организации')->label('E-mail<span>*</span>'); ?>
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

                <?php foreach ($phoneHomeBlock as $item):?>
                    <div class="form-line">
                        <label class="label-name">Телефон</label>
                        <input name="orgPhone[0][]" class="input-small" value="<?= $item->phone; ?>">
                        <span class="delete-line delPhone"></span>
                    </div>
                <?php endforeach; ?>

                <div class="wrap-line-info">
						<span>
								эти данные будут находитьс в главном  блоке <a href="">Вашей компании</a>
						</span>
                </div>

                <a href="#" data-index="0" class="dopolnitelno dopPhone"> <span class="circle-plus"></span>дополнительный
                    телефон</a>
            </div>

            <?php foreach ($infoAdressPhone as $item): ?>
                <?php// \common\classes\Debug::prn($item); ?>
                <span>
                <div class="wrap-line" style="margin-top: 10px">
                    <div class="form-line">
                        <?= Html::label('Город',null,['class'=>'label-name']) ?>
                        <?/*= Html::dropDownList('city['.$item->id.']',$item->city_id,$arraregCity,['id'=>$code]) */?>
                        <?= Select2::widget([
                            'name' => 'city['.$item->id.']',
                            'attribute' => 'state_2',
                            'data' => $arraregCity,
                            'value' => $item->city_id,
                            //'data' => ['Донецкая область' => ['1'=>'Don','2'=>'Gorl'], 'Rostovskaya' => ['5'=>'rostov']],
                            'options' => ['placeholder' => 'Начните вводить Ваш город ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>
                    </div>
                    <div class="form-line">
                        <?= Html::label('Адрес',null,['class'=>'label-name']) ?>
                        <?= Html::textInput('address['.$item->id.']',$item->address,['class'=>'input-small jsHint']) ?>
                    </div>
                        <?php foreach ($item['address_phone'] as $value):?>
                            <div class="form-line">
                                <?= Html::label('Телефон',null,['class'=>'label-name']) ?>
                                <?= Html::textInput('orgPhone['.$item->id.'][]',$value->phone,['class'=>'input-small jsHint']) ?>
                                <span class="delete-line delPhone"></span>
                            </div>
                        <?php endforeach ?>
                    <!--    --><?/*= $form->field($model, 'address')->textInput(['class' => 'input-small jsHint'])->hint('Адрес организации')->label('Адрес<span>*</span>'); */?>
                    <!--    --><?/*= $form->field($model, 'phone')->textInput(['class' => 'input-small jsHint'])->hint('Ваш телефон')->label('Телефон<span>*</span>'); */?>
                    <a href="" class="delete-block delAddress"> <span class="delete-line"></span>удалить блок</a>
                    <a href="#" data-index="<?= $code ?>" class="dopolnitelno dopPhone"> <span class="circle-plus"></span>дополнительный телефон</a>
                </div>
                </span>
            <?php endforeach; ?>

            <a href="#" class="dopolnitelno dopAddress"> <span class="circle-plus"></span>дополнительный адрес</a>
            <?= $form->field($model, 'site')->textInput(['class' => 'input-small jsHint'])->hint('<p>Укажите сайт вашей компании</p><p>Ссылка должна начинаться с <b>http://</b> или <b>https://</b></p>')->label('Сайт'); ?>

            <?= $form->field($model, 'schedule')->textInput(['class' => 'input-small jsHint'])->hint('<p>Укажите режим работы Вашей организации</p><p><b>Например: ПН-ПТ, 8:00-17:00</b></p>>')->label('Режим работы'); ?>

            <h2>Укажите ссылки в социальных сетях на вашу компанию</h2>
            <?= $form->field($model, 'link_vk')->textInput(['class' => 'input-name jsHint'])->hint('Ссылка VKontakte. Укажите ссылку начиная с <b>http://</b> или <b>https://</b>')->label('Ссылка VKontakte'); ?>
            <?= $form->field($model, 'link_google')->textInput(['class' => 'input-name jsHint'])->hint('Ссылка Google+. Укажите ссылку начиная с <b>http://</b> или <b>https://</b>')->label('Ссылка Google+'); ?>
            <?= $form->field($model, 'link_fb')->textInput(['class' => 'input-name jsHint'])->hint('Ссылка Facebook. Укажите ссылку начиная с <b>http://</b> или <b>https://</b>')->label('Ссылка Facebook'); ?>
            <?= $form->field($model, 'link_tw')->textInput(['class' => 'input-name jsHint'])->hint('Ссылка Twitter. Укажите ссылку начиная с <b>http://</b> или <b>https://</b>')->label('Ссылка Twitter'); ?>

            <h2>Настройте дизайн компании</h2>
            <div class="form-line form-line-cover">
                <label class="label-name">Обложка компании<span>*</span></label>
                <div id="" class="cover-block">
                    <?php if(empty($model->header)):    ?>
                        <img id="org-cover" src="/img/cover.png" alt="">
                    <?php else: ?>
                        <img id="org-cover" src="/<?= $model->header; ?>" alt="">
                    <?php endif;?>
                    <div id="org-logo" class="cover-logo" <?= (!empty($model->logo) ? "style='background-image: url(/$model->logo)'" : '')?>>
                        <!--<input type="file" name="file-logo" id="file-logo" class="upload-logo"/>-->
                        <?= $form->field($model, 'logo')->fileInput(['id'=>'file-logo', 'class'=>'upload-logo']) ?>
                        <div class="cover-logo-info">
                            <label for="">Логотип компании*</label>
                            <span>Добавьте Логотип для лучшей узнаваемости Вашего бренда</span>
                        </div>
                    </div>
                    <div class="cover-style">
                        <!--<input type="file" name="file-cover" id="file-cover" class="upload-cover"/>-->
                        <?= $form->field($model, 'header')->fileInput(['id' => 'file-cover', 'class' => 'upload-cover']) ?>
                    </div>

                </div>
            </div>
            <?= Html::hiddenInput('org-logo', $model->logo); ?>
            <?= Html::hiddenInput('org-header', $model->header); ?>
            <button type="submit" class=" publish" name="button">Сохранить организацию</button>
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
                <h4 class="modal-title" id="myModalLabel">Выберите рубрику</h4>
            </div>
            <div class="modal-body">
                <?php foreach ($category_org as $c): ?>
                    <div class="category-org-item" data-id="<?= $c->id ?>">
                        <div class="category-org-icon">
                            <img src="<?= $c->icon ?>" alt="">
                        </div>
                        <span class="category-org-name"><?= $c->name ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

