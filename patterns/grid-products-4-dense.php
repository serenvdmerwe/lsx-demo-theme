<?php

/**
 * Title: Grid — Products 4-up Dense
 * Slug: lbh/grid-products-4
 * Categories: query, product, section
 * Keywords: products, grid, dense
 * Description: Compact 4-column product grid for larger catalogs.
 * ViewportWidth: 1400
 */
?>
<!-- wp:query {"query":{"perPage":8,"postType":"designer_boot"},"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
	<!-- wp:post-template {"layout":{"type":"grid","columnCount":4}} -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|spacing-20","padding":{"top":"var:preset|spacing|spacing-20","bottom":"var:preset|spacing|spacing-20","left":"var:preset|spacing|spacing-20","right":"var:preset|spacing|spacing-20"}},"border":{"width":"1px","style":"solid","color":"var:preset|color|neutral-300"},"typography":{"fontSize":"0.75rem"}}} -->
	<div class="wp-block-group">
		<!-- wp:post-featured-image {"height":"200px"} /-->
		<!-- wp:post-title {"isLink":true,"level":4} /-->
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"0.35rem"}}} -->
		<div class="wp-block-group">
			<!-- wp:post-terms {"term":"heel_height"} /-->
			<!-- wp:post-terms {"term":"material"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->
	<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
	<!-- wp:query-pagination-numbers /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->