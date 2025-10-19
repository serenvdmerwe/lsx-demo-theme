<?php
/**
 * Title: Header Component - Featured
 * Slug: lsx-demo-theme/header-component-featured
 * Categories: lsx_demo_theme_header_components
 * Block Types: core/template-part/header
 * Description: Featured reusable header component with accent colors and promotional area.
 *
 * @package WordPress
 * @subpackage lsx-demo-theme
 * @since lsx-demo-theme 1.0
 */

?>
<!-- wp:group {"tagName":"header","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"},"ariaLabel":"<?php esc_attr_e( 'Site Header', 'lsx-demo-theme' ); ?>"} -->
<header class="wp-block-group has-contrast-color has-base-background-color has-text-color has-background" style="padding-top:0;padding-bottom:0" aria-label="<?php esc_attr_e( 'Site Header', 'lsx-demo-theme' ); ?>">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"color":{"background":"var:preset|color|accent-1"}},"textColor":"base","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-base-color has-text-color" style="background-color:var(--wp--preset--color--accent-1);padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
		<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:paragraph {"textAlign":"center","fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size"><?php esc_html_e( '🎉 Special Offer: Free shipping on orders over $50! Limited time only.', 'lsx-demo-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"color":"var:preset|color|accent-6","width":"1px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--accent-6);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
		<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:site-logo {"width":45,"shouldSyncIcon":true,"className":"site-logo featured"} /-->
				<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"700"}},"className":"site-title featured"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:navigation {"ref":1,"overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap","orientation":"horizontal"},"ariaLabel":"<?php esc_attr_e( 'Main Navigation', 'lsx-demo-theme' ); ?>","className":"main-navigation featured-nav"} /-->
				
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'lsx-demo-theme' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Search...', 'lsx-demo-theme' ); ?>","width":200,"widthUnit":"px","buttonText":"<?php esc_attr_e( 'Search', 'lsx-demo-theme' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"border":{"radius":"var:preset|border-radius|small"}},"className":"header-search"} /-->
					
					<!-- wp:buttons -->
					<div class="wp-block-buttons">
						<!-- wp:button {"backgroundColor":"accent-2","textColor":"base","style":{"border":{"radius":"var:preset|border-radius|small"},"typography":{"fontSize":"0.875rem"}},"className":"header-cta-button"} -->
						<div class="wp-block-button header-cta-button"><a class="wp-block-button__link has-base-color has-accent-2-background-color has-text-color has-background wp-element-button" style="border-radius:var(--wp--preset--border-radius--small);font-size:0.875rem"><?php esc_html_e( 'Shop Now', 'lsx-demo-theme' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</header>
<!-- /wp:group -->