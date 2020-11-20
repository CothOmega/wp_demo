<?php
/* Template Name: Home

This is the Home page template for Almond, a WordPress Theme by the Prosper Group Development Team.

*/
get_header();

if (get_theme_mod('show_hero_section', 1) == 1) {
    get_template_part('/template-parts/content', 'hero');
}

if (get_theme_mod('show_signup_section', 1) == 1) {
    get_template_part('/template-parts/content', 'signup');
}

if (get_theme_mod('show_about_section', 1) == 1) {
    get_template_part('/template-parts/content', 'about-feature');
}

get_footer();
?>