<?php declare(strict_types=1);

namespace Alfred\GeoLocator;


class Locator
{
    public function locate(string $string)
    {
        return $this->getIpInfo($string);
    }

    private function getIpInfo(string $string)
    {
        if (!filter_var($string, FILTER_VALIDATE_IP)) {
            return null;
        }
        $url = 'http://ip-api.com/json/' . $string;
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        if ($data['status'] === 'success') {
            return $data;
        }
        return null;
    }
}