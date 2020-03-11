<?php declare(strict_types=1);

namespace Infrastructure\Locale;

class Factory
{
    public function create(string $code): Locale
    {
        $className = 'Infrastructure\Locale\Locales\\' . \ucfirst($code);
        if (!\class_exists($className)) {
            throw new \InvalidArgumentException("Invalid locale code: $code");
        }
        return new $className;
    }
}
