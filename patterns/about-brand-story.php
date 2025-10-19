<?php

/**
 * Title: About Us - Brand Story
 * Slug: lsx-demo-theme/about-brand-story
 * Keywords: about, brand, story, heritage, luxury
 * Categories: about
 * Viewport width: 1400
 * Description: Elegant brand story section showcasing heritage and craftsmanship values for luxury footwear brand.
 *
 * @package lsx-demo-theme
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"25rem"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40)">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1.2"}},"textColor":"contrast","fontSize":"x-large","fontFamily":"playfair-display"} -->
			<h2 class="wp-block-heading has-contrast-color has-text-color has-playfair-display-font-family has-x-large-font-size" style="font-style:normal;font-weight:700;line-height:1.2"><?php esc_html_e('Our Story', 'lsx-demo-theme'); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6"}},"textColor":"contrast","fontSize":"medium","fontFamily":"montserrat"} -->
			<p class="has-contrast-color has-text-color has-montserrat-font-family has-medium-font-size" style="line-height:1.6"><?php esc_html_e('Four decades ago, our founder Maria Delacroix had a vision: to create footwear that embodied both timeless elegance and modern confidence. What began in a small atelier in Milan has grown into a globally recognised luxury brand, yet our commitment to exceptional craftsmanship remains unchanged.', 'lsx-demo-theme'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6"}},"textColor":"contrast","fontSize":"medium","fontFamily":"montserrat"} -->
			<p class="has-contrast-color has-text-color has-montserrat-font-family has-medium-font-size" style="line-height:1.6"><?php esc_html_e('Every pair of our designer boots tells a story of meticulous attention to detail, from the selection of the finest Italian leather to the final hand-finished touches that make each piece unique.', 'lsx-demo-theme'); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="padding-left:var(--wp--preset--spacing--40)">
			<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/about-craftsmanship.jpg" alt="<?php esc_attr_e('Skilled artisan hand-crafting luxury leather boot in Italian workshop', 'lsx-demo-theme'); ?>" style="border-radius:12px" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->