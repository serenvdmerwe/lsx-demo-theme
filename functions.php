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
// Include luxury product filter handler
require_once get_template_directory() . '/inc/luxury-product-filter-handler.php';

// Include sample products creator
require_once get_template_directory() . '/inc/luxury-sample-products.php';

// Include designer boot taxonomies
require_once get_template_directory() . '/inc/designer-boot-taxonomies.php';

// Include designer boot template helpers
require_once get_template_directory() . '/inc/designer-boot-template-helpers.php';

// Include designer boot meta boxes
require_once get_template_directory() . '/inc/designer-boot-meta-boxes.php';

// Include system validator for development/testing
// if (defined('WP_DEBUG') && WP_DEBUG) {
// 	require_once get_template_directory() . '/inc/system-validator.php';
// }

// Initialize post format support
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
add_action('wp_enqueue_scripts', 'lsx_demo_theme_register_header_components');

// Add structured data for SEO
if (!function_exists('lsx_add_product_structured_data')) :
	/**
	 * Add structured data for product pages
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_add_product_structured_data()
	{
		if (is_singular('product')) {
			global $post;

			$price = get_post_meta($post->ID, '_product_price', true);
			$sku = get_post_meta($post->ID, '_product_sku', true);
			$brand_terms = get_the_terms($post->ID, 'brand');
			$brand = 'Luxury Boots'; // Default value

			if ($brand_terms && !is_wp_error($brand_terms) && is_array($brand_terms) && !empty($brand_terms)) {
				$brand = $brand_terms[0]->name;
			}

			$structured_data = array(
				'@context' => 'https://schema.org',
				'@type' => 'Product',
				'name' => get_the_title(),
				'description' => get_the_excerpt(),
				'brand' => array(
					'@type' => 'Brand',
					'name' => $brand
				),
				'offers' => array(
					'@type' => 'Offer',
					'price' => $price,
					'priceCurrency' => 'USD',
					'availability' => 'https://schema.org/InStock'
				)
			);

			if ($sku) {
				$structured_data['sku'] = $sku;
			}

			if (has_post_thumbnail()) {
				$structured_data['image'] = get_the_post_thumbnail_url($post->ID, 'large');
			}

			echo '<script type="application/ld+json">' . json_encode($structured_data) . '</script>';
		}
	}
endif;
add_action('wp_head', 'lsx_add_product_structured_data');

// Product structured data getter function for validation
if (!function_exists('lsx_get_product_structured_data')) :
	/**
	 * Get structured data for a product (for validation and external use)
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @param int $product_id Product post ID
	 * @return array Structured data array
	 */
	function lsx_get_product_structured_data($product_id = null)
	{
		if (!$product_id) {
			$product_id = get_the_ID();
		}

		if (!$product_id || get_post_type($product_id) !== 'product') {
			return array();
		}

		$price = get_post_meta($product_id, '_product_price', true);
		$sku = get_post_meta($product_id, '_product_sku', true);
		$brand_terms = get_the_terms($product_id, 'brand');
		$brand = 'Luxury Boots'; // Default value

		if ($brand_terms && !is_wp_error($brand_terms) && is_array($brand_terms) && !empty($brand_terms)) {
			$brand = $brand_terms[0]->name;
		}

		$structured_data = array(
			'@context' => 'https://schema.org',
			'@type' => 'Product',
			'name' => get_the_title($product_id),
			'description' => get_the_excerpt($product_id),
			'brand' => array(
				'@type' => 'Brand',
				'name' => $brand
			),
			'offers' => array(
				'@type' => 'Offer',
				'price' => $price,
				'priceCurrency' => 'USD',
				'availability' => 'https://schema.org/InStock'
			)
		);

		if ($sku) {
			$structured_data['sku'] = $sku;
		}

		if (has_post_thumbnail($product_id)) {
			$structured_data['image'] = get_the_post_thumbnail_url($product_id, 'large');
		}

		return $structured_data;
	}
endif;

