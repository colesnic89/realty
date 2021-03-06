<?php
$params = require __DIR__ . '/params.php';
$components = require __DIR__ . '/components.php';

$config = [
    'id'           => 'basic',
    'basePath'     => dirname(__DIR__),
    'bootstrap'    => ['log'],
    'aliases'      => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components'   => $components,
    'params'       => $params,
    'defaultRoute' => 'homepage/homepage/index',
    'modules'      => [
        'user'     => [
            'class'        => 'app\modules\User\User',
            'defaultRoute' => 'user/index',
        ],
        'homepage' => [
            'class'        => 'app\modules\HomePage\HomePage',
            'defaultRoute' => 'homepage/index',
        ],
        'admin'    => [
            'class'        => 'app\modules\Admin\Admin',
            'defaultRoute' => 'dashboard',
        ],
        'account' => [
            'class' => 'app\modules\Account\Account',
            'defaultRoute' => 'dashboard',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
