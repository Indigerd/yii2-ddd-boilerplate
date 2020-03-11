<?php declare(strict_types=1);

namespace App\Api\v1\Service;

use Domain\Repository\ArticleRepositoryInterface;
use Infrastructure\DataProvider\DataProvider;
use Infrastructure\DataProvider\DataProviderFactory;
use Infrastructure\Http\Request;
use App\Api\v1\Http\ArticleRequestFilter;

class ArticleService
{
    protected $repository;

    protected $dataProviderFactory;

    protected $requestFilter;

    public function __construct(
        ArticleRepositoryInterface $repository,
        DataProviderFactory $dataProviderFactory,
        ArticleRequestFilter $requestFilter
    ) {
        $this->repository = $repository;
        $this->dataProviderFactory = $dataProviderFactory;
        $this->requestFilter = $requestFilter;
    }

    public function findArticleById(string $id)
    {
        return $this->repository->findById($id, ['category']);
    }

    public function findAll(Request $request): DataProvider
    {
        $filteredParams = $this->requestFilter->filterQuery($request, 'index');
        return $this->dataProviderFactory->create($this->repository, $filteredParams);
    }
}
