<?php

/**
 * Title: Boot Fact Box
 * Slug: lsx-demo-theme/boot-fact-box
 * Categories: luxury, product
 * Keywords: product, specifications, facts, luxury, details
 * Description: Elegant fact box displaying luxury boot specifications in a structured format
 */
?>

<!-- wp:group {"style":{"color":{"background":"var:preset|color|neutral-100"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:var(--wp--preset--color--neutral-100);border-radius:0px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">

	<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|font-size-500","textTransform":"uppercase","letterSpacing":"0.05em","fontWeight":"600"}},"textColor":"primary","fontFamily":"ui-font"} -->
	<h3 class="wp-block-heading has-primary-color has-text-color has-ui-font-font-family" style="font-size:var(--wp--preset--font-size--font-size-500);text-transform:uppercase;letter-spacing:0.05em;font-weight:600"><?php esc_html_e('Specifications', 'lsx-demo-theme'); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">

		<!-- wp:table {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"boot-specifications","fontSize":"font-size-300","fontFamily":"body-font"} -->
		<figure class="wp-block-table boot-specifications has-body-font-font-family has-font-size-300-font-size" style="margin-top:0;margin-bottom:0">
			<table>
				<tbody>
					<tr>
						<td class="has-text-align-left" data-align="left">
							<strong style="color: var(--wp--preset--color--primary);"><?php esc_html_e('Brand', 'lsx-demo-theme'); ?></strong>
						</td>
						<td><?php esc_html_e('Luxury Designer', 'lsx-demo-theme'); ?></td>
					</tr>
					<tr style="border-top: 1px solid var(--wp--preset--color--neutral-300);">
						<td class="has-text-align-left" data-align="left">
							<strong style="color: var(--wp--preset--color--primary);"><?php esc_html_e('Silhouette', 'lsx-demo-theme'); ?></strong>
						</td>
						<td><?php esc_html_e('Ankle Boot', 'lsx-demo-theme'); ?></td>
					</tr>
					<tr style="border-top: 1px solid var(--wp--preset--color--neutral-300);">
						<td class="has-text-align-left" data-align="left">
							<strong style="color: var(--wp--preset--color--primary);"><?php esc_html_e('Heel Height', 'lsx-demo-theme'); ?></strong>
						</td>
						<td><?php esc_html_e('4 inches (100mm)', 'lsx-demo-theme'); ?></td>
					</tr>
					<tr style="border-top: 1px solid var(--wp--preset--color--neutral-300);">
						<td class="has-text-align-left" data-align="left">
							<strong style="color: var(--wp--preset--color--primary);"><?php esc_html_e('Material', 'lsx-demo-theme'); ?></strong>
						</td>
						<td><?php esc_html_e('Premium Calfskin', 'lsx-demo-theme'); ?></td>
					</tr>
					<tr style="border-top: 1px solid var(--wp--preset--color--neutral-300);">
						<td class="has-text-align-left" data-align="left">
							<strong style="color: var(--wp--preset--color--primary);"><?php esc_html_e('Color', 'lsx-demo-theme'); ?></strong>
						</td>
						<td><?php esc_html_e('Black', 'lsx-demo-theme'); ?></td>
					</tr>
					<tr style="border-top: 1px solid var(--wp--preset--color--neutral-300);">
						<td class="has-text-align-left" data-align="left">
							<strong style="color: var(--wp--preset--color--primary);"><?php esc_html_e('Closure', 'lsx-demo-theme'); ?></strong>
						</td>
						<td><?php esc_html_e('Side Zip', 'lsx-demo-theme'); ?></td>
					</tr>
					<tr style="border-top: 1px solid var(--wp--preset--color--neutral-300);">
						<td class="has-text-align-left" data-align="left">
							<strong style="color: var(--wp--preset--color--primary);"><?php esc_html_e('Sizes Available', 'lsx-demo-theme'); ?></strong>
						</td>
						<td><?php esc_html_e('EU 35–40', 'lsx-demo-theme'); ?></td>
					</tr>
					<tr style="border-top: 1px solid var(--wp--preset--color--neutral-300);">
						<td class="has-text-align-left" data-align="left">
							<strong style="color: var(--wp--preset--color--primary);"><?php esc_html_e('Origin', 'lsx-demo-theme'); ?></strong>
						</td>
						<td><?php esc_html_e('Made in Italy', 'lsx-demo-theme'); ?></td>
					</tr>
					<tr style="border-top: 1px solid var(--wp--preset--color--neutral-300);">
						<td class="has-text-align-left" data-align="left">
							<strong style="color: var(--wp--preset--color--primary);"><?php esc_html_e('Care', 'lsx-demo-theme'); ?></strong>
						</td>
						<td><?php esc_html_e('Wipe with soft cloth; condition periodically', 'lsx-demo-theme'); ?></td>
					</tr>
				</tbody>
			</table>
		</figure>
		<!-- /wp:table -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"accent","textColor":"primary","width":100,"style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"},"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"fontSize":"font-size-300","fontFamily":"ui-font"} -->
			<div class="wp-block-button has-custom-width wp-block-button__width-100">
				<a class="wp-block-button__link has-primary-color has-accent-background-color has-text-color has-background has-ui-font-font-family has-font-size-300-font-size wp-element-button" style="border-radius:0px;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
					<?php esc_html_e('Enquire About This Boot', 'lsx-demo-theme'); ?>
				</a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->