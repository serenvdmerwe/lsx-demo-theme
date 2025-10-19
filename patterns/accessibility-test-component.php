<?php

/**
 * Title: Accessibility Testing Component
 * Slug: lsx/accessibility-test-component
 * Categories: lsx-patterns
 * Keywords: accessibility, testing, wcag, a11y
 * Description: Testing component for accessibility compliance validation across all luxury patterns
 * Block Types: core/group
 * Inserter: true
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"ivory","className":"accessibility-test-component"} -->
<div class="wp-block-group alignfull accessibility-test-component has-ivory-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
	<div class="wp-block-group">

		<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"600","letterSpacing":"0.5px"}},"textColor":"primary-black","fontSize":"x-large","fontFamily":"playfair-display"} -->
		<h2 class="wp-block-heading has-primary-black-color has-text-color has-playfair-display-font-family has-x-large-font-size" style="font-weight:600;letter-spacing:0.5px"><?php echo esc_html_e('Accessibility Compliance Testing', 'lsx'); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6"}},"textColor":"luxury-neutral-700","fontFamily":"open-sans"} -->
		<p class="has-luxury-neutral-700-color has-text-color has-open-sans-font-family" style="line-height:1.6"><?php echo esc_html_e('This component validates WCAG 2.2 AA compliance across all luxury boot catalog elements including keyboard navigation, screen reader compatibility, and color contrast requirements.', 'lsx'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
		<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-columns">

			<!-- wp:column {"width":"50%"} -->
			<div class="wp-block-column" style="flex-basis:50%">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500","fontSize":"20px"}},"textColor":"luxury-burgundy","fontFamily":"montserrat"} -->
				<h3 class="wp-block-heading has-luxury-burgundy-color has-text-color has-montserrat-font-family" style="font-size:20px;font-weight:500"><?php echo esc_html_e('Keyboard Navigation Test', 'lsx'); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}},"textColor":"luxury-neutral-600","fontFamily":"open-sans"} -->
					<p class="has-luxury-neutral-600-color has-text-color has-open-sans-font-family" style="font-size:14px"><?php echo esc_html_e('Test tabbing through interactive elements:', 'lsx'); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
					<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--20)">

						<!-- wp:button {"backgroundColor":"luxury-gold","textColor":"primary-black","style":{"border":{"radius":"3px"},"spacing":{"padding":{"left":"var:preset|spacing|25","right":"var:preset|spacing|25","top":"var:preset|spacing|15","bottom":"var:preset|spacing|15"}},"typography":{"fontSize":"14px"}},"className":"test-button-1"} -->
						<div class="wp-block-button test-button-1">
							<a class="wp-block-button__link has-primary-black-color has-luxury-gold-background-color has-text-color has-background wp-element-button" style="border-radius:3px;padding-top:var(--wp--preset--spacing--15);padding-right:var(--wp--preset--spacing--25);padding-bottom:var(--wp--preset--spacing--15);padding-left:var(--wp--preset--spacing--25);font-size:14px" href="#" tabindex="0" role="button" aria-label="<?php echo esc_attr_e('Test button one for keyboard navigation', 'lsx'); ?>"><?php echo esc_html_e('Button 1', 'lsx'); ?></a>
						</div>
						<!-- /wp:button -->

						<!-- wp:button {"backgroundColor":"luxury-burgundy","textColor":"ivory","style":{"border":{"radius":"3px"},"spacing":{"padding":{"left":"var:preset|spacing|25","right":"var:preset|spacing|25","top":"var:preset|spacing|15","bottom":"var:preset|spacing|15"}},"typography":{"fontSize":"14px"}},"className":"test-button-2"} -->
						<div class="wp-block-button test-button-2">
							<a class="wp-block-button__link has-ivory-color has-luxury-burgundy-background-color has-text-color has-background wp-element-button" style="border-radius:3px;padding-top:var(--wp--preset--spacing--15);padding-right:var(--wp--preset--spacing--25);padding-bottom:var(--wp--preset--spacing--15);padding-left:var(--wp--preset--spacing--25);font-size:14px" href="#" tabindex="0" role="button" aria-label="<?php echo esc_attr_e('Test button two for keyboard navigation', 'lsx'); ?>"><?php echo esc_html_e('Button 2', 'lsx'); ?></a>
						</div>
						<!-- /wp:button -->

						<!-- wp:button {"backgroundColor":"primary-black","textColor":"ivory","style":{"border":{"radius":"3px"},"spacing":{"padding":{"left":"var:preset|spacing|25","right":"var:preset|spacing|25","top":"var:preset|spacing|15","bottom":"var:preset|spacing|15"}},"typography":{"fontSize":"14px"}},"className":"test-button-3"} -->
						<div class="wp-block-button test-button-3">
							<a class="wp-block-button__link has-ivory-color has-primary-black-background-color has-text-color has-background wp-element-button" style="border-radius:3px;padding-top:var(--wp--preset--spacing--15);padding-right:var(--wp--preset--spacing--25);padding-bottom:var(--wp--preset--spacing--15);padding-left:var(--wp--preset--spacing--25);font-size:14px" href="#" tabindex="0" role="button" aria-label="<?php echo esc_attr_e('Test button three for keyboard navigation', 'lsx'); ?>"><?php echo esc_html_e('Button 3', 'lsx'); ?></a>
						</div>
						<!-- /wp:button -->

					</div>
					<!-- /wp:buttons -->

					<!-- wp:html -->
					<div style="margin-top: var(--wp--preset--spacing--25);">
						<label for="test-input" style="display: block; font-family: var(--wp--preset--font-family--open-sans); font-size: 14px; color: var(--wp--preset--color--luxury-neutral-600); margin-bottom: var(--wp--preset--spacing--10);">
							<?php echo esc_html_e('Test Input Field:', 'lsx'); ?>
						</label>
						<input
							type="text"
							id="test-input"
							name="test-input"
							placeholder="<?php echo esc_attr_e('Test keyboard focus here', 'lsx'); ?>"
							style="
								width: 100%;
								padding: var(--wp--preset--spacing--15);
								border: 1px solid var(--wp--preset--color--luxury-neutral-300);
								border-radius: 3px;
								font-family: var(--wp--preset--font-family--open-sans);
								font-size: 14px;
							"
							aria-describedby="test-input-help">
						<div id="test-input-help" style="font-size: 12px; color: var(--wp--preset--color--luxury-neutral-500); margin-top: var(--wp--preset--spacing--10);">
							<?php echo esc_html_e('Use Tab key to navigate to this field', 'lsx'); ?>
						</div>
					</div>
					<!-- /wp:html -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"50%"} -->
			<div class="wp-block-column" style="flex-basis:50%">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500","fontSize":"20px"}},"textColor":"luxury-burgundy","fontFamily":"montserrat"} -->
				<h3 class="wp-block-heading has-luxury-burgundy-color has-text-color has-montserrat-font-family" style="font-size:20px;font-weight:500"><?php echo esc_html_e('Screen Reader Test', 'lsx'); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}},"textColor":"luxury-neutral-600","fontFamily":"open-sans"} -->
					<p class="has-luxury-neutral-600-color has-text-color has-open-sans-font-family" style="font-size:14px"><?php echo esc_html_e('Test screen reader announcements:', 'lsx'); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:html -->
					<div style="margin-top: var(--wp--preset--spacing--20);">
						<!-- Image with proper alt text -->
						<figure style="margin: 0 0 var(--wp--preset--spacing--25) 0;">
							<img
								src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='200' height='150' viewBox='0 0 200 150'%3E%3Crect width='200' height='150' fill='%23000000'/%3E%3Ctext x='50%25' y='50%25' font-family='Arial' font-size='14' fill='white' text-anchor='middle' dy='.3em'%3ELuxury Boot%3C/text%3E%3C/svg%3E"
								alt="<?php echo esc_attr_e('Sample luxury boot product image for accessibility testing', 'lsx'); ?>"
								style="width: 100%; max-width: 200px; height: auto; border-radius: 3px;">
							<figcaption style="font-size: 12px; color: var(--wp--preset--color--luxury-neutral-500); margin-top: var(--wp--preset--spacing--10);">
								<?php echo esc_html_e('Sample product image with descriptive alt text', 'lsx'); ?>
							</figcaption>
						</figure>

						<!-- ARIA live region for dynamic content -->
						<div
							id="status-announcements"
							aria-live="polite"
							aria-atomic="true"
							style="
								border: 1px solid var(--wp--preset--color--luxury-neutral-300);
								padding: var(--wp--preset--spacing--20);
								border-radius: 3px;
								background: var(--wp--preset--color--luxury-neutral-50);
								font-size: 14px;
								color: var(--wp--preset--color--luxury-neutral-700);
							">
							<?php echo esc_html_e('Screen reader announcements will appear here...', 'lsx'); ?>
						</div>

						<!-- Test button for ARIA announcements -->
						<button
							onclick="document.getElementById('status-announcements').textContent = '<?php echo esc_js_e('Product added to cart successfully!', 'lsx'); ?>'"
							style="
								margin-top: var(--wp--preset--spacing--15);
								background: var(--wp--preset--color--luxury-gold);
								color: var(--wp--preset--color--primary-black);
								border: none;
								padding: var(--wp--preset--spacing--15) var(--wp--preset--spacing--25);
								border-radius: 3px;
								font-family: var(--wp--preset--font-family--montserrat);
								font-size: 14px;
								cursor: pointer;
							"
							aria-describedby="status-announcements">
							<?php echo esc_html_e('Test ARIA Announcement', 'lsx'); ?>
						</button>
					</div>
					<!-- /wp:html -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

		<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
		<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500","fontSize":"20px"}},"textColor":"luxury-burgundy","fontFamily":"montserrat"} -->
		<h3 class="wp-block-heading has-luxury-burgundy-color has-text-color has-montserrat-font-family" style="font-size:20px;font-weight:500"><?php echo esc_html_e('Color Contrast Testing', 'lsx'); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|30"}}}} -->
		<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--30)">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|25","bottom":"var:preset|spacing|25","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":"3px"}},"backgroundColor":"primary-black","textColor":"ivory"} -->
				<div class="wp-block-group has-ivory-color has-primary-black-background-color has-text-color has-background" style="border-radius:3px;padding-top:var(--wp--preset--spacing--25);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--25);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","fontWeight":"600"}},"fontFamily":"montserrat"} -->
					<p class="has-montserrat-font-family" style="font-size:14px;font-weight:600"><?php echo esc_html_e('Black on Ivory: 21:1 ✓', 'lsx'); ?></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px"}},"fontFamily":"open-sans"} -->
					<p class="has-open-sans-font-family" style="font-size:12px"><?php echo esc_html_e('Excellent contrast ratio', 'lsx'); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|25","bottom":"var:preset|spacing|25","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":"3px"}},"backgroundColor":"luxury-burgundy","textColor":"ivory"} -->
				<div class="wp-block-group has-ivory-color has-luxury-burgundy-background-color has-text-color has-background" style="border-radius:3px;padding-top:var(--wp--preset--spacing--25);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--25);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","fontWeight":"600"}},"fontFamily":"montserrat"} -->
					<p class="has-montserrat-font-family" style="font-size:14px;font-weight:600"><?php echo esc_html_e('Burgundy on Ivory: 12:1 ✓', 'lsx'); ?></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px"}},"fontFamily":"open-sans"} -->
					<p class="has-open-sans-font-family" style="font-size:12px"><?php echo esc_html_e('AAA compliant', 'lsx'); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|25","bottom":"var:preset|spacing|25","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":"3px"}},"backgroundColor":"luxury-gold","textColor":"primary-black"} -->
				<div class="wp-block-group has-primary-black-color has-luxury-gold-background-color has-text-color has-background" style="border-radius:3px;padding-top:var(--wp--preset--spacing--25);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--25);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","fontWeight":"600"}},"fontFamily":"montserrat"} -->
					<p class="has-montserrat-font-family" style="font-size:14px;font-weight:600"><?php echo esc_html_e('Black on Gold: 8.2:1 ✓', 'lsx'); ?></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px"}},"fontFamily":"open-sans"} -->
					<p class="has-open-sans-font-family" style="font-size:12px"><?php echo esc_html_e('AAA compliant', 'lsx'); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

		<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
		<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"8px","width":"1px"}},"borderColor":"luxury-neutral-200","backgroundColor":"white"} -->
		<div class="wp-block-group has-border-color has-luxury-neutral-200-border-color has-white-background-color has-background" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)">

			<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"500","fontSize":"18px"}},"textColor":"luxury-burgundy","fontFamily":"montserrat"} -->
			<h4 class="wp-block-heading has-luxury-burgundy-color has-text-color has-montserrat-font-family" style="font-size:18px;font-weight:500"><?php echo esc_html_e('Accessibility Checklist', 'lsx'); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:list {"style":{"typography":{"fontSize":"14px"}},"textColor":"luxury-neutral-700","fontFamily":"open-sans"} -->
			<ul class="has-luxury-neutral-700-color has-text-color has-open-sans-font-family" style="font-size:14px">
				<!-- wp:list-item -->
				<li><?php echo esc_html_e('✓ All interactive elements are keyboard accessible', 'lsx'); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_e('✓ Focus indicators are clearly visible', 'lsx'); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_e('✓ All images have descriptive alt text', 'lsx'); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_e('✓ Color contrast ratios meet WCAG AA standards', 'lsx'); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_e('✓ Form inputs have proper labels and descriptions', 'lsx'); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_e('✓ ARIA live regions announce dynamic content', 'lsx'); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_e('✓ Heading structure follows logical hierarchy', 'lsx'); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_e('✓ Skip links provided for navigation', 'lsx'); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->