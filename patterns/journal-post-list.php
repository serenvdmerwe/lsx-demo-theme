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
<!-- wp:query {"query":{"perPage":6}} -->
<div class="wp-block-query">
	<!-- wp:post-template -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|spacing-20","padding":{"bottom":"var:preset|spacing|spacing-30"},"margin":{"bottom":"0"}},"border":{"bottom":{"color":"var:preset|color|neutral-300","width":"1px"}}}} -->
	<div class="wp-block-group">
		<!-- wp:post-title {"isLink":true,"level":3} /-->
		<!-- wp:post-excerpt {"moreText":"Read more"} /-->
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"0.75rem"}}} -->
		<div class="wp-block-group">
			<!-- wp:post-date {"fontSize":"small"} /-->
			<!-- wp:post-terms {"term":"category","fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->
	<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<!-- wp:query-pagination-previous /-->
	<!-- wp:query-pagination-numbers /-->
	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->