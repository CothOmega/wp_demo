<?php 

// magic uninstall file runs when plugin is deleted

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
delete_option('accounts-accelo');
delete_option('accounts-box');
delete_option('accounts-lpw');

?>