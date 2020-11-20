<?php
// Instagram api request
function rad_get_remote_posts_i( $url_i = '', $post_count_i = 5 ) {

	// Attempt to get data from WP cache.
	// Use provided URL and post count to form a unique cache key.
	// Note: we could have instead made the key *only* the md5 hash
	// and then used "rad_remote_posts" as the cache group, if we
	// had wanted to do it that way.
	$key_i = 'rad_remote_posts_' . md5( $url_i . $post_count_i );
	$data_i = wp_cache_get( $key_i );

	// Fetch fresh data if cache is empty, then store to cache.
	if ( false === $data_i ) {
		$data_i = rad_fetch_remote_posts_from_api_i( $url_i, $post_count_i );
		wp_cache_set( $key_i, $data_i, null, HOUR_IN_SECONDS );
	}

	// Return final data
	return maybe_unserialize( $data_i );
}

/**
 * Fetch new posts from WP REST API.
 *
 * @since  0.1.0
 *
 * @param  string  $url        WordPress site URL (e.g. https://example.com).
 * @param  integer $post_count Number of posts to retreive.
 * @return array               WP REST API response for posts endpoint.
 */
function rad_fetch_remote_posts_from_api_i( $url_i = '', $post_count_i = 5 ) {

	// Make sure we're dealing with a valid URL
	$url_i = esc_url( $url_i );

	// If URL is invalid, bail here
	if ( ! $url_i ) {
		return;
	}

	// Extend URL to include the complete WP REST API posts endpoint
	$url_i = trailingslashit( $url_i ) . 'wp-json/wp/v2/posts/';

	$app_token_i = get_option('instagram_app_token');

	$instagramHandle = get_option('instagram_handle');

	$instagramPostNumber = get_option('number_instagram_posts');


	$url_i = "https://api.instagram.com/v1/users/self/media/recent/?access_token=".$app_token_i."&count=".$instagramPostNumber."";

	
	// print "<pre style='color: #000;'>";
	// print_r($appID."|".$appSecret);
	// print "</pre>";

	// Add additional query filters to the request URL
	// $url = add_query_arg(
	// 	[
	// 		'per_page' => absint( $post_count ),
	// 	],
	// 	$url
	// );
  
	// Make the remote request
	$response_i = wp_remote_get( $url_i );
	// print "<pre style='color: #000;'>";
	// print_r("response:" . $response);
	// print "</pre>";


	// Confirm we received a 200 OK response
	if ( 200 !== wp_remote_retrieve_response_code( $response_i ) ) {
		return;
	}
	// print "<pre style='color: #000;'>";
	// print_r("response code:" . wp_remote_retrieve_response_code( $response ));
	// print "</pre>";

	// Extract and decode the JSON respnose
	$body_i = wp_remote_retrieve_body( $response_i );
	$decoded_i = json_decode( $body_i, true );
	/* print "<pre style='color: #000;'>";
	 var_dump("body:" . $body);
	 print_r("decoded:" . $decoded);
	 print "</pre>"; */

	// Send the decoded response back
	return $decoded_i;


}
?>