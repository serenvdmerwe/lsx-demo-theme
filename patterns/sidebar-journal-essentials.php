<?php

/**
 * Title: Sidebar — Journal Essentials
 * Slug: lbh/sidebar-journal-essentials
 * Categories: sidebar, blog
 * Keywords: sidebar, journal
 * Description: Sidebar stack with search, recent posts, categories, newsletter.
 * ViewportWidth: 400
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|spacing-40","padding":{"top":"var:preset|spacing|spacing-40","bottom":"var:preset|spacing|spacing-40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:search {"label":"Search journal","showLabel":false,"buttonText":"Search"} /-->
	<!-- wp:heading {"level":3,"fontSize":"medium"} -->Recent Posts<!-- /wp:heading -->
	<!-- wp:latest-posts {"postsToShow":5,"displayPostDate":true} /-->
	<!-- wp:heading {"level":3,"fontSize":"medium"} -->Categories<!-- /wp:heading -->
	<!-- wp:categories {"showPostCounts":false} /-->
	<!-- wp:pattern {"slug":"lbh/cta-newsletter-banner"} /-->
</div>
<!-- /wp:group -->