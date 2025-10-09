<?php

/**
 * lsx-demo-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since lsx-demo-theme 1.0
 */

// Adds theme support for post formats.
if (! function_exists('lsx_demo_theme_post_format_setup')) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_post_format_setup()
	{
		add_theme_support('post-formats', array('aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'));
	}
endif;
add_action('after_setup_theme', 'lsx_demo_theme_post_format_setup');

// Enqueues editor-style.css in the editors.
if (! function_exists('lsx_demo_theme_editor_style')) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_editor_style()
	{
		add_editor_style(get_parent_theme_file_uri('assets/css/editor-style.css'));
	}
endif;
add_action('after_setup_theme', 'lsx_demo_theme_editor_style');

// Enqueues style.css on the front.
if (! function_exists('lsx_demo_theme_enqueue_styles')) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_enqueue_styles()
	{
		wp_enqueue_style(
			'lsx-demo-theme-style',
			get_parent_theme_file_uri('style.css'),
			array(),
			wp_get_theme()->get('Version')
		);
	}
endif;
add_action('wp_enqueue_scripts', 'lsx_demo_theme_enqueue_styles');

// Registers custom block styles.
if (! function_exists('lsx_demo_theme_block_styles')) :
	/**
	 * Registers custom block styles.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_block_styles()
	{
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __('Checkmark', 'lsx-demo-theme'),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action('init', 'lsx_demo_theme_block_styles');

// Registers pattern categories.
if (! function_exists('lsx_demo_theme_pattern_categories')) :
	/**
	 * Registers pattern categories.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_pattern_categories()
	{

		register_block_pattern_category(
			'lsx_demo_theme_page',
			array(
				'label'       => __('Pages', 'lsx-demo-theme'),
				'description' => __('A collection of full page layouts.', 'lsx-demo-theme'),
			)
		);

		register_block_pattern_category(
			'lsx_demo_theme_post-format',
			array(
				'label'       => __('Post formats', 'lsx-demo-theme'),
				'description' => __('A collection of post format patterns.', 'lsx-demo-theme'),
			)
		);

		register_block_pattern_category(
			'lsx_demo_theme_pricing',
			array(
				'label'       => __('Pricing', 'lsx-demo-theme'),
				'description' => __('A collection of pricing table patterns and layouts.', 'lsx-demo-theme'),
			)
		);
	}
endif;
add_action('init', 'lsx_demo_theme_pattern_categories');

// Registers block binding sources.
if (! function_exists('lsx_demo_theme_register_block_bindings')) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_register_block_bindings()
	{
		register_block_bindings_source(
			'lsx-demo-theme/format',
			array(
				'label'              => _x('Post format name', 'Label for the block binding placeholder in the editor', 'lsx-demo-theme'),
				'get_value_callback' => 'lsx_demo_theme_format_binding',
			)
		);
	}
endif;
add_action('init', 'lsx_demo_theme_register_block_bindings');

// Registers block binding callback function for the post format name.
if (! function_exists('lsx_demo_theme_format_binding')) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function lsx_demo_theme_format_binding()
	{
		$post_format_slug = get_post_format();

		if ($post_format_slug && 'standard' !== $post_format_slug) {
			return get_post_format_string($post_format_slug);
		}
	}
endif;

/**
 * -----------------------------------------------------------------------------
 * Extended Theme Bootstrap (merged from Luxury Black Heels snippet)
 * Adds: core supports, menus, asset enqueue, breadcrumbs, skip links part load,
 * additional pattern categories (hero, section, query, product, meta, blog,
 * call-to-action, testimonials) while preserving existing functionality.
 * All functions are prefixed lsx_demo_theme_ to avoid collisions.
 * -----------------------------------------------------------------------------
 */

if (! defined('LSX_DEMO_THEME_VERSION')) {
	define('LSX_DEMO_THEME_VERSION', wp_get_theme()->get('Version'));
}

