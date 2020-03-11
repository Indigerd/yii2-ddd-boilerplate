<?php declare(strict_types=1);

namespace Domain\Collection;

use Domain\Entity\ArticleCategory;

class ArticleCategoryCollection extends IdentityCollection
{
    public function __construct(array $items = [])
    {
        parent::__construct(ArticleCategory::class, $items);
    }
}
