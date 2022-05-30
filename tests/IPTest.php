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
        $this->assertTrue($location['countryCode'] === 'US');
    }
}