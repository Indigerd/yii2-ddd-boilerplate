<?php declare(strict_types=1);

namespace Infrastructure\Repository\Relation;

use Indigerd\Repository\Relation\Relation;
use Domain\Entity\ArticleCategory;

class ArticleCategoryRelation extends Relation
{
    public function __construct() {
        parent::__construct(
            'category',
            'categoryId',
            'id',
            'article_categories',
            ArticleCategory::class,
            'inner'
        );
    }
}
