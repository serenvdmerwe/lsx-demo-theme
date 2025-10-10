<?php

/**
 * Title: Boot Card
 * Slug: lbh/boot-card
 * Categories: product, section
 * Keywords: product card, boot
 * Description: Single boot card layout for reuse inside query loops.
 * ViewportWidth: 400
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|spacing-20","padding":{"top":"var:preset|spacing|spacing-30","bottom":"var:preset|spacing|spacing-30","left":"var:preset|spacing|spacing-30","right":"var:preset|spacing|spacing-30"}},"border":{"width":"1px","color":"var:preset|color|neutral-300"},"typography":{"fontSize":"0.875rem"}}} -->
<div class="wp-block-group">
	<!-- wp:post-featured-image {"height":"260px"} /-->
	<!-- wp:post-title {"isLink":true,"level":4} /-->
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
	<div class="wp-block-group">
		<!-- wp:post-terms {"term":"brand"} /-->
		<!-- wp:post-terms {"term":"heel_height"} /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:post-excerpt {"moreText":"View details"} /-->
</div>
<!-- /wp:group -->