<?php declare(strict_types=1);

namespace App\Api\v1\Resource;

use Infrastructure\Rest\Resource;

class ArticleResource extends Resource
{
    protected $id;

    protected $title;

    protected $content;

    protected $category;

    public function fields(): array
    {
        return [
            'id',
            'title',
            'content',
            'category' => function () {
                $resource = \Yii::$container->get(ArticleCategoryResource::class);
                $resource->decorate($this->category);
                return $resource;
            },
        ];
    }
}
