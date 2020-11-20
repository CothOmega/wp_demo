<?php
add_action( 'wp_enqueue_scripts', 'child_theme_styles', 20 );
function child_theme_styles() {
    wp_dequeue_style( 'almond-style' );
    wp_deregister_style( 'almond-style' );
    $parent_style_path  = get_template_directory() . '/style.css';
    $child_style_path   = get_stylesheet_directory() . '/style.css';
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), filemtime($child_style_path));
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime($parent_style_path));
}