<?php declare(strict_types=1);

namespace Infrastructure\Hydrator;

use Infrastructure\Locale\Detector;
use Indigerd\Hydrator\Accessor\AccessorInterface;

class LocaleBasedHydrator extends MongoHydrator
{
    public function __construct(AccessorInterface $accessor, Detector $localeDetector, array $localeFields = [])
    {
        foreach ($localeFields as $field) {
            $this->addStrategy($field, new LocaleBasedStrategy($localeDetector));
        }
        parent::__construct($accessor);
    }
}
