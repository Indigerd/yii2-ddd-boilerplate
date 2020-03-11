<?php declare(strict_types=1);

namespace App\Api\v1\Http;

use Infrastructure\Http\RequestFilter;

class ArticleRequestFilter extends RequestFilter
{
    public function __construct()
    {
        parent::__construct([
            'index' => [
                'categoryId'
            ]
        ]);
    }
}
