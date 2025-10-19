<?php

/**
 * Designer Boot Custom Field Rendering
 * Handles rendering of custom fields in block templates
 *
 * @package LSX Demo Theme
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Process custom field shortcodes in designer boot templates
 */
function lbc_process_custom_field_shortcodes($content)
{
	global $post;

	// Only process on designer_boot post type
	if (!is_singular('designer_boot') && !is_archive() && !is_home()) {
		return $content;
	}

	// If we're on archive/home, don't process individual post shortcodes
	if ((is_archive() || is_home()) && !in_the_loop()) {
		return $content;
	}

	// Get current post ID
	$post_id = get_the_ID();
	if (!$post_id && isset($post->ID)) {
		$post_id = $post->ID;
	}

	if (!$post_id) {
		return $content;
	}

	// Replace custom field shortcodes
	$content = preg_replace_callback('/\[lbc_([^\]]+)\]/', function ($matches) use ($post_id) {
		$field_name = 'lbc_' . $matches[1];
		$value = get_post_meta($post_id, $field_name, true);

		// Handle special cases
		switch ($matches[1]) {
			case 'gallery':
				return lbc_render_gallery($post_id);
			case 'related_products':
				return lbc_render_related_products($post_id);
			case 'description_rich':
				return wpautop($value);
			case 'heel_height_mm':
				return $value ? $value . 'mm' : '';
			case 'retail_price':
				return $value ? number_format((float)$value, 2) : '';
			case 'material_display':
				return lbc_smart_field_display($post_id, 'material', 'lbc_leather_type');
			case 'color_display':
				return lbc_smart_field_display($post_id, 'color', 'lbc_leather_color');
			case 'country_display':
				return lbc_smart_field_display($post_id, 'country', 'lbc_country_of_origin');
			default:
				return $value;
		}
	}, $content);

	// Replace taxonomy shortcodes
	$content = preg_replace_callback('/\[([a-z_]+)_terms\]/', function ($matches) use ($post_id) {
		$taxonomy = $matches[1];
		$terms = get_the_terms($post_id, $taxonomy);

		if ($terms && !is_wp_error($terms)) {
			$term_names = array_map(function ($term) {
				return $term->name;
			}, $terms);
			return implode(', ', $term_names);
		}

		return '';
	}, $content);

	// Handle conditional shortcodes [if field_name]content[/if]
	$content = preg_replace_callback('/\[if ([^\]]+)\](.*?)\[\/if\]/s', function ($matches) use ($post_id) {
		$field_name = $matches[1];
		$inner_content = $matches[2];

		// Check if field has value
		$value = get_post_meta($post_id, $field_name, true);

		if ($value) {
			// Replace the field reference in the inner content
			$inner_content = str_replace('[' . $field_name . ']', $value, $inner_content);
			return $inner_content;
		}

		return '';
	}, $content);

	return $content;
}

/**
 * Render gallery from individual image fields
 */
function lbc_render_gallery($post_id)
{
	$images = array();

	// Collect additional images from individual meta fields
	for ($i = 2; $i <= 4; $i++) {
		$image_url = get_post_meta($post_id, "lbc_image_{$i}", true);
		$image_alt = get_post_meta($post_id, "lbc_image_{$i}_alt", true);

		if (!empty($image_url)) {
			$images[] = array(
				'url' => $image_url,
				'alt' => $image_alt ?: "Additional boot image {$i}"
			);
		}
	}

	if (empty($images)) {
		return '<p class="no-gallery">No additional images available.</p>';
	}

	$output = '<div class="boot-gallery-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">';

	foreach ($images as $image) {
		$output .= sprintf(
			'<div class="gallery-item"><img src="%s" alt="%s" loading="lazy" style="width: 100%%; height: auto; object-fit: cover;" /></div>',
			esc_url($image['url']),
			esc_attr($image['alt'])
		);
	}

	$output .= '</div>';
	return $output;
}

/**
 * Smart field display to avoid duplicates between taxonomy terms and custom fields
 */
function lbc_smart_field_display($post_id, $taxonomy, $custom_field)
{
	$taxonomy_terms = get_the_terms($post_id, $taxonomy);
	$custom_value = get_post_meta($post_id, $custom_field, true);

	$display_parts = array();

	// Add taxonomy terms if they exist
	if ($taxonomy_terms && !is_wp_error($taxonomy_terms)) {
		$term_names = array_map(function ($term) {
			return $term->name;
		}, $taxonomy_terms);
		$display_parts[] = implode(', ', $term_names);
	}

	// Add custom field value if it exists and is different from taxonomy terms
	if ($custom_value) {
		$custom_lower = strtolower(trim($custom_value));
		$taxonomy_match = false;

		if ($taxonomy_terms && !is_wp_error($taxonomy_terms)) {
			foreach ($taxonomy_terms as $term) {
				if (strtolower(trim($term->name)) === $custom_lower) {
					$taxonomy_match = true;
					break;
				}
			}
		}

		// Only add custom value if it's not already covered by taxonomy
		if (!$taxonomy_match) {
			$display_parts[] = $custom_value;
		}
	}

	// Return combined display or fallback
	if (!empty($display_parts)) {
		return implode(' • ', $display_parts);
	}

	return $custom_value ?: '';
}

