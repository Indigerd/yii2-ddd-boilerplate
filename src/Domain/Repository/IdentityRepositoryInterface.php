<?php declare(strict_types=1);

namespace Domain\Repository;

use Domain\Entity\IdentityInterface;

interface IdentityRepositoryInterface extends RepositoryInterface
{
    public function persist(IdentityInterface $entity): void;
}
