<?php

/**
 * Title: Luxury Brand Introduction
 * Slug: lsx-demo-theme/brand-introduction
 * Categories: luxury, about
 * Keywords: brand, introduction, luxury, craftsmanship, story
 * Description: An elegant brand introduction section with imagery and luxury messaging
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|90"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"0px"}}} -->
			<figure class="wp-block-image size-large"><img src="" alt="" style="border-radius:0px;aspect-ratio:4/5;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"55%","style":{"spacing":{"padding":{"left":"var:preset|spacing|70"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-left:var(--wp--preset--spacing--70);flex-basis:55%">

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|font-size-300","textTransform":"uppercase","letterSpacing":"0.1em","fontWeight":"600"}},"textColor":"secondary","fontFamily":"ui-font"} -->
			<p class="has-secondary-color has-text-color has-ui-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-300);text-transform:uppercase;letter-spacing:0.1em;font-weight:600"><?php esc_html_e('Artisan Heritage', 'lsx-demo-theme'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"var:preset|font-size|font-size-800","lineHeight":"1.1"}},"textColor":"primary","fontFamily":"heading-font"} -->
			<h2 class="wp-block-heading has-primary-color has-text-color has-heading-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-800);line-height:1.1"><?php esc_html_e('Crafted with Uncompromising Excellence', 'lsx-demo-theme'); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40"}}},"textColor":"neutral-700","fontSize":"font-size-400","fontFamily":"body-font"} -->
			<p class="has-neutral-700-color has-text-color has-body-font-font-family has-font-size-400-font-size" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e('Each pair is meticulously handcrafted using traditional techniques passed down through generations of master artisans. From the selection of the finest materials to the final polish, every detail embodies our commitment to luxury and perfection.', 'lsx-demo-theme'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"textColor":"neutral-600","fontSize":"font-size-300","fontFamily":"body-font"} -->
			<p class="has-neutral-600-color has-text-color has-body-font-font-family has-font-size-300-font-size" style="margin-bottom:var(--wp--preset--spacing--60)"><?php esc_html_e('We believe that true luxury lies not just in appearance, but in the story behind each creation. Our dedication to sustainable practices and ethical craftsmanship ensures that every step you take is a step toward a more conscious future.', 'lsx-demo-theme'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"primary","textColor":"base","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"},"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"fontSize":"font-size-300","fontFamily":"ui-font"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-primary-background-color has-text-color has-background has-ui-font-font-family has-font-size-300-font-size wp-element-button" style="border-radius:0px;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)"><?php esc_html_e('Learn Our Craft', 'lsx-demo-theme'); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->