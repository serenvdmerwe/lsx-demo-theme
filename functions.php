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

// Registers shoes custom post type.
if (! function_exists('lsx_demo_theme_register_shoes_post_type')) :
	/**
	 * Registers the shoes custom post type.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_register_shoes_post_type()
	{
		$labels = array(
			'name'                     => _x('Products', 'Post type general name', 'lsx-demo-theme'),
			'singular_name'            => _x('Product', 'Post type singular name', 'lsx-demo-theme'),
			'menu_name'                => _x('Products', 'Admin Menu text', 'lsx-demo-theme'),
			'name_admin_bar'           => _x('Product', 'Add New on Toolbar', 'lsx-demo-theme'),
			'add_new'                  => __('Add New', 'lsx-demo-theme'),
			'add_new_item'             => __('Add New Product', 'lsx-demo-theme'),
			'new_item'                 => __('New Product', 'lsx-demo-theme'),
			'edit_item'                => __('Edit Product', 'lsx-demo-theme'),
			'view_item'                => __('View Product', 'lsx-demo-theme'),
			'all_items'                => __('All Products', 'lsx-demo-theme'),
			'search_items'             => __('Search Products', 'lsx-demo-theme'),
			'parent_item_colon'        => __('Parent Products:', 'lsx-demo-theme'),
			'not_found'                => __('No products found.', 'lsx-demo-theme'),
			'not_found_in_trash'       => __('No products found in Trash.', 'lsx-demo-theme'),
			'featured_image'           => _x('Product Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'lsx-demo-theme'),
			'set_featured_image'       => _x('Set cover image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'lsx-demo-theme'),
			'remove_featured_image'    => _x('Remove cover image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'lsx-demo-theme'),
			'use_featured_image'       => _x('Use as cover image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'lsx-demo-theme'),
			'archives'                 => _x('Product archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'lsx-demo-theme'),
			'insert_into_item'         => _x('Insert into product', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'lsx-demo-theme'),
			'uploaded_to_this_item'    => _x('Uploaded to this product', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'lsx-demo-theme'),
			'filter_items_list'        => _x('Filter products list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'lsx-demo-theme'),
			'items_list_navigation'    => _x('Products list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'lsx-demo-theme'),
			'items_list'               => _x('Products list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'lsx-demo-theme'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'product'),
			'capability_type'    => 'post',
			'has_archive'        => 'shop',
			'hierarchical'       => false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-products',
			'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
			'show_in_graphql'    => true,
			'graphql_single_name' => 'product',
			'graphql_plural_name' => 'products',
		);

		register_post_type('product', $args);

		// Flush rewrite rules on theme activation (development only)
		if (defined('WP_DEBUG') && WP_DEBUG && !get_option('lsx_rewrite_rules_flushed')) {
			flush_rewrite_rules();
			update_option('lsx_rewrite_rules_flushed', true);
		}
	}
endif;
add_action('init', 'lsx_demo_theme_register_shoes_post_type', 5); // Early priority

// Registers shoes taxonomies.
if (! function_exists('lsx_demo_theme_register_shoes_taxonomies')) :
	/**
	 * Registers custom taxonomies for the shoes post type.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_register_shoes_taxonomies()
	{
		// Heel Height taxonomy (as per luxury brief specifications)
		$heel_height_labels = array(
			'name'                       => _x('Heel Heights', 'Taxonomy General Name', 'lsx-demo-theme'),
			'singular_name'              => _x('Heel Height', 'Taxonomy Singular Name', 'lsx-demo-theme'),
			'menu_name'                  => __('Heel Heights', 'lsx-demo-theme'),
			'all_items'                  => __('All Heel Heights', 'lsx-demo-theme'),
			'parent_item'                => __('Parent Heel Height', 'lsx-demo-theme'),
			'parent_item_colon'          => __('Parent Heel Height:', 'lsx-demo-theme'),
			'new_item_name'              => __('New Heel Height Name', 'lsx-demo-theme'),
			'add_new_item'               => __('Add New Heel Height', 'lsx-demo-theme'),
			'edit_item'                  => __('Edit Heel Height', 'lsx-demo-theme'),
			'update_item'                => __('Update Heel Height', 'lsx-demo-theme'),
			'view_item'                  => __('View Heel Height', 'lsx-demo-theme'),
			'separate_items_with_commas' => __('Separate heel heights with commas', 'lsx-demo-theme'),
			'add_or_remove_items'        => __('Add or remove heel heights', 'lsx-demo-theme'),
			'choose_from_most_used'      => __('Choose from the most used', 'lsx-demo-theme'),
			'popular_items'              => __('Popular Heel Heights', 'lsx-demo-theme'),
			'search_items'               => __('Search Heel Heights', 'lsx-demo-theme'),
			'not_found'                  => __('Not Found', 'lsx-demo-theme'),
			'no_terms'                   => __('No heel heights', 'lsx-demo-theme'),
			'items_list'                 => __('Heel Heights list', 'lsx-demo-theme'),
			'items_list_navigation'      => __('Heel Heights list navigation', 'lsx-demo-theme'),
		);

		$heel_height_args = array(
			'labels'                     => $heel_height_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array('slug' => 'heel-height'),
			'show_in_graphql'            => true,
			'graphql_single_name'        => 'heelHeight',
			'graphql_plural_name'        => 'heelHeights',
		);

		register_taxonomy('heel_height', array('product'), $heel_height_args);

		// Material taxonomy (as per luxury brief specifications)
		$material_labels = array(
			'name'                       => _x('Materials', 'Taxonomy General Name', 'lsx-demo-theme'),
			'singular_name'              => _x('Material', 'Taxonomy Singular Name', 'lsx-demo-theme'),
			'menu_name'                  => __('Materials', 'lsx-demo-theme'),
			'all_items'                  => __('All Materials', 'lsx-demo-theme'),
			'parent_item'                => __('Parent Material', 'lsx-demo-theme'),
			'parent_item_colon'          => __('Parent Material:', 'lsx-demo-theme'),
			'new_item_name'              => __('New Material Name', 'lsx-demo-theme'),
			'add_new_item'               => __('Add New Material', 'lsx-demo-theme'),
			'edit_item'                  => __('Edit Material', 'lsx-demo-theme'),
			'update_item'                => __('Update Material', 'lsx-demo-theme'),
			'view_item'                  => __('View Material', 'lsx-demo-theme'),
			'separate_items_with_commas' => __('Separate materials with commas', 'lsx-demo-theme'),
			'add_or_remove_items'        => __('Add or remove materials', 'lsx-demo-theme'),
			'choose_from_most_used'      => __('Choose from the most used', 'lsx-demo-theme'),
			'popular_items'              => __('Popular Materials', 'lsx-demo-theme'),
			'search_items'               => __('Search Materials', 'lsx-demo-theme'),
			'not_found'                  => __('Not Found', 'lsx-demo-theme'),
			'no_terms'                   => __('No materials', 'lsx-demo-theme'),
			'items_list'                 => __('Materials list', 'lsx-demo-theme'),
			'items_list_navigation'      => __('Materials list navigation', 'lsx-demo-theme'),
		);

		$material_args = array(
			'labels'                     => $material_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array('slug' => 'material'),
		);

		register_taxonomy('material', array('product'), $material_args);

		// Finish taxonomy
		$finish_labels = array(
			'name'                       => _x('Finishes', 'Taxonomy General Name', 'lsx-demo-theme'),
			'singular_name'              => _x('Finish', 'Taxonomy Singular Name', 'lsx-demo-theme'),
			'menu_name'                  => __('Finishes', 'lsx-demo-theme'),
			'all_items'                  => __('All Finishes', 'lsx-demo-theme'),
			'new_item_name'              => __('New Finish Name', 'lsx-demo-theme'),
			'add_new_item'               => __('Add New Finish', 'lsx-demo-theme'),
			'edit_item'                  => __('Edit Finish', 'lsx-demo-theme'),
			'update_item'                => __('Update Finish', 'lsx-demo-theme'),
			'view_item'                  => __('View Finish', 'lsx-demo-theme'),
			'search_items'               => __('Search Finishes', 'lsx-demo-theme'),
			'not_found'                  => __('Not Found', 'lsx-demo-theme'),
			'no_terms'                   => __('No finishes', 'lsx-demo-theme'),
			'items_list'                 => __('Finishes list', 'lsx-demo-theme'),
			'items_list_navigation'      => __('Finishes list navigation', 'lsx-demo-theme'),
		);

		$finish_args = array(
			'labels'                     => $finish_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array('slug' => 'finish'),
		);

		register_taxonomy('finish', array('product'), $finish_args);

		// Collection taxonomy (hierarchical for luxury product lines)
		$collection_labels = array(
			'name'                       => _x('Collections', 'Taxonomy General Name', 'lsx-demo-theme'),
			'singular_name'              => _x('Collection', 'Taxonomy Singular Name', 'lsx-demo-theme'),
			'menu_name'                  => __('Collections', 'lsx-demo-theme'),
			'all_items'                  => __('All Collections', 'lsx-demo-theme'),
			'parent_item'                => __('Parent Collection', 'lsx-demo-theme'),
			'parent_item_colon'          => __('Parent Collection:', 'lsx-demo-theme'),
			'new_item_name'              => __('New Collection Name', 'lsx-demo-theme'),
			'add_new_item'               => __('Add New Collection', 'lsx-demo-theme'),
			'edit_item'                  => __('Edit Collection', 'lsx-demo-theme'),
			'update_item'                => __('Update Collection', 'lsx-demo-theme'),
			'view_item'                  => __('View Collection', 'lsx-demo-theme'),
			'separate_items_with_commas' => __('Separate collections with commas', 'lsx-demo-theme'),
			'add_or_remove_items'        => __('Add or remove collections', 'lsx-demo-theme'),
			'choose_from_most_used'      => __('Choose from the most used', 'lsx-demo-theme'),
			'popular_items'              => __('Popular Collections', 'lsx-demo-theme'),
			'search_items'               => __('Search Collections', 'lsx-demo-theme'),
			'not_found'                  => __('Not Found', 'lsx-demo-theme'),
			'no_terms'                   => __('No collections', 'lsx-demo-theme'),
			'items_list'                 => __('Collections list', 'lsx-demo-theme'),
			'items_list_navigation'      => __('Collections list navigation', 'lsx-demo-theme'),
		);

		$collection_args = array(
			'labels'                     => $collection_labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array('slug' => 'collection'),
			'show_in_graphql'            => true,
			'graphql_single_name'        => 'collection',
			'graphql_plural_name'        => 'collections',
		);

		register_taxonomy('collection', array('product'), $collection_args);

		// Brand taxonomy
		$brand_labels = array(
			'name'                       => _x('Brands', 'Taxonomy General Name', 'lsx-demo-theme'),
			'singular_name'              => _x('Brand', 'Taxonomy Singular Name', 'lsx-demo-theme'),
			'menu_name'                  => __('Brands', 'lsx-demo-theme'),
			'all_items'                  => __('All Brands', 'lsx-demo-theme'),
			'new_item_name'              => __('New Brand Name', 'lsx-demo-theme'),
			'add_new_item'               => __('Add New Brand', 'lsx-demo-theme'),
			'edit_item'                  => __('Edit Brand', 'lsx-demo-theme'),
			'update_item'                => __('Update Brand', 'lsx-demo-theme'),
			'view_item'                  => __('View Brand', 'lsx-demo-theme'),
			'search_items'               => __('Search Brands', 'lsx-demo-theme'),
			'not_found'                  => __('Not Found', 'lsx-demo-theme'),
			'no_terms'                   => __('No brands', 'lsx-demo-theme'),
			'items_list'                 => __('Brands list', 'lsx-demo-theme'),
			'items_list_navigation'      => __('Brands list navigation', 'lsx-demo-theme'),
		);

		$brand_args = array(
			'labels'                     => $brand_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array('slug' => 'brand'),
			'show_in_graphql'            => true,
			'graphql_single_name'        => 'brand',
			'graphql_plural_name'        => 'brands',
		);

		register_taxonomy('brand', array('product'), $brand_args);

		// Country taxonomy
		$country_labels = array(
			'name'                       => _x('Countries', 'Taxonomy General Name', 'lsx-demo-theme'),
			'singular_name'              => _x('Country', 'Taxonomy Singular Name', 'lsx-demo-theme'),
			'menu_name'                  => __('Countries', 'lsx-demo-theme'),
			'all_items'                  => __('All Countries', 'lsx-demo-theme'),
			'new_item_name'              => __('New Country Name', 'lsx-demo-theme'),
			'add_new_item'               => __('Add New Country', 'lsx-demo-theme'),
			'edit_item'                  => __('Edit Country', 'lsx-demo-theme'),
			'update_item'                => __('Update Country', 'lsx-demo-theme'),
			'view_item'                  => __('View Country', 'lsx-demo-theme'),
			'search_items'               => __('Search Countries', 'lsx-demo-theme'),
			'not_found'                  => __('Not Found', 'lsx-demo-theme'),
			'no_terms'                   => __('No countries', 'lsx-demo-theme'),
			'items_list'                 => __('Countries list', 'lsx-demo-theme'),
			'items_list_navigation'      => __('Countries list navigation', 'lsx-demo-theme'),
		);

		$country_args = array(
			'labels'                     => $country_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array('slug' => 'country'),
		);

		register_taxonomy('country', array('product'), $country_args);

		// Color taxonomy
		$color_labels = array(
			'name'                       => _x('Colors', 'Taxonomy General Name', 'lsx-demo-theme'),
			'singular_name'              => _x('Color', 'Taxonomy Singular Name', 'lsx-demo-theme'),
			'menu_name'                  => __('Colors', 'lsx-demo-theme'),
			'all_items'                  => __('All Colors', 'lsx-demo-theme'),
			'new_item_name'              => __('New Color Name', 'lsx-demo-theme'),
			'add_new_item'               => __('Add New Color', 'lsx-demo-theme'),
			'edit_item'                  => __('Edit Color', 'lsx-demo-theme'),
			'update_item'                => __('Update Color', 'lsx-demo-theme'),
			'view_item'                  => __('View Color', 'lsx-demo-theme'),
			'search_items'               => __('Search Colors', 'lsx-demo-theme'),
			'not_found'                  => __('Not Found', 'lsx-demo-theme'),
			'no_terms'                   => __('No colors', 'lsx-demo-theme'),
			'items_list'                 => __('Colors list', 'lsx-demo-theme'),
			'items_list_navigation'      => __('Colors list navigation', 'lsx-demo-theme'),
		);

		$color_args = array(
			'labels'                     => $color_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array('slug' => 'color'),
		);

		register_taxonomy('color', array('product'), $color_args);

		// Silhouette taxonomy
		$silhouette_labels = array(
			'name'                       => _x('Silhouettes', 'Taxonomy General Name', 'lsx-demo-theme'),
			'singular_name'              => _x('Silhouette', 'Taxonomy Singular Name', 'lsx-demo-theme'),
			'menu_name'                  => __('Silhouettes', 'lsx-demo-theme'),
			'all_items'                  => __('All Silhouettes', 'lsx-demo-theme'),
			'new_item_name'              => __('New Silhouette Name', 'lsx-demo-theme'),
			'add_new_item'               => __('Add New Silhouette', 'lsx-demo-theme'),
			'edit_item'                  => __('Edit Silhouette', 'lsx-demo-theme'),
			'update_item'                => __('Update Silhouette', 'lsx-demo-theme'),
			'view_item'                  => __('View Silhouette', 'lsx-demo-theme'),
			'search_items'               => __('Search Silhouettes', 'lsx-demo-theme'),
			'not_found'                  => __('Not Found', 'lsx-demo-theme'),
			'no_terms'                   => __('No silhouettes', 'lsx-demo-theme'),
			'items_list'                 => __('Silhouettes list', 'lsx-demo-theme'),
			'items_list_navigation'      => __('Silhouettes list navigation', 'lsx-demo-theme'),
		);

		$silhouette_args = array(
			'labels'                     => $silhouette_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array('slug' => 'silhouette'),
		);

		register_taxonomy('silhouette', array('product'), $silhouette_args);

		// Closure taxonomy
		$closure_labels = array(
			'name'                       => _x('Closures', 'Taxonomy General Name', 'lsx-demo-theme'),
			'singular_name'              => _x('Closure', 'Taxonomy Singular Name', 'lsx-demo-theme'),
			'menu_name'                  => __('Closures', 'lsx-demo-theme'),
			'all_items'                  => __('All Closures', 'lsx-demo-theme'),
			'new_item_name'              => __('New Closure Name', 'lsx-demo-theme'),
			'add_new_item'               => __('Add New Closure', 'lsx-demo-theme'),
			'edit_item'                  => __('Edit Closure', 'lsx-demo-theme'),
			'update_item'                => __('Update Closure', 'lsx-demo-theme'),
			'view_item'                  => __('View Closure', 'lsx-demo-theme'),
			'search_items'               => __('Search Closures', 'lsx-demo-theme'),
			'not_found'                  => __('Not Found', 'lsx-demo-theme'),
			'no_terms'                   => __('No closures', 'lsx-demo-theme'),
			'items_list'                 => __('Closures list', 'lsx-demo-theme'),
			'items_list_navigation'      => __('Closures list navigation', 'lsx-demo-theme'),
		);

		$closure_args = array(
			'labels'                     => $closure_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array('slug' => 'closure'),
		);

		register_taxonomy('closure', array('product'), $closure_args);
	}
endif;
add_action('init', 'lsx_demo_theme_register_shoes_taxonomies', 10); // After post type

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
add_action('init', 'lsx_force_create_sample_products', 999); // Very late priority to ensure everything is registered

// Manual system reset for development
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

			// Force recreation
			lsx_force_create_sample_products();

			// Redirect to remove the parameter
			wp_redirect(remove_query_arg('lsx_reset'));
			exit;
		}
	}
endif;
add_action('init', 'lsx_force_system_reset', 1);
