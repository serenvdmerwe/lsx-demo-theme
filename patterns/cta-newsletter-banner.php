<?php

/**
 * Title: CTA — Newsletter Banner
 * Slug: lbh/cta-newsletter-banner
 * Categories: call-to-action, section, footer
 * Keywords: subscribe, email, list
 * Description: Email subscription call-to-action band.
 * ViewportWidth: 1200
 */
// Minimal fallbacks for static analysis environments where WordPress is not loaded.
if (! function_exists('esc_html')) {
	function esc_html($t)
	{
		return htmlspecialchars((string) $t, ENT_QUOTES, 'UTF-8');
	}
}
if (! function_exists('esc_attr')) {
	function esc_attr($t)
	{
		return htmlspecialchars((string) $t, ENT_QUOTES, 'UTF-8');
	}
}
if (! function_exists('esc_url')) {
	function esc_url($t)
	{
		return (string) $t;
	}
}
if (! function_exists('__')) {
	function __($t)
	{
		return $t;
	}
}
if (! function_exists('home_url')) {
	function home_url($p = '/')
	{
		return $p;
	}
}
if (! function_exists('wp_nonce_field')) {
	function wp_nonce_field()
	{ /* no-op outside WP */
	}
}
?>
<!-- wp:group {"style":{"color":{"background":"var:preset|color|neutral-300"},"spacing":{"padding":{"top":"var:preset|spacing|spacing-40","bottom":"var:preset|spacing|spacing-40","left":"var:preset|spacing|spacing-40","right":"var:preset|spacing|spacing-40"},"blockGap":"var:preset|spacing|spacing-30"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group">
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":3} --><?php echo esc_html(__('Join the List', 'lsx-demo-theme')); ?><!-- /wp:heading -->
		<!-- wp:paragraph {"fontSize":"small"} --><?php echo esc_html(__('Occasional updates. No spam—ever.', 'lsx-demo-theme')); ?><!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:html -->
		<form class="lbh-newsletter" action="<?php echo esc_url(home_url('/')); ?>" method="post">
			<label class="screen-reader-text" for="lbh-news-email"><?php echo esc_html(__('Email', 'lsx-demo-theme')); ?></label>
			<input id="lbh-news-email" type="email" name="lbh_news_email" placeholder="<?php echo esc_attr(__('you@example.com', 'lsx-demo-theme')); ?>" required autocomplete="email" />
			<?php wp_nonce_field('lbh_newsletter_signup', 'lbh_newsletter_nonce', false); ?>
			<button type="submit" name="lbh_newsletter_submit" class="lbh-newsletter__submit"><?php echo esc_html(__('Subscribe', 'lsx-demo-theme')); ?></button>
		</form>
		<!-- /wp:html -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->