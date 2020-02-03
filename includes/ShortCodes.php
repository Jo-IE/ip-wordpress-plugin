<?php
/**
 * @package joie-plugin
 */

namespace Includes;

class ShortCodes
{
    public static function display_ip()
    {
        $storedIp = get_transient('ip-address');
        if ($storedIp) {
            return $storedIp;
        }
        $url = "http://bot.whatismyipaddress.com/";
        $ip = file_get_contents($url);

        set_transient('ip-address', $ip, HOUR_IN_SECONDS);
        $value = get_transient('ip-address');
        return $value;

    }
}
