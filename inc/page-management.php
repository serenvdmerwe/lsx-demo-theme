<?php

/**
 * Theme page management functions
 * Creates/deletes pages when theme is activated/deactivated
 */

/**
 * Create required pages on theme activation
 */
function lsx_demo_theme_create_pages()
{
	// Pages to create
	$pages = array(
		'home' => array(
			'title' => 'Home',
			'content' => '<!-- wp:template-part {"slug":"hero-home"} /-->
            <!-- wp:template-part {"slug":"features-section"} /-->
            <!-- wp:template-part {"slug":"featured-products"} /-->
            <!-- wp:template-part {"slug":"testimonials-section"} /-->
            <!-- wp:template-part {"slug":"cta-newsletter"} /-->',
			'template' => 'page-home'
		),
		'catalog' => array(
			'title' => 'Catalog',
			'content' => '<!-- wp:template-part {"slug":"catalog-filters"} /-->
            <!-- wp:template-part {"slug":"product-grid"} /-->',
			'template' => 'page-catalog'
		),
		'about' => array(
			'title' => 'About Us',
			'content' => '<!-- wp:template-part {"slug":"about-story"} /-->
            <!-- wp:template-part {"slug":"about-values"} /-->',
			'template' => 'page-about'
		),
		'contact' => array(
			'title' => 'Contact',
			'content' => '<!-- wp:template-part {"slug":"contact-info"} /-->
            <!-- wp:template-part {"slug":"contact-form"} /-->',
			'template' => 'page-contact'
		),
		'blog' => array(
			'title' => 'Blog',
			'content' => '<!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
            <div class="wp-block-query">
                <!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
                <!-- wp:post-title {"level":3,"isLink":true} /-->
                <!-- wp:post-excerpt /-->
                <!-- /wp:post-template -->
                <!-- wp:query-pagination /-->
            </div>
            <!-- /wp:query -->',
			'template' => 'page-blog'
		)
	);

	// Pages to delete (unwanted WooCommerce/other pages)
	$pages_to_delete = array(
		'Cart',
		'Checkout',
		'My account',
		'Refund and Returns Policy',
		'Sample Page'
	);

	// Delete unwanted pages first
	foreach ($pages_to_delete as $page_title) {
		$page = get_page_by_title($page_title);
		if ($page) {
			wp_delete_post($page->ID, true);
		}
	}

	// Rename "Shop" to "Catalog" if it exists
	$shop_page = get_page_by_title('Shop');
	if ($shop_page) {
		wp_update_post(array(
			'ID' => $shop_page->ID,
			'post_title' => 'Catalog',
			'post_name' => 'catalog'
		));
		update_post_meta($shop_page->ID, '_wp_page_template', 'page-catalog.html');
	}

	// Create new pages
	foreach ($pages as $slug => $page_data) {
		// Check if page already exists
		$existing_page = get_page_by_title($page_data['title']);

		if (!$existing_page) {
			$page_id = wp_insert_post(array(
				'post_type' => 'page',
				'post_title' => $page_data['title'],
				'post_name' => $slug,
				'post_content' => $page_data['content'],
				'post_status' => 'publish',
				'post_author' => 1
			));

			if ($page_id && !is_wp_error($page_id)) {
				// Set page template
				update_post_meta($page_id, '_wp_page_template', $page_data['template'] . '.html');

				// Set homepage
				if ($slug === 'home') {
					update_option('show_on_front', 'page');
					update_option('page_on_front', $page_id);
				}

				// Set blog page
				if ($slug === 'blog') {
					update_option('page_for_posts', $page_id);
				}
			}
		}
	}

	// Keep Privacy Policy (required by law)
	$privacy_page = get_page_by_title('Privacy Policy');
	if (!$privacy_page) {
		wp_insert_post(array(
			'post_type' => 'page',
			'post_title' => 'Privacy Policy',
			'post_name' => 'privacy-policy',
			'post_content' => '<!-- wp:paragraph -->
            <p>Your privacy policy content goes here.</p>
            <!-- /wp:paragraph -->',
			'post_status' => 'publish',
			'post_author' => 1
		));
	}
}

/**
 * Clean up pages on theme deactivation
 */
function lsx_demo_theme_cleanup_pages()
{
	// Optional: Remove created pages when theme is deactivated
	// Uncomment if you want this behavior
	/*
    $pages_to_remove = array('Home', 'Catalog', 'About Us', 'Contact', 'Blog');
    foreach ($pages_to_remove as $page_title) {
        $page = get_page_by_title($page_title);
        if ($page) {
            wp_delete_post($page->ID, true);
        }
    }
    */
}

// Hook into theme activation
add_action('after_setup_theme', 'lsx_demo_theme_create_pages');

// Optional: Hook into theme deactivation
// add_action('switch_theme', 'lsx_demo_theme_cleanup_pages');
