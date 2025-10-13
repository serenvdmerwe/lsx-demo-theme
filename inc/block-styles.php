<?php

/**
 * Register custom block styles and pattern categories / bindings.
 *
 * @package lsx-demo-theme
 */

if (! function_exists('lsx_demo_theme_block_styles')) :
	function lsx_demo_theme_block_styles()
	{
		register_block_style('core/list', array(
			'name'         => 'checkmark-list',
			'label'        => __('Checkmark', 'lsx-demo-theme'),
			'inline_style' => 'ul.is-style-checkmark-list { list-style-type: "\2713"; } ul.is-style-checkmark-list li { padding-inline-start: 1ch; }',
		));
	}
	add_action('init', 'lsx_demo_theme_block_styles');
endif;

if (! function_exists('lsx_demo_theme_pattern_categories')) :
	function lsx_demo_theme_pattern_categories()
	{
		register_block_pattern_category('lsx_demo_theme_page', array(
			'label'       => __('Pages', 'lsx-demo-theme'),
			'description' => __('A collection of full page layouts.', 'lsx-demo-theme'),
		));
		register_block_pattern_category('lsx_demo_theme_post-format', array(
			'label'       => __('Post formats', 'lsx-demo-theme'),
			'description' => __('A collection of post format patterns.', 'lsx-demo-theme'),
		));
		register_block_pattern_category('lsx_demo_theme_pricing', array(
			'label'       => __('Pricing', 'lsx-demo-theme'),
			'description' => __('A collection of pricing table patterns and layouts.', 'lsx-demo-theme'),
		));
	}
	add_action('init', 'lsx_demo_theme_pattern_categories');
endif;

if (! function_exists('lsx_demo_theme_register_block_bindings')) :
	function lsx_demo_theme_register_block_bindings()
	{
		register_block_bindings_source('lsx-demo-theme/format', array(
			'label'              => _x('Post format name', 'Label for the block binding placeholder in the editor', 'lsx-demo-theme'),
			'get_value_callback' => 'lsx_demo_theme_format_binding',
		));
	}
	add_action('init', 'lsx_demo_theme_register_block_bindings');
endif;

if (! function_exists('lsx_demo_theme_format_binding')) :
	function lsx_demo_theme_format_binding()
	{
		$post_format_slug = get_post_format();
		if ($post_format_slug && 'standard' !== $post_format_slug) {
			return get_post_format_string($post_format_slug);
		}
	}
endif;

// Additional pattern categories from earlier snippet.
add_action('init', function () {
	$extra = array(
		'hero'           => __('Hero', 'lsx-demo-theme'),
		'section'        => __('Sections', 'lsx-demo-theme'),
		'query'          => __('Queries / Grids', 'lsx-demo-theme'),
		'product'        => __('Product', 'lsx-demo-theme'),
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
