<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package almond
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header" <?php 
		if (has_post_thumbnail()) {
			echo 'style="background-image: url(' . get_the_post_thumbnail_url() . ');"';
		} elseif (get_theme_mod('interior_header_bg_img')) {
			echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('interior_header_bg_img')) . ');"';
		} else {
			echo 'style="background-image: url(/wp-content/themes/almond/img/almond-interior-header.jpg);"';
		}
	?>>
		<div class="title-wrapper">
			<div class="title-inner">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php if( get_post_type() == 'page' ) { ?>
				<p class='news-social'>
					<a href='https://twitter.com/share?url=<?php echo get_the_permalink(); ?>'><i class="fa fa-twitter" aria-hidden="true"></i></a>
				    <a href='https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>' target='_blank'><i class="fa fa-facebook" aria-hidden="true"></i></a>
				    <a href='mailto:?Subject=I wanted to share this with you from <?php echo site_url(); ?>&Body=<?php echo get_the_permalink(); ?>'><i class="fa fa-envelope" aria-hidden="true"></i></a>
				</p>
				<?php } ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'almond' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