// Enqueues Google Fonts for luxury brand typography.
if (! function_exists('lsx_demo_theme_enqueue_fonts')) :
	/**
	 * Enqueues Google Fonts for luxury brand typography.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_enqueue_fonts()
	{
		wp_enqueue_style(
			'luxury-heels-fonts',
			'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Montserrat:wght@400;500&family=Open+Sans:wght@400;600&display=swap',
			array(),
			null
		);

		// Enqueue luxury product filter styles on product pages
		if (is_singular('product') || is_post_type_archive('product') || is_page_template('archive-product.html')) {
			wp_enqueue_style(
				'luxury-product-filter',
				get_template_directory_uri() . '/assets/css/luxury-product-filter.css',
				array(),
				wp_get_theme()->get('Version')
			);
		}

		// Enqueue designer boots e-commerce styles on designer boot pages
		if (is_singular('designer_boot') || is_post_type_archive('designer_boot')) {
			wp_enqueue_style(
				'designer-boots-ecommerce',
				get_template_directory_uri() . '/assets/css/designer-boots-ecommerce.css',
				array(),
				wp_get_theme()->get('Version')
			);
		}
	}
endif;
add_action('wp_enqueue_scripts', 'lsx_demo_theme_enqueue_fonts');

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

		register_block_pattern_category(
			'lsx_demo_theme_luxury',
			array(
				'label'       => __('Luxury', 'lsx-demo-theme'),
				'description' => __('Luxury brand patterns for high-end product showcasing.', 'lsx-demo-theme'),
			)
		);

		register_block_pattern_category(
			'lsx_demo_theme_product',
			array(
				'label'       => __('Product', 'lsx-demo-theme'),
				'description' => __('Product showcase patterns and layouts.', 'lsx-demo-theme'),
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

// Registers designer boot post type according to luxury-boots-catalog.md specification.
if (! function_exists('lbc_register_designer_boot_post_type')) :
	/**
	 * Registers the designer_boot custom post type.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lbc_register_designer_boot_post_type()
	{
		$labels = array(
			'name'                     => _x('Designer Boots', 'Post type general name', 'lbc'),
			'singular_name'            => _x('Designer Boot', 'Post type singular name', 'lbc'),
			'menu_name'                => _x('Designer Boots', 'Admin Menu text', 'lbc'),
			'name_admin_bar'           => _x('Designer Boot', 'Add New on Toolbar', 'lbc'),
			'add_new'                  => __('Add New', 'lbc'),
			'add_new_item'             => __('Add New Designer Boot', 'lbc'),
			'new_item'                 => __('New Designer Boot', 'lbc'),
			'edit_item'                => __('Edit Designer Boot', 'lbc'),
			'view_item'                => __('View Designer Boot', 'lbc'),
			'all_items'                => __('All Designer Boots', 'lbc'),
			'search_items'             => __('Search Designer Boots', 'lbc'),
			'parent_item_colon'        => __('Parent Designer Boots:', 'lbc'),
			'not_found'                => __('No designer boots found.', 'lbc'),
			'not_found_in_trash'       => __('No designer boots found in Trash.', 'lbc'),
			'featured_image'           => _x('Boot Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'lbc'),
			'set_featured_image'       => _x('Set cover image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'lbc'),
			'remove_featured_image'    => _x('Remove cover image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'lbc'),
			'use_featured_image'       => _x('Use as cover image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'lbc'),
			'archives'                 => _x('Designer Boot archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'lbc'),
			'insert_into_item'         => _x('Insert into designer boot', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'lbc'),
			'uploaded_to_this_item'    => _x('Uploaded to this designer boot', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'lbc'),
			'filter_items_list'        => _x('Filter designer boots list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'lbc'),
			'items_list_navigation'    => _x('Designer Boots list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'lbc'),
			'items_list'               => _x('Designer Boots list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'lbc'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'designer-boots'),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-universal-access',
			'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions'),
			'show_in_graphql'    => true,
			'graphql_single_name' => 'designerBoot',
			'graphql_plural_name' => 'designerBoots',
		);

		register_post_type('designer_boot', $args);

		// Flush rewrite rules on theme activation (development only)
		if (defined('WP_DEBUG') && WP_DEBUG && !get_option('lsx_rewrite_rules_flushed')) {
			flush_rewrite_rules();
			update_option('lsx_rewrite_rules_flushed', true);
		}
	}
endif;
add_action('init', 'lbc_register_designer_boot_post_type', 5); // Early priority

// Taxonomies registered in /inc/designer-boot-taxonomies.php
// Designer boot taxonomies are registered in /inc/designer-boot-taxonomies.php

// Register custom fields for designer boots
if (!function_exists('lbc_add_designer_boot_meta_boxes')) :
	/**
	 * Add custom meta boxes for designer boot fields
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lbc_add_designer_boot_meta_boxes()
	{
		add_meta_box(
			'lbc-boot-details',
			__('Boot Details', 'lbc'),
			'lbc_render_boot_details_meta_box',
			'designer_boot',
			'normal',
			'high'
		);

		add_meta_box(
			'lbc-boot-images',
			__('Additional Images', 'lbc'),
			'lbc_render_boot_images_meta_box',
			'designer_boot',
			'normal',
			'high'
		);

		add_meta_box(
			'lbc-boot-specs',
			__('Technical Specifications', 'lbc'),
			'lbc_render_boot_specs_meta_box',
			'designer_boot',
			'side',
			'default'
		);
	}
endif;
add_action('add_meta_boxes', 'lbc_add_designer_boot_meta_boxes');

// Registers reusable header component block patterns.
if (! function_exists('lsx_demo_theme_register_header_components')) :
	/**
	 * Registers reusable header component block patterns.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_register_header_components()
	{
		register_block_pattern_category(
			'lsx_demo_theme_header_components',
			array(
				'label'       => __('Header Components', 'lsx-demo-theme'),
				'description' => __('Reusable header components with different layouts and styles.', 'lsx-demo-theme'),
			)
		);
	}
endif;
add_action('init', 'lsx_demo_theme_register_header_components');

// Add theme support for post thumbnails and image sizes
if (!function_exists('lsx_theme_image_setup')) :
	function lsx_theme_image_setup()
	{
		add_theme_support('post-thumbnails');
		add_image_size('product-thumbnail', 400, 500, true);
		add_image_size('product-large', 800, 1000, true);
		add_image_size('product-gallery', 600, 750, true);
	}
endif;
add_action('after_setup_theme', 'lsx_theme_image_setup');

// Force create sample products for validation (development only)
if (!function_exists('lsx_force_create_sample_products')) :
	/**
	 * Force create sample products - for development/validation only
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_force_create_sample_products()
	{
		if (defined('WP_DEBUG') && WP_DEBUG) {
			// Reset the flag to allow recreation
			delete_option('luxury_sample_products_created');

			// Also reset rewrite rules flag to ensure proper URL structure
			delete_option('lsx_rewrite_rules_flushed');

			// Trigger sample product creation
			if (class_exists('LuxuryBootSampleData')) {
				$sample_data = new LuxuryBootSampleData();
				$sample_data->maybe_create_sample_products();
			}

			// Force flush rewrite rules
			flush_rewrite_rules(false);
		}
	}
endif;
add_action('init', 'lsx_force_create_sample_products', 999);
// Force front page template hierarchy for luxury homepage
if (!function_exists('lsx_force_front_page_template')) :
	/**
	 * Force front-page.html template to be used on homepage
	 * regardless of WordPress reading settings
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @param string $template Template path
	 * @return string Modified template path
	 */
	function lsx_force_front_page_template($template)
	{
		// Only apply on the front page
		if (is_front_page() && is_home()) {
			// Look for front-page.html template
			$front_page_template = locate_template(array('front-page.html'));
			if ($front_page_template) {
				return $front_page_template;
			}
		}
		return $template;
	}
