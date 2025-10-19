<?php
/**
 * Custom Header Component Template Part
 * 
 * This is a traditional PHP template that can be included in any theme file
 * Usage: get_template_part('parts/header', 'component');
 * Or include directly: include get_stylesheet_directory() . '/parts/header-component.php';
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Default arguments
$header_args = isset($args) ? $args : array();
$defaults = array(
    'show_logo' => true,
    'show_nav' => true,
    'show_cta' => true,
    'cta_text' => 'Get Started',
    'cta_link' => '#contact',
    'cta_secondary_text' => 'Learn More',
    'cta_secondary_link' => '#about',
    'container_class' => 'reusable-header-component',
    'sticky' => false
);

$header_args = wp_parse_args($header_args, $defaults);
$sticky_class = $header_args['sticky'] ? ' sticky-header' : '';
?>

<header class="<?php echo esc_attr($header_args['container_class'] . $sticky_class); ?>" role="banner">
    <div class="header-inner">
        <div class="header-content">
            
            <?php if ($header_args['show_logo']) : ?>
                <div class="header-branding">
                    <?php if (has_custom_logo()) : ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <div class="site-identity">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="site-title-link">
                                <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                            </a>
                            <?php 
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) :
                            ?>
                                <p class="site-description"><?php echo $description; ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($header_args['show_nav']) : ?>
                <nav class="header-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'lsx-demo-child'); ?>">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="menu-toggle-text"><?php esc_html_e('Menu', 'lsx-demo-child'); ?></span>
                        <span class="hamburger">
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                        </span>
                    </button>
                    
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'menu_class' => 'header-menu',
                        'container' => 'div',
                        'container_class' => 'header-menu-container',
                        'fallback_cb' => 'wp_page_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ));
                    ?>
                </nav>
            <?php endif; ?>
            
            <?php if ($header_args['show_cta']) : ?>
                <div class="header-actions">
                    <div class="header-cta-buttons">
                        <a href="<?php echo esc_url($header_args['cta_link']); ?>" 
                           class="cta-button cta-primary">
                            <?php echo esc_html($header_args['cta_text']); ?>
                        </a>
                        
                        <a href="<?php echo esc_url($header_args['cta_secondary_link']); ?>" 
                           class="cta-button cta-secondary">
                            <?php echo esc_html($header_args['cta_secondary_text']); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</header>

<script>
// Mobile menu toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const headerMenu = document.querySelector('.header-menu-container');
    
    if (menuToggle && headerMenu) {
        menuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            headerMenu.classList.toggle('is-open');
            document.body.classList.toggle('menu-open');
        });
    }
});
</script>