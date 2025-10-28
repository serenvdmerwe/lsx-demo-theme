<?php

/**
 * Title: Hidden blog heading
 * Slug: lsx-demo-theme/hidden-blog-heading
 * Description: Hidden heading for the home page and index template.
 * Inserter: no
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since lsx-demo-theme 1.0
 */

?>
<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xx-large"} -->
	<h1 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e('Blog', 'lsx-demo-theme'); ?></h1>
	<!-- /wp:heading -->
</div>
<!-- /wp:group -->