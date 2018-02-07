<?php
$db = require __DIR__ . '/db.php';
$urlRules = require __DIR__ . '/url_rules.php';

return [
    'request'      => [
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => 'jqedrQvgypN219y1fY0P1qdH9tbyVS94',
    ],
    'cache'        => [
        'class' => 'yii\caching\FileCache',
    ],
    'assetManager' => [
        //'forceCopy' => true
    ],
    'user'         => [
        'identityClass'   => 'app\models\User\UserIdentity',
        'enableAutoLogin' => true,
    ],
    'errorHandler' => [
        'errorAction' => 'error/error',
    ],
    'mailer'       => [
        'class'            => 'yii\swiftmailer\Mailer',
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        'useFileTransport' => true,
    ],
    'log'          => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets'    => [
            [
                'class'  => 'yii\log\FileTarget',
                'levels' => ['error', 'warning'],
            ],
        ],
    ],
    'db'           => $db,
    'urlManager'   => [
        'class'           => 'codemix\localeurls\UrlManager',
        'enablePrettyUrl' => true,
        'showScriptName'  => false,
        'rules'           => $urlRules,
        'languages'       => \yii\helpers\ArrayHelper::getColumn($params['languages'], 'slug'),
    ],
    'view'         => [
        'class' => 'app\components\View\WebView',
    ],
    'i18n'         => [
        'translations' => [
            'app*' => [
                'class'          => 'yii\i18n\PhpMessageSource',
                'basePath'       => '@app/messages',
                'sourceLanguage' => 'en-US',
                'fileMap'        => [
                    'user' => 'user.php'
                ],
            ],
        ],
    ],
];
