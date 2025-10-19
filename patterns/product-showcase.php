<?php

/**
 * Title: Luxury Product Showcase
 * Slug: lsx-demo-theme/product-showcase
 * Categories: luxury, product
 * Keywords: product, showcase, luxury, featured, gallery
 * Description: Elegant product showcase section with featured products in a luxury grid layout
 */
?>

<!-- wp:group {"align":"full","style":{"color":{"background":"var:preset|color|neutral-100"},"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:var(--wp--preset--color--neutral-100);padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
	<div class="wp-block-group">

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|font-size-300","textTransform":"uppercase","letterSpacing":"0.1em","fontWeight":"600"}},"textColor":"secondary","fontFamily":"ui-font"} -->
		<p class="has-text-align-center has-secondary-color has-text-color has-ui-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-300);text-transform:uppercase;letter-spacing:0.1em;font-weight:600"><?php esc_html_e('Signature Collection', 'lsx-demo-theme'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"var:preset|font-size|font-size-800","lineHeight":"1.1"}},"textColor":"primary","fontFamily":"heading-font"} -->
		<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-800);line-height:1.1"><?php esc_html_e('Masterpieces of Elegance', 'lsx-demo-theme'); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|70"}}},"textColor":"neutral-600","fontSize":"font-size-400","fontFamily":"body-font"} -->
		<p class="has-text-align-center has-neutral-600-color has-text-color has-body-font-font-family has-font-size-400-font-size" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--70)"><?php esc_html_e('Discover our carefully curated selection of luxury black heel boots, each designed to make a statement of refined sophistication.', 'lsx-demo-theme'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[]},"align":"wide"} -->
		<div class="wp-block-query alignwide">
			<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"style":{"spacing":{"padding":"0"},"color":{"background":"var:preset|color|base"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-background" style="background-color:var(--wp--preset--color--base);border-radius:0px;padding:0">

				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4","style":{"spacing":{"margin":{"bottom":"0"}}}} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">

					<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"var:preset|font-size|font-size-500","lineHeight":"1.2"}},"textColor":"primary","fontFamily":"heading-font"} /-->

					<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":15,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}}},"textColor":"neutral-600","fontSize":"font-size-300","fontFamily":"body-font"} /-->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","fontSize":"var:preset|font-size|font-size-500"}},"textColor":"accent","fontFamily":"ui-font"} -->
						<p class="has-accent-color has-text-color has-ui-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-500);font-weight:700"><?php esc_html_e('From $850', 'lsx-demo-theme'); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|font-size-200","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"secondary","fontFamily":"ui-font"} -->
						<p class="has-secondary-color has-text-color has-ui-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-200);text-transform:uppercase;letter-spacing:0.05em"><?php esc_html_e('View Details', 'lsx-demo-theme'); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
			<!-- /wp:post-template -->
		</div>
		<!-- /wp:query -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--70)">
			<!-- wp:button {"backgroundColor":"primary","textColor":"base","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"},"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}},"fontSize":"font-size-400","fontFamily":"ui-font"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-primary-background-color has-text-color has-background has-ui-font-font-family has-font-size-400-font-size wp-element-button" style="border-radius:0px;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e('View All Products', 'lsx-demo-theme'); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->