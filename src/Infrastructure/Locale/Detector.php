<?php declare(strict_types=1);

namespace Infrastructure\Locale;

use Infrastructure\Http\Request;
use Infrastructure\Locale\Locales\En;

class Detector
{
    protected $locale;

    protected $request;

    protected $localeFactory;

    public function __construct(Request $request, Factory $localeFactory)
    {
        $this->request = $request;
        $this->localeFactory = $localeFactory;
    }

    public function getLocale(): Locale
    {
        if (null === $this->locale) {
            $this->detect();
        }
        return $this->locale;
    }

    protected function detect()
    {
        $code = En::CODE;
        $params = $this->request->getQueryParams();
        if (
            isset($params['lang'])
            && is_string($params['lang'])
            && \class_exists('Infrastructure\Locale\Locales\\' . \ucfirst($params['lang']))
        ) {
            $code = $params['lang'];
        }
        $this->locale = $this->localeFactory->create($code);
    }
}
