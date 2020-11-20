<?php

get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <header class="entry-header" <?php 
            if (has_post_thumbnail()) {
                echo 'style="background-image: url(' . get_the_post_thumbnail_url() . ');"';
            } elseif (get_theme_mod('news_header_bg_img')) {
                echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('news_header_bg_img')) . ');"';
            } elseif (get_theme_mod('interior_header_bg_img')) {
                echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('interior_header_bg_img')) . ');"';
            } else {
                echo 'style="background-image: url(/wp-content/themes/almond/img/almond-interior-header.jpg);"';
            }
        ?>>
            <div class="title-wrapper">
                <div class="title-inner">
                    <h1 class="entry-title">News</h1>
                    <p class='news-social'>
                        <a href='https://twitter.com/share?url=<?php echo get_the_permalink(); ?>'><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href='https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>' target='_blank'><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href='mailto:?Subject=I wanted to share this with you from <?php echo site_url(); ?>&Body=<?php echo get_the_permalink(); ?>'><i class="fa fa-envelope" aria-hidden="true"></i></a>
                    </p>
                </div>
            </div>
        </header><!-- .entry-header -->
        <div class='entry-content'>
        <?php 
        $news_posts_per_page = get_theme_mod('news_posts_per_page', 5);
        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
        $args = [
            'post_type'         => 'post',
            'posts_per_page'    => $news_posts_per_page,
            'paged'             => $paged,
        ];
        $news_query = new WP_Query( $args );
        if ($news_query->have_posts()) {
            while ($news_query->have_posts()) {
                $news_query->the_post();
                ?>
                    <div class='news-card'>
                        <?php if (has_post_thumbnail()) : ?>
                        <a href='<?php echo get_the_permalink(); ?>'><div class='news-card-image' style='background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);'></div></a>
                        <?php endif; ?>
                        <h2><a href='<?php echo get_the_permalink(); ?>' class='news-card-title'><?php echo get_the_title(); ?></a></h2>
                        <p class='news-social'>
                            <a href='https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>' target='_blank'><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href='https://twitter.com/share?url=<?php echo get_the_permalink(); ?>'><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href='mailto:?Subject=I wanted to share this with you from <?php echo site_url(); ?>&Body=<?php echo get_the_permalink(); ?>'><i class="fa fa-envelope" aria-hidden="true"></i></a>
                        </p>
                        <p><?php echo get_the_excerpt(); ?></p>
                        <p><a href='<?php echo get_the_permalink(); ?>' class='news-read-more-link'>Continue Reading</a></p>
                    </div>
                <?php
            }
            echo '<div class="pagination">';
            echo paginate_links( array(
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $news_query->max_num_pages,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => sprintf( '<i></i> %1$s', __( '<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>', 'almond' ) ),
                'next_text'    => sprintf( '%1$s <i></i>', __( '<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', 'almond' ) ),
                'add_args'     => false,
                'add_fragment' => '',
            ) );
            echo '</div>';
            wp_reset_postdata();
        }
        ?>
        </div><!-- .entry-content -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();