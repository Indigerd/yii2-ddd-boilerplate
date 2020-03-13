<?php declare(strict_types=1);

$config = [
    'id' => 'frontend',
    'name' => 'Yii2 DDD Boilerplate',
    'vendorPath' => __DIR__ . '/../../../../vendor',
    'extensions' => require(__DIR__ . '/../../../../vendor/yiisoft/extensions.php'),
    'sourceLanguage' => 'en-US',
    'language' => 'en-US',
    'controllerNamespace' => 'App\Frontend\Controllers',
    'defaultRoute' => 'site/index',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'basePath' => dirname(__DIR__),
    'components' => [
        'urlManager' => require(__DIR__ . '/_urlManager.php'),
        'assetManager' => [
            'class' => yii\web\AssetManager::class,
            'linkAssets' => getenv('LINK_ASSETS'),
            'appendTimestamp' => YII_ENV_DEV
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => getenv('DB_DSN'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'tablePrefix' => getenv('DB_TABLE_PREFIX'),
            'charset' => 'utf8',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
    ],
];

if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => yii\debug\Module::class,
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.33.1', '172.17.42.1', '172.17.0.1', '192.168.99.1'],
    ];
}

return $config;
