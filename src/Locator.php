<?php declare(strict_types=1);

namespace Alfred\GeoLocator;


class Locator
{
    /**
     * @param string $string
     * @return Location|null
     * @throws \InvalidArgumentException
     */
    public function locate(string $string): ?Location
    {
        if (!filter_var($string, FILTER_VALIDATE_IP)) {
            throw new \InvalidArgumentException('Invalid IP address');
        }
        $url = 'http://ip-api.com/json/' . $string;
        $response = file_get_contents($url);
        if ($response === false) {
            return null;
        }
        $data = json_decode($response, true);
        if ($data['status'] === 'success') {
            return new Location($data['country'], $data['countryCode'], $data['regionName'], $data['region'], $data['city']);
        }
        return null;
    }
}