<?php declare(strict_types=1);

namespace App\Frontend\Controllers;

use yii\base\Module;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Domain\Repository\Exception\ArticleNotFoundException;
use Infrastructure\Http\Request;
use Infrastructure\Http\Response;
use App\Frontend\Service\ArticleService;

class ArticleController extends Controller
{
    protected $request;

    protected $response;

    protected $service;

    public function __construct(
        string $id,
        Module $module,
        Request $request,
        Response $response,
        ArticleService $service,
        array $config = []
    ) {
        $this->request = $request;
        $this->response = $response;
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $dataProvider = $this->service->findAll($this->request);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        try {
            $article = $this->service->findArticleById($id);
            $this->render('view', ['article' => $article]);
            return $this->service->findArticleById($id);
        } catch (ArticleNotFoundException $e) {
            throw new NotFoundHttpException();
        }
    }
}
