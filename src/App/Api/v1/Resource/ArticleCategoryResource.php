<?php declare(strict_types=1);

namespace App\Api\v1\Resource;

use Infrastructure\Rest\Resource;

class ArticleCategoryResource extends Resource
{
    protected $id;

    protected $name;

    public function fields(): array
    {
        return [
            'id',
            'name',
        ];
    }
}
