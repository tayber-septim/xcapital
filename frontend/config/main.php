<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'bootstrap' => ['log'],

    'components' => [

        // 'paypal'=> [
        //     'class'  => 'common\components\Paypal',
        //     'clientId'  => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AYGfzJ.8ExHV3jI4pSp6l3oPSo4q',
        //     'clientSecret' => 'VCBPLHEW9XCWY7DM',
        //     'isProduction' => false,

        //      // This is config file for the PayPal system
        //     //  'config' => [
        //     //      'http.ConnectionTimeOut' => 30,
        //     //      'http.Retry' => 1,
        //     //      'mode' => "\common\components\Paypal::MODE_SANDBOX", 
        //     //      'log.LogEnabled' => YII_DEBUG ? 1 : 0,
        //     //      'log.FileName' => "@runtime/logs/paypal.log",
        //     //      'log.LogLevel' => "\common\components\Paypal::LOG_LEVEL_INFO",
        //     // ]
        // ],

        'paypal' => [
            'class' => common\components\Paypal::class,
            'user' => 'info-facilitator_api1.creditblaustein.com',
            'signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AYGfzJ.8ExHV3jI4pSp6l3oPSo4q',
            'pwd' => 'VCBPLHEW9XCWY7DM'
        ],

          'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
         'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index'
            ],
        // ...
        ],
        
    ],
];