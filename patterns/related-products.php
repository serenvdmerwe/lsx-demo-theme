<?php

/**
 * Title: Related Products Showcase
 * Slug: lsx-demo-theme/related-products
 * Categories: luxury, product, recommendation
 * Keywords: related, products, recommendations, luxury, similar
 * Description: Elegant related products section with smart recommendations and luxury presentation
 */
?>

<!-- wp:group {"align":"full","style":{"color":{"background":"var:preset|color|neutral-100"},"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:var(--wp--preset--color--neutral-100);padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
	<div class="wp-block-group">

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|font-size-300","textTransform":"uppercase","letterSpacing":"0.1em","fontWeight":"600"}},"textColor":"secondary","fontFamily":"ui-font"} -->
		<p class="has-text-align-center has-secondary-color has-text-color has-ui-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-300);text-transform:uppercase;letter-spacing:0.1em;font-weight:600"><?php esc_html_e('Curated Selection', 'lsx-demo-theme'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"var:preset|font-size|font-size-700"}},"textColor":"primary","fontFamily":"heading-font"} -->
		<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-700)"><?php esc_html_e('You May Also Love', 'lsx-demo-theme'); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|70"}}},"textColor":"neutral-600","fontSize":"font-size-400","fontFamily":"body-font"} -->
		<p class="has-text-align-center has-neutral-600-color has-text-color has-body-font-font-family has-font-size-400-font-size" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--70)"><?php esc_html_e('Discover similar pieces from our luxury collection, carefully selected to complement your style.', 'lsx-demo-theme'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[]},"align":"wide"} -->
		<div class="wp-block-query alignwide">
			<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"style":{"spacing":{"padding":"0"},"color":{"background":"var:preset|color|base"},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-background" style="background-color:var(--wp--preset--color--base);border-radius:0px;padding:0">

				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4","style":{"spacing":{"margin":{"bottom":"0"}}}} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
					<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30)">
						<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|font-size-100","textTransform":"uppercase","letterSpacing":"0.1em","fontWeight":"600"},"color":{"background":"var:preset|color|neutral-900"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"textColor":"base","fontFamily":"ui-font"} -->
						<p class="has-base-color has-text-color has-background has-ui-font-font-family" style="background-color:var(--wp--preset--color--neutral-900);font-size:var(--wp--preset--font-size--font-size-100);text-transform:uppercase;letter-spacing:0.1em;font-weight:600;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)"><?php esc_html_e('New Arrival', 'lsx-demo-theme'); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:post-title {"textAlign":"center","isLink":true,"style":{"typography":{"fontSize":"var:preset|font-size|font-size-400","lineHeight":"1.3"}},"textColor":"primary","fontFamily":"heading-font"} /-->

					<!-- wp:post-excerpt {"textAlign":"center","moreText":"","showMoreOnNewLine":false,"excerptLength":12,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|30"}}},"textColor":"neutral-600","fontSize":"font-size-200","fontFamily":"body-font"} /-->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","fontSize":"var:preset|font-size|font-size-400"}},"textColor":"accent","fontFamily":"ui-font"} -->
						<p class="has-accent-color has-text-color has-ui-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-400);font-weight:700"><?php esc_html_e('From $950', 'lsx-demo-theme'); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|font-size-200","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"secondary","fontFamily":"ui-font"} -->
						<p class="has-secondary-color has-text-color has-ui-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-200);text-transform:uppercase;letter-spacing:0.05em">→ <?php esc_html_e('View', 'lsx-demo-theme'); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
					<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
						<!-- wp:button {"backgroundColor":"primary","textColor":"base","width":100,"style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"},"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"fontSize":"font-size-200","fontFamily":"ui-font"} -->
						<div class="wp-block-button has-custom-width wp-block-button__width-100">
							<a class="wp-block-button__link has-base-color has-primary-background-color has-text-color has-background has-ui-font-font-family has-font-size-200-font-size wp-element-button" style="border-radius:0px;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
								<?php esc_html_e('Quick View', 'lsx-demo-theme'); ?>
							</a>
						</div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
			<!-- /wp:post-template -->

			<!-- wp:query-no-results -->
			<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontFamily":"body-font"} -->
			<p class="has-text-align-center has-neutral-500-color has-text-color has-body-font-font-family"><?php esc_html_e('No related products available at this time.', 'lsx-demo-theme'); ?></p>
			<!-- /wp:paragraph -->
			<!-- /wp:query-no-results -->
		</div>
		<!-- /wp:query -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--70)">
			<!-- wp:button {"textColor":"primary","style":{"color":{"background":"#00000000"},"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"},"border":{"color":"var:preset|color|primary","width":"2px","radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"fontSize":"font-size-300","fontFamily":"ui-font"} -->
			<div class="wp-block-button">
				<a class="wp-block-button__link has-primary-color has-text-color has-ui-font-font-family has-font-size-300-font-size wp-element-button has-border-color" style="border-color:var(--wp--preset--color--primary);border-width:2px;border-radius:0px;background-color:#00000000;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)">
					<?php esc_html_e('View All Collection', 'lsx-demo-theme'); ?>
				</a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->