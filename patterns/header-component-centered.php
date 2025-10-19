<?php
/**
 * Title: Header Component - Centered
 * Slug: lsx-demo-theme/header-component-centered
 * Categories: lsx_demo_theme_header_components
 * Block Types: core/template-part/header
 * Description: Centered reusable header component with logo/title centered and navigation below.
 *
 * @package WordPress
 * @subpackage lsx-demo-theme
 * @since lsx-demo-theme 1.0
 */

?>
<!-- wp:group {"tagName":"header","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"color":"var:preset|color|accent-6","width":"1px"}}},"backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"},"ariaLabel":"<?php esc_attr_e( 'Site Header', 'lsx-demo-theme' ); ?>"} -->
<header class="wp-block-group has-contrast-color has-base-background-color has-text-color has-background" style="border-bottom-color:var(--wp--preset--color--accent-6);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--30)" aria-label="<?php esc_attr_e( 'Site Header', 'lsx-demo-theme' ); ?>">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","orientation":"vertical"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"center"}} -->
		<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--40)">
			<!-- wp:site-logo {"width":50,"shouldSyncIcon":true,"className":"site-logo"} /-->
			<!-- wp:site-title {"level":0,"textAlign":"center","style":{"typography":{"fontWeight":"700","fontSize":"2.5rem"}},"className":"site-title"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:navigation {"ref":1,"overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap","orientation":"horizontal"},"ariaLabel":"<?php esc_attr_e( 'Main Navigation', 'lsx-demo-theme' ); ?>","className":"main-navigation centered-nav"} /-->
			
			<!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'lsx-demo-theme' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Search...', 'lsx-demo-theme' ); ?>","width":200,"widthUnit":"px","buttonText":"<?php esc_attr_e( 'Search', 'lsx-demo-theme' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"border":{"radius":"var:preset|border-radius|small"}},"className":"header-search"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</header>
<!-- /wp:group -->