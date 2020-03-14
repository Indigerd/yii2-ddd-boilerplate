<?php declare(strict_types=1);

namespace Domain\Repository;

use Domain\Collection\ArticleCommentCollection;
use Domain\Entity\ArticleComment;

interface ArticleCommentRepositoryInterface extends IdentityRepositoryInterface
{
    public function findAllByArticleId(string $articleId): ArticleCommentCollection;

    public function createArticleComment(array $data = []): ArticleComment;
}
