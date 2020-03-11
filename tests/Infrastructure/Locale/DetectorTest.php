<?php declare(strict_types=1);

namespace Tests\Infrastructure\Locale;

use Infrastructure\Locale\Detector;
use PHPUnit\Framework\TestCase;
use Infrastructure\Locale\Factory;
use Infrastructure\Locale\Locales\Ru;
use Infrastructure\Locale\Locales\En;

class DetectorTest extends TestCase
{
    protected $request;

    protected $detector;

    public function setUp(): void
    {
        $this->request = $this->getMockBuilder(\Infrastructure\Http\Request::class)
            ->disableOriginalConstructor()
            ->setMethods(['getQueryParams'])
            ->getMock();

        $this->detector = new Detector($this->request, new Factory());
    }

    public function testDetection()
    {
        $this->request
            ->expects($this->once())
            ->method('getQueryParams')
            ->will($this->returnValue(['lang' => 'ru']));

        $locale = $this->detector->getLocale();
        $this->assertInstanceOf(Ru::class, $locale);
    }

    public function testDetectionFallback()
    {
        $this->request
            ->expects($this->once())
            ->method('getQueryParams')
            ->will($this->returnValue([]));

        $locale = $this->detector->getLocale();
        $this->assertInstanceOf(En::class, $locale);
    }
}
