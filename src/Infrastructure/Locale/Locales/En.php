<?php declare(strict_types=1);

namespace Infrastructure\Locale\Locales;

use Infrastructure\Locale\Locale;

final class En extends Locale
{
    const CODE = 'en';

    protected $code = self::CODE;

    protected $name = 'English';
}
