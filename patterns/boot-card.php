<?php

/**
 * Title: Boot Card
 * Slug: lbh/boot-card
 * Categories: product, section
 * Keywords: product card, boot
 * Description: Single boot card layout for reuse inside query loops.
 * ViewportWidth: 400
 */

// Localized text (fallback to literal when WP i18n functions are unavailable in analysis context).
$more = 'View details';
$more_attr = function_exists('esc_attr') ? esc_attr($more) : htmlspecialchars($more, ENT_QUOTES, 'UTF-8');

echo '<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|spacing-20","padding":{"top":"var:preset|spacing|spacing-30","bottom":"var:preset|spacing|spacing-30","left":"var:preset|spacing|spacing-30","right":"var:preset|spacing|spacing-30"}},"border":{"width":"1px","color":"var:preset|color|neutral-300"},"typography":{"fontSize":"0.875rem"}}} -->';
echo '<div class="wp-block-group">';
echo '<!-- wp:post-featured-image {"height":"260px"} /-->';
echo '<!-- wp:post-title {"isLink":true,"level":4} /-->';
echo '<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->';
echo '<div class="wp-block-group">';
echo '<!-- wp:post-terms {"term":"brand"} /-->';
echo '<!-- wp:post-terms {"term":"heel_height"} /-->';
echo '</div><!-- /wp:group -->';
echo '<!-- wp:post-excerpt {"moreText":"' . $more_attr . '"} /-->';
echo '</div><!-- /wp:group -->';
