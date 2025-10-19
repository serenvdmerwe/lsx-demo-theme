<?php
/**
 * Title: Header Component - Default
 * Slug: lsx-demo-theme/header-component-default
 * Categories: lsx_demo_theme_header_components
 * Block Types: core/template-part/header
 * Description: Default reusable header component with site logo/title and horizontal navigation.
 *
 * @package WordPress
 * @subpackage lsx-demo-theme
 * @since lsx-demo-theme 1.0
 */

?>
<!-- wp:group {"tagName":"header","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"color":"var:preset|color|accent-6","width":"1px"}}},"backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"},"ariaLabel":"<?php esc_attr_e( 'Site Header', 'lsx-demo-theme' ); ?>"} -->
<header class="wp-block-group has-contrast-color has-base-background-color has-text-color has-background" style="border-bottom-color:var(--wp--preset--color--accent-6);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)" aria-label="<?php esc_attr_e( 'Site Header', 'lsx-demo-theme' ); ?>">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":40,"shouldSyncIcon":true,"className":"site-logo"} /-->
			<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"700"}},"className":"site-title"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:navigation {"ref":1,"overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap","orientation":"horizontal"},"ariaLabel":"<?php esc_attr_e( 'Main Navigation', 'lsx-demo-theme' ); ?>","className":"main-navigation"} /-->
			
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'lsx-demo-theme' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Search...', 'lsx-demo-theme' ); ?>","width":200,"widthUnit":"px","buttonText":"<?php esc_attr_e( 'Search', 'lsx-demo-theme' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"border":{"radius":"var:preset|border-radius|small"}},"className":"header-search"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</header>
<!-- /wp:group -->