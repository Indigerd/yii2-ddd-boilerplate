<?php declare(strict_types=1);

return [
    'id' => 'api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'Bookimed\App\Api\Controllers',
    'components' => [
        'urlManager' => require(__DIR__ . '/_urlManager.php'),
        'request' => [
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => getenv('DB_DSN'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'tablePrefix' => getenv('DB_TABLE_PREFIX'),
            'charset' => 'utf8',
        ],
    ],
    'modules' => [
        'api' => [
            'class' => '\App\Api\Module',
            'modules' => [
                'v1' => [
                    'class' => '\App\Api\v1\Module',
                ]
            ]
        ],
    ],
];
