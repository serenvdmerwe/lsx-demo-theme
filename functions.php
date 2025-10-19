<?php
/**
 * LSX Demo Child Theme Functions
 *
 * @package LSX_Demo_Child
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue parent and child theme styles
 */
function lsx_demo_child_enqueue_styles() {
    // Enqueue parent theme stylesheet
    wp_enqueue_style('lsx-demo-parent-style', get_template_directory_uri() . '/style.css');
    
    // Enqueue child theme stylesheet
    wp_enqueue_style('lsx-demo-child-style', 
        get_stylesheet_directory_uri() . '/style.css',
        array('lsx-demo-parent-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'lsx_demo_child_enqueue_styles');

/**
 * Register theme support for block editor features
 */
function lsx_demo_child_theme_support() {
    // Add support for editor styles
    add_theme_support('editor-styles');
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add support for block templates
    add_theme_support('block-templates');
    
    // Add support for block template parts
    add_theme_support('block-template-parts');
}
add_action('after_setup_theme', 'lsx_demo_child_theme_support');

/**
 * Register custom header component as a block pattern
 */
function lsx_demo_child_register_header_pattern() {
    register_block_pattern(
        'lsx-demo-child/custom-header',
        array(
            'title'       => __('Custom Header Component', 'lsx-demo-child'),
            'description' => __('A reusable header component with logo, navigation, and call-to-action.', 'lsx-demo-child'),
            'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"backgroundColor":"white","className":"site-header","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull site-header has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":120} /-->

<!-- wp:navigation {"ref":4,"layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"center"}} /-->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white","className":"header-cta"} -->
<div class="wp-block-button header-cta"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="#contact">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
            'categories'  => array('header'),
            'keywords'    => array('header', 'navigation', 'logo'),
        )
    );
}
add_action('init', 'lsx_demo_child_register_header_pattern');

/**
 * Custom function to display reusable header component
 * Can be called from any template file
 */
function lsx_demo_child_header_component($args = array()) {
    $defaults = array(
        'show_logo' => true,
        'show_nav' => true,
        'show_cta' => true,
        'cta_text' => 'Get Started',
        'cta_link' => '#contact',
        'container_class' => 'custom-header-component'
    );
    
    $args = wp_parse_args($args, $defaults);
    
    ?>
    <header class="<?php echo esc_attr($args['container_class']); ?>">
        <div class="header-container">
            <?php if ($args['show_logo']) : ?>
                <div class="header-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($args['show_nav']) : ?>
                <nav class="header-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'header-menu',
                        'container' => false,
                        'fallback_cb' => false,
                    ));
                    ?>
                </nav>
            <?php endif; ?>
            
            <?php if ($args['show_cta']) : ?>
                <div class="header-cta">
                    <a href="<?php echo esc_url($args['cta_link']); ?>" class="cta-button">
                        <?php echo esc_html($args['cta_text']); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </header>
    <?php
}