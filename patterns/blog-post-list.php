<?php

/**
 * Title: Journal — Post List
 * Slug: lbh/journal-post-list
 * Categories: blog, query
 * Keywords: list, posts, archive
 * Description: Vertical post list with excerpts and meta.
 * ViewportWidth: 1100
 */
?>
<?php
/**
 * Title: Blog — Post List
 * Slug: lbh/blog-post-list
 * Categories: blog
 * Keywords: blog, posts
 * Description: A simple list of blog posts with excerpts.
 */
?>
<!-- wp:group {"layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-group">
	<!-- wp:heading {"level":2} -->Latest Posts<!-- /wp:heading -->
	<!-- wp:query {"queryId":1,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"bottom":"var:preset|spacing|30"}},"border":{"bottom":{"width":"1px","color":"var:preset|color|neutral-300"}}}} -->
		<div class="wp-block-group">
			<!-- wp:post-title {"isLink":true,"level":3} /-->
			<!-- wp:post-excerpt {"moreText":"Read more"} /-->
			<!-- wp:post-date {"fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->