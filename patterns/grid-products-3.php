<?php

/**
 * Title: Grid — Products 3-up
 * Slug: lbh/grid-products-3
 * Categories: query, product, section
 * Keywords: products, grid, catalog
 * Description: Responsive 3-column Query Loop of designer boots.
 * ViewportWidth: 1200
 */
?>
<!-- wp:query {"query":{"perPage":6,"postType":"designer_boot"},"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
	<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|spacing-20","padding":{"top":"var:preset|spacing|spacing-30","bottom":"var:preset|spacing|spacing-30","left":"var:preset|spacing|spacing-30","right":"var:preset|spacing|spacing-30"},"margin":{"bottom":"0"}},"border":{"width":"1px","style":"solid","color":"var:preset|color|neutral-300"},"typography":{"fontSize":"0.875rem"}}} -->
	<div class="wp-block-group">
		<!-- wp:post-featured-image {"height":"260px","style":{"border":{"radius":"var(--radius-card)"}}} /-->
		<!-- wp:post-title {"isLink":true,"level":3} /-->
		<!-- wp:post-excerpt {"moreText":"View details"} /-->
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
		<div class="wp-block-group">
			<!-- wp:post-terms {"term":"brand","className":"term-chip"} /-->
			<!-- wp:post-terms {"term":"material","className":"term-chip"} /-->
			<!-- wp:post-terms {"term":"heel_height","className":"term-chip"} /-->
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