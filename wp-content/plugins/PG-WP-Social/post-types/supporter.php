<?php

function supporter_init() {
	register_post_type( 'supporter', array(
		'labels'            => array(
			'name'                => __( 'Supporters', 'api-demo' ),
			'singular_name'       => __( 'Supporter', 'api-demo' ),
			'all_items'           => __( 'All Supporters', 'api-demo' ),
			'new_item'            => __( 'New Supporter', 'api-demo' ),
			'add_new'             => __( 'Add New', 'api-demo' ),
			'add_new_item'        => __( 'Add New Supporter', 'api-demo' ),
			'edit_item'           => __( 'Edit Supporter', 'api-demo' ),
			'view_item'           => __( 'View Supporter', 'api-demo' ),
			'search_items'        => __( 'Search Supporters', 'api-demo' ),
			'not_found'           => __( 'No Supporters found', 'api-demo' ),
			'not_found_in_trash'  => __( 'No Supporters found in trash', 'api-demo' ),
			'parent_item_colon'   => __( 'Parent Supporter', 'api-demo' ),
			'menu_name'           => __( 'Supporters', 'api-demo' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'author' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-universal-access-alt',
		'show_in_rest'      => true,
		'rest_base'         => 'supporter',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'supporter_init' );

function supporter_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['supporter'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Supporter updated. <a target="_blank" href="%s">View Supporter</a>', 'api-demo'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'api-demo'),
		3 => __('Custom field deleted.', 'api-demo'),
		4 => __('Supporter updated.', 'api-demo'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Supporter restored to revision from %s', 'api-demo'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Supporter published. <a href="%s">View Supporter</a>', 'api-demo'), esc_url( $permalink ) ),
		7 => __('Supporter saved.', 'api-demo'),
		8 => sprintf( __('Supporter submitted. <a target="_blank" href="%s">Preview Supporter</a>', 'api-demo'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Supporter scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Supporter</a>', 'api-demo'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Supporter draft updated. <a target="_blank" href="%s">Preview Supporter</a>', 'api-demo'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'supporter_updated_messages' );
