<?php declare(strict_types=1);

namespace App\Frontend\Controllers;

use App\Frontend\Service\ArticleCommentService;
use indigerd\scenarios\exception\RequestValidateException;
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

    protected $commentService;

    public function __construct(
        string $id,
        Module $module,
        Request $request,
        Response $response,
        ArticleService $service,
        ArticleCommentService $commentService,
        array $config = []
    ) {
        $this->request = $request;
        $this->response = $response;
        $this->service = $service;
        $this->commentService = $commentService;
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
            $comments = $this->commentService->findArticleCommentsByArticleId($id);
            return $this->render('view', ['article' => $article, 'comments' => $comments, 'commentErrors' => []]);
        } catch (ArticleNotFoundException $e) {
            throw new NotFoundHttpException();
        }
    }

    public function actionCreateComment($articleId)
    {
        $article = $this->service->findArticleById($articleId);
        try {
            $commentErrors = [];
            $this->commentService->create($this->request);
        } catch (RequestValidateException $e) {
            $commentErrors = $e->getErrorCollection();
        }
        $comments = $this->commentService->findArticleCommentsByArticleId($articleId);
        return $this->render('view', ['article' => $article, 'comments' => $comments, 'commentErrors' => $commentErrors]);
    }
}
