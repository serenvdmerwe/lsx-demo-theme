<?php

/**
 * Core theme setup: supports, menus, editor styles.
 *
 * @package lsx-demo-theme
 */

if (! defined('LSX_DEMO_THEME_VERSION')) {
	define('LSX_DEMO_THEME_VERSION', wp_get_theme()->get('Version'));
}

if (! function_exists('lsx_demo_theme_post_format_setup')) :
	function lsx_demo_theme_post_format_setup()
	{
		add_theme_support('post-formats', array('aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'));
	}
	add_action('after_setup_theme', 'lsx_demo_theme_post_format_setup');
endif;

if (! function_exists('lsx_demo_theme_core_setup')) {
	function lsx_demo_theme_core_setup()
	{
		// Internationalization: make theme available for translation.
		// Looks for .mo files in /languages directory (create if missing).
		load_theme_textdomain('lsx-demo-theme', get_template_directory() . '/languages');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('responsive-embeds');
		add_theme_support('html5', array('script', 'style', 'gallery', 'caption', 'comment-form', 'comment-list', 'navigation-widgets', 'search-form'));
		add_theme_support('automatic-feed-links');
		add_theme_support('editor-styles');
		add_theme_support('custom-logo', array(
			'height'               => 128,
			'width'                => 128,
			'flex-height'          => true,
			'flex-width'           => true,
			'unlink-homepage-logo' => true,
		));
		add_editor_style('assets/css/editor.css');
		register_nav_menus(array(
			'primary'       => __('Primary Header Menu', 'lsx-demo-theme'),
			'footer'        => __('Footer Primary', 'lsx-demo-theme'),
			'footer-legal'  => __('Footer Legal', 'lsx-demo-theme'),
			'footer-social' => __('Footer Social', 'lsx-demo-theme'),
			'sidebar'       => __('Sidebar Utility', 'lsx-demo-theme'),
		));
	}
	add_action('after_setup_theme', 'lsx_demo_theme_core_setup');
}

// Register additional pattern categories for the theme.
if (! function_exists('lsx_demo_theme_register_pattern_categories')) {
	function lsx_demo_theme_register_pattern_categories()
	{
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
	}
	add_action('init', 'lsx_demo_theme_register_pattern_categories');
}

if (! function_exists('lsx_demo_theme_editor_style')) :
	function lsx_demo_theme_editor_style()
	{
		add_editor_style(get_parent_theme_file_uri('assets/css/editor-style.css'));
	}
	add_action('after_setup_theme', 'lsx_demo_theme_editor_style');
endif;
