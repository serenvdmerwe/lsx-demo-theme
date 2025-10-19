<?php
/**
 * Example usage of header components in different ways
 * 
 * This file demonstrates various ways to use the reusable header component
 */

// Example 1: Using the template part (Block theme approach)
?>
<div class="example-block-header">
    <h2>Block Editor Header Component:</h2>
    <!-- You can insert the header-component.html content directly in your block editor -->
    <!-- Or use it as a pattern from the pattern library -->
</div>

<?php
// Example 2: Using the PHP template part
?>
<div class="example-php-template">
    <h2>PHP Template Part Header:</h2>
    <?php get_template_part('parts/header', 'component'); ?>
</div>

<?php
// Example 3: Using the header component function with default settings
?>
<div class="example-function-default">
    <h2>Function with Default Settings:</h2>
    <?php lsx_demo_child_header_component(); ?>
</div>

<?php
// Example 4: Using the header component function with custom settings
?>
<div class="example-function-custom">
    <h2>Function with Custom Settings:</h2>
    <?php
    lsx_demo_child_header_component(array(
        'show_logo' => true,
        'show_nav' => true,
        'show_cta' => true,
        'cta_text' => 'Contact Us',
        'cta_link' => '/contact',
        'cta_secondary_text' => 'About',
        'cta_secondary_link' => '/about',
        'container_class' => 'custom-header-variant',
        'sticky' => false
    ));
    ?>
</div>

<?php
// Example 5: Header for specific page types
if (is_front_page()) {
    // Homepage header with special CTA
    lsx_demo_child_header_component(array(
        'cta_text' => 'Start Free Trial',
        'cta_link' => '/signup',
        'cta_secondary_text' => 'Learn More',
        'sticky' => true
    ));
} elseif (is_shop() || is_product()) {
    // WooCommerce pages header
    lsx_demo_child_header_component(array(
        'cta_text' => 'View Cart',
        'cta_link' => '/cart',
        'cta_secondary_text' => 'Shop',
        'sticky' => true
    ));
} else {
    // Default header for other pages
    lsx_demo_child_header_component(array(
        'sticky' => false
    ));
}
?>