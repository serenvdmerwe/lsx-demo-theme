<?php
/**
 * Test helper functions and classes
 *
 * @package LSX_Demo_Theme
 */

/**
 * Class LSX_Theme_TestCase
 *
 * Base test case for LSX theme testing
 */
class LSX_Theme_TestCase extends WP_Mock\Tools\TestCase {

    /**
     * Setup before each test
     */
    public function setUp(): void {
        parent::setUp();
        WP_Mock::setUp();
    }

    /**
     * Teardown after each test
     */
    public function tearDown(): void {
        WP_Mock::tearDown();
        parent::tearDown();
    }
}
