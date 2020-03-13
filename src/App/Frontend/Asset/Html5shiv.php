<?php declare(strict_types=1);

namespace App\Frontend\Asset;

use yii\web\AssetBundle;

class Html5shiv extends AssetBundle
{
    public $sourcePath = '@bower/html5shiv';
    public $js = [
        'dist/html5shiv.min.js'
    ];

    public $jsOptions = [
        'condition' => 'lt IE 9'
    ];
}
