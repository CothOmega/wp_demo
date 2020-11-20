<?php
/**
 * Plugin Name:       PG MGMT
 * Plugin URI:        https://www.prospergroupcorp.com/
 * Description:       Important links and info.
 * Version:           1.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            PG Dev Team
 * Author URI:        https://www.prospergroupcorp.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pg-mgmt
 */

defined( 'ABSPATH' ) or die( 'Sorry, you must access this page from WordPress.' );

// accounts dashboard page
add_option('accounts-accelo');
add_option('accounts-box');
add_option('accounts-lpw');
add_option('accounts-pws');

function pg_mgmt_page() {

    if (isset($_POST['submit'])) {

		update_option('accounts-accelo', $_POST['accounts-accelo']);
		update_option('accounts-box', $_POST['accounts-box']);
		update_option('accounts-lpw', $_POST['accounts-lpw']);
		update_option('accounts-pws', $_POST['accounts-pws']);

    }

    echo '<div class="accounts-page">';

    echo '<h2>Internal Links</h2>';

	echo '<form action="/wp-admin/admin.php?page=pg-mgmt" method="post">';

	echo '<p style="margin-top: 25px;"><strong>Accelo:</strong></p>';
	
	echo '<p><input type="text" placeholder="Add Accelo link here..." value="' . get_option('accounts-accelo') . '" name="accounts-accelo" id="accounts-accelo" /><a href="' . get_option('accounts-accelo') . '" target="_blank" style="text-decoration:none; position: relative; top: 3px; left: 5px;"><span class="dashicons dashicons-external"></span></a></p>';

	echo '<p style="margin-top: 25px;"><strong>Box:</strong></p>';

	echo '<p><input type="text" placeholder="Add Box link here..." value="' . get_option('accounts-box') . '" name="accounts-box" id="accounts-box" /><a href="' . get_option('accounts-box') . '" target="_blank" style="text-decoration:none; position: relative; top: 3px; left: 5px;"><span class="dashicons dashicons-external"></span></a></p>';

	echo '<p style="margin-top: 25px;"><strong>Landing Page Worksheet:</strong></p>';

	echo '<p><input type="text" placeholder="Add Landing Page Worksheet link here..." value="' . get_option('accounts-lpw') . '" name="accounts-lpw" id="accounts-lpw" /><a href="' . get_option('accounts-lpw') . '" target="_blank" style="text-decoration:none; position: relative; top: 3px; left: 5px;"><span class="dashicons dashicons-external"></span></a></p>';

	echo '<p style="margin-top: 25px;"><strong>Project Worksheet:</strong></p>';

	echo '<p><input type="text" placeholder="Add Project Worksheet link here..." value="' . get_option('accounts-pws') . '" name="accounts-pws" id="accounts-pws" /><a href="' . get_option('accounts-pws') . '" target="_blank" style="text-decoration:none; position: relative; top: 3px; left: 5px;"><span class="dashicons dashicons-external"></span></a></p>';

    submit_button('Save');

    echo '</form>';

    echo '</div>';

}

function pg_mgmt_setup() {

    add_menu_page( 'PG MGMT', 'PG MGMT', 'manage_options', 'pg-mgmt', 'pg_mgmt_page', 'dashicons-admin-network' );

}

add_action('admin_menu', 'pg_mgmt_setup');

?>