/**
 * Render related products based on shared taxonomies
 */
function lbc_render_related_products($post_id, $limit = 3)
{
	// Get current post's taxonomies
	$current_brand = get_the_terms($post_id, 'brand');
	$current_silhouette = get_the_terms($post_id, 'silhouette');
	$current_heel_height = get_the_terms($post_id, 'heel_height');

	$tax_query = array('relation' => 'OR');

	// Add brand match (highest priority)
	if ($current_brand && !is_wp_error($current_brand)) {
		$tax_query[] = array(
			'taxonomy' => 'brand',
			'field' => 'term_id',
			'terms' => wp_list_pluck($current_brand, 'term_id')
		);
	}

	// Add silhouette match
	if ($current_silhouette && !is_wp_error($current_silhouette)) {
		$tax_query[] = array(
			'taxonomy' => 'silhouette',
			'field' => 'term_id',
			'terms' => wp_list_pluck($current_silhouette, 'term_id')
		);
	}

	// Add heel height match
	if ($current_heel_height && !is_wp_error($current_heel_height)) {
		$tax_query[] = array(
			'taxonomy' => 'heel_height',
			'field' => 'term_id',
			'terms' => wp_list_pluck($current_heel_height, 'term_id')
		);
	}

	// Query related products
	$related_query = new WP_Query(array(
		'post_type' => 'designer_boot',
		'posts_per_page' => $limit,
		'post__not_in' => array($post_id),
		'tax_query' => $tax_query,
		'orderby' => 'rand'
	));

	if (!$related_query->have_posts()) {
		// Fallback: get recent boots
		$related_query = new WP_Query(array(
			'post_type' => 'designer_boot',
			'posts_per_page' => $limit,
			'post__not_in' => array($post_id),
			'orderby' => 'date',
			'order' => 'DESC'
		));
	}

	if (!$related_query->have_posts()) {
		return '<p class="no-related">No related products found.</p>';
	}

	$output = '<div class="related-products-grid">';

	while ($related_query->have_posts()) {
		$related_query->the_post();
		$related_id = get_the_ID();
		$featured_image = get_the_post_thumbnail($related_id, 'medium', array('loading' => 'lazy'));
		$brand_terms = get_the_terms($related_id, 'brand');
		$price = get_post_meta($related_id, 'lbc_retail_price', true);

		$output .= '<div class="related-product-card">';
		$output .= '<a href="' . esc_url(get_permalink($related_id)) . '" class="related-product-link">';

		if ($featured_image) {
			$output .= '<div class="related-product-image">' . $featured_image . '</div>';
		}

		$output .= '<div class="related-product-content">';
		$output .= '<h3 class="related-product-title">' . esc_html(get_the_title($related_id)) . '</h3>';

		if ($brand_terms && !is_wp_error($brand_terms)) {
			$output .= '<div class="related-product-brand">' . esc_html($brand_terms[0]->name) . '</div>';
		}

		if ($price) {
			$output .= '<div class="related-product-price">&euro;' . esc_html(number_format((float)$price, 2)) . '</div>';
		}

		$output .= '</div>';
		$output .= '</a>';
		$output .= '</div>';
	}

	$output .= '</div>';

	wp_reset_postdata();
	return $output;
}

/**
 * Add custom field processing to content
 */
function lbc_add_custom_field_processing()
{
	// Process shortcodes in post content and excerpts
	add_filter('the_content', 'lbc_process_custom_field_shortcodes', 20);
	add_filter('get_the_excerpt', 'lbc_process_custom_field_shortcodes', 20);

	// Process shortcodes in block templates (for render_block)
	add_filter('render_block', function ($block_content, $block) {
		// Only process HTML blocks and template parts that might contain our shortcodes
		if (in_array($block['blockName'], ['core/html', 'core/template-part', 'core/paragraph'])) {
			$block_content = lbc_process_custom_field_shortcodes($block_content);
		}
		return $block_content;
	}, 20, 2);
}

// Initialize custom field processing
add_action('init', 'lbc_add_custom_field_processing');

/**
 * Enqueue CSS for boot templates
 */
function lbc_enqueue_boot_styles()
{
	if (is_singular('designer_boot') || is_post_type_archive('designer_boot')) {
		wp_enqueue_style(
			'designer-boots',
			get_template_directory_uri() . '/assets/css/designer-boots.css',
			array(),
			wp_get_theme()->get('Version')
		);
	}
}
add_action('wp_enqueue_scripts', 'lbc_enqueue_boot_styles');
