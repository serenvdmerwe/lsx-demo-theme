<?php

/**
 * Theme bootstrap loader.
 *
 * Splits former monolithic functions.php into modular include files under /inc
 * for maintainability. Each include contains a focused set of responsibilities:
 *  - core-setup.php      : theme supports, menus, editor styles
 *  - assets.php          : front-end & editor asset enqueues
 *  - block-styles.php    : block styles, pattern categories & bindings
 *  - breadcrumbs.php     : breadcrumb rendering helper
 *  - logo.php            : inline SVG logo + custom logo fallback
 *  - images.php          : image placeholder + alt text fallbacks
 *  - accessibility.php   : skip links injection & future a11y helpers
 *
 * @package lsx-demo-theme
 */

// Define version constant early (used by assets) if not already.
if (! defined('LSX_DEMO_THEME_VERSION')) {
	$theme = function_exists('wp_get_theme') ? wp_get_theme() : null; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	define('LSX_DEMO_THEME_VERSION', $theme ? $theme->get('Version') : '1.0.0');
}

/**
 * Safely require an include file if present.
 *
 * @param string $file Relative path under /inc.
 */
function lsx_demo_theme_require_inc($file)
{
	// Only allow filenames ending with .php, no slashes or traversal
	if (
		!is_string($file) ||
		strpos($file, '/') !== false ||
		strpos($file, '\\') !== false ||
		strpos($file, '..') !== false ||
		substr($file, -4) !== '.php'
	) {
		return;
	}

	$inc_dir = realpath(get_theme_file_path('inc'));
	$path = get_theme_file_path('inc/' . $file);
	$real_path = realpath($path);
	if ($real_path && strpos($real_path, $inc_dir) === 0 && file_exists($real_path)) {
		require_once $real_path; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable
	}
}

// Skip links template part injection early in body.
add_action('wp_body_open', function () {
	if (locate_template('parts/skip-links.html')) {
		get_template_part('parts/skip-links');
	}
});

// Additional pattern categories from snippet (guard for duplicates).
add_action('init', function () {
	$extra = array(
		'hero'           => __('Hero', 'lsx-demo-theme'),
		'section'        => __('Sections', 'lsx-demo-theme'),
		'query'          => __('Queries / Grids', 'lsx-demo-theme'),
		'catalog'        => __('Catalog', 'lsx-demo-theme'),
		'meta'           => __('Meta / Specs', 'lsx-demo-theme'),
		'blog'           => __('Journal', 'lsx-demo-theme'),
		'call-to-action' => __('Calls to Action', 'lsx-demo-theme'),
		'testimonials'   => __('Testimonials / Social Proof', 'lsx-demo-theme'),
	);
	foreach ($extra as $slug => $label) {
		if (! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($slug)) {
			register_block_pattern_category($slug, array('label' => $label));
		}
	}
});
// Load modular includes (order matters for dependency: core first, then others).
lsx_demo_theme_require_inc('core-setup.php');
lsx_demo_theme_require_inc('assets.php');
lsx_demo_theme_require_inc('block-styles.php');
lsx_demo_theme_require_inc('breadcrumbs.php');
lsx_demo_theme_require_inc('logo.php');
lsx_demo_theme_require_inc('images.php');
lsx_demo_theme_require_inc('accessibility.php');

// Future: add conditional loading (e.g., only in admin) here if needed.
