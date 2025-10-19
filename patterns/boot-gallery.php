<?php

/**
 * Title: Boot Gallery Showcase
 * Slug: lsx-demo-theme/boot-gallery
 * Categories: luxury, product, gallery
 * Keywords: gallery, product, images, luxury, showcase
 * Description: Elegant product gallery with multiple view angles and luxury presentation
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"var:preset|font-size|font-size-600","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"primary","fontFamily":"ui-font"} -->
	<h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-ui-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-600);text-transform:uppercase;letter-spacing:0.05em"><?php esc_html_e('Gallery', 'lsx-demo-theme'); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|60"}}},"textColor":"neutral-600","fontSize":"font-size-300","fontFamily":"body-font"} -->
	<p class="has-text-align-center has-neutral-600-color has-text-color has-body-font-font-family has-font-size-300-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--60)"><?php esc_html_e('Explore every exquisite detail of luxury craftsmanship', 'lsx-demo-theme'); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"large","linkDestination":"media","style":{"border":{"radius":"0px"}}} -->
			<figure class="wp-block-image size-large"><a href="#"><img src="" alt="<?php esc_attr_e('Luxury ankle boot detailed side view showing premium calfskin texture and craftsmanship', 'lsx-demo-theme'); ?>" style="border-radius:0px;aspect-ratio:4/5;object-fit:cover" /></a></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">

			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"medium","linkDestination":"media","style":{"border":{"radius":"0px"},"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
			<figure class="wp-block-image size-medium" style="margin-bottom:var(--wp--preset--spacing--40)"><a href="#"><img src="" alt="<?php esc_attr_e('Close-up view of heel construction and Italian leather finish', 'lsx-demo-theme'); ?>" style="border-radius:0px;aspect-ratio:1;object-fit:cover" /></a></figure>
			<!-- /wp:image -->

			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"medium","linkDestination":"media","style":{"border":{"radius":"0px"}}} -->
			<figure class="wp-block-image size-medium"><a href="#"><img src="" alt="<?php esc_attr_e('Sole construction detail showing luxury brand signature', 'lsx-demo-theme'); ?>" style="border-radius:0px;aspect-ratio:1;object-fit:cover" /></a></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--40)">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"media","style":{"border":{"radius":"0px"}}} -->
			<figure class="wp-block-image size-large"><a href="#"><img src="" alt="<?php esc_attr_e('Hardware detail showcasing luxury zipper and brand elements', 'lsx-demo-theme'); ?>" style="border-radius:0px;aspect-ratio:3/2;object-fit:cover" /></a></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"media","style":{"border":{"radius":"0px"}}} -->
			<figure class="wp-block-image size-large"><a href="#"><img src="" alt="<?php esc_attr_e('Interior view showing premium lining and comfort features', 'lsx-demo-theme'); ?>" style="border-radius:0px;aspect-ratio:3/2;object-fit:cover" /></a></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"media","style":{"border":{"radius":"0px"}}} -->
			<figure class="wp-block-image size-large"><a href="#"><img src="" alt="<?php esc_attr_e('Full profile view displaying elegant silhouette and proportions', 'lsx-demo-theme'); ?>" style="border-radius:0px;aspect-ratio:3/2;object-fit:cover" /></a></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}},"typography":{"fontSize":"var:preset|font-size|font-size-200"}},"textColor":"neutral-500","fontFamily":"body-font"} -->
	<p class="has-text-align-center has-neutral-500-color has-text-color has-body-font-font-family" style="margin-top:var(--wp--preset--spacing--60);font-size:var(--wp--preset--font-size--font-size-200)"><?php esc_html_e('Click any image to view in full size. All images showcase authentic product details.', 'lsx-demo-theme'); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->