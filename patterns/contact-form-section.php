<?php

/**
 * Title: Contact — Form Section
 * Slug: lbh/contact-form-section
 * Categories: contact, section
 * Keywords: contact, form
 * Description: Accessible contact form section with helper text.
 * ViewportWidth: 1100
 */
?>
<!-- wp:group {"layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-60","bottom":"var:preset|spacing|spacing-60"}}}} -->
<div class="wp-block-group" id="contact-form">
	<!-- wp:heading {"level":2} -->Send a Message<!-- /wp:heading -->
	<!-- wp:paragraph {"fontSize":"small"} -->We reply within 1–2 business days.<!-- /wp:paragraph -->
	<!-- wp:html -->
	<form class="lbh-contact-form" method="post" action="#">
		<p><label for="cf-name">Name</label><br><input id="cf-name" name="name" required></p>
		<p><label for="cf-email">Email</label><br><input id="cf-email" type="email" name="email" required></p>
		<p><label for="cf-message">Your message</label><br><textarea id="cf-message" name="message" rows="6" required></textarea></p>
		<p><button type="submit">Send Your Message</button></p>
	</form>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->