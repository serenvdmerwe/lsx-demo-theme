<?php

/**
 * Accessibility helpers: skip links injection.
 *
 * @package lsx-demo-theme
 */

add_action('wp_body_open', function () {
	if (locate_template('parts/skip-links.html')) {
		get_template_part('parts/skip-links');
	}
});
