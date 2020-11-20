<?php
/* 
    The template for displaying videos
*/

get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <header class="entry-header" <?php 
            if (get_theme_mod('news_header_bg_img')) {
                echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('news_header_bg_img')) . ');"';
            } elseif (get_theme_mod('interior_header_bg_img')) {
                echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('interior_header_bg_img')) . ');"';
            } else {
                echo 'style="background-image: url(/wp-content/themes/almond/img/almond-interior-header.jpg);"';
            }
        ?>>
            <h1 class="entry-title">Videos</h1>
        </header><!-- .entry-header -->
        <div class='entry-content'>

            <?php
            // Start the loop.
            if ( have_posts() ) : the_post();

                /*
                * Include the post format-specific template for the content. If you want to
                * use this in a child theme, then include a file called called content-___.php
                * (where ___ is the post format) and that will be used instead.
                */
                get_template_part( 'template-parts/content', get_post_type() );

                
            // End the loop.
            endif;
            ?>
            <p class='back-to-news-cont'>
                <a class="back-to-news" href="/videos"><i class="fa fa-undo" aria-hidden="true"></i> Back to Videos</a>
            </p>

        </div><!-- .entry-content -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();