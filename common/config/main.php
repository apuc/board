<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name'=>'RUB ON',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'memCache' => [
            'class' => 'yii\caching\MemCache',
            'useMemcached' => true,
            'servers' => [
                ['host' => '127.0.0.1', 'port' => 11211, 'weight' => 100]
            ]
        ],
        'ipgeobase' => [
            'class' => 'himiklab\ipgeobase\IpGeoBase',
            'useLocalDB' => true,
        ],
		'queue' => [
			'class' => \yii\queue\file\Queue::className(),
			'path' => '@console/runtime/queue',
			'as log' => \yii\queue\LogBehavior::className()
		],
		'consoleRunner' => [
			'class' => \vova07\console\ConsoleRunner::className(),
			'file' => '/usr/bin/ffmpeg'
		]
    ],
	'bootstrap' => [
		'queue',
	],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@', '?'],
            'disabledCommands' => ['netmount'],
            'roots' => [
                [
                    'baseUrl' => '',
                    'basePath' => '@frontend/web',
                    'path' => 'media/upload',
                    'name' => 'Изображения',
                ],
            ],
            'watermark' => [
                'source' => __DIR__ . '/logo.png', // Path to Water mark image
                'marginRight' => 5, // Margin right pixel
                'marginBottom' => 5, // Margin bottom pixel
                'quality' => 95, // JPEG image save quality
                'transparency' => 70, // Water mark image transparency ( other than PNG )
                'targetType' => IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP, // Target image formats ( bit-field )
                'targetMinPixel' => 200 // Target image minimum pixel size
            ],
        ]
    ],

    'modules' => [
    	'debug'=> [
    		'class' => \yii\debug\Module::className(),
			'panels' => [
				'queue' => \yii\queue\debug\Panel::className(),
			],
		],
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'user' => [
            'class' => 'dektrium\user\Module',
            'controllerMap' => [
                'registration' => [
                    'class' => \frontend\controllers\user\RegUserController::className(),
                    'on ' . \frontend\controllers\user\RegUserController::EVENT_AFTER_REGISTER => function ($e) {
                        $user = \dektrium\user\models\User::findOne(['username' => $e->form->username]);
                        \common\classes\UserFunction::setUserRub($user->id);
                    },
                    'on ' . \frontend\controllers\user\RegUserController::EVENT_AFTER_CONNECT => function ($e) {
                        \common\classes\UserFunction::setUserRub(Yii::$app->user->id);
                    }
                ],
                'security' => [
                    'class' => \dektrium\user\controllers\SecurityController::className(),
                    'on ' . \dektrium\user\controllers\SecurityController::EVENT_AFTER_AUTHENTICATE => function ($e) {
                        \common\classes\UserFunction::setUserRub(Yii::$app->user->id);
                    }
                ],
                'recovery' => '\frontend\controllers\user\RecoveryController',
                'settings' => '\frontend\controllers\user\SettingController',
            ],
            'modelMap' => [
                'RegistrationForm' => '\frontend\models\user\RegUserForm',
                'RecoveryForm' => '\frontend\models\user\RecoveryForm',
                'ResendForm' => '\frontend\models\user\ResendForm',
                'User' => '\frontend\models\user\UserDec',
                'Profile' => '\frontend\models\user\Profile',
            ],
//            'enableUnconfirmedLogin' => true,
            'enableGeneratingPassword' => false,
            'enableConfirmation' => true,
            'enableFlashMessages' => false,
            'confirmWithin' => 86400,
            'cost' => 12,
            'admins' => ['admin', 'kavalar'],
            'mailer' => [
                'sender' => ['noreply@rub-on.ru' => 'RubOn'], // or ['no-reply@myhost.com' => 'Sender name']
                'welcomeSubject' => 'Добро пожаловать',
                'confirmationSubject' => 'Confirmation subject',
                'reconfirmationSubject' => 'Email change subject',
                'recoverySubject' => 'Восстановление',
            ],
        ],
    ],
];
