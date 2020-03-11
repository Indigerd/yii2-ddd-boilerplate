<?php declare(strict_types=1);

namespace Domain\Collection;

use Domain\Entity\Article;

class ArticleCollection extends IdentityCollection
{
    public function __construct(array $items = [])
    {
        parent::__construct(Article::class, $items);
    }
}
