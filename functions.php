<?php

/*
 * Theme functions and definitions.
 *
 * @package lsx-demo-theme
 */

// Define theme version constant
if ( ! defined( 'LSX_DEMO_THEME_VERSION' ) ) {
	define( 'LSX_DEMO_THEME_VERSION', '1.0' );
}

/**
 * Theme setup function.
 */
function lsx_demo_theme_setup() {

	// Add other theme supports
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	// Add support for wide and full alignment
	add_theme_support( 'align-wide' );

	// Add support for editor styles
	add_theme_support( 'editor-styles' );

	// Add support for responsive embeds
	add_theme_support( 'responsive-embeds' );

	// Register navigation menus
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'lsx-demo-theme' ),
		'secondary' => __( 'Secondary Menu', 'lsx-demo-theme' ),
		'footer'    => __( 'Footer Menu', 'lsx-demo-theme' ),
		'mobile'    => __( 'Mobile Menu', 'lsx-demo-theme' ),
	) );
}
add_action( 'after_setup_theme', 'lsx_demo_theme_setup' );

/**
 * Assets enqueues (styles, scripts, fonts).
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
		if (file_exists(get_theme_file_path('assets/css/menu-components.css'))) {
			wp_enqueue_style('lsx-demo-theme-menu-components', get_theme_file_uri('assets/css/menu-components.css'), array('lsx-demo-theme-style'), LSX_DEMO_THEME_VERSION);
		}
		if (file_exists(get_theme_file_path('assets/js/interactions.js'))) {
			wp_enqueue_script('lsx-demo-theme-interactions', get_theme_file_uri('assets/js/interactions.js'), array(), LSX_DEMO_THEME_VERSION, true);
		}
		if (file_exists(get_theme_file_path('assets/js/menu-components.js'))) {
			wp_enqueue_script('lsx-demo-theme-menu-components', get_theme_file_uri('assets/js/menu-components.js'), array(), LSX_DEMO_THEME_VERSION, true);
		}
	}
	add_action('wp_enqueue_scripts', 'lsx_demo_theme_enqueue_assets');
}

/**
 * Registers the "Shoes" custom post type for the theme.
 *
 * @since 1.0
 * @return void
 */
