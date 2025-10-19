<?php

/**
 * Designer Boot Taxonomies Registration
 * Registers taxonomies according to luxury-boots-catalog.md specification
 *
 * @package LSX Demo Theme
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Register designer boot taxonomies according to luxury-boots-catalog.md specification
 */
function lbc_register_designer_boot_taxonomies()
{

	// Brand taxonomy
	$brand_labels = array(
		'name'                       => _x('Brands', 'Taxonomy General Name', 'lbc'),
		'singular_name'              => _x('Brand', 'Taxonomy Singular Name', 'lbc'),
		'menu_name'                  => __('Brands', 'lbc'),
		'all_items'                  => __('All Brands', 'lbc'),
		'new_item_name'              => __('New Brand Name', 'lbc'),
		'add_new_item'               => __('Add New Brand', 'lbc'),
		'edit_item'                  => __('Edit Brand', 'lbc'),
		'update_item'                => __('Update Brand', 'lbc'),
		'view_item'                  => __('View Brand', 'lbc'),
		'separate_items_with_commas' => __('Separate brands with commas', 'lbc'),
		'add_or_remove_items'        => __('Add or remove brands', 'lbc'),
		'choose_from_most_used'      => __('Choose from the most used', 'lbc'),
		'popular_items'              => __('Popular Brands', 'lbc'),
		'search_items'               => __('Search Brands', 'lbc'),
		'not_found'                  => __('Not Found', 'lbc'),
		'no_terms'                   => __('No brands', 'lbc'),
		'items_list'                 => __('Brands list', 'lbc'),
		'items_list_navigation'      => __('Brands list navigation', 'lbc'),
	);

	register_taxonomy('brand', array('designer_boot'), array(
		'labels'                     => $brand_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite'                    => array('slug' => 'brand'),
	));

	// Heel Height taxonomy
	$heel_height_labels = array(
		'name'                       => _x('Heel Heights', 'Taxonomy General Name', 'lbc'),
		'singular_name'              => _x('Heel Height', 'Taxonomy Singular Name', 'lbc'),
		'menu_name'                  => __('Heel Heights', 'lbc'),
		'all_items'                  => __('All Heel Heights', 'lbc'),
		'new_item_name'              => __('New Heel Height Name', 'lbc'),
		'add_new_item'               => __('Add New Heel Height', 'lbc'),
		'edit_item'                  => __('Edit Heel Height', 'lbc'),
		'update_item'                => __('Update Heel Height', 'lbc'),
		'view_item'                  => __('View Heel Height', 'lbc'),
		'separate_items_with_commas' => __('Separate heel heights with commas', 'lbc'),
		'add_or_remove_items'        => __('Add or remove heel heights', 'lbc'),
		'choose_from_most_used'      => __('Choose from the most used', 'lbc'),
		'popular_items'              => __('Popular Heel Heights', 'lbc'),
		'search_items'               => __('Search Heel Heights', 'lbc'),
		'not_found'                  => __('Not Found', 'lbc'),
		'no_terms'                   => __('No heel heights', 'lbc'),
		'items_list'                 => __('Heel Heights list', 'lbc'),
		'items_list_navigation'      => __('Heel Heights list navigation', 'lbc'),
	);

	register_taxonomy('heel_height', array('designer_boot'), array(
		'labels'                     => $heel_height_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite'                    => array('slug' => 'heel-height'),
	));

	// Material taxonomy
	$material_labels = array(
		'name'                       => _x('Materials', 'Taxonomy General Name', 'lbc'),
		'singular_name'              => _x('Material', 'Taxonomy Singular Name', 'lbc'),
		'menu_name'                  => __('Materials', 'lbc'),
		'all_items'                  => __('All Materials', 'lbc'),
		'new_item_name'              => __('New Material Name', 'lbc'),
		'add_new_item'               => __('Add New Material', 'lbc'),
		'edit_item'                  => __('Edit Material', 'lbc'),
		'update_item'                => __('Update Material', 'lbc'),
		'view_item'                  => __('View Material', 'lbc'),
		'separate_items_with_commas' => __('Separate materials with commas', 'lbc'),
		'add_or_remove_items'        => __('Add or remove materials', 'lbc'),
		'choose_from_most_used'      => __('Choose from the most used', 'lbc'),
		'popular_items'              => __('Popular Materials', 'lbc'),
		'search_items'               => __('Search Materials', 'lbc'),
		'not_found'                  => __('Not Found', 'lbc'),
		'no_terms'                   => __('No materials', 'lbc'),
		'items_list'                 => __('Materials list', 'lbc'),
		'items_list_navigation'      => __('Materials list navigation', 'lbc'),
	);

	register_taxonomy('material', array('designer_boot'), array(
		'labels'                     => $material_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite'                    => array('slug' => 'material'),
	));

	// Country of Origin taxonomy
	$country_labels = array(
		'name'                       => _x('Countries of Origin', 'Taxonomy General Name', 'lbc'),
		'singular_name'              => _x('Country of Origin', 'Taxonomy Singular Name', 'lbc'),
		'menu_name'                  => __('Countries', 'lbc'),
		'all_items'                  => __('All Countries', 'lbc'),
		'new_item_name'              => __('New Country Name', 'lbc'),
		'add_new_item'               => __('Add New Country', 'lbc'),
		'edit_item'                  => __('Edit Country', 'lbc'),
		'update_item'                => __('Update Country', 'lbc'),
		'view_item'                  => __('View Country', 'lbc'),
		'separate_items_with_commas' => __('Separate countries with commas', 'lbc'),
		'add_or_remove_items'        => __('Add or remove countries', 'lbc'),
		'choose_from_most_used'      => __('Choose from the most used', 'lbc'),
		'popular_items'              => __('Popular Countries', 'lbc'),
		'search_items'               => __('Search Countries', 'lbc'),
		'not_found'                  => __('Not Found', 'lbc'),
		'no_terms'                   => __('No countries', 'lbc'),
		'items_list'                 => __('Countries list', 'lbc'),
		'items_list_navigation'      => __('Countries list navigation', 'lbc'),
	);

	register_taxonomy('country', array('designer_boot'), array(
		'labels'                     => $country_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite'                    => array('slug' => 'country'),
	));

	// Color taxonomy
	$color_labels = array(
		'name'                       => _x('Colors', 'Taxonomy General Name', 'lbc'),
		'singular_name'              => _x('Color', 'Taxonomy Singular Name', 'lbc'),
		'menu_name'                  => __('Colors', 'lbc'),
		'all_items'                  => __('All Colors', 'lbc'),
		'new_item_name'              => __('New Color Name', 'lbc'),
		'add_new_item'               => __('Add New Color', 'lbc'),
		'edit_item'                  => __('Edit Color', 'lbc'),
		'update_item'                => __('Update Color', 'lbc'),
		'view_item'                  => __('View Color', 'lbc'),
		'separate_items_with_commas' => __('Separate colors with commas', 'lbc'),
		'add_or_remove_items'        => __('Add or remove colors', 'lbc'),
		'choose_from_most_used'      => __('Choose from the most used', 'lbc'),
		'popular_items'              => __('Popular Colors', 'lbc'),
		'search_items'               => __('Search Colors', 'lbc'),
		'not_found'                  => __('Not Found', 'lbc'),
		'no_terms'                   => __('No colors', 'lbc'),
		'items_list'                 => __('Colors list', 'lbc'),
		'items_list_navigation'      => __('Colors list navigation', 'lbc'),
	);

	register_taxonomy('color', array('designer_boot'), array(
		'labels'                     => $color_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite'                    => array('slug' => 'color'),
	));

	// Silhouette taxonomy
	$silhouette_labels = array(
		'name'                       => _x('Silhouettes', 'Taxonomy General Name', 'lbc'),
		'singular_name'              => _x('Silhouette', 'Taxonomy Singular Name', 'lbc'),
		'menu_name'                  => __('Silhouettes', 'lbc'),
		'all_items'                  => __('All Silhouettes', 'lbc'),
		'new_item_name'              => __('New Silhouette Name', 'lbc'),
		'add_new_item'               => __('Add New Silhouette', 'lbc'),
		'edit_item'                  => __('Edit Silhouette', 'lbc'),
		'update_item'                => __('Update Silhouette', 'lbc'),
		'view_item'                  => __('View Silhouette', 'lbc'),
		'separate_items_with_commas' => __('Separate silhouettes with commas', 'lbc'),
		'add_or_remove_items'        => __('Add or remove silhouettes', 'lbc'),
		'choose_from_most_used'      => __('Choose from the most used', 'lbc'),
		'popular_items'              => __('Popular Silhouettes', 'lbc'),
		'search_items'               => __('Search Silhouettes', 'lbc'),
		'not_found'                  => __('Not Found', 'lbc'),
		'no_terms'                   => __('No silhouettes', 'lbc'),
		'items_list'                 => __('Silhouettes list', 'lbc'),
		'items_list_navigation'      => __('Silhouettes list navigation', 'lbc'),
	);

	register_taxonomy('silhouette', array('designer_boot'), array(
		'labels'                     => $silhouette_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite'                    => array('slug' => 'silhouette'),
	));

	// Closure taxonomy
	$closure_labels = array(
		'name'                       => _x('Closures', 'Taxonomy General Name', 'lbc'),
		'singular_name'              => _x('Closure', 'Taxonomy Singular Name', 'lbc'),
		'menu_name'                  => __('Closures', 'lbc'),
		'all_items'                  => __('All Closures', 'lbc'),
		'new_item_name'              => __('New Closure Name', 'lbc'),
		'add_new_item'               => __('Add New Closure', 'lbc'),
		'edit_item'                  => __('Edit Closure', 'lbc'),
		'update_item'                => __('Update Closure', 'lbc'),
		'view_item'                  => __('View Closure', 'lbc'),
		'separate_items_with_commas' => __('Separate closures with commas', 'lbc'),
		'add_or_remove_items'        => __('Add or remove closures', 'lbc'),
		'choose_from_most_used'      => __('Choose from the most used', 'lbc'),
		'popular_items'              => __('Popular Closures', 'lbc'),
		'search_items'               => __('Search Closures', 'lbc'),
		'not_found'                  => __('Not Found', 'lbc'),
		'no_terms'                   => __('No closures', 'lbc'),
		'items_list'                 => __('Closures list', 'lbc'),
		'items_list_navigation'      => __('Closures list navigation', 'lbc'),
	);

	register_taxonomy('closure', array('designer_boot'), array(
		'labels'                     => $closure_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite'                    => array('slug' => 'closure'),
	));
}

// Register taxonomies
add_action('init', 'lbc_register_designer_boot_taxonomies', 10);
