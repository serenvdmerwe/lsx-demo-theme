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
	$path = get_theme_file_path('inc/' . $file);
	if (file_exists($path)) {
		require_once $path; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable
	}
}

// Load modular includes (order matters for dependency: core first, then others).
lsx_demo_theme_require_inc('core-setup.php');
lsx_demo_theme_require_inc('assets.php');
lsx_demo_theme_require_inc('block-styles.php');
lsx_demo_theme_require_inc('breadcrumbs.php');
lsx_demo_theme_require_inc('logo.php');
lsx_demo_theme_require_inc('images.php');
lsx_demo_theme_require_inc('accessibility.php');

// Future: add conditional loading (e.g., only in admin) here if needed.
