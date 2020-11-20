<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package almond
 */

?>

<?php the_title('<h2>', '</h2>'); ?>
<?php 

$youtube_id = get_post_meta( $post->ID, 'youtube_id', true ); 

?>
<div class="video-wrapper">
	<div class="video-container">
		<iframe class="hero-logo-vid"  src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope;" allowfullscreen></iframe>
	</div>
</div>
<?php the_content(); ?>
<?php
	wp_link_pages(
		array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'almond' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'almond' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		)
	);
?>