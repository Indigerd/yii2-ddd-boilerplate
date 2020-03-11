<?php declare(strict_types=1);

namespace Infrastructure\Repository\Relation;

use Indigerd\Repository\Relation\RelationCollection;

class ArticleRelationCollection extends RelationCollection
{
    public function __construct(ArticleCategoryRelation $relation)
    {
        parent::__construct($relation);
    }
}
