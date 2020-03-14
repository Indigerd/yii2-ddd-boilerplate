<?php declare(strict_types=1);

namespace Domain\Collection;

use Domain\Entity\ArticleComment;

class ArticleCommentCollection extends IdentityCollection
{
    public function __construct(array $items = [])
    {
        parent::__construct(ArticleComment::class, $items);
    }
}
