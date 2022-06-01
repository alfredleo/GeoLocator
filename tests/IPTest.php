<?php declare(strict_types=1);

use Alfred\GeoLocator\Location;
use Alfred\GeoLocator\Locator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Alfred\GeoLocator\Locator
 */
class IPTest extends TestCase
{
    public function testSuccess(): void
    {
        $locator = new Locator();
        /** @var Location $location */
        $location = $locator->locate('8.8.8.8');
        self::assertNotNull($location);
    }

    public function testNotFound(): void
    {
        $locator = new Locator();
        $location = $locator->locate('127.0.0.1');
        self::assertNull($location);
    }

    public function testInvalidIP(): void
    {
        $locator = new Locator();
        $this->expectException(\InvalidArgumentException::class);
        $location = $locator->locate('invalid');
    }

    public function testEmptyIp(): void
    {
        $locator = new Locator();
        $this->expectException(\InvalidArgumentException::class);
        $location = $locator->locate('');
    }

    public function testFieldsEqualTo(): void
    {
        $locator = new Locator();

        /** @var Location $location */
        $location = $locator->locate('8.8.8.8');
        self::assertEquals('United States', $location->getCountry());
        self::assertEquals('US', $location->getCountryCode());
        self::assertEquals('VA', $location->getRegion());
        self::assertEquals('Virginia', $location->getRegionName());
        self::assertEquals('Ashburn', $location->getCity());
//        self::assertEquals('20149', $location->zip);
//        self::assertEquals('39.03', $location->lat);
//        self::assertEquals('-77.5', $location->lon);
//        self::assertEquals('America/New_York', $location->timezone);
//        self::assertEquals('Google LLC', $location->isp);
//        self::assertEquals('Google Public DNS', $location->org);
//        self::assertEquals('AS15169 Google LLC', $location->as);
    }
}