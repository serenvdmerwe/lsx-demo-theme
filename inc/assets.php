<?php

/**
 * Asset enqueues (styles, scripts, fonts).
 *
 * @package lsx-demo-theme
 */

if (! function_exists('lsx_demo_theme_enqueue_styles')) :
	function lsx_demo_theme_enqueue_styles()
	{
		wp_enqueue_style('lsx-demo-theme-style', get_parent_theme_file_uri('style.css'), array(), wp_get_theme()->get('Version'));
	}
	add_action('wp_enqueue_scripts', 'lsx_demo_theme_enqueue_styles');
endif;

if (! function_exists('lsx_demo_theme_enqueue_assets')) {
	function lsx_demo_theme_enqueue_assets()
	{
		wp_enqueue_style(
			'lsx-demo-theme-fonts',
			'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Montserrat:wght@400;500&family=Open+Sans:wght@400;600&display=swap',
			array(),
			null
		);
		if (file_exists(get_theme_file_path('assets/css/style.css'))) {
			wp_enqueue_style('lsx-demo-theme-theme', get_theme_file_uri('assets/css/style.css'), array('lsx-demo-theme-style'), LSX_DEMO_THEME_VERSION);
		}
		if (file_exists(get_theme_file_path('assets/js/interactions.js'))) {
			wp_enqueue_script('lsx-demo-theme-interactions', get_theme_file_uri('assets/js/interactions.js'), array(), LSX_DEMO_THEME_VERSION, true);
		}
	}
	add_action('wp_enqueue_scripts', 'lsx_demo_theme_enqueue_assets');
}
