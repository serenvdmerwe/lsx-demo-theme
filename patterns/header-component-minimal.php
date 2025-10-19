<?php
/**
 * Title: Header Component - Minimal
 * Slug: lsx-demo-theme/header-component-minimal
 * Categories: lsx_demo_theme_header_components
 * Block Types: core/template-part/header
 * Description: Minimal reusable header component with clean design and essential elements only.
 *
 * @package WordPress
 * @subpackage lsx-demo-theme
 * @since lsx-demo-theme 1.0
 */

?>
<!-- wp:group {"tagName":"header","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"},"ariaLabel":"<?php esc_attr_e( 'Site Header', 'lsx-demo-theme' ); ?>"} -->
<header class="wp-block-group has-contrast-color has-base-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)" aria-label="<?php esc_attr_e( 'Site Header', 'lsx-demo-theme' ); ?>">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"400","fontSize":"1.5rem"}},"className":"site-title minimal"} /-->
		
		<!-- wp:navigation {"ref":1,"overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap","orientation":"horizontal"},"ariaLabel":"<?php esc_attr_e( 'Main Navigation', 'lsx-demo-theme' ); ?>","className":"main-navigation minimal-nav","fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->
</header>
<!-- /wp:group -->