function lsx_demo_theme_shoes_cpt() {
	$labels = array(
		'name'                  => _x( 'Shoes', 'Post Type General Name', 'lsx-demo-theme' ),
		'singular_name'         => _x( 'Shoe', 'Post Type Singular Name', 'lsx-demo-theme' ),
		'menu_name'             => __( 'Shoes', 'lsx-demo-theme' ),
		'name_admin_bar'        => __( 'Shoe', 'lsx-demo-theme' ),
		'archives'              => __( 'Shoe Archives', 'lsx-demo-theme' ),
		'attributes'            => __( 'Shoe Attributes', 'lsx-demo-theme' ),
		'parent_item_colon'     => __( 'Parent Shoe:', 'lsx-demo-theme' ),
		'all_items'             => __( 'All Shoes', 'lsx-demo-theme' ),
		'add_new_item'          => __( 'Add New Shoe', 'lsx-demo-theme' ),
		'add_new'               => __( 'Add New', 'lsx-demo-theme' ),
		'new_item'              => __( 'New Shoe', 'lsx-demo-theme' ),
		'edit_item'             => __( 'Edit Shoe', 'lsx-demo-theme' ),
		'update_item'           => __( 'Update Shoe', 'lsx-demo-theme' ),
		'view_item'             => __( 'View Shoe', 'lsx-demo-theme' ),
		'view_items'            => __( 'View Shoes', 'lsx-demo-theme' ),
		'search_items'          => __( 'Search Shoe', 'lsx-demo-theme' ),
		'not_found'             => __( 'Not found', 'lsx-demo-theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lsx-demo-theme' ),
		'featured_image'        => __( 'Featured Image', 'lsx-demo-theme' ),
		'set_featured_image'    => __( 'Set featured image', 'lsx-demo-theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'lsx-demo-theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'lsx-demo-theme' ),
		'insert_into_item'      => __( 'Insert into shoe', 'lsx-demo-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this shoe', 'lsx-demo-theme' ),
		'items_list'            => __( 'Shoes list', 'lsx-demo-theme' ),
		'items_list_navigation' => __( 'Shoes list navigation', 'lsx-demo-theme' ),
		'filter_items_list'     => __( 'Filter shoes list', 'lsx-demo-theme' ),
	);

	$args = array(
		'label'                 => __( 'Shoe', 'lsx-demo-theme' ),
		'description'           => __( 'Shoes for the demo theme', 'lsx-demo-theme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'taxonomies'            => array( 'shoe_category', 'shoe_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-products',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'shoes',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'               => array(
			'slug'       => 'shoe',
			'with_front' => false,
		),
	);

	register_post_type( 'shoe', $args );
}
add_action( 'init', 'lsx_demo_theme_shoes_cpt', 0 );

/**
 * Register Custom Taxonomies for Shoes.
 */
function lsx_demo_theme_shoes_taxonomies() {
	// Shoe Categories
	$category_labels = array(
		'name'              => _x( 'Shoe Categories', 'taxonomy general name', 'lsx-demo-theme' ),
		'singular_name'     => _x( 'Shoe Category', 'taxonomy singular name', 'lsx-demo-theme' ),
		'search_items'      => __( 'Search Shoe Categories', 'lsx-demo-theme' ),
		'all_items'         => __( 'All Shoe Categories', 'lsx-demo-theme' ),
		'parent_item'       => __( 'Parent Shoe Category', 'lsx-demo-theme' ),
		'parent_item_colon' => __( 'Parent Shoe Category:', 'lsx-demo-theme' ),
		'edit_item'         => __( 'Edit Shoe Category', 'lsx-demo-theme' ),
		'update_item'       => __( 'Update Shoe Category', 'lsx-demo-theme' ),
		'add_new_item'      => __( 'Add New Shoe Category', 'lsx-demo-theme' ),
		'new_item_name'     => __( 'New Shoe Category Name', 'lsx-demo-theme' ),
		'menu_name'         => __( 'Shoe Categories', 'lsx-demo-theme' ),
	);

	$category_args = array(
		'hierarchical'      => true,
		'labels'            => $category_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'shoe-category' ),
		'show_in_rest'      => true,
	);

	register_taxonomy( 'shoe_category', array( 'shoe' ), $category_args );

	// Shoe Tags
	$tag_labels = array(
		'name'                       => _x( 'Shoe Tags', 'taxonomy general name', 'lsx-demo-theme' ),
		'singular_name'              => _x( 'Shoe Tag', 'taxonomy singular name', 'lsx-demo-theme' ),
		'search_items'               => __( 'Search Shoe Tags', 'lsx-demo-theme' ),
		'popular_items'              => __( 'Popular Shoe Tags', 'lsx-demo-theme' ),
		'all_items'                  => __( 'All Shoe Tags', 'lsx-demo-theme' ),
		'edit_item'                  => __( 'Edit Shoe Tag', 'lsx-demo-theme' ),
		'update_item'                => __( 'Update Shoe Tag', 'lsx-demo-theme' ),
		'add_new_item'               => __( 'Add New Shoe Tag', 'lsx-demo-theme' ),
		'new_item_name'              => __( 'New Shoe Tag Name', 'lsx-demo-theme' ),
		'separate_items_with_commas' => __( 'Separate shoe tags with commas', 'lsx-demo-theme' ),
		'add_or_remove_items'        => __( 'Add or remove shoe tags', 'lsx-demo-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used shoe tags', 'lsx-demo-theme' ),
		'not_found'                  => __( 'No shoe tags found.', 'lsx-demo-theme' ),
		'menu_name'                  => __( 'Shoe Tags', 'lsx-demo-theme' ),
	);

	$tag_args = array(
		'hierarchical'          => false,
		'labels'                => $tag_labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'shoe-tag' ),
		'show_in_rest'          => true,
	);

	register_taxonomy( 'shoe_tag', array( 'shoe' ), $tag_args );
}
add_action( 'init', 'lsx_demo_theme_shoes_taxonomies', 0 );

/**
 * Reusable Menu Components
 *
 * @package lsx-demo-theme
 */

/**
 * Custom Menu Walker for enhanced menu styling
 */
class LSX_Demo_Menu_Walker extends Walker_Nav_Menu {

	// Start Level - wrap items in list
	function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class='sub-menu level-$depth'>\n";
	}

	// End Level
	function end_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}

	// Start Element - wrap items in list items
	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		// Add active class for current page
		if ( in_array( 'current-menu-item', $classes ) ) {
			$classes[] = 'active';
		}

		// Add dropdown class if has children
		if ( in_array( 'menu-item-has-children', $classes ) ) {
			$classes[] = 'has-dropdown';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )       ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a' . $attributes . '>';
		$item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . esc_html( apply_filters( 'the_title', $item->title, $item->ID ) ) . ( isset( $args->link_after ) ? $args->link_after : '' );
		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	// End Element
	function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}
}

