<?php
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
        'cache' => [
            'class' => 'yii\caching\MemCache',
            'useMemcached' => true,
            'servers' => [
                [
                    'host' => getenv('MEMCACHE_HOST'),
                    'port' => getenv('MEMCACHE_PORT'),
                    'weight' => 100,
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => getenv('DB_DSN'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'tablePrefix' => getenv('DB_TABLE_PREFIX'),
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
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
