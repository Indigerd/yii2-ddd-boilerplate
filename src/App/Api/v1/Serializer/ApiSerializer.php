<?php declare(strict_types=1);

namespace App\Api\v1\Serializer;

use App\Api\v1\Resource\ArticleResource;
use Domain\Entity\Article;
use Infrastructure\Rest\Serializer;

class ApiSerializer extends Serializer
{
    protected $models = [
        Article::class => ArticleResource::class,
    ];
}
