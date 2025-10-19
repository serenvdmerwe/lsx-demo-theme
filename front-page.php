<?php
/**
 * Front Page Template
 * 
 * This template is used for the homepage/front page
 * Shows how to use the header component with homepage-specific settings
 */

get_header(); ?>

<main id="primary" class="site-main front-page">
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title"><?php _e('Welcome to Our Website', 'lsx-demo-child'); ?></h1>
                <p class="hero-description"><?php _e('We provide amazing services and solutions for your business needs.', 'lsx-demo-child'); ?></p>
                <div class="hero-buttons">
                    <a href="#services" class="btn btn-primary"><?php _e('Our Services', 'lsx-demo-child'); ?></a>
                    <a href="#contact" class="btn btn-secondary"><?php _e('Get in Touch', 'lsx-demo-child'); ?></a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <header class="section-header">
                <h2><?php _e('Our Services', 'lsx-demo-child'); ?></h2>
                <p><?php _e('We offer a wide range of professional services to help your business grow.', 'lsx-demo-child'); ?></p>
            </header>
            
            <div class="services-grid">
                <div class="service-item">
                    <div class="service-icon">🚀</div>
                    <h3><?php _e('Web Development', 'lsx-demo-child'); ?></h3>
                    <p><?php _e('Custom websites and web applications built with modern technologies.', 'lsx-demo-child'); ?></p>
                </div>
                
                <div class="service-item">
                    <div class="service-icon">📱</div>
                    <h3><?php _e('Mobile Apps', 'lsx-demo-child'); ?></h3>
                    <p><?php _e('Native and cross-platform mobile applications for iOS and Android.', 'lsx-demo-child'); ?></p>
                </div>
                
                <div class="service-item">
                    <div class="service-icon">💡</div>
                    <h3><?php _e('Consulting', 'lsx-demo-child'); ?></h3>
                    <p><?php _e('Strategic technology consulting to help you make the right decisions.', 'lsx-demo-child'); ?></p>
                </div>
                
                <div class="service-item">
                    <div class="service-icon">🎨</div>
                    <h3><?php _e('Design', 'lsx-demo-child'); ?></h3>
                    <p><?php _e('Beautiful and functional designs that engage your users.', 'lsx-demo-child'); ?></p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2><?php _e('About Our Company', 'lsx-demo-child'); ?></h2>
                    <p><?php _e('We are a team of passionate professionals dedicated to delivering exceptional results for our clients. With years of experience in the industry, we understand what it takes to create successful digital solutions.', 'lsx-demo-child'); ?></p>
                    <p><?php _e('Our mission is to help businesses grow through innovative technology solutions and outstanding customer service.', 'lsx-demo-child'); ?></p>
                    <a href="/about" class="btn btn-outline"><?php _e('Learn More About Us', 'lsx-demo-child'); ?></a>
                </div>
                <div class="about-image">
                    <img src="https://via.placeholder.com/500x400" alt="<?php esc_attr_e('About Us', 'lsx-demo-child'); ?>">
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <header class="section-header">
                <h2><?php _e('Get in Touch', 'lsx-demo-child'); ?></h2>
                <p><?php _e('Ready to start your project? Contact us today for a free consultation.', 'lsx-demo-child'); ?></p>
            </header>
            
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item">
                        <h3><?php _e('Email', 'lsx-demo-child'); ?></h3>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                    <div class="contact-item">
                        <h3><?php _e('Phone', 'lsx-demo-child'); ?></h3>
                        <p><a href="tel:+15551234567">(555) 123-4567</a></p>
                    </div>
                    <div class="contact-item">
                        <h3><?php _e('Address', 'lsx-demo-child'); ?></h3>
                        <p>123 Main Street<br>City, State 12345</p>
                    </div>
                </div>
                
                <div class="contact-form">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="name"><?php _e('Name', 'lsx-demo-child'); ?></label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email"><?php _e('Email', 'lsx-demo-child'); ?></label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject"><?php _e('Subject', 'lsx-demo-child'); ?></label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message"><?php _e('Message', 'lsx-demo-child'); ?></label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php _e('Send Message', 'lsx-demo-child'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Latest Posts Section -->
    <section class="latest-posts-section">
        <div class="container">
            <header class="section-header">
                <h2><?php _e('Latest News & Updates', 'lsx-demo-child'); ?></h2>
                <p><?php _e('Stay updated with our latest blog posts and company news.', 'lsx-demo-child'); ?></p>
            </header>
            
            <div class="posts-grid">
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 3,
                    'post_status' => 'publish'
                ));
                
                if ($recent_posts) :
                    foreach ($recent_posts as $post) :
                        ?>
                        <article class="post-preview">
                            <?php if (has_post_thumbnail($post['ID'])) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php echo get_permalink($post['ID']); ?>">
                                        <?php echo get_the_post_thumbnail($post['ID'], 'medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <h3><a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a></h3>
                                <p class="post-excerpt"><?php echo wp_trim_words($post['post_content'], 20); ?></p>
                                <a href="<?php echo get_permalink($post['ID']); ?>" class="read-more"><?php _e('Read More', 'lsx-demo-child'); ?></a>
                            </div>
                        </article>
                        <?php
                    endforeach;
                    wp_reset_query();
                else :
                    ?>
                    <p><?php _e('No recent posts found.', 'lsx-demo-child'); ?></p>
                    <?php
                endif;
                ?>
            </div>
            
            <div class="section-footer">
                <a href="/blog" class="btn btn-outline"><?php _e('View All Posts', 'lsx-demo-child'); ?></a>
            </div>
        </div>
    </section>
    
</main>

<?php get_footer(); ?>