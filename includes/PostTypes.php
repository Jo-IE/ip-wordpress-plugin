<?php
/**
 * @package joie-plugin
 */

namespace Includes;

class PostTypes
{
    public static function custom_post()
    {
        register_post_type('jo-ie', ['public' => true, 'label' => 'Programs', 'description' => ' A demo post type']);

    }
}
