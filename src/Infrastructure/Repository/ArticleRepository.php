<?php declare(strict_types=1);

namespace Infrastructure\Repository;

use Domain\Entity\Article;
use Indigerd\Repository\Exception\NotFoundException;
use Domain\Repository\ArticleRepositoryInterface;
use Domain\Repository\Exception\ArticleNotFoundException;
use Domain\Collection\ArticleCollection;

class ArticleRepository extends IdentityRepository implements ArticleRepositoryInterface
{
    public function findById(string $id, array $with = []): Article
    {
        try {
            $article = $this->findOne(['id' => $id], $with);
            return $article;
        } catch (NotFoundException $exception) {
            throw new ArticleNotFoundException();
        }
    }

    public function findArticles(
        array $conditions = [],
        array $order = [],
        int $limit = 0,
        int $offset = 0,
        array $with = []
    ): ArticleCollection
    {
        return new ArticleCollection(parent::findAll($conditions, $order, $limit, $offset, $with));
    }

    public function findAllByCategoryId(string $categoryId, array $with = []): ArticleCollection
    {
        return new ArticleCollection(parent::findAll(['categoryId' => $categoryId], [], 0, 0, $with));
    }
}
