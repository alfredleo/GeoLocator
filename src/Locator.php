<?php declare(strict_types=1);

namespace Alfred\GeoLocator;


class Locator
{
    /**
     * @param string $string
     * @return array{status:string,country:string,countryCode:string,region:string,regionName:string,city:string,
     *     zip:string,lat:string,lon:string,timezone:string,isp:string,org:string,as:string}|null
     * @throws \InvalidArgumentException
     */
    public function locate(string $string): ?array
    {
        if (!filter_var($string, FILTER_VALIDATE_IP)) {
            throw new \InvalidArgumentException('Invalid IP address');
        }
        $url = 'http://ip-api.com/json/' . $string;
        $response = file_get_contents($url);
        if ($response === false) {
            return null;
        }
        /** @var array{status:string,country:string,countryCode:string,region:string,regionName:string,city:string,
         *     zip:string,lat:string,lon:string,timezone:string,isp:string,org:string,as:string} $data
         */
        $data = json_decode($response, true);
        if ($data['status'] === 'success') {
            return $data;
        }
        return null;
    }
}