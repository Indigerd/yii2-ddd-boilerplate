<?php declare(strict_types=1);

namespace Domain\Collection;

use Domain\Entity\IdentityInterface;

class IdentityCollection extends Collection implements IdentityCollectionInterface
{
    public function remove(IdentityInterface $item): void
    {
        foreach ($this->items as $key => $value) {
            /** @var IdentityInterface $value */
            if ($value->getId() === $item->getId()) {
                unset($this->items[$key]);
            }
        }
    }
}
