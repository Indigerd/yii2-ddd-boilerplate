<?php declare(strict_types=1);

error_reporting(E_ALL);
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
// Composer
require(__DIR__ . '/../../../../vendor/autoload.php');

// Environment
require(__DIR__ . '/../config/env.php');

// Yii
require(__DIR__ . '/../../../../vendor/yiisoft/yii2/Yii.php');

// Bootstrap application
require(__DIR__ . '/../config/bootstrap.php');

$config = require(__DIR__ . '/../config/base.php');

(new yii\web\Application($config))->run();
