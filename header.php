<?php
/**
 * Custom Header Template
 * 
 * This file overrides the parent theme's header.php
 * Uses the reusable header component
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'lsx-demo-child'); ?></a>

    <?php
    // Use the reusable header component with custom settings
    lsx_demo_child_header_component(array(
        'show_logo' => true,
        'show_nav' => true,
        'show_cta' => true,
        'cta_text' => 'Get Quote',
        'cta_link' => '/contact',
        'cta_secondary_text' => 'Our Services',
        'cta_secondary_link' => '/services',
        'sticky' => true
    ));
    ?>

    <div id="content" class="site-content">