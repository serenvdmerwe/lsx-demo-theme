<?php

/**
 * Luxury Product Filter AJAX Handler
 * Handles advanced filtering requests for the luxury boot catalog
 */

// Prevent direct access
if (!defined('ABSPATH')) {
	exit;
}

class LuxuryProductFilterHandler
{

	public function __construct()
	{
		add_action('wp_ajax_filter_luxury_products', array($this, 'handle_filter_request'));
		add_action('wp_ajax_nopriv_filter_luxury_products', array($this, 'handle_filter_request'));

		add_action('wp_enqueue_scripts', array($this, 'enqueue_filter_scripts'));
	}

	/**
	 * Enqueue filter scripts and styles
	 */
	public function enqueue_filter_scripts()
	{
		// Only load on product pages and shop pages
		if (is_singular('product') || is_post_type_archive('product') || is_page_template('archive-products.html')) {
			wp_enqueue_script(
				'luxury-product-filter',
				get_template_directory_uri() . '/assets/js/luxury-product-filter.js',
				array('jquery'),
				'1.0.0',
				true
			);

			wp_localize_script('luxury-product-filter', 'luxuryFilterAjax', array(
				'ajaxurl' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('luxury_filter_nonce'),
			));
		}
	}

	/**
	 * Handle AJAX filter requests
	 */
	public function handle_filter_request()
	{
		// Verify nonce for security
		if (!wp_verify_nonce($_POST['nonce'], 'luxury_filter_nonce')) {
			wp_die(__('Security check failed', 'lsx'));
		}

		$filters = isset($_POST['filters']) ? json_decode(stripslashes($_POST['filters']), true) : array();
		$sort_option = sanitize_text_field($_POST['sort'] ?? 'newest');
		$page = absint($_POST['page'] ?? 1);
		$per_page = absint($_POST['per_page'] ?? 12);

		$products = $this->query_filtered_products($filters, $sort_option, $page, $per_page);
		$total = $this->count_filtered_products($filters);

		wp_send_json_success(array(
			'products' => $products,
			'total' => $total,
			'page' => $page,
			'per_page' => $per_page,
			'total_pages' => ceil($total / $per_page),
			'filters' => $filters,
			'sort' => $sort_option
		));
	}

	/**
	 * Query products with filters applied
	 */
	private function query_filtered_products($filters, $sort_option, $page = 1, $per_page = 12)
	{
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => $per_page,
			'paged' => $page,
			'meta_query' => array('relation' => 'AND'),
			'tax_query' => array('relation' => 'AND'),
		);

		// Apply taxonomy filters
		$taxonomy_filters = array(
			'heel_height',
			'material',
			'finish',
			'collection',
			'brand',
			'country',
			'color',
			'silhouette',
			'closure'
		);

		foreach ($taxonomy_filters as $taxonomy) {
			if (!empty($filters[$taxonomy])) {
				$args['tax_query'][] = array(
					'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => sanitize_text_field($filters[$taxonomy])
				);
			}
		}

		// Apply sorting
		switch ($sort_option) {
			case 'price-low':
				$args['meta_key'] = '_product_price';
				$args['orderby'] = 'meta_value_num';
				$args['order'] = 'ASC';
				break;

			case 'price-high':
				$args['meta_key'] = '_product_price';
				$args['orderby'] = 'meta_value_num';
				$args['order'] = 'DESC';
				break;

			case 'brand':
				$args['orderby'] = 'title';
				$args['order'] = 'ASC';
				break;

			case 'popularity':
				$args['meta_key'] = '_product_views';
				$args['orderby'] = 'meta_value_num';
				$args['order'] = 'DESC';
				break;

			case 'newest':
			default:
				$args['orderby'] = 'date';
				$args['order'] = 'DESC';
				break;
		}

