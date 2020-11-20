<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package almond
 */

get_header();
?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

			<section class="error-404 not-found">

			<header class="entry-header" <?php 
				if (get_theme_mod('interior_header_bg_img')) {
					echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('interior_header_bg_img')) . ');"';
				} else {
					echo 'style="background-image: url(/wp-content/themes/almond/img/almond-interior-header.jpg);"';
				}
			?>>
            	<h1 class='entry-title'>404 (Page Not Found)</h1>
        	</header><!-- .entry-header -->

				<div class="page-content">

					<p>It looks like nothing was found at this location. Maybe try one again from our <a href="/">Home</a> page?</p>

				</div><!-- .page-content -->

			</section><!-- .error-404 -->

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_footer();