<?php
/**
 * Sample test case
 *
 * @package LSX_Demo_Theme
 */

/**
 * Class Theme_Test
 */
class Theme_Test extends LSX_Theme_TestCase {

    /**
     * Test if theme functions file is loaded
     */
    public function test_theme_functions_exists() {
        // This should be replaced with actual function tests from your theme
        $this->assertTrue( function_exists( 'wp_get_theme' ) );
    }

    /**
     * Sample test for mock function calls
     */
    public function test_wp_function_mocking() {
        // Setup mock
        WP_Mock::userFunction( 'wp_get_theme', [
            'return' => (object) [
                'get' => function( $param ) {
                    if ( $param === 'Version' ) {
                        return '1.0.0';
                    }
                    return '';
                },
                'Name' => 'LSX Demo Theme',
            ],
        ] );

        // Test the function
        $theme = wp_get_theme();
        $this->assertEquals( 'LSX Demo Theme', $theme->Name );
        $this->assertEquals( '1.0.0', $theme->get( 'Version' ) );
    }
}
