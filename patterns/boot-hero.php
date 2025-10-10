<?php

/**
 * Title: Boot Hero
 * Slug: lbh/boot-hero
 * Categories: product, hero
 * Keywords: product hero, featured
 * Description: Cover hero for single boot featuring image and title with taxonomy chips.
 * ViewportWidth: 1400
 */
?>
<!-- wp:cover {"dimRatio":30,"overlayColor":"neutral-0","minHeight":40,"minHeightUnit":"vh","style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-70","bottom":"var:preset|spacing|spacing-60"}}}} -->
<div class="wp-block-cover">
	<span aria-hidden="true" class="wp-block-cover__background has-neutral-0-background-color has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="Featured boot hero (swap image with product featured)" data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">
		<!-- wp:post-title {"level":1} /-->
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"0.75rem"},"typography":{"fontSize":"0.75rem"}}} -->
		<div class="wp-block-group">
			<!-- wp:post-terms {"term":"brand"} /-->
			<!-- wp:post-terms {"term":"silhouette"} /-->
			<!-- wp:post-terms {"term":"heel_height"} /-->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->