<?php declare(strict_types=1);

namespace App\Frontend\Controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
