<?php

/**
 * Class PostTypeTest
 *
 * @package Jo_Ie_Plugin
 */

/**
 * test post types.
 */

use Includes\PostTypes;


class PostTypeTest extends WP_UnitTestCase
{
    public function setUp()
    {
        parent::setUp();

    }

    public function test_post_types()
    {
        global $wp_post_types;

        if ( isset( $wp_post_types[ 'jo-ie' ] ) ) {
            unset( $wp_post_types[ 'jo-ie' ] );
        }
        $this->assertarrayNotHasKey( 'jo-ie', $wp_post_types );

        PostTypes::custom_post();
        $this->assertarrayHasKey( 'jo-ie', $wp_post_types );


        $custom_type = $wp_post_types[ 'jo-ie' ];
        $this->assertTrue( $custom_type->public );
        $this->assertFalse( $custom_type->hierarchical );
        $this->assertFalse( $custom_type->exclude_from_search );
        $this->assertTrue( $custom_type->publicly_queryable );
        $this->assertFalse( $custom_type->has_archive );
        $this->assertTrue( $custom_type->show_ui );
        $this->assertTrue( $custom_type->show_in_menu );
        $this->assertTrue( $custom_type->show_in_admin_bar );
        $this->assertTrue( $custom_type->show_in_nav_menus );
        $this->assertSame( 'Programs', $custom_type->label );


    }


}