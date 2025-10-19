<?php
/**
 * Single Post Template
 * 
 * Used to display individual blog posts
 */

get_header(); ?>

<main id="primary" class="site-main single-post">
    
    <div class="container">
        
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="single-post-header">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    
                    <div class="post-meta">
                        <span class="post-date">
                            <time datetime="<?php echo get_the_date('c'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                        </span>
                        
                        <span class="post-author">
                            <?php _e('By', 'lsx-demo-child'); ?> 
                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                <?php the_author(); ?>
                            </a>
                        </span>
                        
                        <?php if (has_category()) : ?>
                            <span class="post-categories">
                                <?php _e('Categories:', 'lsx-demo-child'); ?> <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                        
                        <?php if (has_tag()) : ?>
                            <span class="post-tags">
                                <?php _e('Tags:', 'lsx-demo-child'); ?> <?php the_tags('', ', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-featured-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                </header>
                
                <div class="post-content">
                    <?php the_content(); ?>
                    
                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'lsx-demo-child'),
                        'after' => '</div>',
                    ));
                    ?>
                </div>
                
                <footer class="post-footer">
                    <div class="post-navigation">
                        <?php
                        the_post_navigation(array(
                            'prev_text' => '<span class="nav-subtitle">' . __('Previous Post:', 'lsx-demo-child') . '</span> <span class="nav-title">%title</span>',
                            'next_text' => '<span class="nav-subtitle">' . __('Next Post:', 'lsx-demo-child') . '</span> <span class="nav-title">%title</span>',
                        ));
                        ?>
                    </div>
                </footer>
                
            </article>
            
            <?php
            // Show comments if enabled
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
            
        <?php endwhile; ?>
        
    </div>
    
</main>

<?php get_footer(); ?>