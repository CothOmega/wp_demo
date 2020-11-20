<?php
/**
 * Plugin Name: PG WP Social
 * Plugin URI:  https://prospergroupcorp.com
 * Description: A beautiful Facebook feed and more!
 * Author:      PG Dev Team
 * Author URI:  https://prospergroupcorp.com
 * Version:     1.1
 */

/**
 * Include all plugin PHP files.
 *
 * @since 0.1.0
 */

function rad_includes() {
	
	$check_theme = get_stylesheet_directory() .'/includes/social-output.php';
	$theme_dir = get_stylesheet_directory(__FILE__);
	$plugin_dir = plugin_dir_path( __FILE__ );
  
	  // Look in the user's theme first for the file
    if ( file_exists($check_theme) ) {		        
		include trailingslashit( $theme_dir ) . 'includes/social-output.php';		
    }    
	 // Otherwise use the file from your plugin
	else {	
		include trailingslashit( $plugin_dir ) . 'includes/social-output.php';		
	}  

		include trailingslashit( $plugin_dir ) . 'includes/api-requests.php';		
		include trailingslashit( $plugin_dir ) . 'includes/instagram-social-output.php';
		include trailingslashit( $plugin_dir ) . 'includes/instagram-api-requests.php';	
		include trailingslashit( $plugin_dir ) . 'twitter/twitter_output.php';

}  
add_action( 'plugins_loaded', 'rad_includes' );

/**  
 * Register support for all asset files.
 *
 * @since 0.1.0
 */
function rad_assets() {
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_register_script( 'sad-js', $plugin_url . '/assets/js/sad.js', array( 'jquery' ), '1.0.0', true );
	wp_register_style( 'sad-css', $plugin_url . '/assets/css/sad.css' );
}
add_action( 'wp_enque_scripts', 'rad_assets' );

/**  
 * The menu in WordPress dashboard
 *
 * @since 0.1.0  
 */

