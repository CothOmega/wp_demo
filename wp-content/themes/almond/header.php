<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package almond
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<?php if (!has_site_icon()) : ?>
	<link rel="icon" 
      type="image/png" 
      href="/wp-content/themes/almond/img/almond-favicon.png">
	<?php endif; ?>
	<?php echo get_theme_mod('gtm_head'); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- ### -->
	<meta name="description" content="<?php echo get_theme_mod('meta_description'); ?>" />
	<meta property="og:site_name" content="<?php echo bloginfo('name'); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo bloginfo('name'); ?>" />
	<meta property="og:description" content="<?php echo get_theme_mod('meta_description'); ?>" />
	<meta property="og:url" content="<?php echo site_url(); ?>" />
	<meta property="og:image" content="<?php echo wp_get_attachment_url(get_theme_mod('meta_og_image')); ?>" />
	<!-- ### -->
	<?php include( get_stylesheet_directory() . '/inc/google-fonts.php' ); ?>
	<?php wp_head(); ?>
	<?php include( get_stylesheet_directory() . '/inc/dynamic-styles.php' ); ?>
</head>

<body <?php body_class(); ?>>
<?php echo get_theme_mod('gtm_body'); ?>
<div id="page" class="site <?php if (!is_front_page()) { echo 'interior'; } ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'almond' ); ?></a>

	<header id="masthead" class="site-header">

		<div class="site-branding">
		
			<?php
				if (get_theme_mod('custom_logo')) {
					the_custom_logo();
				} else {
					echo '<a href="' . home_url() . '" class="custom-logo-link"><img src="/wp-content/themes/almond/img/almond-logo-white.png" class="custom-logo" /></a>';
				}
			?>
			
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
			<button class="hamburger hamburger--<?php echo get_theme_mod('hamburger_animation', 'elastic'); ?>" type="button" onclick="hamburgerToggle(this);">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">