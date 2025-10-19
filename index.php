<?php
/**
 * The main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <div class="container">
        <div class="content-area">
            
            <?php if (have_posts()) : ?>
                
                <header class="page-header">
                    <h1 class="page-title">
                        <?php
                        if (is_home() && !is_front_page()) :
                            single_post_title();
                        elseif (is_search()) :
                            printf(__('Search Results for: %s', 'lsx-demo-child'), get_search_query());
                        elseif (is_archive()) :
                            the_archive_title();
                        else :
                            _e('Latest Posts', 'lsx-demo-child');
                        endif;
                        ?>
                    </h1>
                    
                    <?php if (is_archive() && get_the_archive_description()) : ?>
                        <div class="archive-description">
                            <?php the_archive_description(); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="posts-container">
                    <?php while (have_posts()) : the_post(); ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-preview'); ?>>
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <header class="post-header">
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    
                                    <div class="post-meta">
                                        <span class="post-date">
                                            <time datetime="<?php echo get_the_date('c'); ?>">
                                                <?php echo get_the_date(); ?>
                                            </time>
                                        </span>
                                        
                                        <span class="post-author">
                                            <?php _e('by', 'lsx-demo-child'); ?> 
                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                <?php the_author(); ?>
                                            </a>
                                        </span>
                                        
                                        <?php if (has_category()) : ?>
                                            <span class="post-categories">
                                                <?php _e('in', 'lsx-demo-child'); ?> <?php the_category(', '); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </header>
                                
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <footer class="post-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more-btn">
                                        <?php _e('Read More', 'lsx-demo-child'); ?>
                                    </a>
                                </footer>
                            </div>
                            
                        </article>
                        
                    <?php endwhile; ?>
                    
                    <div class="pagination">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => __('← Previous', 'lsx-demo-child'),
                            'next_text' => __('Next →', 'lsx-demo-child'),
                        ));
                        ?>
                    </div>
                    
                </div>
                
            <?php else : ?>
                
                <div class="no-posts-found">
                    <h2><?php _e('Nothing Found', 'lsx-demo-child'); ?></h2>
                    <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'lsx-demo-child'); ?></p>
                    <?php get_search_form(); ?>
                </div>
                
            <?php endif; ?>
            
        </div>
    </div>
    
</main>

<?php get_footer(); ?>