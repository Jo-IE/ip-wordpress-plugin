<?php
/**
 * Plugin Name: Jo-IE Plugin
 * Plugin URI: https://github.com/Jo-IE/ip-wordpress-plugin
 * Description: A plugin that displays a custom post type and a shortcode with the user's IP address.
 * Version: 1.0.0
 * Author: Jo IE
 * Author URI: https://jo-ie.github.io/
 * License: GPLv2 or later
 */

if (!defined('ABSPATH')) {
    exit;
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Includes\Activate;
use Includes\Deactivate;
use Includes\PostTypes;
use Includes\ShortCodes;

if (!class_exists('JoiePlugin')) {

    class JoiePlugin
    {
        public function __construct()
        {
            add_action('init', array($this, 'custom_post_type'));

            add_shortcode('ipaddress', array($this, 'short_code'));

            add_filter('template_include', array($this, 'load_plugin_template'));

        }

        public function activate()
        {
            Activate::activate();
        }

        public function deactivate()
        {
            Deactivate::deactivate();
        }

        public function custom_post_type()
        {
            PostTypes::custom_post();

        }

        public function short_code()
        {
            return ShortCodes::display_ip();

        }

        public function load_plugin_template($template)
        {
            if (is_home()) {
                return plugin_dir_path(__FILE__) . '/templates/shortcode-display-ip.php';
            }
            return $template;
        }

    }

    $joiePlugin = new JoiePlugin();

    //activation hook
    register_activation_hook(__FILE__, array($joiePlugin, 'activate'));

    //deactivation hook

    register_deactivation_hook(__FILE__, array($joiePlugin, 'deactivate'));

}
