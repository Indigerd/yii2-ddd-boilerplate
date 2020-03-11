<?php declare(strict_types=1);

namespace Infrastructure\Hydrator;

use Infrastructure\Locale\Detector;
use Infrastructure\Locale\Locales\En;
use Indigerd\Hydrator\Strategy\StrategyInterface;

class LocaleBasedStrategy implements StrategyInterface
{
    protected $localeDetector;

    public function __construct(Detector $localeDetector)
    {
        $this->localeDetector = $localeDetector;
    }

    public function extract($value, ?object $object = null)
    {
        return $value;
    }

    public function hydrate($value, ?array $data = null, $oldValue = null)
    {
        $locale = $this->localeDetector->getLocale();
        if (!\is_array($value)) {
            return null;
        }
        if (empty($value[$locale->getCode()]) and isset($value[En::CODE])) {
            return $value[En::CODE];
        }
        if (isset($value[$locale->getCode()])) {
            return $value[$locale->getCode()];
        }
    }
}