endif;
add_filter('template_include', 'lsx_force_front_page_template', 99);

// Ensure front page displays static content, not posts
if (!function_exists('lsx_set_homepage_reading_settings')) :
	/**
	 * Programmatically set reading settings to show static front page
	 * and create homepage if needed
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_set_homepage_reading_settings()
	{
		// Only run once and only if not already set
		if (!get_option('lsx_homepage_settings_applied')) {
			// Check if there's already a front page set
			$front_page_id = get_option('page_on_front');

			// If no front page exists, create one
			if (!$front_page_id || !get_post($front_page_id)) {
				$homepage = array(
					'post_title'    => 'Home',
					'post_content'  => '<!-- wp:pattern {"slug":"lsx-demo-theme/luxury-homepage"} /-->',
					'post_status'   => 'publish',
					'post_type'     => 'page',
					'post_name'     => 'home'
				);

				$front_page_id = wp_insert_post($homepage);

				// Set this page as the front page
				if ($front_page_id && !is_wp_error($front_page_id)) {
					update_option('page_on_front', $front_page_id);
				}
			}

			// Set front page to show static page (not posts)
			update_option('show_on_front', 'page');

			// Create a blog page if one doesn't exist
			$blog_page_id = get_option('page_for_posts');
			if (!$blog_page_id || !get_post($blog_page_id)) {
				$blogpage = array(
					'post_title'    => 'Blog',
					'post_content'  => '',
					'post_status'   => 'publish',
					'post_type'     => 'page',
					'post_name'     => 'blog'
				);

				$blog_page_id = wp_insert_post($blogpage);

				// Set this page as the posts page
				if ($blog_page_id && !is_wp_error($blog_page_id)) {
					update_option('page_for_posts', $blog_page_id);
				}
			}

			// Set the reading settings flag
			update_option('lsx_homepage_settings_applied', true);

			// Flush rewrite rules to ensure proper routing
			flush_rewrite_rules(false);
		}
	}
endif;
add_action('after_setup_theme', 'lsx_set_homepage_reading_settings'); // Manual system reset for development
if (!function_exists('lsx_force_system_reset')) :
	/**
	 * Force complete system reset - accessible via URL parameter
	 */
	function lsx_force_system_reset()
	{
		if (defined('WP_DEBUG') && WP_DEBUG && isset($_GET['lsx_reset']) && current_user_can('administrator')) {
			// Clear all flags
			delete_option('luxury_sample_products_created');
			delete_option('lsx_rewrite_rules_flushed');
			delete_option('lsx_homepage_settings_applied');

			// Force recreation
			lsx_force_create_sample_products();

			// Redirect to remove the parameter
			wp_redirect(remove_query_arg('lsx_reset'));
			exit;
		}
	}
