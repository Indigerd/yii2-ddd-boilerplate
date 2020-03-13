<?php declare(strict_types=1);

namespace App\Frontend\Http;

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
