<?php

return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => 'api/v1/article',
            'tokens' => [
                '{id}' => '<id:\\w+>',
            ],
            'patterns' => [
                'GET,HEAD {id}' => 'view',
                'GET,HEAD' => 'index',
            ],
        ],
    ]
];
