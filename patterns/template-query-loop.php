<?php

/**
 * Title: List of posts, 1 column
 * Slug: lsx-demo-theme/template-query-loop
 * Categories: query
 * Block Types: core/query
 * Description: A list of posts, 1 column, with featured image and post date.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since lsx-demo-theme 1.0
 */

?>
<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-query alignfull">
	<!-- wp:post-template {"align":"full","layout":{"type":"default"}} -->
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} /-->
		<!-- wp:post-title {"isLink":true,"fontSize":"x-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} /-->
		<!-- wp:post-excerpt {"moreText":"Read more","fontSize":"medium","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} /-->
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
		<div class="wp-block-group">
			<!-- wp:post-date {"isLink":true,"fontSize":"small"} /-->
			<!-- wp:post-author {"showAvatar":false,"fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:query-no-results -->
		<!-- wp:paragraph -->
		<p><?php echo esc_html_x('Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'lsx-demo-theme'); ?></p>
		<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:query -->