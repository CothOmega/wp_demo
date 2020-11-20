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
// Output for Instagram
function rad_shortcode_output_i( $atts_i = [] ) {

	// Setup the default/accepted shortcode attributes
	$atts_i = shortcode_atts(
		[
			'url' => home_url(),
			'per_page' => 1,
		],
		$atts_i,
		'sad'
	);

	// Fetch remote posts and initialize blank output
	$posts_i = rad_get_remote_posts_i( $atts_i['url'], $atts_i['per_page'] );
	$output_i = '';
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
		if ( is_array( $posts_i ) ) {
			// print "<pre style='color: #000;'>";
			// print_r($posts);
			// print "</pre>";
			$output_i .= '<ul style="list-style: none;">';
			foreach ( $posts_i['data'] as $key_i => $post_i ) {

				$date_i = strtotime($post_i['created_time']);	
				$post_i['created_time'] = date("F j, Y", $date_i);

				$output_i .= sprintf(
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
									<i class="fa fa-facebook-official" aria-hidden="true"></i>
									<div class="fbShareTxt">Share</div>
								</div>
							</a>
							<div class="fb_message">%2$s</div>
						</div>
					</div>
					</li>',
					esc_url( $post_i['permalink_url'] ),
					( $post_i['message'] ),
					( $post_i['full_picture']),
					( $key_i['index']),
					( $post_i['created_time'])
				);
			}
			foreach ( $posts_i['data'] as $key_i => $post_i ){
				$output_i .= '
				<div class="fb_post $key">
				</div>
				';
			}
			$output_i .= '</ul>';
	}

	// If we have output to show, include our assets
	// and wrap the output with open/close list tags
	if ( ! empty( $output_i ) ) {
		wp_enqueue_script( 'sad-js' );
		wp_enqueue_style( 'sad-css' );
		$output_i = '<div id="fb_content">' . $output_i . '</div>';
	}

	return $output_i;

}
add_shortcode( 'instagram_posts', 'rad_shortcode_output_i' );  
 