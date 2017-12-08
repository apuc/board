<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name'=>'RUB ON',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'ipgeobase' => [
            'class' => 'himiklab\ipgeobase\IpGeoBase',
            'useLocalDB' => true,
        ],
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
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'user' => [
            'class' => 'dektrium\user\Module',
            'controllerMap' => [
                'registration' => [
                    'class' => \frontend\controllers\user\RegUserController::className(),
                    'on ' . \frontend\controllers\user\RegUserController::EVENT_AFTER_REGISTER => function ($e) {
                        $user = \dektrium\user\models\User::findOne(['username' => $e->form->username]);
                        $userScore = new \frontend\modules\personal_area\models\UserScore();
                        $userScore->user_id = $user->id;
                        $userScore->name = "Бонус за регистрацию";
                        $userScore->sum = 25;
                        $userScore->deb_kred = 1;
                        $userScore->save();
                        \frontend\models\user\UserDec::updateAll(['score' => $userScore->sum], ['id' => $user->id]);
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
            'enableUnconfirmedLogin' => true,
            'enableGeneratingPassword' => false,
            'enableConfirmation' => true,
            'enableFlashMessages' => false,
            'confirmWithin' => 86400,
            'cost' => 12,
            'admins' => ['admin'],
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
