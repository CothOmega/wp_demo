<div id='hero' <?php 
    if (get_theme_mod('hero_bg')) {
        echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('hero_bg')) . ');"';
    }
?>>
    <h2><?php echo get_theme_mod('hero_title', 'ALMONDS ARE A RICH SOURCE OF PROTEIN'); ?></h2>
    <p><?php echo get_theme_mod('hero_subtitle', 'You\'ll go nuts for these tasty treats!'); ?></p>
</div>
<div id='hero-mobile'>
    <?php 
        $hero_image = wp_get_attachment_url(get_theme_mod('hero_bg'));
        if (get_theme_mod('hero_mobile_img')) {
            $hero_image = wp_get_attachment_url(get_theme_mod('hero_mobile_img'));
        } elseif (!get_theme_mod('hero_bg')) {
            $hero_image = '/wp-content/themes/almond/img/almond-hero.jpg';
        }
    ?>
    <img src='<?php echo $hero_image; ?>' class='hero-mobile-img' />
    <h2><?php echo get_theme_mod('hero_title', 'ALMONDS ARE A RICH SOURCE OF PROTEIN'); ?></h2>
    <p><?php echo get_theme_mod('hero_subtitle', 'You\'ll go nuts for these tasty treats!'); ?></p>
</div>