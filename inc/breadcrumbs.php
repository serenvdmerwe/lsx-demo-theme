<?php

/**
 * Breadcrumb navigation output.
 *
 * @package lsx-demo-theme
 */

function lsx_demo_theme_breadcrumb()
{
	if (is_front_page()) {
		return;
	}
	echo '<nav class="lsx-demo-theme-breadcrumb" aria-label="' . esc_attr__('Breadcrumb', 'lsx-demo-theme') . '"><ol>';
	echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'lsx-demo-theme') . '</a></li>';
	if (is_singular('designer_boot')) {
		echo '<li><a href="' . esc_url(get_post_type_archive_link('designer_boot')) . '">' . esc_html__('Designer Boots', 'lsx-demo-theme') . '</a></li>';
		echo '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
	} elseif (is_post_type_archive('designer_boot')) {
		echo '<li aria-current="page">' . esc_html__('Designer Boots', 'lsx-demo-theme') . '</li>';
	} elseif (is_single()) {
		echo '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
	} elseif (is_archive()) {
		echo '<li aria-current="page">' . esc_html(get_the_archive_title()) . '</li>';
	} elseif (is_search()) {
		echo '<li aria-current="page">' . sprintf(esc_html__('Search: %s', 'lsx-demo-theme'), esc_html(get_search_query())) . '</li>';
	} elseif (is_404()) {
		echo '<li aria-current="page">' . esc_html__('Not Found', 'lsx-demo-theme') . '</li>';
	}
	echo '</ol></nav>';
}
