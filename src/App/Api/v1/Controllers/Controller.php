<?php declare(strict_types=1);

namespace App\Api\v1\Controllers;

use Infrastructure\Http\Request;
use Infrastructure\Http\Response;
use indigerd\rest\Controller as BaseController;
use yii\base\Module;

class Controller extends BaseController
{
    protected $request;

    protected $response;

    public function __construct(
        string $id,
        Module $module,
        Request $request,
        Response $response,
        array $config = []
    ) {
        $this->request = $request;
        $this->response = $response;
        parent::__construct($id, $module, $config);
    }

    public function actions()
    {
        $actions = parent::actions();
        return [
            'options' => $actions['options'],
        ];
    }
}