/**
 * Display a reusable navigation menu
 *
 * @param string $location Menu location
 * @param array $args Additional arguments
 * @return void
 */
function lsx_demo_display_menu( $location = 'primary', $args = array() ) {
	$defaults = array(
		'theme_location'  => $location,
		'menu_class'      => 'nav-menu ' . $location . '-menu',
		'container'       => 'nav',
		'container_class' => 'navigation-wrapper ' . $location . '-navigation',
		'walker'          => new LSX_Demo_Menu_Walker(),
		'fallback_cb'     => 'lsx_demo_fallback_menu',
		'echo'            => true,
	);

	$args = wp_parse_args( $args, $defaults );

	if ( has_nav_menu( $location ) ) {
		wp_nav_menu( $args );
	} else {
		// Fallback menu
		lsx_demo_fallback_menu( $args );
	}
}

/**
 * Fallback menu when no menu is assigned
 *
 * @param array $args Menu arguments
 * @return void
 */
function lsx_demo_fallback_menu( $args = array() ) {
	echo '<nav class="' . esc_attr( $args['container_class'] ?? 'navigation-wrapper' ) . '">';
	echo '<ul class="' . esc_attr( $args['menu_class'] ?? 'nav-menu' ) . '">';

	// Home link
	echo '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'Home', 'lsx-demo-theme' ) . '</a></li>';

	// Pages
	$pages = get_pages( array( 'number' => 5 ) );
	foreach ( $pages as $page ) {
		echo '<li class="menu-item"><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( $page->post_title ) . '</a></li>';
	}

	echo '</ul>';
	echo '</nav>';
}

/**
 * Get menu items as array for custom menu implementations
 *
 * @param string $location Menu location
 * @return array Menu items
 */
function lsx_demo_get_menu_items( $location = 'primary' ) {
	$locations = get_nav_menu_locations();
	$menu_items = array();

	if ( isset( $locations[ $location ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $location ] );
		if ( $menu ) {
			$menu_items = wp_get_nav_menu_items( $menu->term_id );
		}
	}

	return $menu_items;
}

/**
 * Display a simple horizontal menu
 *
 * @param string $location Menu location
 * @param string $class Additional CSS class
 * @return void
 */
function lsx_demo_simple_menu( $location = 'primary', $class = '' ) {
	$menu_items = lsx_demo_get_menu_items( $location );
	$class = $class ? ' ' . $class : '';

	if ( ! empty( $menu_items ) ) {
		echo '<div class="simple-menu' . esc_attr( $class ) . '">';
		foreach ( $menu_items as $item ) {
			if ( $item->menu_item_parent == 0 ) { // Only top-level items
				$current = ( $item->object_id == get_queried_object_id() ) ? ' current' : '';
				echo '<a href="' . esc_url( $item->url ) . '" class="menu-link' . esc_attr( $current ) . '">' . esc_html( $item->title ) . '</a>';
			}
		}
		echo '</div>';
	} else {
		// Fallback
		echo '<div class="simple-menu' . esc_attr( $class ) . '">';
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="menu-link">' . __( 'Home', 'lsx-demo-theme' ) . '</a>';
		echo '</div>';
	}
}

/**
 * Display a mobile-friendly menu
 *
 * @param string $location Menu location
 * @param string $toggle_text Toggle button text
 * @return void
 */
function lsx_demo_mobile_menu( $location = 'mobile', $toggle_text = 'Menu' ) {
	?>
	<div class="mobile-menu-wrapper">
		<button class="mobile-menu-toggle" aria-expanded="false" aria-controls="mobile-menu-<?php echo esc_attr( $location ); ?>">
			<span class="menu-text"><?php echo esc_html( $toggle_text ); ?></span>
			<span class="menu-icon">
				<span class="menu-bar"></span>
				<span class="menu-bar"></span>
				<span class="menu-bar"></span>
			</span>
		</button>

		<div class="mobile-menu-content" id="mobile-menu-<?php echo esc_attr( $location ); ?>">
			<?php
			lsx_demo_display_menu( $location, array(
				'container_class' => 'mobile-navigation-wrapper',
				'menu_class'      => 'mobile-nav-menu'
			) );
			?>
		</div>
	</div>
	<?php
}
