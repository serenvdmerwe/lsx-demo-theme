<?php

/**
 * ONE-TIME PAGE CLEANUP SCRIPT
 *
 * INSTRUCTIONS:
 * 1. Upload this file to your WordPress root directory
 * 2. Visit: yoursite.com/fix-pages.php in your browser
 * 3. DELETE this file after running it once
 *
 * This will:
 * - Delete: Cart, Checkout, My account, Refund and Returns Policy, Sample Page
 * - Rename: "Shop" to "Catalog"
 * - Create: Home, About Us, Contact, Blog pages
 * - Keep: Privacy Policy (required by law)
 * - Set up proper homepage/blog page settings
 */

// Load WordPress
require_once('wp-load.php');

// Security check - only allow admin users
if (!current_user_can('manage_options')) {
	die('Permission denied. You must be logged in as an administrator.');
}

echo '<h1>LSX Demo Theme - Page Cleanup</h1>';

// Pages to delete
$pages_to_delete = array(
	'Cart',
	'Checkout',
	'My account',
	'Refund and Returns Policy',
	'Sample Page'
);

echo '<h2>Deleting unwanted pages...</h2>';
foreach ($pages_to_delete as $page_title) {
	$page = get_page_by_title($page_title);
	if ($page) {
		wp_delete_post($page->ID, true);
		echo "✅ Deleted: {$page_title}<br>";
	} else {
		echo "⚠️ Not found: {$page_title}<br>";
	}
}

// Rename Shop to Catalog
echo '<h2>Renaming Shop to Catalog...</h2>';
$shop_page = get_page_by_title('Shop');
if ($shop_page) {
	wp_update_post(array(
		'ID' => $shop_page->ID,
		'post_title' => 'Catalog',
		'post_name' => 'catalog'
	));
	echo "✅ Renamed 'Shop' to 'Catalog'<br>";
} else {
	echo "⚠️ Shop page not found<br>";
}

// Create required pages
$pages_to_create = array(
	'home' => array(
		'title' => 'Home',
		'content' => '<!-- wp:heading -->
<h1>Welcome to Our Store</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is your homepage. Customize this content through the WordPress editor.</p>
<!-- /wp:paragraph -->'
	),
	'about' => array(
		'title' => 'About Us',
		'content' => '<!-- wp:heading -->
<h1>About Us</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Tell your story here. Who you are, what you do, and why customers should choose you.</p>
<!-- /wp:paragraph -->'
	),
	'contact' => array(
		'title' => 'Contact',
		'content' => '<!-- wp:heading -->
<h1>Contact Us</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Get in touch with us. Add your contact information and contact form here.</p>
<!-- /wp:paragraph -->'
	),
	'blog' => array(
		'title' => 'Blog',
		'content' => '<!-- wp:heading -->
<h1>Our Blog</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Stay updated with our latest news and insights.</p>
<!-- /wp:paragraph -->'
	)
);

echo '<h2>Creating required pages...</h2>';
foreach ($pages_to_create as $slug => $page_data) {
	$existing_page = get_page_by_title($page_data['title']);

	if (!$existing_page) {
		$page_id = wp_insert_post(array(
			'post_type' => 'page',
			'post_title' => $page_data['title'],
			'post_name' => $slug,
			'post_content' => $page_data['content'],
			'post_status' => 'publish',
			'post_author' => get_current_user_id()
		));

		if ($page_id && !is_wp_error($page_id)) {
			echo "✅ Created: {$page_data['title']}<br>";

			// Set homepage
			if ($slug === 'home') {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $page_id);
				echo "✅ Set as homepage<br>";
			}

			// Set blog page
			if ($slug === 'blog') {
				update_option('page_for_posts', $page_id);
				echo "✅ Set as blog page<br>";
			}
		} else {
			echo "❌ Failed to create: {$page_data['title']}<br>";
		}
	} else {
		echo "⚠️ Already exists: {$page_data['title']}<br>";
	}
}

// Ensure Catalog page exists (if it was Shop)
$catalog_page = get_page_by_title('Catalog');
if (!$catalog_page) {
	$page_id = wp_insert_post(array(
		'post_type' => 'page',
		'post_title' => 'Catalog',
		'post_name' => 'catalog',
		'post_content' => '<!-- wp:heading -->
<h1>Our Catalog</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Browse our products and collections.</p>
<!-- /wp:paragraph -->',
		'post_status' => 'publish',
		'post_author' => get_current_user_id()
	));

	if ($page_id && !is_wp_error($page_id)) {
		echo "✅ Created: Catalog page<br>";
	}
}

echo '<h2>✅ Cleanup Complete!</h2>';
echo '<p><strong>Next steps:</strong></p>';
echo '<ul>';
echo '<li>Go to <a href="/wp-admin/edit.php?post_type=page">Pages</a> to verify changes</li>';
echo '<li>Go to <a href="/wp-admin/options-reading.php">Settings > Reading</a> to confirm homepage settings</li>';
echo '<li>Delete this file (fix-pages.php) from your server</li>';
echo '<li>Customize your page content through the WordPress editor</li>';
echo '</ul>';

echo '<p><a href="/wp-admin/edit.php?post_type=page">View Pages in Admin</a></p>';