class pg_wp_social_Plugin {
    public function __construct() {
    	// Hook into the admin menu
    	add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
        // Add Settings and Fields
    	add_action( 'admin_init', array( $this, 'setup_sections' ) );
    	add_action( 'admin_init', array( $this, 'setup_fields' ) );
    }
    public function create_plugin_settings_page() {
    	// Add the menu item and page
    	$page_title = 'PG API Connect';
    	$menu_title = 'PG WP Social';
    	$capability = 'manage_options';  
    	$slug = 'pg-wp-social';
    	$callback = array( $this, 'plugin_settings_page_content' );
    	$icon = 'dashicons-share';
    	$position = 100;
    	add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
    }
    public function plugin_settings_page_content() {?>
    	<div class="wrap">
    		<h2>PG WP Social Set Up</h2><?php
            if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ){
                  $this->admin_notice();
            } ?>
    		<form method="POST" action="options.php">
                <?php
                    settings_fields( 'pg-wp-social' );
                    do_settings_sections( 'pg-wp-social' );
                    submit_button();
                ?>
    		</form>
    	</div> <?php
    }
    
    public function admin_notice() { ?>
        <div class="notice notice-success is-dismissible">  
            <p>Your settings have been updated!</p>
        </div><?php
    }
    public function setup_sections() {
        add_settings_section( 'first_section', 'FACEBOOK FEED', array( $this, 'section_callback' ), 'pg-wp-social' );
        add_settings_section( 'second_section', 'TWITTER FEED', array( $this, 'section_callback' ), 'pg-wp-social' );
		add_settings_section( 'third_section', 'INSTAGRAM', array( $this, 'section_callback' ), 'pg-wp-social' );
		add_settings_section( 'fourth_section', 'EVENTBRITE', array( $this, 'section_callback' ), 'pg-wp-social' );
    }
    public function section_callback( $arguments ) {
    	switch( $arguments['id'] ){  
    		case 'first_section':  
    			// echo 'Notes here?';
				break;
    		case 'second_section':
    			// echo 'Notes here?';
    			break;
    		case 'third_section':
    			// echo 'Notes here?';
				break;
			case 'fourth_section':
    			// echo 'Notes here?';
    			break;
    	}
    }
    public function setup_fields() {
        $fields = array(
			// FACEBOOK
        	array(
        		'uid' => 'facebook_handle',
        		'label' => 'Clients Facebook Handle',
        		'section' => 'first_section',
				'type' => 'text',
				'helper' => 'Exp. www.facebook.com/THIS RIGHT HERE',
        		'placeholder' => 'Facebook handle',
        	),
			array(
        		'uid' => 'app_id',
        		'label' => 'App ID',
        		'section' => 'first_section',
        		'type' => 'text',
				'placeholder' => 'Exp: 123',
				'helper' => 'for app id and secret go: https://developers.facebook.com/',
			),
			array(
        		'uid' => 'app_secret',
        		'label' => 'App Secret',
        		'section' => 'first_section',
        		'type' => 'text',
        		'placeholder' => 'Exp: abc',
			),
			array(
        		'uid' => 'number_fb_posts',
        		'label' => 'Posts in Feed',
        		'section' => 'first_section',
				'type' => 'number',
				'helper' => '',
        		'placeholder' => '# of Posts',
			),
			array(
        		'uid' => 'posts_per_row',
        		'label' => 'Posts per Row (desktop & tablet)',
        		'section' => 'first_section',
				'type' => 'number',
				'helper' => '',
        		'placeholder' => 'Posts per Row',
        	),
			// array(
        	// 	'uid' => 'format_select',
        	// 	'label' => 'Facebook Feed Format',
        	// 	'section' => 'first_section',
        	// 	'type' => 'select',
        	// 	'options' => array(
        	// 		'option1' => 'Option 1', 
        	// 		'option2' => 'Option 2',
        	// 		'option3' => 'Option 3',
        	// 	),
            //     'default' => array()
			// ),
			// TWITTER
			array(  
        		'uid' => 'twitter_handle',
        		'label' => 'Twitter Screen Name',  
        		'section' => 'second_section',
				'type' => 'text',
				'helper' => 'Exp. www.twitter.com/JUST THIS RIGHT HERE',
				'placeholder' => 'Twitter Screen Name',
				'supplemental' => 'you should only need to update the handle and hardcode this where you want the twitter feed: <!-- for PG-WP-Social Plug-in -->
				<?php include $_SERVER["DOCUMENT_ROOT"]."/wp-content/plugins/PG-WP-Social/twitter/getSingle.php";?>',
        	),
			array(
        		'uid' => 'oauth_token',
        		'label' => 'Oauth Token',    
        		'section' => 'second_section',
        		'type' => 'text',
				'placeholder' => 'Exp: numbers then jibberish',
				'helper' => 'Notes on finding token and Secret',
			),
			array(
        		'uid' => 'oauth_token_secret',
        		'label' => 'Oauth Token Secret',
        		'section' => 'second_section',
        		'type' => 'text',
        		'placeholder' => 'Exp: just numbers',  
			),
	// Instagram
	array(
		'uid' => 'instagram_handle',
		'label' => 'Clients Instagram Handle',
		'section' => 'third_section',
		'type' => 'text',
		'helper' => 'Exp. https://www.instagram.com/THIS RIGHT HERE',
		'placeholder' => 'Instagram handle',
	),
	array(
		'uid' => 'instagram_app_token',
		'label' => 'App Token',
		'section' => 'third_section',
		'type' => 'text',
		'placeholder' => 'Exp: 123',
		'helper' => 'for app id and secret go: https://www.instagram.com/developer/ and sign into clients account',
	),
	array(
		'uid' => 'number_instagram_posts',
		'label' => 'Posts in Feed',
		'section' => 'third_section',
		'type' => 'number',
		'helper' => '',
		'placeholder' => '# of Posts',
	),
        );
    	foreach( $fields as $field ){
        	add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'pg-wp-social', $field['section'], $field );
            register_setting( 'pg-wp-social', $field['uid'] );
    	}
    }
    public function field_callback( $arguments ) {
        $value = get_option( $arguments['uid'] );
        if( ! $value ) {
            $value = $arguments['default'];
        }
        switch( $arguments['type'] ){
            case 'text':
            case 'password':
            case 'number':
                printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
                break;
            case 'textarea':
                printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
                break;
            case 'select':
            case 'multiselect':
                if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
                    $attributes = '';
                    $options_markup = '';
                    foreach( $arguments['options'] as $key => $label ){
                        $options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value[ array_search( $key, $value, true ) ], $key, false ), $label );
                    }
                    if( $arguments['type'] === 'multiselect' ){
                        $attributes = ' multiple="multiple" ';
                    }
                    printf( '<select name="%1$s[]" id="%1$s" %2$s>%3$s</select>', $arguments['uid'], $attributes, $options_markup );
                }
                break;
            case 'radio':
            case 'checkbox':
                if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
                    $options_markup = '';
                    $iterator = 0;
                    foreach( $arguments['options'] as $key => $label ){
                        $iterator++;
                        $options_markup .= sprintf( '<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s[]" type="%2$s" value="%3$s" %4$s /> %5$s</label><br/>', $arguments['uid'], $arguments['type'], $key, checked( $value[ array_search( $key, $value, true ) ], $key, false ), $label, $iterator );
                    }
                    printf( '<fieldset>%s</fieldset>', $options_markup );
                }
                break;
        }
        if( $helper = $arguments['helper'] ){
            printf( '<span class="helper"> %s</span>', $helper );
        }
        if( $supplimental = $arguments['supplimental'] ){
            printf( '<p class="description">%s</p>', $supplimental );
        }
    }
}
new pg_wp_social_Plugin();