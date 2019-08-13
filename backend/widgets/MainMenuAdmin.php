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
                        'label' => 'Новости',
                        'url' => Url::to(['/news/news']),
                        'template' => '<a href="{url}"><i class="fa fa-users"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'news',

                    ],
                    [
                        'label' => 'Управление статусами',
                        'url' => Url::to(['/status']),
                        'template' => '<a href="{url}"><i class="fa fa-anchor" aria-hidden="true"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'status',
                    ],
                    [
                        'label' => 'Доступ к API',
                        'url' => Url::to(['/access_api/api']),
                        'template' => '<a href="{url}"><i class="fa fa-american-sign-language-interpreting " aria-hidden="true"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'access-api',
                    ],
                    [
                        'label' => 'Промокоды',
                        'url' => Url::to(['/promokod/promokod']),
                        'template' => '<a href="{url}"><i class="fa fa-american-sign-language-interpreting " aria-hidden="true"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'promokod',
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
		                'label' => 'Помощь',
		                'items' => [
			                [
				                'label' => 'Категории',
				                'url' => Url::to(['/category_help']),
				                'active' => Yii::$app->controller->module->id == 'category_help',
			                ],
			                [
				                'label' => 'Статьи',
				                'url' => Url::to(['/help']),
				                'active' => Yii::$app->controller->module->id == '#' ,
			                ],
		                ],
		                'options' => [
			                'class' => 'treeview',
		                ],
		                'template' => '<a href="#"><i class="fa fa-ambulance"></i> <span>{label}</span> <i class="fa fa-angle-left pull-right"></i></a>',
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
                                'url' => Url::to(['/itemsmanager']),
                                'active' => Yii::$app->controller->module->id == 'itemsmanager'
                            ],
                        ],
                        'options' => [
                            'class' => 'treeview',
                        ],
                        'template' => '<a href="#"><i class="fa fa-dashboard"></i> <span>{label}</span> <i class="fa fa-angle-left pull-right"></i></a>',
                    ],
                    [
                        'label' => 'Организации',
                        'items' => [
                            [
                                'label' => 'Категории организаций',
                                'url' => Url::to(['/category_org/category_org']),
                                'active' => Yii::$app->controller->module->id == 'category_org'
                            ],
                            [
                                'label' => 'Организации',
                                'url' => Url::to(['/organization']),
                                'active' => Yii::$app->controller->module->id == 'organizations'
                            ],
                        ],
                        'options' => [
                            'class' => 'treeview',
                        ],
                        'template' => '<a href="#"><i class="fa fa-building"></i> <span>{label}</span> <i class="fa fa-angle-left pull-right"></i></a>',
                    ],
                    [
                        'label' => 'Магазины',
                        'url' => '#',
                        'template' => '<a href="#"><i class="fa fa-shopping-cart"></i> <span>{label}</span> </a>',
                    ],
                    [
                        'label' => 'Акции',
                        'url' => Url::to(['/stock/stock']),
                        'template' => '<a href="{url}"><i class="fa fa-bullhorn"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id === 'stock',

                    ],
                    [
                        'label' => 'VK',
                        'items' => [
                            [
                                'label' => 'Группы',
                                'url' => Url::to(['/vk/vk_groups']),
                                'active' => Yii::$app->controller->id == 'vk_groups'
                            ],
                            [
                                'label' => 'Категории товаров',
                                'url' => Url::to(['/vk/vk_product_cat']),
                                'active' => Yii::$app->controller->id == 'vk_product_cat'
                            ],
                            [
                                'label' => 'Товары',
                                'url' => Url::to(['/vk/vk_product']),
                                'active' => Yii::$app->controller->id == 'vk_product'
                            ],
                        ],
                        'options' => [
                            'class' => 'treeview',
                        ],
                        'template' => '<a href="#"><i class="fa fa-vk"></i> <span>{label}</span> <i class="fa fa-angle-left pull-right"></i></a>',
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