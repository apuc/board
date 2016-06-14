<?php
namespace backend\widgets;
use common\classes\Debug;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class MainMenuAdmin extends Widget
{
    public function run(){

        //Debug::prn(Yii::$app->controller->route );
        //Debug::prn(Yii::$app->controller->module->id );
        echo \yii\widgets\Menu::widget(
            [
                'items' => [
                    [
                        'label' => 'Пользователи',
                        'url' => Url::to(['/user/admin']),
                        'template' => '<a href="{url}"><i class="fa fa-users"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'user' || Yii::$app->controller->module->id == 'rbac',

                    ],
                    [
                        'label' => 'Управление статусами',
                        'url' => Url::to(['/status']),
                        'template' => '<a href="{url}"><i class="fa fa-anchor" aria-hidden="true"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'status',
                    ],
                    [
                        'label' => 'Управление полями',
                        'items' => [
                            [
                                'label' => 'Группы полей',
                                'url' => Url::to(['/group_fields']),
                                'active' => Yii::$app->controller->module->id == 'group_ads_fields',
                            ],
                            [
                                'label' => 'Типы полей',
                                'url' => Url::to(['/fields_type']),
                                'active' => Yii::$app->controller->module->id == 'ads_fields_type' ,
                            ],
                            [
                                'label' => 'Поля',
                                'url' => Url::to(['/fields']),
                                'active' => Yii::$app->controller->module->id == 'ads_fields' ,
                            ],
                            [
                                'label' => 'Значения по умолчанию',
                                'url' => ['/ads_fields_default_value/ads_fields_default_value'],
                                'active' => Yii::$app->controller->module->id == 'ads_fields_default_value'
                            ],
                        ],
                        'options' => [
                            'class' => 'treeview',
                        ],
                        'template' => '<a href="#"><i class="fa fa-leanpub"></i> <span>{label}</span> <i class="fa fa-angle-left pull-right"></i></a>',
                    ],
                    [
                        'label' => 'Объявления',
                        'items' => [
                            [
                                'label' => 'Категории объявлений',
                                'url' => Url::to(['/category']),
                                'active' => Yii::$app->controller->module->id == 'category'
                            ],
                            [
                                'label' => 'Объявления',
                                'url' => Url::to(['/adsmanager']),
                                'active' => Yii::$app->controller->module->id == 'adsmanager'
                            ],
                        ],
                        'options' => [
                            'class' => 'treeview',
                        ],
                        'template' => '<a href="#"><i class="fa fa-dashboard"></i> <span>{label}</span> <i class="fa fa-angle-left pull-right"></i></a>',
                    ],
                    [
                        'label' => 'Магазины',
                        'url' => '#',
                        'template' => '<a href="#"><i class="fa fa-shopping-cart"></i> <span>{label}</span> </a>',
                    ],
                ],
                'activateItems' => true,
                'activateParents' => true,
                'activeCssClass'=>'active',
                'encodeLabels' => false,
                /*'dropDownCaret' => false,*/
                'submenuTemplate' => "\n<ul class='treeview-menu' role='menu'>\n{items}\n</ul>\n",
                'options' => [
                    'class' => 'sidebar-menu',
                ]
            ]
        );
    }
}