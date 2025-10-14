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
<?php
/**
 * Title: Blog — Highlight Row
 * Slug: lbh/blog-highlight-row
 * Categories: blog
 * Keywords: blog, posts, featured
 * Description: Three latest blog posts with image, title, and excerpt.
 */
?>
<!-- wp:group {"layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-group">
	<!-- wp:heading {"level":2} -->Latest Posts<!-- /wp:heading -->
	<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group">
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
			<!-- wp:post-title {"isLink":true,"level":3} /-->
			<!-- wp:post-excerpt {"moreText":"Read more"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->