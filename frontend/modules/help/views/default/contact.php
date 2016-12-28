<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 30.11.2016
 * Time: 13:54
 * @var $category array
 */
use frontend\modules\help\widgets\HelpBread;
use frontend\modules\help\widgets\HelpLeftMenu;
use frontend\modules\help\widgets\HelpRightBlock;
use frontend\modules\help\widgets\SearchForm;
use yii\helpers\Url;

$this->registerCssFile('/css/help.css');

$this->title = "Центр поддержки пользователей";

?>
<section class="yellow-line">
</section>
<section class="support-search">
    <div class="container">
        <div class="support_block">
            <h2 class="support_block-title">Служба поддержки</h2>
        </div>
        <?= SearchForm::widget() ?>
    </div>
</section>
<section class="help-page__content">
    <div class="container">
        <?= HelpLeftMenu::widget(['category_id' => 0]) ?>
        <div class="help-page__content_all">
            <!-- open .breadcrubs -->
            <article class="breadcrumbs">
                <!-- open .container -->

                <?= HelpBread::widget() ?>

                <!-- close .container -->
            </article>
            <!-- close .breadcrubs -->
            <div class="help-page__content_all-help-answer">
                <h2 class="help-answer_title">Центр поддержки пользователей</h2>
                <div class="faq" style="text-align: left;padding-left: 30px">
                    <h4>Будем рады ответить на ваши вопросы!</h4>
                    <form action="<?= Url::to(['/help/default/contact']) ?>" id="help_form" class="help-article-form" method="post" enctype="multipart/form-data">
                        <p>Для оперативной помощи, пожалуйста, выберите тему обращения и опишите суть запроса
                            максимально детально:
                            укажите номер объявления, опишите ситуацию пошагово, добавьте при необходимости
                            скриншоты</p>
                        <div class="row-form">
                            <label class="label-form" for="">Выберите тему запроса</label>
                            <?= \yii\helpers\Html::dropDownList('category', null, $category, ['prompt'=>'Выбрать', 'class'=>'valItem', 'required'=>'required']) ?>
                        </div>
                        <div class="row-form">
                            <label for="descr">Описание</label>
                            <textarea id="descr" name="descr" class="valItem" required></textarea>
                        </div>
                        <div class="row-form">
                            <label for="object_id">Номер (ID) объявления</label>
                            <input id="object_id" name="object_id" class="input-id" type="text">
                        </div>
                        <div class="row-form">
                            <label for="name">Ваше имя</label>
                            <input id="name" name="name" type="text">
                        </div>
                        <div class="row-form">
                            <label for="email">Адрес эл. почты</label>
                            <input id="email" name="email" class="valItem" type="text" required>
                        </div>
                        <div class="row-form">
                            <label class="label-name">Прикрепить файлы:</label>
                            <label class="file_upload">
                                <span class="button"></span>
                                <input name="file" class="input-file" type="file">
                            </label>
                        </div>
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                        <button id="submit_help" type="submit" class="contact-us">Отправить</button>
                    </form>
                </div>
                <?= HelpRightBlock::widget() ?>
            </div>
        </div>
    </div>
</section>


