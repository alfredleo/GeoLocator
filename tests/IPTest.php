<?php declare(strict_types=1);

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
        $location = $locator->locate('8.8.8.8');
        self::assertNotNull($location);
        self::assertEquals('United States', $location['country']);
        self::assertEquals('US', $location['countryCode']);
        self::assertEquals('VA', $location['region']);
        self::assertEquals('Virginia', $location['regionName']);
        self::assertEquals('Ashburn', $location['city']);
        self::assertEquals('20149', $location['zip']);
        self::assertEquals('39.03', $location['lat']);
        self::assertEquals('-77.5', $location['lon']);
        self::assertEquals('America/New_York', $location['timezone']);
        self::assertEquals('Google LLC', $location['isp']);
        self::assertEquals('Google Public DNS', $location['org']);
        self::assertEquals('AS15169 Google LLC', $location['as']);
        self::assertEquals('8.8.8.8', $location['query']);
    }
}