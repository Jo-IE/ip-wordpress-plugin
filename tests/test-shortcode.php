<?php

/**
 * Class ShortCodeTest
 *
 * @package Jo_Ie_Plugin
 */

/**
 * test short codes.
 */

use Includes\ShortCodes;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class ShortCodeTest extends WP_UnitTestCase
{
    public function setUp()
    {
        parent::setUp();

    }

    public function test_shortcode_registration()
    {
        global $shortcode_tags;

        $this->assertArrayHasKey('ipaddress', $shortcode_tags);

    }

    public function test_display_ip()
    {
        //delete transients
        delete_transient('ip-address');
        //result is a string
        $this->assertInternalType('string', ShortCodes::display_ip());
        //result returns correct ip address
        $myIp = $_ENV['IP'];
        $ip_from_shortcode = ShortCodes::display_ip();
        $this->assertEquals($myIp, $ip_from_shortcode);
        //ip is stored in transient
        ShortCodes::display_ip();
        $storedIp = get_transient('ip-address');
        $this->assertEquals($myIp, $storedIp);
    }

}
