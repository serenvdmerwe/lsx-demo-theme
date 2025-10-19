<?php

/**
 * Title: Product Filter Bar
 * Slug: lsx/product-filter-bar
 * Categories: lsx-patterns
 * Keywords: filter, taxonomy, search, products
 * Description: Advanced filtering component for luxury boot catalog with all taxonomies
 * Block Types: core/group
 * Inserter: true
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"var:preset|spacing|50"}},"border":{"bottom":{"color":"var:preset|color|luxury-neutral-100","width":"1px"}},"color":{"background":"var:preset|color|ivory"}},"className":"luxury-filter-bar"} -->
<div class="wp-block-group alignfull luxury-filter-bar has-ivory-background-color has-background" style="border-bottom-color:var(--wp--preset--color--luxury-neutral-100);border-bottom-width:1px;margin-top:0;margin-bottom:var(--wp--preset--spacing--50);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","orientation":"horizontal"}} -->
	<div class="wp-block-group">

		<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","letterSpacing":"0.5px"}},"textColor":"primary-black","fontSize":"large","fontFamily":"montserrat"} -->
		<h3 class="wp-block-heading has-primary-black-color has-text-color has-montserrat-font-family has-large-font-size" style="font-weight:600;letter-spacing:0.5px"><?php echo esc_html_e('Filter Collection', 'lsx'); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"luxury-gold","textColor":"primary-black","style":{"border":{"radius":"2px"},"spacing":{"padding":{"left":"var:preset|spacing|30","right":"var:preset|spacing|30","top":"var:preset|spacing|15","bottom":"var:preset|spacing|15"}},"typography":{"fontSize":"14px","fontWeight":"500"}},"className":"filter-clear-all"} -->
			<div class="wp-block-button filter-clear-all">
				<a class="wp-block-button__link has-primary-black-color has-luxury-gold-background-color has-text-color has-background wp-element-button" style="border-radius:2px;padding-top:var(--wp--preset--spacing--15);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--15);padding-left:var(--wp--preset--spacing--30);font-size:14px;font-weight:500" href="#" onclick="clearAllFilters()"><?php echo esc_html_e('Clear All', 'lsx'); ?></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"horizontal"}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">

		<!-- wp:group {"style":{"spacing":{"margin":{"right":"var:preset|spacing|30","bottom":"var:preset|spacing|20"}}},"className":"filter-group heel-height-filter"} -->
		<div class="wp-block-group filter-group heel-height-filter" style="margin-right:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","fontWeight":"600","textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"luxury-neutral-700","fontFamily":"montserrat"} -->
			<p class="has-luxury-neutral-700-color has-text-color has-montserrat-font-family" style="font-size:14px;font-weight:600;text-transform:uppercase;letter-spacing:1px"><?php echo esc_html_e('Heel Height', 'lsx'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<select class="luxury-filter-select" data-taxonomy="heel_height" onchange="applyFilter(this)">
				<option value=""><?php echo esc_html_e('All Heights', 'lsx'); ?></option>
				<option value="flat"><?php echo esc_html_e('Flat (0-1")', 'lsx'); ?></option>
				<option value="low"><?php echo esc_html_e('Low (1-2")', 'lsx'); ?></option>
				<option value="medium"><?php echo esc_html_e('Medium (2-3")', 'lsx'); ?></option>
				<option value="high"><?php echo esc_html_e('High (3-4")', 'lsx'); ?></option>
				<option value="extra-high"><?php echo esc_html_e('Extra High (4"+)', 'lsx'); ?></option>
			</select>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"margin":{"right":"var:preset|spacing|30","bottom":"var:preset|spacing|20"}}},"className":"filter-group material-filter"} -->
		<div class="wp-block-group filter-group material-filter" style="margin-right:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","fontWeight":"600","textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"luxury-neutral-700","fontFamily":"montserrat"} -->
			<p class="has-luxury-neutral-700-color has-text-color has-montserrat-font-family" style="font-size:14px;font-weight:600;text-transform:uppercase;letter-spacing:1px"><?php echo esc_html_e('Material', 'lsx'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<select class="luxury-filter-select" data-taxonomy="material" onchange="applyFilter(this)">
				<option value=""><?php echo esc_html_e('All Materials', 'lsx'); ?></option>
				<option value="italian-leather"><?php echo esc_html_e('Italian Leather', 'lsx'); ?></option>
				<option value="suede"><?php echo esc_html_e('Suede', 'lsx'); ?></option>
				<option value="patent-leather"><?php echo esc_html_e('Patent Leather', 'lsx'); ?></option>
				<option value="exotic-leather"><?php echo esc_html_e('Exotic Leather', 'lsx'); ?></option>
				<option value="fabric"><?php echo esc_html_e('Premium Fabric', 'lsx'); ?></option>
				<option value="metallic"><?php echo esc_html_e('Metallic', 'lsx'); ?></option>
			</select>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"margin":{"right":"var:preset|spacing|30","bottom":"var:preset|spacing|20"}}},"className":"filter-group finish-filter"} -->
		<div class="wp-block-group filter-group finish-filter" style="margin-right:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","fontWeight":"600","textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"luxury-neutral-700","fontFamily":"montserrat"} -->
			<p class="has-luxury-neutral-700-color has-text-color has-montserrat-font-family" style="font-size:14px;font-weight:600;text-transform:uppercase;letter-spacing:1px"><?php echo esc_html_e('Finish', 'lsx'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<select class="luxury-filter-select" data-taxonomy="finish" onchange="applyFilter(this)">
				<option value=""><?php echo esc_html_e('All Finishes', 'lsx'); ?></option>
				<option value="glossy"><?php echo esc_html_e('Glossy', 'lsx'); ?></option>
				<option value="matte"><?php echo esc_html_e('Matte', 'lsx'); ?></option>
				<option value="brushed"><?php echo esc_html_e('Brushed', 'lsx'); ?></option>
				<option value="distressed"><?php echo esc_html_e('Distressed', 'lsx'); ?></option>
				<option value="metallic"><?php echo esc_html_e('Metallic', 'lsx'); ?></option>
			</select>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"margin":{"right":"var:preset|spacing|30","bottom":"var:preset|spacing|20"}}},"className":"filter-group collection-filter"} -->
		<div class="wp-block-group filter-group collection-filter" style="margin-right:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","fontWeight":"600","textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"luxury-neutral-700","fontFamily":"montserrat"} -->
			<p class="has-luxury-neutral-700-color has-text-color has-montserrat-font-family" style="font-size:14px;font-weight:600;text-transform:uppercase;letter-spacing:1px"><?php echo esc_html_e('Collection', 'lsx'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<select class="luxury-filter-select" data-taxonomy="collection" onchange="applyFilter(this)">
				<option value=""><?php echo esc_html_e('All Collections', 'lsx'); ?></option>
				<option value="heritage"><?php echo esc_html_e('Heritage', 'lsx'); ?></option>
				<option value="modern-classic"><?php echo esc_html_e('Modern Classic', 'lsx'); ?></option>
				<option value="avant-garde"><?php echo esc_html_e('Avant-Garde', 'lsx'); ?></option>
				<option value="seasonal"><?php echo esc_html_e('Seasonal', 'lsx'); ?></option>
				<option value="limited-edition"><?php echo esc_html_e('Limited Edition', 'lsx'); ?></option>
			</select>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"margin":{"right":"var:preset|spacing|30","bottom":"var:preset|spacing|20"}}},"className":"filter-group brand-filter"} -->
		<div class="wp-block-group filter-group brand-filter" style="margin-right:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","fontWeight":"600","textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"luxury-neutral-700","fontFamily":"montserrat"} -->
			<p class="has-luxury-neutral-700-color has-text-color has-montserrat-font-family" style="font-size:14px;font-weight:600;text-transform:uppercase;letter-spacing:1px"><?php echo esc_html_e('Brand', 'lsx'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<select class="luxury-filter-select" data-taxonomy="brand" onchange="applyFilter(this)">
				<option value=""><?php echo esc_html_e('All Brands', 'lsx'); ?></option>
				<option value="gucci"><?php echo esc_html_e('GUCCI', 'lsx'); ?></option>
				<option value="louis-vuitton"><?php echo esc_html_e('Louis Vuitton', 'lsx'); ?></option>
				<option value="prada"><?php echo esc_html_e('Prada', 'lsx'); ?></option>
				<option value="saint-laurent"><?php echo esc_html_e('Saint Laurent', 'lsx'); ?></option>
				<option value="louboutin"><?php echo esc_html_e('Christian Louboutin', 'lsx'); ?></option>
				<option value="balenciaga"><?php echo esc_html_e('Balenciaga', 'lsx'); ?></option>
			</select>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"margin":{"right":"var:preset|spacing|30","bottom":"var:preset|spacing|20"}}},"className":"filter-group color-filter"} -->
		<div class="wp-block-group filter-group color-filter" style="margin-right:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","fontWeight":"600","textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"luxury-neutral-700","fontFamily":"montserrat"} -->
			<p class="has-luxury-neutral-700-color has-text-color has-montserrat-font-family" style="font-size:14px;font-weight:600;text-transform:uppercase;letter-spacing:1px"><?php echo esc_html_e('Color', 'lsx'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<select class="luxury-filter-select" data-taxonomy="color" onchange="applyFilter(this)">
				<option value=""><?php echo esc_html_e('All Colors', 'lsx'); ?></option>
				<option value="black"><?php echo esc_html_e('Black', 'lsx'); ?></option>
				<option value="burgundy"><?php echo esc_html_e('Burgundy', 'lsx'); ?></option>
				<option value="gold"><?php echo esc_html_e('Gold', 'lsx'); ?></option>
				<option value="ivory"><?php echo esc_html_e('Ivory', 'lsx'); ?></option>
				<option value="brown"><?php echo esc_html_e('Brown', 'lsx'); ?></option>
				<option value="nude"><?php echo esc_html_e('Nude', 'lsx'); ?></option>
				<option value="metallic"><?php echo esc_html_e('Metallic', 'lsx'); ?></option>
			</select>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontWeight":"400"}},"textColor":"luxury-neutral-600","fontFamily":"open-sans"} -->
		<p class="has-luxury-neutral-600-color has-text-color has-open-sans-font-family" style="font-size:13px;font-weight:400">
			<span class="filter-results-count">Showing all products</span> |
			<span class="active-filters-display">No active filters</span>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontWeight":"400"}},"textColor":"luxury-neutral-600","fontFamily":"open-sans"} -->
			<p class="has-luxury-neutral-600-color has-text-color has-open-sans-font-family" style="font-size:13px;font-weight:400"><?php echo esc_html_e('Sort by:', 'lsx'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<select class="luxury-sort-select" onchange="applySorting(this)">
				<option value="newest"><?php echo esc_html_e('Newest', 'lsx'); ?></option>
				<option value="price-low"><?php echo esc_html_e('Price: Low to High', 'lsx'); ?></option>
				<option value="price-high"><?php echo esc_html_e('Price: High to Low', 'lsx'); ?></option>
				<option value="brand"><?php echo esc_html_e('Brand A-Z', 'lsx'); ?></option>
				<option value="popularity"><?php echo esc_html_e('Most Popular', 'lsx'); ?></option>
			</select>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->