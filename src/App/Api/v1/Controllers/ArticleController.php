<?php declare(strict_types=1);

namespace App\Api\v1\Controllers;

use App\Api\v1\Serializer\ApiSerializer;
use App\Api\v1\Service\ArticleService;
use Domain\Entity\Article;
use Domain\Repository\Exception\ArticleNotFoundException;
use Infrastructure\Http\Request;
use Infrastructure\Http\Response;
use yii\base\Module;
use yii\web\NotFoundHttpException;

class ArticleController extends Controller
{
    /**
     * @var string
     */
    public $modelClass = Article::class;

    /**
     * @var string
     */
    public $serializer = ApiSerializer::class;

    /**
     * @var ArticleService
     */
    protected $service;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    public function __construct(
        string $id,
        Module $module,
        Request $request,
        Response $response,
        ArticleService $service,
        array $config = []
    ) {
        $this->service = $service;
        parent::__construct($id, $module, $request, $response, $config);
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access']['except'][] = 'index';
        $behaviors['access']['except'][] = 'view';
        return $behaviors;
    }

    /**
     * @param string $id
     * @return Article
     * @throws NotFoundHttpException
     */
    public function actionView(string $id)
    {
        try {
            return $this->service->findArticleById($id);
        } catch (ArticleNotFoundException $e) {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @param string $lang
     * @return \Infrastructure\DataProvider\DataProvider
     */
    public function actionIndex()
    {
        return $this->service->findAll($this->request);
    }
}