		$query = new WP_Query($args);
		$products = array();

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				$products[] = $this->format_product_data(get_the_ID());
			}
			wp_reset_postdata();
		}

		return $products;
	}

	/**
	 * Count total products matching filters
	 */
	private function count_filtered_products($filters)
	{
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'fields' => 'ids',
			'tax_query' => array('relation' => 'AND'),
		);

		// Apply same taxonomy filters as query
		$taxonomy_filters = array(
			'heel_height',
			'material',
			'finish',
			'collection',
			'brand',
			'country',
			'color',
			'silhouette',
			'closure'
		);

		foreach ($taxonomy_filters as $taxonomy) {
			if (!empty($filters[$taxonomy])) {
				$args['tax_query'][] = array(
					'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => sanitize_text_field($filters[$taxonomy])
				);
			}
		}

		$query = new WP_Query($args);
		return $query->found_posts;
	}

	/**
	 * Format product data for AJAX response
	 */
	private function format_product_data($product_id)
	{
		$product = array(
			'id' => $product_id,
			'title' => get_the_title($product_id),
			'permalink' => get_permalink($product_id),
			'excerpt' => get_the_excerpt($product_id),
		);

		// Get featured image
		if (has_post_thumbnail($product_id)) {
			$product['image'] = get_the_post_thumbnail_url($product_id, 'medium');
			$product['image_large'] = get_the_post_thumbnail_url($product_id, 'large');
		}

		// Get product meta
		$product['price'] = get_post_meta($product_id, '_product_price', true);
		$product['sale_price'] = get_post_meta($product_id, '_product_sale_price', true);
		$product['in_stock'] = get_post_meta($product_id, '_product_stock_status', true) !== 'out-of-stock';
		$product['is_featured'] = get_post_meta($product_id, '_product_featured', true) === 'yes';
		$product['sku'] = get_post_meta($product_id, '_product_sku', true);

		// Get taxonomy terms
		$taxonomies = array(
			'heel_height',
			'material',
			'finish',
			'collection',
			'brand',
			'country',
			'color',
			'silhouette',
			'closure'
		);

		foreach ($taxonomies as $taxonomy) {
			$terms = get_the_terms($product_id, $taxonomy);
			if ($terms && !is_wp_error($terms)) {
				$product[$taxonomy] = $terms[0]->name;
				$product[$taxonomy . '_slug'] = $terms[0]->slug;
			}
		}

		// Get additional product details
		$product['size_range'] = get_post_meta($product_id, '_product_size_range', true);
		$product['care_instructions'] = get_post_meta($product_id, '_product_care_instructions', true);
		$product['made_in'] = get_post_meta($product_id, '_product_made_in', true);

		// Gallery images
		$gallery_images = get_post_meta($product_id, '_product_gallery', true);
		if ($gallery_images) {
			$product['gallery'] = array_map(function ($attachment_id) {
				return array(
					'id' => $attachment_id,
					'url' => wp_get_attachment_image_url($attachment_id, 'medium'),
					'url_large' => wp_get_attachment_image_url($attachment_id, 'large'),
					'alt' => get_post_meta($attachment_id, '_wp_attachment_image_alt', true),
				);
			}, explode(',', $gallery_images));
		}

		return $product;
	}

	/**
	 * Get available filter options for a taxonomy
	 */
	public static function get_filter_options($taxonomy)
	{
		$terms = get_terms(array(
			'taxonomy' => $taxonomy,
			'hide_empty' => true,
			'orderby' => 'name',
			'order' => 'ASC'
		));

		$options = array();
		if ($terms && !is_wp_error($terms)) {
			foreach ($terms as $term) {
				$options[$term->slug] = $term->name;
			}
		}

		return $options;
	}

	/**
	 * Get product counts by taxonomy terms
	 */
	public static function get_filter_counts($taxonomy, $active_filters = array())
	{
		$terms = get_terms(array(
			'taxonomy' => $taxonomy,
			'hide_empty' => true,
		));

		$counts = array();
		if ($terms && !is_wp_error($terms)) {
			foreach ($terms as $term) {
				// Create a modified filter set for this term
				$temp_filters = $active_filters;
				$temp_filters[$taxonomy] = $term->slug;

				// Remove the current taxonomy from filters to get accurate counts
				unset($temp_filters[$taxonomy]);

				$count = self::count_products_with_filters($temp_filters, $taxonomy, $term->slug);
				$counts[$term->slug] = $count;
			}
		}

		return $counts;
	}

	/**
	 * Count products with specific filters applied
	 */
	private static function count_products_with_filters($filters, $additional_taxonomy = null, $additional_term = null)
	{
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'fields' => 'ids',
			'tax_query' => array('relation' => 'AND'),
		);

		// Add existing filters
		foreach ($filters as $taxonomy => $term_slug) {
			if (!empty($term_slug)) {
				$args['tax_query'][] = array(
					'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $term_slug
				);
			}
		}

		// Add additional filter if provided
		if ($additional_taxonomy && $additional_term) {
			$args['tax_query'][] = array(
				'taxonomy' => $additional_taxonomy,
				'field' => 'slug',
				'terms' => $additional_term
			);
		}

		$query = new WP_Query($args);
		return $query->found_posts;
	}
}

// Initialize the filter handler
new LuxuryProductFilterHandler();
