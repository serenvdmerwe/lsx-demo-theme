<?php

/**
 * Title: Luxury Statement Hero
 * Slug: lsx-demo-theme/hero-luxury-statement
 * Categories: luxury, hero
 * Keywords: hero, luxury, statement, cover, headline
 * Description: A bold hero section with luxury brand messaging and call-to-action buttons
 */
?>

<!-- wp:cover {"dimRatio":70,"overlayColor":"primary","minHeight":80,"minHeightUnit":"vh","contentPosition":"center center","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}}} -->
<div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100);min-height:80vh">
	<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(3rem, 5vw, 5rem)","lineHeight":"1.05","letterSpacing":"0.02em"}},"textColor":"base","fontFamily":"heading-font"} -->
			<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color has-heading-font-font-family" style="font-size:clamp(3rem, 5vw, 5rem);line-height:1.05;letter-spacing:0.02em"><?php esc_html_e('Elevate Every Step', 'lsx-demo-theme'); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|font-size-600","lineHeight":"1.3"}},"textColor":"neutral-100","fontFamily":"body-font"} -->
			<p class="has-text-align-center has-neutral-100-color has-text-color has-body-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-600);line-height:1.3"><?php esc_html_e('Where timeless craftsmanship meets contemporary elegance. Each pair is a testament to uncompromising quality and sophisticated design.', 'lsx-demo-theme'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|80"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--80)">
				<!-- wp:button {"backgroundColor":"accent","textColor":"primary","style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.05em"},"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}},"fontSize":"font-size-400","fontFamily":"ui-font"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-accent-background-color has-text-color has-background has-ui-font-font-family has-font-size-400-font-size wp-element-button" style="border-radius:0px;text-transform:uppercase;letter-spacing:0.05em;font-weight:700;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e('Explore Collection', 'lsx-demo-theme'); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"textColor":"base","style":{"color":{"background":"#00000000"},"typography":{"fontWeight":"500","textTransform":"uppercase","letterSpacing":"0.05em"},"border":{"color":"var:preset|color|base","width":"2px","radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}},"fontSize":"font-size-400","fontFamily":"ui-font"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-text-color has-ui-font-font-family has-font-size-400-font-size wp-element-button has-border-color" style="border-color:var(--wp--preset--color--base);border-width:2px;border-radius:0px;background-color:#00000000;text-transform:uppercase;letter-spacing:0.05em;font-weight:500;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e('Our Story', 'lsx-demo-theme'); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->