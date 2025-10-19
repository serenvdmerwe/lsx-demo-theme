<?php
/**
 * Footer Template
 * 
 * The template for displaying the footer
 */

?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        
        <div class="footer-content">
            <div class="container">
                
                <div class="footer-widgets">
                    <div class="footer-widget-area">
                        <div class="footer-column">
                            <h3><?php _e('About Us', 'lsx-demo-child'); ?></h3>
                            <p><?php _e('Your website description or brief about section can go here.', 'lsx-demo-child'); ?></p>
                        </div>
                        
                        <div class="footer-column">
                            <h3><?php _e('Quick Links', 'lsx-demo-child'); ?></h3>
                            <ul>
                                <li><a href="<?php echo home_url('/'); ?>"><?php _e('Home', 'lsx-demo-child'); ?></a></li>
                                <li><a href="<?php echo home_url('/about'); ?>"><?php _e('About', 'lsx-demo-child'); ?></a></li>
                                <li><a href="<?php echo home_url('/services'); ?>"><?php _e('Services', 'lsx-demo-child'); ?></a></li>
                                <li><a href="<?php echo home_url('/contact'); ?>"><?php _e('Contact', 'lsx-demo-child'); ?></a></li>
                            </ul>
                        </div>
                        
                        <div class="footer-column">
                            <h3><?php _e('Contact Info', 'lsx-demo-child'); ?></h3>
                            <p><?php _e('Email: info@example.com', 'lsx-demo-child'); ?></p>
                            <p><?php _e('Phone: (555) 123-4567', 'lsx-demo-child'); ?></p>
                            <p><?php _e('Address: 123 Main St, City, State 12345', 'lsx-demo-child'); ?></p>
                        </div>
                        
                        <div class="footer-column">
                            <h3><?php _e('Follow Us', 'lsx-demo-child'); ?></h3>
                            <div class="social-links">
                                <a href="#" aria-label="<?php esc_attr_e('Facebook', 'lsx-demo-child'); ?>">Facebook</a>
                                <a href="#" aria-label="<?php esc_attr_e('Twitter', 'lsx-demo-child'); ?>">Twitter</a>
                                <a href="#" aria-label="<?php esc_attr_e('Instagram', 'lsx-demo-child'); ?>">Instagram</a>
                                <a href="#" aria-label="<?php esc_attr_e('LinkedIn', 'lsx-demo-child'); ?>">LinkedIn</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="footer-bottom">
                    <div class="footer-info">
                        <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. <?php _e('All rights reserved.', 'lsx-demo-child'); ?></p>
                    </div>
                    
                    <div class="footer-menu">
                        <nav>
                            <ul>
                                <li><a href="<?php echo home_url('/privacy-policy'); ?>"><?php _e('Privacy Policy', 'lsx-demo-child'); ?></a></li>
                                <li><a href="<?php echo home_url('/terms-of-service'); ?>"><?php _e('Terms of Service', 'lsx-demo-child'); ?></a></li>
                                <li><a href="<?php echo home_url('/sitemap'); ?>"><?php _e('Sitemap', 'lsx-demo-child'); ?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                
            </div>
        </div>
        
    </footer><!-- #colophon -->
    
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>