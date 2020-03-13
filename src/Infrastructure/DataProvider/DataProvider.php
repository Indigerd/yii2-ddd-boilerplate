<?php declare(strict_types=1);

namespace Infrastructure\DataProvider;

use Domain\Repository\RepositoryInterface;

class DataProvider extends \Indigerd\Repository\DataProvider\DataProvider
{
    public function __construct(
        RepositoryInterface $repository,
        array $conditions = [],
        array $with = [],
        array $sortFields = [],
        array $config = []
    ) {
        parent::__construct($repository, $conditions, $with, $sortFields, $config);
    }
}
