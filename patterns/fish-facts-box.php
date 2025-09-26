<?php
/**
 * Title: Fish Facts Box
 * Slug: lsx-demo-theme/fish-facts-box
 * Categories: lsx_demo_theme_fish, text
 * Keywords: fish, facts, stats, information, species
 * Description: A facts box displaying key information about fish species including habitat, size, and fishing tips.
 * Viewport width: 1400
 * Post Types: fish
 *
 * @package WordPress
 * @subpackage LSX_Demo_Theme
 * @since lsx-demo-theme 1.0
 */

?>

<!-- Fish species facts display in responsive grid -->
<!-- Contains 4 key data points: size, habitat, bait, and season -->
<!-- Each fact card uses theme.json colors and spacing tokens -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"},"color":{"background":"var:preset|color|light"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-light-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"var:preset|color|accent-1"},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"fontSize":"large"} -->
		<h2 class="wp-block-heading has-text-align-center has-accent-1-color has-text-color has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo esc_html_x( 'Species Quick Facts', 'Facts section heading', 'lsx-demo-theme' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"color":{"background":"var:preset|color|base"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--custom--border--radius--medium);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"var:preset|color|accent-2"},"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}},"fontSize":"medium"} -->
			<h3 class="wp-block-heading has-text-align-center has-accent-2-color has-text-color has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--30)"><?php echo esc_html_x( 'Average Size', 'Fish fact category', 'lsx-demo-theme' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var:preset|color|light"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|20"}}},"fontSize":"small"} -->
			<p class="has-text-align-center has-light-color has-text-color has-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html_x( '12-15 inches', 'Sample fish size', 'lsx-demo-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var:preset|color|neutral"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"x-small"} -->
			<p class="has-text-align-center has-neutral-color has-text-color has-x-small-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( '2-5 pounds', 'Sample fish weight', 'lsx-demo-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"color":{"background":"var:preset|color|base"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--custom--border--radius--medium);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"var:preset|color|accent-2"},"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}},"fontSize":"medium"} -->
			<h3 class="wp-block-heading has-text-align-center has-accent-2-color has-text-color has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--30)"><?php echo esc_html_x( 'Habitat', 'Fish fact category', 'lsx-demo-theme' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var:preset|color|light"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"x-small"} -->
			<p class="has-text-align-center has-light-color has-text-color has-x-small-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Shallow waters near vegetation, fallen trees, and rocky structures', 'Sample fish habitat', 'lsx-demo-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"color":{"background":"var:preset|color|base"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--custom--border--radius--medium);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"var:preset|color|accent-2"},"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}},"fontSize":"medium"} -->
			<h3 class="wp-block-heading has-text-align-center has-accent-2-color has-text-color has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--30)"><?php echo esc_html_x( 'Best Bait', 'Fish fact category', 'lsx-demo-theme' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:list {"style":{"color":{"text":"var:preset|color|light"},"spacing":{"padding":{"left":"0"}}},"fontSize":"x-small"} -->
			<ul class="has-light-color has-text-color has-x-small-font-size" style="padding-left:0">
				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Live worms', 'Sample bait type', 'lsx-demo-theme' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Spinnerbaits', 'Sample bait type', 'lsx-demo-theme' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Plastic worms', 'Sample bait type', 'lsx-demo-theme' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"color":{"background":"var:preset|color|base"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--custom--border--radius--medium);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"var:preset|color|accent-2"},"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}},"fontSize":"medium"} -->
			<h3 class="wp-block-heading has-text-align-center has-accent-2-color has-text-color has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--30)"><?php echo esc_html_x( 'Best Season', 'Fish fact category', 'lsx-demo-theme' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var:preset|color|light"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|20"}}},"fontSize":"small"} -->
			<p class="has-text-align-center has-light-color has-text-color has-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html_x( 'Spring & Fall', 'Sample fishing season', 'lsx-demo-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var:preset|color|neutral"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"x-small"} -->
			<p class="has-text-align-center has-neutral-color has-text-color has-x-small-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Water temp: 60-75°F', 'Sample water temperature', 'lsx-demo-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->