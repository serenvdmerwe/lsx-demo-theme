<?php

/**
 * Title: Product — Related Boots
 * Slug: lbh/product-related
 * Categories: product, query, section
 * Keywords: related, cross-sell
 * Description: Three related designer boots.
 * ViewportWidth: 1200
 */
?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|spacing-70"},"padding":{"top":"var:preset|spacing|spacing-40","bottom":"var:preset|spacing|spacing-40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:heading {"level":3} -->Related Boots<!-- /wp:heading -->
	<!-- wp:query {"query":{"perPage":3,"postType":"designer_boot"},"layout":{"type":"default"}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|spacing-20"},"border":{"width":"1px","style":"solid","color":"var:preset|color|neutral-300"},"padding":{"top":"var:preset|spacing|spacing-30","bottom":"var:preset|spacing|spacing-30","left":"var:preset|spacing|spacing-30","right":"var:preset|spacing|spacing-30"}}} -->
		<div class="wp-block-group">
			<!-- wp:post-featured-image {"height":"240px"} /-->
			<!-- wp:post-title {"isLink":true,"level":4} /-->
			<!-- wp:post-terms {"term":"brand"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->