<?php declare(strict_types=1);

namespace Domain\Repository;

use Domain\Collection\ArticleCollection;
use Domain\Entity\Article;

interface ArticleRepositoryInterface extends IdentityRepositoryInterface
{
    public function findById(string $id, array $with = []): Article;

    public function findAllByCategoryId(string $categoryId, array $with = []): ArticleCollection;

    public function findArticles(
        array $conditions = [],
        array $order = [],
        int $limit = 0,
        int $offset = 0,
        array $with = []
    ): ArticleCollection;
}
