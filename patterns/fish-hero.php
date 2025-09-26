<?php
/**
 * Title: Fish Hero Section
 * Slug: lsx-demo-theme/fish-hero
 * Categories: lsx_demo_theme_fish, banner
 * Keywords: fish, hero, species, banner
 * Description: A hero section for fish species with full width image, heading, description and call-to-action button.
 * Viewport width: 1400
 * Post Types: fish
 *
 * @package WordPress
 * @subpackage LSX_Demo_Theme
 * @since lsx-demo-theme 1.0
 */

?>

<!-- Full-width hero section for showcasing fish species -->
<!-- Designed to be used on single fish posts or landing pages -->
<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( '/assets/images/fish-hero-placeholder.webp' ) ); ?>","alt":"<?php echo esc_attr_x( 'Beautiful fish swimming in clear water', 'Alt text for fish hero image.', 'lsx-demo-theme' ); ?>","dimRatio":30,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.6},"minHeight":600,"minHeightUnit":"px","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-center-center" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50);min-height:var(--wp--custom--spacing--min-height--hero)">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-30 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="<?php echo esc_attr_x( 'Beautiful fish swimming in clear water', 'Alt text for fish hero image.', 'lsx-demo-theme' ); ?>" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/fish-hero-placeholder.webp' ) ); ?>" style="object-position:50% 60%" data-object-fit="cover" data-object-position="50% 60%"/>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"center"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:heading {"textAlign":"center","level":1,"style":{"color":{"text":"var:preset|color|light"}},"fontSize":"large"} -->
			<h1 class="wp-block-heading has-text-align-center has-light-color has-text-color has-large-font-size"><?php echo esc_html_x( 'Largemouth Bass', 'Sample fish species name', 'lsx-demo-theme' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var:preset|color|light"},"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}}},"fontSize":"medium"} -->
			<p class="has-text-align-center has-light-color has-text-color has-medium-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--40)"><?php echo esc_html_x( 'Known for their aggressive strikes and powerful fights, largemouth bass are one of the most sought-after freshwater game fish in North America.', 'Sample fish description', 'lsx-demo-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"style":{"color":{"background":"var:preset|color|accent-1","text":"var:preset|color|light"}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button has-light-color has-accent-1-background-color has-text-color has-background"><?php esc_html_e( 'Learn More About This Species', 'lsx-demo-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->