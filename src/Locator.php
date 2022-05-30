<?php declare(strict_types=1);

namespace Alfred\GeoLocator;


class Locator
{
    /**
     * @param string $string
     * @return array<string,string>|null phpstan level 6 fix
     */
    public function locate(string $string): ?array
    {
        return $this->getIpInfo($string);
    }

    /**
     * @param string $string
     * @return array<string,string>|null phpstan level 6 fix
     */
    private function getIpInfo(string $string): ?array
    {
        if (!filter_var($string, FILTER_VALIDATE_IP)) {
            throw new \InvalidArgumentException('Invalid IP address');
        }
        $url = 'http://ip-api.com/json/' . $string;
        $response = file_get_contents($url);
        // phpstan level 7 fix
        // Parameter #1 $json of function json_decode expects string, string|false given.
        if ($response === false) {
            return null;
        }
        $data = json_decode($response, true);
        if ($data['status'] === 'success') {
            return $data;
        }
        return null;
    }
}