<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package almond
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" <?php 
		if (!get_theme_mod('hide_footer_bg_img')) {
			if (get_theme_mod('footer_bg_image')) {
				echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('footer_bg_image')) . ');"'; 
			} else {
				echo 'style="background-image: url(/wp-content/themes/almond/img/almond-footer.jpg);"';
			}
		}
	?>>

		<div class="site-info">
			<?php 
				if (get_theme_mod('footer_logo')) {
					echo "<a href='" . site_url() . "' class='footer-logo-link'><img src='" . wp_get_attachment_image_url(get_theme_mod('footer_logo'), 'full') . "' class='footer-logo' /></a>"; 
				} else {
					echo "<a href='" . site_url() . "' class='footer-logo-link'><img src='/wp-content/themes/almond/img/almond-logo-white.png' class='footer-logo' /></a>"; 
				}
			?>

			<p class='footer-social'>
				<?php if (get_theme_mod('social_fb', 'https://facebook.com')) {
					echo '<a href="' . get_theme_mod('social_fb', 'https://facebook.com') . '" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
				} ?>
				<?php if (get_theme_mod('social_tw', 'https://twitter.com')) {
					echo '<a href="' . get_theme_mod('social_tw', 'https://twitter.com') . '" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
				} ?>
				<?php if (get_theme_mod('social_in', 'https://instagram.com')) {
					echo '<a href="' . get_theme_mod('social_in', 'https://instagram.com') . '" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
				} ?>
				<?php if (get_theme_mod('social_yt', 'https://youtube.com')) {
					echo '<a href="' . get_theme_mod('social_yt', 'https://youtube.com') . '" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>';
				} ?>
				<?php if (get_theme_mod('social_linkedin', 'https://linkedin.com')) {
					echo '<a href="' . get_theme_mod('social_linkedin', 'https://linkedin.com') . '" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
				} ?>
			</p>
			<?php if (get_theme_mod('donate_link', 'https://winred.com')) : ?>
			<a target='_blank' href='<?php echo get_theme_mod('donate_link', 'https://winred.com'); ?>' class='footer-donate-button'>Donate</a>
			<?php endif; ?>
			<?php if (get_theme_mod('disclaimer', 'Paid for by Almond Farmers of America')) : ?>
			<div class='disclaimer-cont'>

				<div class='disclaimer'><?php echo get_theme_mod('disclaimer', 'Paid for by Almond Farmers of America'); ?></div>

			</div>
			<?php endif; ?>
			<?php if (get_theme_mod('footer_message', 'Extra message in case you wanted to add one here...')) : ?>
			<div class='footer-message'>
				<?php echo get_theme_mod('footer_message', 'Extra message in case you wanted to add one here...'); ?>
			</div>
			<?php endif; ?>
			<p class='privacy'><a href='/privacy-policy' target='_blank'>Privacy Policy</a> | &copy; All Rights Reserved</p>

		</div><!-- .site-info -->
		<?php if (get_theme_mod("donate_link", "https://winred.com") !== '') : ?>
		<a class='donate-mobile' target='_blank' href='<?php echo get_theme_mod("donate_link", "https://winred.com"); ?>'>Donate</a>
		<?php endif; ?>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
