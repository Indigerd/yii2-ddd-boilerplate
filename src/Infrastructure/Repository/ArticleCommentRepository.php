<?php declare(strict_types=1);

namespace Infrastructure\Repository;

use Domain\Collection\ArticleCommentCollection;
use Domain\Entity\ArticleComment;
use Domain\Repository\ArticleCommentRepositoryInterface;

class ArticleCommentRepository extends IdentityRepository implements ArticleCommentRepositoryInterface
{
    public function findAllByArticleId(string $articleId): ArticleCommentCollection
    {
        return new ArticleCommentCollection(parent::findAll(['articleId' => $articleId]));
    }

    public function createArticleComment(array $data = []): ArticleComment
    {
        return $this->hydrator->hydrate($this->modelClass, $data);
    }
}
