<style>
<?php if (wp_get_attachment_url(get_theme_mod('interior_header_bg_img')) !== '') : ?>
header.entry-header { background-image: <?php echo 'url(' . wp_get_attachment_url(get_theme_mod('interior_header_bg_img')) . ');'; ?> }
<?php endif; ?>
#colophon {
    background-color: <?php echo get_theme_mod('footer_bg_color', '#1c2938'); ?>;
    min-height: <?php echo get_theme_mod('footer_height', 422) . 'px'; ?>;
}
<?php if (get_theme_mod('footer_logo_width')) : ?>
#colophon a.footer-logo-link {
    width: <?php echo get_theme_mod('footer_logo_width'); ?>px;
}
<?php endif; ?>
#masthead {
    max-height: <?php echo get_theme_mod('header_height') . 'px'; ?>;
}
.main-navigation li {
    height: <?php echo get_theme_mod('header_height') . 'px'; ?>;
    line-height: <?php echo get_theme_mod('header_height') . 'px'; ?>;
}
#masthead .custom-logo {
    width: <?php echo get_theme_mod('header_logo_width') . 'px'; ?>;
}
#masthead .interior-header-logo {
    width: <?php echo get_theme_mod('interior_header_logo_width') . 'px'; ?>;
}
<?php if (get_theme_mod('header_transparent_checkbox', 0) == 1) : ?>
#masthead { background-color: transparent; }
#masthead.scrolled {
    background-color: <?php echo get_theme_mod('header_bg', '#1c2938'); ?>;
    <?php 
        if (get_theme_mod('header_box_shadow_checkbox') == 1) {
            echo 'box-shadow: 0 -2px 10px black; ';
        }
    ?>
}
#content {
    margin-top: 0;
}
<?php else : ?>
#masthead { background-color: <?php echo get_theme_mod('header_bg', '#1c2938'); ?>; }
<?php 
        if (get_theme_mod('header_box_shadow_checkbox') == 1) {
            echo '#masthead.scrolled { box-shadow: 0 -2px 10px black; }';
        }
    ?>
<?php endif; ?>
header.entry-header {
    min-height: <?php echo get_theme_mod('interior_header_height') . 'px'; ?>;
}
div#hero {
    max-height: <?php echo get_theme_mod('hero_height') . 'px'; ?>;
}
div#signup {
    background-color: <?php echo get_theme_mod('signup_bg'); ?>;
}
<?php if (get_theme_mod('hero_mobile_section_toggle', 0) == 1) : ?>
@media only screen and (max-width: <?php echo get_theme_mod('hero_mobile_toggle_width', 500)  . 'px'; ?>) {
    div#hero-mobile {
        display: block;
        background-color: <?php echo get_theme_mod('hero_mobile_bg_color', '#a10b26'); ?>;
    }
    div#hero {
        display: none;
    }
}
<?php endif; ?>
</style>