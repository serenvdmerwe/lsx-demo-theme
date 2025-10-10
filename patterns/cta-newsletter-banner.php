<?php

/**
 * Title: CTA — Newsletter Banner
 * Slug: lbh/cta-newsletter-banner
 * Categories: call-to-action, section, footer
 * Keywords: subscribe, email, list
 * Description: Email subscription call-to-action band.
 * ViewportWidth: 1200
 */
?>
<!-- wp:group {"style":{"color":{"background":"var:preset|color|neutral-200"},"spacing":{"padding":{"top":"var:preset|spacing|spacing-40","bottom":"var:preset|spacing|spacing-40","left":"var:preset|spacing|spacing-40","right":"var:preset|spacing|spacing-40"},"blockGap":"var:preset|spacing|spacing-30"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group">
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":3} -->Join the List<!-- /wp:heading -->
		<!-- wp:paragraph {"fontSize":"small"} -->Occasional updates. No spam—ever.<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:html -->
		<form class="lbh-newsletter" action="#" method="post">
			<label class="screen-reader-text" for="lbh-news-email">Email</label>
			<input id="lbh-news-email" type="email" name="email" placeholder="you@company.com" required />
			<button type="submit">Subscribe</button>
		</form>
		<!-- /wp:html -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->