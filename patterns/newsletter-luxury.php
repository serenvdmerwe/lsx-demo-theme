<?php

/**
 * Title: Luxury Newsletter Signup
 * Slug: lsx-demo-theme/newsletter-luxury
 * Categories: luxury, cta
 * Keywords: newsletter, signup, cta, luxury, exclusive
 * Description: Elegant newsletter signup section with luxury branding and exclusive offer messaging
 */
?>

<!-- wp:group {"align":"full","style":{"color":{"background":"var:preset|color|neutral-900"},"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:var(--wp--preset--color--neutral-900);padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
	<div class="wp-block-group">

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|font-size-200","textTransform":"uppercase","letterSpacing":"0.15em","fontWeight":"600"}},"textColor":"accent","fontFamily":"ui-font"} -->
		<p class="has-text-align-center has-accent-color has-text-color has-ui-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-200);text-transform:uppercase;letter-spacing:0.15em;font-weight:600"><?php esc_html_e('Exclusive Access', 'lsx-demo-theme'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"var:preset|font-size|font-size-700","lineHeight":"1.2"}},"textColor":"base","fontFamily":"heading-font"} -->
		<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-heading-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-700);line-height:1.2"><?php esc_html_e('Stay Connected with Luxury', 'lsx-demo-theme'); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|60"}}},"textColor":"neutral-200","fontSize":"font-size-400","fontFamily":"body-font"} -->
		<p class="has-text-align-center has-neutral-200-color has-text-color has-body-font-font-family has-font-size-400-font-size" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--60)"><?php esc_html_e('Be the first to discover our latest collections, exclusive releases, and artisan insights. Join our community of discerning enthusiasts.', 'lsx-demo-theme'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="newsletter-form" style="display: flex; gap: 0; max-width: 500px; width: 100%;">
				<input type="email" placeholder="Enter your email address"
					style="flex: 1; padding: var(--wp--preset--spacing--40) var(--wp--preset--spacing--50);
							  border: 2px solid var(--wp--preset--color--neutral-600);
							  background: transparent; color: var(--wp--preset--color--base);
							  font-family: var(--wp--preset--font-family--body-font);
							  font-size: var(--wp--preset--font-size--font-size-300);" />
				<button type="submit"
					style="padding: var(--wp--preset--spacing--40) var(--wp--preset--spacing--50);
							   background: var(--wp--preset--color--accent);
							   color: var(--wp--preset--color--primary);
							   border: none; font-weight: 600;
							   text-transform: uppercase; letter-spacing: 0.05em;
							   font-family: var(--wp--preset--font-family--ui-font);
							   font-size: var(--wp--preset--font-size--font-size-300);
							   cursor: pointer;">Subscribe</button>
			</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}},"typography":{"fontSize":"var:preset|font-size|font-size-200"}},"textColor":"neutral-400","fontFamily":"body-font"} -->
		<p class="has-text-align-center has-neutral-400-color has-text-color has-body-font-font-family" style="margin-top:var(--wp--preset--spacing--40);font-size:var(--wp--preset--font-size--font-size-200)"><?php esc_html_e('We respect your privacy. Unsubscribe at any time.', 'lsx-demo-theme'); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->