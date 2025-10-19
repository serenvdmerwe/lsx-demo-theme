<?php
/**
 * PHPUnit bootstrap file
 *
 * @package LSX_Demo_Theme
 */

// First, we need to load the composer autoloader so we can use WP Mock.
require_once dirname( dirname, 2 ) . '/vendor/autoload.php';

// Now call the bootstrap method of WP Mock.
WP_Mock::bootstrap();

/**
 * Now we include any plugin files that we need to be able to run the tests. This
 * should be files that define the functions and classes you're going to test.
 */
require_once dirname( dirname, 2 ) . '/functions.php';

// Include test helper functions
require_once __DIR__ . '/test-helpers.php';
