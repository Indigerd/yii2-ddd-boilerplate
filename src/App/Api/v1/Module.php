<?php declare(strict_types=1);

namespace App\Api\v1;

class Module extends \App\Api\Module
{
    public $controllerNamespace = 'App\Api\v1\Controllers';

    public function init()
    {
        parent::init();
    }
}
