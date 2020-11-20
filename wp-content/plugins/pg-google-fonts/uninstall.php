<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('pg_google_font_link');
delete_option('pg_google_font_obj');
delete_option('pg_google_font_force');
delete_option('pg_google_font_primary');