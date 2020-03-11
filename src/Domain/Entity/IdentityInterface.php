<?php declare(strict_types=1);

namespace Domain\Entity;

interface IdentityInterface
{
    public function getId(): string;

    public function setId(string $id): void;
}
