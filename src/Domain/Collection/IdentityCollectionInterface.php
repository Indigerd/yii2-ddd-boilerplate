<?php declare(strict_types=1);

namespace Domain\Collection;

use Domain\Entity\IdentityInterface;

interface IdentityCollectionInterface extends CollectionInterface
{
    public function remove(IdentityInterface $item): void;
}
