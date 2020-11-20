<?php

/**
 * Shortcode to render unordered list of posts fetched via WP REST API.
 *
 * Usage: [rad_posts url="https://example.com" per_page="10"]
 *
 * @since  0.1.0
 *
 * @param  array  $atts Shortcode attributes.
 * @return string       HTML output.
 */
function rad_shortcode_output( $atts = [] ) {

	// Setup the default/accepted shortcode attributes
	$atts = shortcode_atts(
		[
			'url' => home_url(),
			'per_page' => 5,
		],
		$atts,
		'sad'
	);

	// Fetch remote posts and initialize blank output
	$posts = rad_get_remote_posts( $atts['url'], $atts['per_page'] );
	$output = '';

		//Available fb fields
		// $post['link']
		// $post['id']
		// $post['full_picture']
		// $post['permalink_url']
		// $post['type']
		// $post['message']
		// $post['object_id']
		// $post['created_time']
		// $post['link']
		// $key (index)

		if ( is_array( $posts ) ) {

			// print "<pre style='color: #000;'>";
			// print_r($posts);
			// print "</pre>";

			$output .= '<ul style="list-style: none;">';
			foreach ( $posts['data'] as $key => $post ) {

				$date = strtotime($post['created_time']);	
				$post['created_time'] = date("F j", $date);
				
				if($post['full_picture']) {
				$output .= sprintf(
					'<li>
					<div class="fb_post item %4$s clearfix">
						<a href="%1$s" target="_blank">
							<div class="img_container" style="background: no-repeat url(%3$s); position: relative; background-size: cover; background-position: center;">
								<i class="fa fa-facebook" aria-hidden="true"></i>
								<div class="fbcover"></div>							
							</div>
						</a>
						<div class="fb_body arrow_box">	
										
							<a href="%1$s" target="_blank" class="fb_date">%5$s</a>
							<a href="https://www.facebook.com/sharer.php?u=%1$s" target="_blank">
								<div class="fbShare">
									<i class="fa fa-facebook" aria-hidden="true"></i>
									<div class="fbShareTxt">Share</div>
								</div>
							</a>
							<div class="fb_message">%2$s</div>
						</div>
					</div>
					</li>',
				esc_url( $post['permalink_url'] ),
				( $post['message'] ),
				( $post['full_picture']),
				( $key['index']),
				( $post['created_time'])
				);
			}else {
				$output .= sprintf(
					'<li>
					<div class="fb_post item %4$s clearfix">
						<a href="%1$s" target="_blank">
							<div class="img_container" style="background: #326337 no-repeat url(/wp-content/uploads/2020/06/marceno-logo-header.png); position: relative; background-size: contain; background-position: center;">
								<i class="fa fa-facebook" aria-hidden="true"></i>
								<div class="fbcover"></div>							
							</div>
						</a>
						<div class="fb_body arrow_box">	
										
							<a href="%1$s" target="_blank" class="fb_date">%5$s</a>
							<a href="https://www.facebook.com/sharer.php?u=%1$s" target="_blank">
								<div class="fbShare">
									<i class="fa fa-facebook" aria-hidden="true"></i>
									<div class="fbShareTxt">Share</div>
								</div>
							</a>
							<div class="fb_message">%2$s</div>
						</div>
					</div>
					</li>',
				esc_url( $post['permalink_url'] ),
				( $post['message'] ),
				( $post['full_picture']),
				( $key['index']),
				( $post['created_time'])
				);
			}

			}
			foreach ( $posts['data'] as $key => $post ){
				$output .= '
				<div class="fb_post $key">
				</div>
				';
			}
			$output .= '</ul>';
	}

	// If we have output to show, include our assets
	// and wrap the output with open/close list tags
	if ( ! empty( $output ) ) {
		wp_enqueue_script( 'sad-js' );
		wp_enqueue_style( 'sad-css', '/wp-content/plugins/PG-WP-Social/assets/css/sad.css' );
		$output = '<div id="fb_content">' . $output . '</div>';
	}

	return $output;

}
add_shortcode( 'rad_posts', 'rad_shortcode_output' );  
