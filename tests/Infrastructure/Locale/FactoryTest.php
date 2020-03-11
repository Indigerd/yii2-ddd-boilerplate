<?php declare(strict_types=1);

namespace Tests\Infrastructure\Locale;

use PHPUnit\Framework\TestCase;

use Infrastructure\Locale\Factory;
use Infrastructure\Locale\Locales\En;

class FactoryTest extends TestCase
{
    protected $factory;

    public function setUp(): void
    {
        $this->factory = new Factory();
    }

    public function testCreate()
    {
        $locale = $this->factory->create(En::CODE);
        $this->assertInstanceOf(En::class, $locale);
    }

    public function testInvalidCodeException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->factory->create('invalidcode');
    }
}
