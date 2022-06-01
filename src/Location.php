<?php

namespace Alfred\GeoLocator;

class Location
{
    private string $country;
    private string $countryCode;
    private string $regionName;
    private string $region;
    private string $city;


    /**
     * @param string $country
     * @param string|null $countryCode
     * @param string|null $regionName
     * @param string|null $region
     * @param string|null $city
     */
    public function __construct(string $country, ?string $countryCode, ?string $regionName, ?string $region, ?string $city)
    {
        $this->country = $country;
        /** @var string $countryCode */
        $this->countryCode = $countryCode;
        /** @var string $regionName */
        $this->regionName = $regionName;
        /** @var string $region */
        $this->region = $region;
        /** @var string $city */
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getRegionName(): string
    {
        return $this->regionName;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }
}