endif;
add_action('init', 'lsx_force_system_reset', 1);

// Ensure PHP processing in block theme template parts
if (!function_exists('lsx_process_php_in_templates')) :
	/**
	 * Process PHP code in block theme templates and template parts
	 * Fixes issue where PHP gets converted to HTML comments
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @param string $content Template content
	 * @return string Processed content
	 */
	function lsx_process_php_in_templates($content)
	{
		// Only process if content contains PHP-like patterns
		if (strpos($content, '<?php') !== false || strpos($content, '<!--?php') !== false) {
			// Fix corrupted PHP tags that became HTML comments
			$content = str_replace('<!--?php', '<?php', $content);
			$content = str_replace('?-->', '?>', $content);

			// Ensure proper PHP processing
			ob_start();
			eval('?>' . $content);
			$processed_content = ob_get_clean();

			// If eval fails, return original content
			if ($processed_content === false) {
				return $content;
			}

			return $processed_content;
		}

		return $content;
	}
endif;

// Hook into template part rendering
add_filter('render_block_core/template-part', 'lsx_process_php_in_templates', 10, 1);
add_filter('render_block', function ($block_content, $block) {
	if ($block['blockName'] === 'core/template-part') {
		return lsx_process_php_in_templates($block_content);
	}
	return $block_content;
}, 10, 2);
