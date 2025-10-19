<?php

/**
 * Sample Designer Boot Products
 * Creates sample designer boot products according to luxury-boots-catalog.md specification
 *
 * @package LSX Demo Theme
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
	exit;
}

class LuxuryBootSampleData
{

	public function __construct()
	{
		// For development - always recreate sample products
		if (defined('WP_DEBUG') && WP_DEBUG) {
			delete_option('lbc_sample_products_created');
		}

		add_action('init', array($this, 'maybe_create_sample_products'), 500); // After taxonomies are registered
	}

	/**
	 * Create sample products if they don't exist (public method for forced creation)
	 */
	public function maybe_create_sample_products()
	{
		// Check if already created (skip in debug mode)
		if (!defined('WP_DEBUG') || !WP_DEBUG) {
			if (get_option('lbc_sample_products_created')) {
				return;
			}
		}

		// First create taxonomy terms
		$this->create_taxonomy_terms();

		// Then create sample products
		$this->create_sample_products();

		// Update flag only if not in debug mode
		if (!defined('WP_DEBUG') || !WP_DEBUG) {
			update_option('lbc_sample_products_created', true);
		}
	}

	/**
	 * Create required taxonomy terms according to luxury-boots-catalog.md specification
	 */
	private function create_taxonomy_terms()
	{
		$taxonomy_terms = array(
			'brand' => array('GUCCI', 'Louis Vuitton', 'Prada'),
			'heel_height' => array('low', 'medium', 'high', 'platform'),
			'material' => array('calfskin', 'lambskin', 'nappa', 'patent', 'mesh', 'rubber'),
			'country' => array('Italy', 'Imported'),
			'color' => array('Black', 'Milk', 'Brown', 'White'),
			'silhouette' => array('ankle boot', 'chelsea', 'lace-up'),
			'closure' => array('side zip', 'lace', 'pull-on')
		);

		foreach ($taxonomy_terms as $taxonomy => $terms) {
			foreach ($terms as $term) {
				if (!term_exists($term, $taxonomy)) {
					wp_insert_term($term, $taxonomy);
				}
			}
		}
	}

	/**
	 * Create designer boot product samples according to luxury-boots-catalog.md specification
	 */
	private function create_sample_products()
	{
		$products = array(
			array(
				'title' => 'GUCCI Horsebit Ankle Boot – Black Calfskin',
				'excerpt' => 'Iconic horsebit ankle boot in smooth black calfskin with a low rubber block heel and side-zip convenience—versatile from desk to dinner.',
				'content' => '',
				'taxonomies' => array(
					'brand' => 'GUCCI',
					'heel_height' => 'low',
					'material' => 'calfskin',
					'country' => 'Italy',
					'color' => 'Black',
					'silhouette' => 'ankle boot',
					'closure' => 'side zip'
				),
				'meta' => array(
					'lbc_featured_alt' => 'GUCCI Horsebit ankle boot in black calfskin, side view',
					'lbc_featured_desc' => 'Three-quarter angle showing horsebit hardware and block heel.',
					'lbc_description_rich' => 'The GUCCI Horsebit ankle boot pairs Italian craftsmanship with everyday wearability. Smooth black calfskin shapes a refined silhouette, anchored by a low rubber block heel for stability. A discreet side zip streamlines entry without interrupting the profile. Dress it up with tailoring or down with denim; the horsebit hardware signals timeless luxury. Expect a comfortable, true-to-size fit with minimal break-in.',
					'lbc_sizes_eu' => '35–39',
					'lbc_heel_type' => 'Low rubber block',
					'lbc_heel_height_mm' => 50,
					'lbc_leather_type' => 'calfskin',
					'lbc_leather_color' => 'Black',
					'lbc_country_of_origin' => 'Italy',
					'lbc_care' => 'Wipe with soft cloth; avoid saturation.',
					'lbc_product_link' => 'https://www.reversible.com/shopping/women/item/gucci-womens-boot-with-horsebit-705714541',
					'_lsx_sample_product' => '1'
				),
				'slug' => 'designer-boot-gucci-horsebit-black'
			),
			array(
				'title' => 'Louis Vuitton Swing Platform Ankle Boot – Black Lambskin',
				'excerpt' => 'Supple lambskin ankle boot with a balanced platform and medium block heel—modern height with confident traction.',
				'content' => '',
				'taxonomies' => array(
					'brand' => 'Louis Vuitton',
					'heel_height' => 'medium',
					'material' => 'lambskin',
					'country' => 'Italy',
					'color' => 'Black',
					'silhouette' => 'ankle boot',
					'closure' => 'side zip'
				),
				'meta' => array(
					'lbc_featured_alt' => 'Louis Vuitton Swing Platform ankle boot in black lambskin, profile',
					'lbc_featured_desc' => 'Profile view emphasising platform and heel.',
					'lbc_description_rich' => 'Crafted in soft black lambskin, the Swing Platform ankle boot delivers statement height without sacrificing stability. A medium block heel and balanced platform distribute weight evenly, while the clean ankle line keeps the silhouette sharp. The look reads modern and architectural—ideal for evening dressing or elevating minimalist daywear. Fit is true; the platform offsets perceived heel height.',
					'lbc_sizes_eu' => '35–39',
					'lbc_heel_type' => 'Medium block with platform',
					'lbc_heel_height_mm' => 75,
					'lbc_leather_type' => 'lambskin',
					'lbc_leather_color' => 'Black',
					'lbc_country_of_origin' => 'Italy',
					'lbc_care' => 'Condition occasionally; avoid abrasive contact.',
					'_lsx_sample_product' => '1'
				),
				'slug' => 'designer-boot-lv-swing-platform-black'
			),
			array(
				'title' => 'Prada 85 Leather Ankle Boots – Black Nappa',
				'excerpt' => 'Sleek nappa ankle boots with an elegant high heel—streamlined lines and a close, tailored fit.',
				'content' => '',
				'taxonomies' => array(
					'brand' => 'Prada',
					'heel_height' => 'high',
					'material' => 'nappa',
					'country' => 'Italy',
					'color' => 'Black',
					'silhouette' => 'ankle boot',
					'closure' => 'side zip'
				),
				'meta' => array(
					'lbc_featured_alt' => 'Prada 85 leather ankle boots in black nappa, three-quarter view',
					'lbc_featured_desc' => 'Three-quarter view highlighting tapered toe and high heel.',
					'lbc_description_rich' => 'Prada\'s 85 leather ankle boots deliver a polished profile in supple black nappa. The tapered toe elongates the line, while the high heel adds lift without bulk. A smooth interior and clean ankle finish suit evening looks and sharp daytime tailoring. Expect a closer fit through the ankle; if between sizes, consider the half size up.',
					'lbc_sizes_eu' => '35–40',
					'lbc_heel_type' => 'High stiletto-like block',
					'lbc_heel_height_mm' => 85,
					'lbc_leather_type' => 'nappa',
					'lbc_leather_color' => 'Black',
					'lbc_country_of_origin' => 'Italy',
					'lbc_care' => 'Use shoe trees; store in dust bags.',
					'_lsx_sample_product' => '1'
				),
				'slug' => 'designer-boot-prada-85-leather-black'
			)
		);

		foreach ($products as $product_data) {
			$this->create_product($product_data);
		}
	}

	/**
	 * Create individual designer boot product
	 */
	private function create_product($data)
	{
		// Check if product already exists by slug
		if (isset($data['slug'])) {
			$existing_post = get_page_by_path($data['slug'], OBJECT, 'designer_boot');
			if ($existing_post) {
				return $existing_post->ID; // Skip if already exists
			}
		}

		// Create the post
		$post_data = array(
			'post_title' => $data['title'],
			'post_content' => $data['content'],
			'post_excerpt' => isset($data['excerpt']) ? $data['excerpt'] : '',
			'post_status' => 'publish',
			'post_type' => 'designer_boot', // Changed from 'product' to 'designer_boot'
			'post_author' => 1,
		);

		// Add slug if provided
		if (isset($data['slug'])) {
			$post_data['post_name'] = $data['slug'];
		}

		$post_id = wp_insert_post($post_data);

		if (is_wp_error($post_id)) {
			error_log('Failed to create designer boot: ' . $post_id->get_error_message());
			return false;
		}

		// Add taxonomies
		foreach ($data['taxonomies'] as $taxonomy => $term) {
			wp_set_object_terms($post_id, $term, $taxonomy);
		}

		// Add meta data (using lbc_ prefix as per specification)
		foreach ($data['meta'] as $key => $value) {
			update_post_meta($post_id, $key, $value);
		}

		return $post_id;
	}

	/**
	 * Force recreation of sample products (for debugging)
	 */
	public function recreate_sample_products()
	{
		// Delete existing sample products
		$existing_boots = get_posts(array(
			'post_type' => 'designer_boot',
			'meta_key' => '_lsx_sample_product',
			'meta_value' => '1',
			'posts_per_page' => -1
		));

		foreach ($existing_boots as $boot) {
			wp_delete_post($boot->ID, true);
		}

		// Clear the creation flag
		delete_option('lbc_sample_products_created');

		// Recreate sample products
		$this->maybe_create_sample_products();
	}
}

