<?php

/**
 * Inline SVG logo utilities and custom logo fallback.
 *
 * @package lsx-demo-theme
 */

function lsx_demo_theme_inline_logo_svg($args = array())
{
	$defaults = array(
		'aria_label' => get_bloginfo('name'),
		'class'      => 'site-logo-svg',
		'title'      => '',
	);
	$args     = wp_parse_args($args, $defaults);
	$relative = 'assets/images/icons/boot-stiletto.svg';
	$path     = get_theme_file_path($relative);
	if (! file_exists($path)) {
		return '';
	}
	$raw = file_get_contents($path); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	$allowed = array(
		'svg'  => array(
			'xmlns'      => true,
			'viewBox'    => true,
			'width'      => true,
			'height'     => true,
			'role'       => true,
			'aria-label' => true,
			'class'      => true,
		),
		'title' => array(),
		'path'  => array(
			'd'    => true,
			'fill' => true,
		),
	);
	$svg       = wp_kses($raw, $allowed);
	$class_attr = esc_attr(trim($args['class']));
	$aria      = esc_attr($args['aria_label']);
	if (! empty($args['title'])) {
		$svg = preg_replace('/<title>.*?<\/title>/is', '', $svg);
	}
	$svg = preg_replace('/<svg\b([^>]*)>/i', '<svg$1 class="' . $class_attr . '" role="img" aria-label="' . $aria . '">', $svg, 1);
	if (! empty($args['title'])) {
		$svg = preg_replace('/<svg([^>]*)>/', '<svg$1><title>' . esc_html($args['title']) . '</title>', $svg, 1);
	}
	return $svg;
}

function lsx_demo_theme_custom_logo_fallback($html)
{
	if (! has_custom_logo()) {
		$svg = lsx_demo_theme_inline_logo_svg(array('title' => get_bloginfo('name')));
		if ($svg) {
			$home = esc_url(home_url('/'));
			$name = esc_attr(get_bloginfo('name'));
			if (false === strpos($svg, 'custom-logo')) {
				$svg = preg_replace('/<svg(\b[^>]*)class="([^"]*)"/i', '<svg$1class="$2 custom-logo"', $svg, 1);
				if (false === strpos($svg, 'class="')) {
					$svg = preg_replace('/<svg(\b[^>]*)>/i', '<svg$1 class="custom-logo">', $svg, 1);
				}
			}
			$html = '<a href="' . $home . '" class="custom-logo-link" rel="home" aria-label="' . $name . '">' . $svg . '</a>';
		}
	}
	return $html;
}
add_filter('get_custom_logo', 'lsx_demo_theme_custom_logo_fallback');
