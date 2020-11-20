<?php

/**
 * Fetch remote posts (checking for them in cache first).
 *
 * @since  0.1.0
 *
 * @param  string  $url        WordPress site URL.
 * @param  integer $post_count Number of posts to retrieve.
 * @return array               WP REST API response for posts endpoint.
 */
function rad_get_remote_posts( $url = '', $post_count = 5 ) {

	// Attempt to get data from WP cache.
	// Use provided URL and post count to form a unique cache key.
	// Note: we could have instead made the key *only* the md5 hash
	// and then used "rad_remote_posts" as the cache group, if we
	// had wanted to do it that way.
	$key = 'rad_remote_posts_' . md5( $url . $post_count );
	$data = wp_cache_get( $key );

	// Fetch fresh data if cache is empty, then store to cache.
	if ( false === $data ) {
		$data = rad_fetch_remote_posts_from_api( $url, $post_count );
		wp_cache_set( $key, $data, null, HOUR_IN_SECONDS );
	}

	// Return final data
	return maybe_unserialize( $data );
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
function rad_fetch_remote_posts_from_api( $url = '', $post_count = 5 ) {

	// Make sure we're dealing with a valid URL
	$url = esc_url( $url );

	// If URL is invalid, bail here
	if ( ! $url ) {
		return;
	}

	// Extend URL to include the complete WP REST API posts endpoint
	$url = trailingslashit( $url ) . 'wp-json/wp/v2/posts/';

	$appID = get_option('app_id');

	$appSecret = get_option('app_secret');

	$fbHandle = get_option('facebook_handle');

	$fbPostNumber = get_option('number_fb_posts');


	$url = "https://graph.facebook.com/".$fbHandle."/posts?fields=full_picture,permalink_url,id,type,message,picture,object_id,created_time,link&limit=".$fbPostNumber."&access_token=".$appID."|".$appSecret."";

	
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
	$response = wp_remote_get( $url );
	// print "<pre style='color: #000;'>";
	// print_r("response:" . $response);
	// print "</pre>";


	// Confirm we received a 200 OK response
	if ( 200 !== wp_remote_retrieve_response_code( $response ) ) {
		return;
	}
	// print "<pre style='color: #000;'>";
	// print_r("response code:" . wp_remote_retrieve_response_code( $response ));
	// print "</pre>";

	// Extract and decode the JSON respnose
	$body = wp_remote_retrieve_body( $response );
	$decoded = json_decode( $body, true );
	/* print "<pre style='color: #000;'>";
	 var_dump("body:" . $body);
	 print_r("decoded:" . $decoded);
	 print "</pre>"; */

	// Send the decoded response back
	return $decoded;


}

