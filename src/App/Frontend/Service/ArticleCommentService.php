<?php declare(strict_types=1);

namespace App\Frontend\Service;

use App\Frontend\Scenario\ArticleCommentCreateScenario;
use Domain\Collection\ArticleCommentCollection;
use Domain\Entity\ArticleComment;
use Domain\Repository\ArticleCommentRepositoryInterface;
use Infrastructure\Http\Request;
use App\Frontend\Http\ArticleCommentRequestFilter;

class ArticleCommentService
{
    protected $repository;

    protected $scenario;

    protected $requestFilter;

    public function __construct(
        ArticleCommentRepositoryInterface $repository,
        ArticleCommentCreateScenario $scenario,
        ArticleCommentRequestFilter $requestFilter
    ) {
        $this->repository = $repository;
        $this->scenario = $scenario;
        $this->requestFilter = $requestFilter;
    }

    public function findArticleCommentsByArticleId(string $articleId): ArticleCommentCollection
    {
        return $this->repository->findAllByArticleId($articleId);
    }

    public function create(Request $request): ArticleComment
    {
        $this->scenario->validateRequest($request);
        $data = $this->requestFilter->filterBody($request, 'create');
        $comment = $this->repository->createArticleComment($data);
        $this->repository->persist($comment);
        return $comment;
    }
}
