<?php

/**
 * Title: Grid — Boot Highlights
 * Slug: lsx-demo-theme/grid-boot-highlights
 * Categories: product, section
 * Keywords: boots, highlights, gallery, features
 * Description: Three featured boot highlight cards using custom image sizes.
 * ViewportWidth: 1400
 */
?>
<!-- wp:group {"layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-60","bottom":"var:preset|spacing|spacing-60"},"blockGap":"var:preset|spacing|spacing-50"}}} -->
<div class="wp-block-group">
	<!-- wp:heading {"level":2} -->Featured Boot Highlights<!-- /wp:heading -->
	<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|spacing-40"}}}} -->A curated trio of silhouettes. Replace placeholder images with product photography sized to <code>boot-card</code> (480×640) for crisp presentation.<!-- /wp:paragraph -->
	<!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|spacing-40"}}} -->
	<div class="wp-block-columns">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"sizeSlug":"boot-card","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-boot-card is-style-rounded"><img alt="Placeholder boot silhouette one" /></figure>
			<!-- /wp:image -->
			<!-- wp:heading {"level":3,"fontSize":"medium"} -->Obsidian Stiletto<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"small"} -->Sculpted profile with precision stitching and balanced arch support.<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"sizeSlug":"boot-card","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-boot-card is-style-rounded"><img alt="Placeholder boot silhouette two" /></figure>
			<!-- /wp:image -->
			<!-- wp:heading {"level":3,"fontSize":"medium"} -->Velour Column<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"small"} -->Plush texture with elongated shaft and breathable lining.<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"sizeSlug":"boot-card","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-boot-card is-style-rounded"><img alt="Placeholder boot silhouette three" /></figure>
			<!-- /wp:image -->
			<!-- wp:heading {"level":3,"fontSize":"medium"} -->Midnight Ankle<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"small"} -->Agile ankle cut with reinforced heel counter and subtle sheen.<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
