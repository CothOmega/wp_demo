<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package almond
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header" <?php 
		if (get_theme_mod('news_header_bg_img')) {
			echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('news_header_bg_img')) . ');"';
		} elseif (get_theme_mod('interior_header_bg_img')) {
			echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('interior_header_bg_img')) . ');"';
		} else {
			echo 'style="background-image: url(/wp-content/themes/almond/img/almond-interior-header.jpg);"';
		}
	?>>
		<h1 class='entry-title'>News</h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_title('<h2>', '</h2>'); ?>
		<p class='news-social'>
			<a href='https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>' target='_blank'><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href='https://twitter.com/share?url=<?php echo get_the_permalink(); ?>'><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href='mailto:?Subject=I wanted to share this with you from <?php echo site_url(); ?>&Body=<?php echo get_the_permalink(); ?>'><i class="fa fa-envelope" aria-hidden="true"></i></a>
		</p>
		<?php almond_post_thumbnail(); ?>
		<?php the_content(); ?>
		<p class="back-to-news-cont">
			<a href='news' class='back-to-news'><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>&nbsp;&nbsp;Back</a>
		</p>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->