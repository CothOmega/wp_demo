<div id='hero' <?php 
    if (get_theme_mod('hero_bg')) {
        echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('hero_bg')) . ');"';
    }
?>>

    <?php 
        $hero_image = wp_get_attachment_url(get_theme_mod('hero_bg'));
        if (get_theme_mod('hero_mobile_img')) {
            $hero_image = wp_get_attachment_url(get_theme_mod('hero_mobile_img'));
        } elseif (!get_theme_mod('hero_bg')) {
            $hero_image = '/wp-content/themes/almond/img/almond-hero.jpg';
        }
    ?>
    <img src='<?php echo $hero_image; ?>' class='hero-mobile-img' />

    <h1><?php echo get_theme_mod('hero_title', 'ALMONDS ARE A RICH SOURCE OF PROTEIN'); ?></h1>
    <div class="divider"><img class="stars" src="/wp-content/themes/almond-child-max-v1_4/img/3-stars.png"></div>
    <?php if (get_theme_mod('show_signup_section', 1) == 1) {
        get_template_part('/template-parts/content', 'signup');
    } ?>
</div>
