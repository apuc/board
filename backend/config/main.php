<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'setup' => [
            'class' => 'backend\modules\setup\Setup',
        ],
        'ads_fields_type' => [
            'class' => 'backend\modules\ads_fields_type\Ads_fields_type',
        ],
        'ads_fields' => [
            'class' => 'backend\modules\ads_fields\Ads_fields',
        ],
        'group_ads_fields' => [
            'class' => 'backend\modules\group_ads_fields\Group_ads_fields',
        ],
        'ads_fields_default_value' => [
            'class' => 'backend\modules\ads_fields_default_value\Ads_fields_default_value',
        ],
        'category' => [
            'class' => 'backend\modules\category\Category',
        ],
        'category_help' => [
	        'class' => 'backend\modules\category_help\CategoryHelp',
        ],
        'adsmanager' => [
            'class' => 'backend\modules\adsmanager\Adsmanager',
        ],
        'status' => [
            'class' => 'backend\modules\status\Status',
        ],
        'help' => [
            'class' => 'backend\modules\help\Help',
        ],
        'category_org' => [
            'class' => 'backend\modules\category_org\Category_org',
        ],
        'organizations' => [
            'class' => 'backend\modules\organization\Organization',
        ],
        'news' => [
            'class' => 'backend\modules\news\News',
        ],
        'access_api' => [
            'class' => 'backend\modules\access_api\AccessApi',
        ],
        'parser' => [
            'class' => 'backend\modules\parser\Parser',
        ],
        'promokod' => [
            'class' => 'backend\modules\promokod\Promokod',
        ],
        'vk' => [
            'class' => 'backend\modules\vk\VK',
        ],
        'stock' => [
            'class' => 'backend\modules\stock\Stock',
        ],
    ],
    'components' => [
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],*/
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'categories' => ['Объвления'],
                    'logVars'=>[],
                    'logFile'=>Yii::getAlias("@backend/runtime/logs/ads.log")
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request'      => [
            'baseUrl' => '/secure',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'setup' => 'setup/default',
                'fields_type' => 'ads_fields_type/ads_fields_type',
                'fields_type/create' => 'ads_fields_type/ads_fields_type/create',
                'fields_type/<id:\d+>' => 'ads_fields_type/ads_fields_type/view',
                'fields_type/update/<id:\d+>' => 'ads_fields_type/ads_fields_type/update',

                'group_fields' => 'group_ads_fields/group_ads_fields',
                'group_fields/create' => 'group_ads_fields/group_ads_fields/create',
                'group_fields/<id:\d+>' => 'group_ads_fields/group_ads_fields/view',
                'group_fields/update/<id:\d+>' => 'group_ads_fields/group_ads_fields/update',

                'fields' => 'ads_fields/ads_fields',
                'fields/create' => 'ads_fields/ads_fields/create',
                'fields/<id:\d+>' => 'ads_fields/ads_fields/view',
                'fields/update/<id:\d+>' => 'ads_fields/ads_fields/update',

                'fields_val_def' => 'ads_fields_default_value/ads_fields_default_value',
                'fields_val_def/create' => 'ads_fields_default_value/ads_fields_default_value/create',
                'fields_val_def/<id:\d+>' => 'ads_fields_default_value/ads_fields_default_value/view',
                'fields_val_def/update/<id:\d+>' => 'ads_fields_default_value/ads_fields_default_value/update',

                'category' => 'category/category',
                'category/create' => 'category/category/create',
                'category/<id:\d+>' => 'category/category/view',
                'category/update/<id:\d+>' => 'category/category/update',

                'category_help' => 'category_help/category_help',
                'category_help/create' => 'category_help/category_help/create',
                'category_help/<id:\d+>' => 'category_help/category_help/view',
                'category_help/update/<id:\d+>' => 'category_help/category_help/update',

                'adsmanager' => 'adsmanager/adsmanager',

                'status' => 'status/status',

                'help' => '/help/help',

                'organization' => '/organizations/organization'

            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],
    ],
    'params' => $params,
];
