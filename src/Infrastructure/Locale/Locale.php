<?php declare(strict_types=1);

namespace Infrastructure\Locale;

class Locale
{
    protected $code;

    protected $name;

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
