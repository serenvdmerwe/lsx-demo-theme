<?php
/**
 * Title: Related Fish Species
 * Slug: lsx-demo-theme/fish-related
 * Categories: lsx_demo_theme_fish, posts
 * Keywords: fish, related, species, query, posts
 * Description: A query block displaying related fish species with featured images, titles and excerpts.
 * Viewport width: 1400
 * Post Types: fish
 *
 * @package WordPress
 * @subpackage LSX_Demo_Theme
 * @since lsx-demo-theme 1.0
 */

?>

<!-- Related fish species query section -->
<!-- Displays 3 related fish posts with featured images and metadata -->
<!-- Includes no-results fallback message for empty queries -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"},"color":{"background":"var:preset|color|light"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-light-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"textAlign":"left","level":2,"style":{"color":{"text":"var:preset|color|accent-1"},"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"large"} -->
		<h2 class="wp-block-heading has-text-align-left has-accent-1-color has-text-color has-large-font-size"><?php echo esc_html_x( 'Related Species', 'Related fish section heading', 'lsx-demo-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|neutral"}},"fontSize":"x-small"} -->
		<p class="has-neutral-color has-text-color has-x-small-font-size"><?php echo esc_html_x( 'Similar Fish', 'Related fish annotation', 'lsx-demo-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"fish","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"20rem"}} -->
			<!-- wp:group {"style":{"color":{"background":"var:preset|color|base"},"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|40","left":"0","right":"0"}},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--custom--border--radius--medium);padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--40);padding-left:0">
				<!-- wp:post-featured-image {"aspectRatio":"16/9","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"0px","bottomRight":"0px"}},"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
					<!-- wp:post-title {"level":3,"isLink":true,"style":{"color":{"text":"var:preset|color|accent-1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|20"}}},"fontSize":"medium"} /-->

					<!-- wp:post-excerpt {"moreText":"<?php echo esc_html_x( 'Learn more about this species', 'Read more link text', 'lsx-demo-theme' ); ?>","showMoreOnNewLine":false,"excerptLength":20,"style":{"color":{"text":"var:preset|color|light"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}},"fontSize":"x-small"} /-->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group">
						<!-- wp:post-terms {"term":"species","style":{"color":{"text":"var:preset|color|accent-2"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"tiny"} /-->

						<!-- wp:post-date {"style":{"color":{"text":"var:preset|color|neutral"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"tiny"} /-->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|base"},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--custom--border--radius--medium);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"var:preset|color|accent-1"}},"fontSize":"medium"} -->
				<h3 class="wp-block-heading has-text-align-center has-accent-1-color has-text-color has-medium-font-size"><?php echo esc_html_x( 'No Related Species Found', 'No results heading', 'lsx-demo-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var:preset|color|neutral"}},"fontSize":"x-small"} -->
				<p class="has-text-align-center has-neutral-color has-text-color has-x-small-font-size"><?php echo esc_html_x( 'Check back soon for more fish species information and fishing tips.', 'No results message', 'lsx-demo-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:0">
		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"style":{"color":{"background":"var:preset|color|accent-2","text":"var:preset|color|base"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button has-base-color has-accent-2-background-color has-text-color has-background"><?php echo esc_html_x( 'View All Fish Species', 'View all button text', 'lsx-demo-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->