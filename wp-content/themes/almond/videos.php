<?php
/* 
    Template Name: YouTube Videos
*/

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
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
        <div class='entry-content'>
		<?php if (have_posts()) : ?>
			<?php
				   // Define custom query parameters
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$custom_query_args = array(
					'post_type' => 'video',
					'posts_per_page' => 9,
					'paged' => $paged,
				);
				$custom_query = new WP_Query( $custom_query_args );
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $custom_query;

				echo '<div class="entry-content"><div class="video-section">';
			while($custom_query->have_posts()) : $custom_query->the_post(); ?>
				<div class="video-card">					
					<a class="video-link" href="<?php the_permalink(); ?>"><img class="video-thumb" src="https://img.youtube.com/vi/<?php echo esc_html(get_post_meta( $post->ID, 'youtube_id', true )); ?>/maxresdefault.jpg"></a>
					<div class="date-social">
						<span class="news-cat">
							<span class="bold"><a href="<?php the_permalink(); ?>"><?php echo get_the_date('M j'); ?></a></span> | 
						</span>
						<div id="grid-share-icons">
							<span class="news-page-social twitter"><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>
							<span class="news-page-social facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
							<span class="news-page-social email"><a href="mailto:?subject=I wanted to share this post with you from <?php bloginfo('name'); ?>&body=<?php the_title('','',true); ?>&#32;&#32;<?php the_permalink(); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></span>
						</div>
					</div>
					<p class="post-title video"><a href="<?php the_permalink(); ?>"><?php the_title();/*3*/ ?></a></p>
				</div>
<?php endwhile;
		echo '</div></div>';
 else :
    // no post found code 
    get_template_part( 'template-parts/content', 'none' );
endif;
		echo '<div class="pagination">';
		the_posts_pagination( array(
				'prev_text'    => sprintf( '<i></i> %1$s', __( '<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>', 'almond' ) ),
				'next_text'    => sprintf( '%1$s <i></i>', __( '<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', 'almond' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'almond' ) . ' </span>',
			) );
		echo '</div>';
			?>
        </div><!-- .entry-content -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();