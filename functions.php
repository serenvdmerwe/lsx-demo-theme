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
if ( ! function_exists( 'lsx_demo_theme_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'lsx_demo_theme_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'lsx_demo_theme_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_editor_style() {
		add_editor_style( get_parent_theme_file_uri( 'assets/css/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'lsx_demo_theme_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'lsx_demo_theme_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_enqueue_styles() {
		wp_enqueue_style(
			'lsx-demo-theme-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'lsx_demo_theme_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'lsx_demo_theme_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'lsx-demo-theme' ),
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
add_action( 'init', 'lsx_demo_theme_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'lsx_demo_theme_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_pattern_categories() {

		register_block_pattern_category(
			'lsx_demo_theme_page',
			array(
				'label'       => __( 'Pages', 'lsx-demo-theme' ),
				'description' => __( 'A collection of full page layouts.', 'lsx-demo-theme' ),
			)
		);

		register_block_pattern_category(
			'lsx_demo_theme_post-format',
			array(
				'label'       => __( 'Post formats', 'lsx-demo-theme' ),
				'description' => __( 'A collection of post format patterns.', 'lsx-demo-theme' ),
			)
		);

		register_block_pattern_category(
			'lsx_demo_theme_pricing',
			array(
				'label'       => __( 'Pricing', 'lsx-demo-theme' ),
				'description' => __( 'A collection of pricing table patterns and layouts.', 'lsx-demo-theme' ),
			)
		);
	}
endif;
add_action( 'init', 'lsx_demo_theme_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'lsx_demo_theme_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_register_block_bindings() {
		register_block_bindings_source(
			'lsx-demo-theme/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'lsx-demo-theme' ),
				'get_value_callback' => 'lsx_demo_theme_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'lsx_demo_theme_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'lsx_demo_theme_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function lsx_demo_theme_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;

// Registers shoes custom post type.
if ( ! function_exists( 'lsx_demo_theme_register_shoes_post_type' ) ) :
	/**
	 * Registers the shoes custom post type.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_register_shoes_post_type() {
		$labels = array(
			'name'                     => _x( 'Shoes', 'Post type general name', 'lsx-demo-theme' ),
			'singular_name'            => _x( 'Shoe', 'Post type singular name', 'lsx-demo-theme' ),
			'menu_name'                => _x( 'Shoes', 'Admin Menu text', 'lsx-demo-theme' ),
			'name_admin_bar'           => _x( 'Shoe', 'Add New on Toolbar', 'lsx-demo-theme' ),
			'add_new'                  => __( 'Add New', 'lsx-demo-theme' ),
			'add_new_item'             => __( 'Add New Shoe', 'lsx-demo-theme' ),
			'new_item'                 => __( 'New Shoe', 'lsx-demo-theme' ),
			'edit_item'                => __( 'Edit Shoe', 'lsx-demo-theme' ),
			'view_item'                => __( 'View Shoe', 'lsx-demo-theme' ),
			'all_items'                => __( 'All Shoes', 'lsx-demo-theme' ),
			'search_items'             => __( 'Search Shoes', 'lsx-demo-theme' ),
			'parent_item_colon'        => __( 'Parent Shoes:', 'lsx-demo-theme' ),
			'not_found'                => __( 'No shoes found.', 'lsx-demo-theme' ),
			'not_found_in_trash'       => __( 'No shoes found in Trash.', 'lsx-demo-theme' ),
			'featured_image'           => _x( 'Shoe Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'lsx-demo-theme' ),
			'set_featured_image'       => _x( 'Set cover image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'lsx-demo-theme' ),
			'remove_featured_image'    => _x( 'Remove cover image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'lsx-demo-theme' ),
			'use_featured_image'       => _x( 'Use as cover image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'lsx-demo-theme' ),
			'archives'                 => _x( 'Shoe archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'lsx-demo-theme' ),
			'insert_into_item'         => _x( 'Insert into shoe', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'lsx-demo-theme' ),
			'uploaded_to_this_item'    => _x( 'Uploaded to this shoe', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'lsx-demo-theme' ),
			'filter_items_list'        => _x( 'Filter shoes list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'lsx-demo-theme' ),
			'items_list_navigation'    => _x( 'Shoes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'lsx-demo-theme' ),
			'items_list'               => _x( 'Shoes list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'lsx-demo-theme' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'shoes' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-products',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' ),
			'taxonomies'         => array( 'category', 'post_tag' ),
			'show_in_graphql'    => true,
			'graphql_single_name' => 'shoe',
			'graphql_plural_name' => 'shoes',
		);

		register_post_type( 'shoes', $args );
	}
endif;
add_action( 'init', 'lsx_demo_theme_register_shoes_post_type' );

// Registers shoes taxonomies.
if ( ! function_exists( 'lsx_demo_theme_register_shoes_taxonomies' ) ) :
	/**
	 * Registers custom taxonomies for the shoes post type.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_register_shoes_taxonomies() {
		// Shoe Brand taxonomy
		$brand_labels = array(
			'name'                       => _x( 'Shoe Brands', 'Taxonomy General Name', 'lsx-demo-theme' ),
			'singular_name'              => _x( 'Shoe Brand', 'Taxonomy Singular Name', 'lsx-demo-theme' ),
			'menu_name'                  => __( 'Brands', 'lsx-demo-theme' ),
			'all_items'                  => __( 'All Brands', 'lsx-demo-theme' ),
			'parent_item'                => __( 'Parent Brand', 'lsx-demo-theme' ),
			'parent_item_colon'          => __( 'Parent Brand:', 'lsx-demo-theme' ),
			'new_item_name'              => __( 'New Brand Name', 'lsx-demo-theme' ),
			'add_new_item'               => __( 'Add New Brand', 'lsx-demo-theme' ),
			'edit_item'                  => __( 'Edit Brand', 'lsx-demo-theme' ),
			'update_item'                => __( 'Update Brand', 'lsx-demo-theme' ),
			'view_item'                  => __( 'View Brand', 'lsx-demo-theme' ),
			'separate_items_with_commas' => __( 'Separate brands with commas', 'lsx-demo-theme' ),
			'add_or_remove_items'        => __( 'Add or remove brands', 'lsx-demo-theme' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'lsx-demo-theme' ),
			'popular_items'              => __( 'Popular Brands', 'lsx-demo-theme' ),
			'search_items'               => __( 'Search Brands', 'lsx-demo-theme' ),
			'not_found'                  => __( 'Not Found', 'lsx-demo-theme' ),
			'no_terms'                   => __( 'No brands', 'lsx-demo-theme' ),
			'items_list'                 => __( 'Brands list', 'lsx-demo-theme' ),
			'items_list_navigation'      => __( 'Brands list navigation', 'lsx-demo-theme' ),
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
			'rewrite'                    => array( 'slug' => 'shoe-brand' ),
			'show_in_graphql'            => true,
			'graphql_single_name'        => 'shoeBrand',
			'graphql_plural_name'        => 'shoeBrands',
		);

		register_taxonomy( 'shoe_brand', array( 'shoes' ), $brand_args );

		// Shoe Size taxonomy
		$size_labels = array(
			'name'                       => _x( 'Shoe Sizes', 'Taxonomy General Name', 'lsx-demo-theme' ),
			'singular_name'              => _x( 'Shoe Size', 'Taxonomy Singular Name', 'lsx-demo-theme' ),
			'menu_name'                  => __( 'Sizes', 'lsx-demo-theme' ),
			'all_items'                  => __( 'All Sizes', 'lsx-demo-theme' ),
			'parent_item'                => __( 'Parent Size', 'lsx-demo-theme' ),
			'parent_item_colon'          => __( 'Parent Size:', 'lsx-demo-theme' ),
			'new_item_name'              => __( 'New Size Name', 'lsx-demo-theme' ),
			'add_new_item'               => __( 'Add New Size', 'lsx-demo-theme' ),
			'edit_item'                  => __( 'Edit Size', 'lsx-demo-theme' ),
			'update_item'                => __( 'Update Size', 'lsx-demo-theme' ),
			'view_item'                  => __( 'View Size', 'lsx-demo-theme' ),
			'separate_items_with_commas' => __( 'Separate sizes with commas', 'lsx-demo-theme' ),
			'add_or_remove_items'        => __( 'Add or remove sizes', 'lsx-demo-theme' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'lsx-demo-theme' ),
			'popular_items'              => __( 'Popular Sizes', 'lsx-demo-theme' ),
			'search_items'               => __( 'Search Sizes', 'lsx-demo-theme' ),
			'not_found'                  => __( 'Not Found', 'lsx-demo-theme' ),
			'no_terms'                   => __( 'No sizes', 'lsx-demo-theme' ),
			'items_list'                 => __( 'Sizes list', 'lsx-demo-theme' ),
			'items_list_navigation'      => __( 'Sizes list navigation', 'lsx-demo-theme' ),
		);

		$size_args = array(
			'labels'                     => $size_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array( 'slug' => 'shoe-size' ),
			'show_in_graphql'            => true,
			'graphql_single_name'        => 'shoeSize',
			'graphql_plural_name'        => 'shoeSizes',
		);

		register_taxonomy( 'shoe_size', array( 'shoes' ), $size_args );

		// Shoe Type taxonomy (hierarchical like categories)
		$type_labels = array(
			'name'                       => _x( 'Shoe Types', 'Taxonomy General Name', 'lsx-demo-theme' ),
			'singular_name'              => _x( 'Shoe Type', 'Taxonomy Singular Name', 'lsx-demo-theme' ),
			'menu_name'                  => __( 'Types', 'lsx-demo-theme' ),
			'all_items'                  => __( 'All Types', 'lsx-demo-theme' ),
			'parent_item'                => __( 'Parent Type', 'lsx-demo-theme' ),
			'parent_item_colon'          => __( 'Parent Type:', 'lsx-demo-theme' ),
			'new_item_name'              => __( 'New Type Name', 'lsx-demo-theme' ),
			'add_new_item'               => __( 'Add New Type', 'lsx-demo-theme' ),
			'edit_item'                  => __( 'Edit Type', 'lsx-demo-theme' ),
			'update_item'                => __( 'Update Type', 'lsx-demo-theme' ),
			'view_item'                  => __( 'View Type', 'lsx-demo-theme' ),
			'separate_items_with_commas' => __( 'Separate types with commas', 'lsx-demo-theme' ),
			'add_or_remove_items'        => __( 'Add or remove types', 'lsx-demo-theme' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'lsx-demo-theme' ),
			'popular_items'              => __( 'Popular Types', 'lsx-demo-theme' ),
			'search_items'               => __( 'Search Types', 'lsx-demo-theme' ),
			'not_found'                  => __( 'Not Found', 'lsx-demo-theme' ),
			'no_terms'                   => __( 'No types', 'lsx-demo-theme' ),
			'items_list'                 => __( 'Types list', 'lsx-demo-theme' ),
			'items_list_navigation'      => __( 'Types list navigation', 'lsx-demo-theme' ),
		);

		$type_args = array(
			'labels'                     => $type_labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array( 'slug' => 'shoe-type' ),
			'show_in_graphql'            => true,
			'graphql_single_name'        => 'shoeType',
			'graphql_plural_name'        => 'shoeTypes',
		);

		register_taxonomy( 'shoe_type', array( 'shoes' ), $type_args );
	}
endif;
add_action( 'init', 'lsx_demo_theme_register_shoes_taxonomies' );
