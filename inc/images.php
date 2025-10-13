<?php

/**
 * Image related helpers: placeholder & alt text fallback.
 *
 * @package lsx-demo-theme
 */

// Register custom image sizes for catalog presentation.
add_action('after_setup_theme', function () {
	// Portrait card (cropped) for grid displays.
	add_image_size('boot-card', 480, 640, true);
	// Wide hero / feature (hard crop for consistent aspect).
	add_image_size('boot-hero', 1600, 900, true);
});

if (! function_exists('lsx_demo_theme_get_boot_placeholder_url')) {
	function lsx_demo_theme_get_boot_placeholder_url()
	{
		return get_template_directory_uri() . '/assets/images/shoes/placeholder-boot.jpg';
	}
}

// Featured image placeholder for designer_boot CPT.
add_filter('post_thumbnail_html', function ($html, $post_id, $post_thumbnail_id, $size, $attr) {
	if ($html || get_post_type($post_id) !== 'designer_boot') {
		return $html;
	}
	$src     = esc_url(lsx_demo_theme_get_boot_placeholder_url());
	$alt     = esc_attr__('Placeholder boot image', 'lsx-demo-theme');
	$classes = 'wp-post-image boot-placeholder';
	if (is_array($attr) && ! empty($attr['class'])) {
		$classes .= ' ' . sanitize_html_class($attr['class']);
	}
	return '<img src="' . $src . '" alt="' . esc_attr($alt) . '" class="' . esc_attr($classes) . '" loading="lazy" decoding="async" />';
}, 10, 5);

// Global attachment alt fallback.
function lsx_demo_theme_image_alt_fallback($attr, $attachment, $size)
{ // phpcs:ignore WordPress.NamingConventions.ValidFunctionName
	if (array_key_exists('alt', $attr) && '' !== trim((string) $attr['alt'])) {
		return $attr;
	}
	$explicit = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	if (is_string($explicit) && '' !== trim($explicit)) {
		$attr['alt'] = wp_strip_all_tags($explicit);
		return $attr;
	}
	$title = get_the_title($attachment->ID);
	if ($title) {
		$attr['alt'] = wp_strip_all_tags($title);
	}
	return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'lsx_demo_theme_image_alt_fallback', 10, 3);
