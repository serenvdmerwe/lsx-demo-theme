<?php

/**
 * Title: Journal — Highlight Row
 * Slug: lbh/journal-highlight-row
 * Categories: blog, query, section
 * Keywords: posts, recent, editorial
 * Description: Three latest journal posts with image, title, and excerpt.
 * ViewportWidth: 1200
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-60","bottom":"var:preset|spacing|spacing-60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:heading {"level":2} -->Latest Journal<!-- /wp:heading -->
	<!-- wp:query {"query":{"perPage":3}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|spacing-20"}}} -->
		<div class="wp-block-group">
			<!-- wp:post-featured-image {"height":"200px","style":{"border":{"radius":"var(--radius-card)"}}} /-->
			<!-- wp:post-title {"isLink":true,"level":3} /-->
			<!-- wp:post-excerpt {"moreText":"Read more","fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->