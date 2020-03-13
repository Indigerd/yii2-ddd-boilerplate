<?php declare(strict_types=1);

namespace Infrastructure\DataProvider;

use Domain\Repository\RepositoryInterface;

class DataProviderFactory
{
    public function create(
        RepositoryInterface $repository,
        array $conditions = [],
        array $with = [],
        array $sortFields = []
    ) {
        return new DataProvider($repository, $conditions, $with, $sortFields);
    }
}
