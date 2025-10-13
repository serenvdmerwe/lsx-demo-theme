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
if (! function_exists('lsx_demo_theme_editor_style')) {
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
}
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
				'inline_style' => 'ul.is-style-checkmark-list { list-style-type: "\2713"; } ul.is-style-checkmark-list li { padding-inline-start: 1ch; }',
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
		// Custom logo (allow flexible for SVG sizing). Width/height nominal; style via CSS.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 128,
				'width'       => 128,
				'flex-height' => true,
				'flex-width'  => true,
				'unlink-homepage-logo' => true,
			)
		);

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
		echo '<li><a href="' . esc_url(get_post_type_archive_link('designer_boot')) . '">' . esc_html__('Designer Boots Catalog', 'lsx-demo-theme') . '</a></li>';
		echo '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
	} elseif (is_post_type_archive('designer_boot')) {
		echo '<li aria-current="page">' . esc_html__('Designer Boots Catalog', 'lsx-demo-theme') . '</li>';
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

/**
 * Inline SVG logo helper.
 *
 * Loads the theme's stiletto boot SVG and returns sanitized markup. Allows replacing
 * accessible name via parameter. Designed for usage as a fallback custom logo or
 * anywhere a small vector site mark is needed.
 *
 * @since 1.0.2
 *
 * @param array $args Optional args: aria_label (string), class (string), title (string).
 * @return string Sanitized SVG or empty string if file missing.
 */
function lsx_demo_theme_inline_logo_svg($args = array())
{
	$defaults = array(
		'aria_label' => get_bloginfo('name'),
		'class'      => 'site-logo-svg',
		'title'      => '',
	);
	$args = wp_parse_args($args, $defaults);
	$relative = 'assets/images/icons/boot-stiletto.svg';
	$path = get_theme_file_path($relative);
	if (! file_exists($path)) {
		return '';
	}
	$raw = file_get_contents($path); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	// Tight allowlist of elements & attributes.
	$allowed = array(
		'svg'  => array(
			'xmlns'      => true,
			'viewBox'    => true,
			'width'      => true,
			'height'     => true,
			'role'       => true,
			'aria-label' => true,
			'class'      => true,
		),
		'title' => array(),
		'path' => array(
			'd'    => true,
			'fill' => true,
		),
	);
	$svg = wp_kses($raw, $allowed);
	// Ensure we add / replace class & aria-label.
	$class_attr = esc_attr(trim($args['class']));
	$aria = esc_attr($args['aria_label']);
	// Remove existing title if we will insert a custom one.
	if (! empty($args['title'])) {
		$svg = preg_replace('/<title>.*?<\/title>/is', '', $svg);
	}
	// Inject aria-label & class (first <svg ...>). Keep role="img" for AT consistency.
	$svg = preg_replace(
		'/<svg\b([^>]*)>/i',
		'<svg$1 class="' . $class_attr . '" role="img" aria-label="' . $aria . '">',
		$svg,
		1
	);
	if (! empty($args['title'])) {
		$svg = preg_replace('/<svg([^>]*)>/', '<svg$1><title>' . esc_html($args['title']) . '</title>', $svg, 1);
	}
	return $svg;
}

/**
 * Fallback custom logo output.
 *
 * Filters get_custom_logo: if no custom logo set, outputs inline SVG wrapped in link.
 *
 * @since 1.0.2
 * @param string $html Current HTML.
 * @return string Modified/fallback HTML.
 */
function lsx_demo_theme_custom_logo_fallback($html)
{
	if (! has_custom_logo()) {
		$svg = lsx_demo_theme_inline_logo_svg(array('title' => get_bloginfo('name')));
		if ($svg) {
			$home = esc_url(home_url('/'));
			$name = esc_attr(get_bloginfo('name'));
			// Ensure svg carries the core "custom-logo" class for consistent styling with WP core expectations.
			if (false === strpos($svg, 'custom-logo')) {
				$svg = preg_replace('/<svg(\b[^>]*)class="([^"]*)"/i', '<svg$1class="$2 custom-logo"', $svg, 1);
				// If no class attr at all, inject one.
				if (false === strpos($svg, 'class="')) {
					$svg = preg_replace('/<svg(\b[^>]*)>/i', '<svg$1 class="custom-logo">', $svg, 1);
				}
			}
			$html = '<a href="' . $home . '" class="custom-logo-link" rel="home" aria-label="' . $name . '">' . $svg . '</a>';
		}
	}
	return $html;
}
add_filter('get_custom_logo', 'lsx_demo_theme_custom_logo_fallback');

/**
 * (Optional) CPT & taxonomies were supplied in snippet but already implemented via plugin.
 * Not re-registering here to avoid duplication. If plugin removal is planned, port logic.
 */

/**
 * -----------------------------------------------------------------------------
 * Designer Boot Featured Image Fallback
 * -----------------------------------------------------------------------------
 * Ensures a placeholder image is always displayed for designer_boot posts when
 * no featured image is set. Add an actual file at:
 * assets/images/shoes/placeholder-boot.jpg (or .webp)
 *
 * Accessibility: Provides meaningful alt text so screen reader users know it's
 * a placeholder. If you later feel it's redundant, set alt to empty string.
 */

if (! function_exists('lsx_demo_theme_get_boot_placeholder_url')) {
	function lsx_demo_theme_get_boot_placeholder_url()
	{
		return get_template_directory_uri() . '/assets/images/shoes/placeholder-boot.jpg';
	}
}

add_filter('post_thumbnail_html', function ($html, $post_id, $post_thumbnail_id, $size, $attr) {
	// Only act for our custom post type and only if there is no existing HTML.
	if ($html || get_post_type($post_id) !== 'designer_boot') {
		return $html;
	}
	$src = esc_url(lsx_demo_theme_get_boot_placeholder_url());
	$alt = esc_attr__('Placeholder boot image', 'lsx-demo-theme');
	$classes = 'wp-post-image boot-placeholder';
	// Merge any passed class attribute.
	if (is_array($attr) && ! empty($attr['class'])) {
		$classes .= ' ' . sanitize_html_class($attr['class']);
	}
	return '<img src="' . $src . '" alt="' . $alt . '" class="' . esc_attr($classes) . '" loading="lazy" decoding="async" />';
}, 10, 5);

// (Optional future) Register custom image sizes for designer boot displays.
// add_action( 'after_setup_theme', function() {
// 	add_image_size( 'boot-card', 480, 640, true );
// });

/**
 * -----------------------------------------------------------------------------
 * Global Image Alt Text Fallback
 * -----------------------------------------------------------------------------
 * Ensures that attachment images without an explicit alt attribute receive a
 * sensible, localized fallback based on the attachment's stored meta or title.
 *
 * Rationale: Empty alt attributes should be intentional (purely decorative
 * images). Often, editors forget to add alt text – this filter reduces the
 * number of silent accessibility regressions. Site owners should still review
 * and provide meaningful, context‑specific alt text where appropriate.
 *
 * @since 1.0.3
 * @param array        $attr       Attributes for the image markup.
 * @param WP_Post      $attachment Attachment post object.
 * @param string|array $size       Requested size.
 * @return array Filtered attributes.
 */
function lsx_demo_theme_image_alt_fallback($attr, $attachment, $size)
{ // phpcs:ignore WordPress.NamingConventions.ValidFunctionName
	// If alt already present (even empty string), respect editor intent.
	if (array_key_exists('alt', $attr) && '' !== trim((string) $attr['alt'])) {
		return $attr;
	}

	// Attachment explicit alt meta.
	$explicit = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	if (is_string($explicit) && '' !== trim($explicit)) {
		$attr['alt'] = wp_strip_all_tags($explicit);
		return $attr;
	}

	// Fallback to attachment title (minus file extension artifacts).
	$title = get_the_title($attachment->ID);
	if ($title) {
		$attr['alt'] = wp_strip_all_tags($title);
	}

	return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'lsx_demo_theme_image_alt_fallback', 10, 3);
