<?php
/**
 * @var $title
 * @var $description
 * @var $img
 */

//Заголовок страницы
$this->title = $title;
//Описание страницы
$this->registerMetaTag([
    'name' => 'description',
    'content' => $description,
]);

//Заголовок в социальніх сетях
$this->registerMetaTag([
    'name' => 'og:title',
    'content' => $title,
]);

//Изображение для социальных сетей
$this->registerMetaTag([
    'name' => 'og:image',
    'content' => $img,
]);


$this->registerMetaTag([
    'name' => 'og:type',
    'content' => "article",
]);

$this->registerMetaTag([
    'name' => 'og:url',
    'content' => 'rub-on.ru',
]);

//Dublin Core метатеги
$this->registerMetaTag([
    'name' => 'DC.title',
    'content' => $title,
]);
$this->registerMetaTag([
    'name' => 'DC.creator',
    'content' => 'Art Craft',
]);
$this->registerMetaTag([
    'name' => 'DC.creator.name',
    'content' => 'Art Craft',
]);
$this->registerMetaTag([
    'name' => 'DC.subject',
    'content' => $title,
]);

$this->registerMetaTag([
    'name' => 'DC.description',
    'content' => $description,
]);
$this->registerMetaTag([
    'name' => 'DC.language',
    'content' => 'ru-RU',
]);
