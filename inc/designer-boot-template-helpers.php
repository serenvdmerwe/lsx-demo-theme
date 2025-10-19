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
				return lbc_render_gallery($value);
			case 'description_rich':
				return wpautop($value);
			case 'heel_height_mm':
				return $value ? $value . 'mm' : '';
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
 * Render gallery from ACF gallery field
 */
function lbc_render_gallery($gallery_ids)
{
	if (empty($gallery_ids)) {
		return '';
	}

	// Handle if it's a serialized array or comma-separated string
	if (is_string($gallery_ids)) {
		$gallery_ids = maybe_unserialize($gallery_ids);
		if (is_string($gallery_ids)) {
			$gallery_ids = explode(',', $gallery_ids);
		}
	}

	if (!is_array($gallery_ids)) {
		return '';
	}

	$output = '<div class="boot-gallery-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">';

	foreach ($gallery_ids as $image_id) {
		$image_id = is_array($image_id) ? $image_id['ID'] : $image_id;
		$image = wp_get_attachment_image($image_id, 'medium', false, array(
			'loading' => 'lazy',
			'style' => 'width: 100%; height: auto; object-fit: cover;'
		));

		if ($image) {
			$output .= '<div class="gallery-item">' . $image . '</div>';
		}
	}

	$output .= '</div>';

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