if (! function_exists('lsx_demo_theme_core_setup')) {
	/**
	 * Add common theme supports & register nav menus.
	 *
	 * @since 1.0.1
	 * @return void
	 */
	function lsx_demo_theme_core_setup()
	{
		// Core supports (some may already be implied in block theme, harmless to re-call).
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('responsive-embeds');
		add_theme_support('html5', array('script', 'style', 'gallery', 'caption', 'comment-form', 'comment-list', 'navigation-widgets', 'search-form'));
		add_theme_support('automatic-feed-links');
		add_theme_support('editor-styles');

		// Editor stylesheet (already adding editor-style.css above – keep both if file exists).
		add_editor_style('assets/css/editor.css');

		// Navigation menus.
		register_nav_menus(array(
			'primary'       => __('Primary Header Menu', 'lsx-demo-theme'),
			'footer'        => __('Footer Primary', 'lsx-demo-theme'),
			'footer-legal'  => __('Footer Legal', 'lsx-demo-theme'),
			'footer-social' => __('Footer Social', 'lsx-demo-theme'),
			'sidebar'       => __('Sidebar Utility', 'lsx-demo-theme'),
		));
	}
}
add_action('after_setup_theme', 'lsx_demo_theme_core_setup');

if (! function_exists('lsx_demo_theme_enqueue_assets')) {
	/**
	 * Enqueue front-end assets (fonts & theme stylesheet and small JS stub if present).
	 *
	 * @since 1.0.1
	 * @return void
	 */
	function lsx_demo_theme_enqueue_assets()
	{
		// Webfont request (consider self-hosting for performance/privacy in future).
		wp_enqueue_style(
			'lsx-demo-theme-fonts',
			'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Montserrat:wght@400;500&family=Open+Sans:wght@400;600&display=swap',
			array(),
			null
		);
		// Main additional stylesheet (style.css already enqueued earlier).
		if (file_exists(get_theme_file_path('assets/css/style.css'))) {
			wp_enqueue_style('lsx-demo-theme-theme', get_theme_file_uri('assets/css/style.css'), array('lsx-demo-theme-style'), LSX_DEMO_THEME_VERSION);
		}
		// Optional interactions JS.
		if (file_exists(get_theme_file_path('assets/js/interactions.js'))) {
			wp_enqueue_script('lsx-demo-theme-interactions', get_theme_file_uri('assets/js/interactions.js'), array(), LSX_DEMO_THEME_VERSION, true);
		}
	}
}
add_action('wp_enqueue_scripts', 'lsx_demo_theme_enqueue_assets');

/**
 * Breadcrumb output (accessible ordered list) – lightweight fallback.
 *
 * @since 1.0.1
 * @return void
 */
function lsx_demo_theme_breadcrumb()
{
	if (is_front_page()) {
		return;
	}
	echo '<nav class="lsx-demo-theme-breadcrumb" aria-label="' . esc_attr__('Breadcrumb', 'lsx-demo-theme') . '"><ol>';
	echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'lsx-demo-theme') . '</a></li>';
	if (is_singular('designer_boot')) {
		echo '<li><a href="' . esc_url(get_post_type_archive_link('designer_boot')) . '">' . esc_html__('Designer Boots', 'lsx-demo-theme') . '</a></li>';
		echo '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
	} elseif (is_post_type_archive('designer_boot')) {
		echo '<li aria-current="page">' . esc_html__('Designer Boots', 'lsx-demo-theme') . '</li>';
	} elseif (is_single()) {
		echo '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
	} elseif (is_archive()) {
		echo '<li aria-current="page">' . esc_html(get_the_archive_title()) . '</li>';
	} elseif (is_search()) {
		echo '<li aria-current="page">' . sprintf(esc_html__('Search: %s', 'lsx-demo-theme'), esc_html(get_search_query())) . '</li>';
	} elseif (is_404()) {
		echo '<li aria-current="page">' . esc_html__('Not Found', 'lsx-demo-theme') . '</li>';
	}
	echo '</ol></nav>';
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

/**
 * (Optional) CPT & taxonomies were supplied in snippet but already implemented via plugin.
 * Not re-registering here to avoid duplication. If plugin removal is planned, port logic.
 */