// Initialize the sample data creator
new LuxuryBootSampleData();

// Hook to create sample products on theme activation or when needed
add_action('after_switch_theme', function () {
	$sample_data = new LuxuryBootSampleData();
	$sample_data->maybe_create_sample_products();
});

// Add admin menu item for manual creation
add_action('admin_menu', function () {
	add_theme_page(
		'Create Sample Products',
		'Sample Products',
		'manage_options',
		'lbc-sample-products',
		function () {
			if (isset($_GET['create']) && $_GET['create'] === '1') {
				$sample_data = new LuxuryBootSampleData();
				$sample_data->recreate_sample_products();
				echo '<div class="notice notice-success"><p>Sample products created successfully!</p></div>';
			}
			echo '<div class="wrap">';
			echo '<h1>Luxury Boot Collection - Sample Products</h1>';
			echo '<p>Click the button below to create sample designer boot products:</p>';
			echo '<a href="?page=lbc-sample-products&create=1" class="button button-primary">Create Sample Products</a>';
			echo '<p><strong>Archive URL:</strong> <a href="' . home_url('/designer-boots/') . '" target="_blank">' . home_url('/designer-boots/') . '</a></p>';

			// Show existing products
			$boots = get_posts(array(
				'post_type' => 'designer_boot',
				'posts_per_page' => -1,
				'post_status' => 'publish'
			));

			if ($boots) {
				echo '<h3>Existing Designer Boots:</h3><ul>';
				foreach ($boots as $boot) {
					echo '<li><a href="' . get_permalink($boot) . '" target="_blank">' . $boot->post_title . '</a></li>';
				}
				echo '</ul>';
			}
			echo '</div>';
		}
	);
});
