<?php
/**
 * Title: Fish Gallery
 * Slug: lsx-demo-theme/fish-gallery
 * Categories: lsx_demo_theme_fish, media
 * Keywords: fish, gallery, images, photos, species
 * Description: A responsive gallery showcasing multiple fish species images with captions.
 * Viewport width: 1400
 * Post Types: fish
 *
 * @package WordPress
 * @subpackage LSX_Demo_Theme
 * @since lsx-demo-theme 1.0
 */

?>

<!-- Responsive fish species photo gallery -->
<!-- 3-column grid layout with proper alt text and captions -->
<!-- All images use get_theme_file_uri() for proper asset handling -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"},"color":{"background":"var:preset|color|base"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"textAlign":"left","level":2,"style":{"color":{"text":"var:preset|color|accent-1"},"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"large"} -->
		<h2 class="wp-block-heading has-text-align-left has-accent-1-color has-text-color has-large-font-size"><?php echo esc_html_x( 'Species Gallery', 'Gallery section heading', 'lsx-demo-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|neutral"}},"fontSize":"x-small"} -->
		<p class="has-neutral-color has-text-color has-x-small-font-size"><?php echo esc_html_x( 'Photo Collection', 'Gallery annotation', 'lsx-demo-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:gallery {"columns":3,"linkTo":"none","sizeSlug":"large","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
	<figure class="wp-block-gallery alignwide has-nested-images columns-3 is-cropped">
		<!-- wp:image {"alt":"<?php echo esc_attr_x( 'Largemouth bass jumping out of water', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>","sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large">
			<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/fish-gallery-bass-1.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Largemouth bass jumping out of water', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>"/>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'Largemouth bass mid-jump', 'Fish gallery caption', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"alt":"<?php echo esc_attr_x( 'Rainbow trout in clear mountain stream', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>","sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large">
			<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/fish-gallery-trout-1.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Rainbow trout in clear mountain stream', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>"/>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'Rainbow trout in natural habitat', 'Fish gallery caption', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"alt":"<?php echo esc_attr_x( 'Northern pike showing distinctive markings', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>","sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large">
			<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/fish-gallery-pike-1.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Northern pike showing distinctive markings', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>"/>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'Northern pike profile view', 'Fish gallery caption', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"alt":"<?php echo esc_attr_x( 'Smallmouth bass underwater near rocky bottom', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>","sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large">
			<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/fish-gallery-smallmouth-1.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Smallmouth bass underwater near rocky bottom', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>"/>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'Smallmouth bass in rocky habitat', 'Fish gallery caption', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"alt":"<?php echo esc_attr_x( 'Walleye showing distinctive eyes and coloring', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>","sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large">
			<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/fish-gallery-walleye-1.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Walleye showing distinctive eyes and coloring', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>"/>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'Walleye close-up detail', 'Fish gallery caption', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"alt":"<?php echo esc_attr_x( 'Brown trout with spotted pattern in stream', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>","sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large">
			<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/fish-gallery-brown-trout-1.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Brown trout with spotted pattern in stream', 'Alt text for fish gallery image', 'lsx-demo-theme' ); ?>"/>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'Brown trout displaying spots', 'Fish gallery caption', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->
	</figure>
	<!-- /wp:gallery -->

	<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var:preset|color|neutral"},"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"0"}}},"fontSize":"x-small"} -->
	<p class="has-text-align-center has-neutral-color has-text-color has-x-small-font-size" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:0"><?php echo esc_html_x( 'All photos taken in their natural freshwater habitats across North America', 'Gallery description', 'lsx-demo-theme' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->