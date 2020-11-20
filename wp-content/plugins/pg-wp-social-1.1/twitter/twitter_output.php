<?php

function twitter_output()
{
    $output = include $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/PG-WP-Social/twitter/getSingle.php';

    if (!empty($output)) {
        // wp_enqueue_script( 'sad-js' );
        wp_enqueue_style('twitter-css', '/wp-content/plugins/PG-WP-Social/assets/css/twitter.css');
    }

    return $output;
}
add_shortcode('twitter_pg', 'twitter_output');
