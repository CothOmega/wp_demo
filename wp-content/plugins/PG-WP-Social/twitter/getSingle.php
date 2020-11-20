<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */
function latest_tweets()
{
    // print '1';
    include $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/PG-WP-Social/twitter/config.php';
    // print '2';
    $success = include $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/PG-WP-Social/twitter/twitteroauth/twitteroauth.php';
    if (!$success) {
        echo 'the file could not be included';
    }

    // print '3';
    $_SESSION['access_token']['oauth_token'] = get_option('oauth_token');
    $_SESSION['access_token']['oauth_token_secret'] = get_option('oauth_token_secret');
    $screenname = get_option('twitter_handle');

    // print '4';

    /* If access tokens are not available redirect to connect page. */
    if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
        header('Location: ./clearsessions.php');
    }
    /* Get user access tokens out of the session. */
    $access_token = $_SESSION['access_token'];

    // vars
    $all;

    // twitteroauth object get userdata and tweets separately
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
    $all = $connection->get('statuses/user_timeline', array('screen_name' => $screenname, 'include_rts' => 'false', 'count' => 50));

    // regex
    function twitterify($ret)
    {
        $ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", '\\1<a href="\\2" target="_blank">\\2</a>', $ret);
        $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", '\\1<a href="https://\\2" target="_blank">\\2</a>', $ret);
        $ret = preg_replace("/@(\w+)/", '<a href="https://www.twitter.com/\\1" target="_blank">@\\1</a>', $ret);
        $ret = preg_replace("/#(\w+)/", '<a href="https://search.twitter.com/search?q=\\1" target="_blank">#\\1</a>', $ret);

        return $ret;
    }

    /*
     objectToArray converts the twitter supplies object into an array so it can be used later in the page
    */
    function objectToArray($d)
    {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }
        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__FUNCTION__, $d);
        } else {
            // Return array
            return $d;
        }
    }

    $i = 0;
    // foreach loop for the tweets themselves. There is html included here for use by CSS.
    foreach ($all as $data) {
        $display = objectToArray($data);
        //print "<pre>";
        //print_r($display);
        //print "</pre>";
        $preSliceTweetID = $display['id'];
        $preSliceDate = date('M j', strtotime($display['created_at']));

        $displayText = twitterify($display['text']);

        //tweet image url
        $img_url = $display['entities']['media'][0]['media_url'];
        twitterify($img_url);

        //convert img src to https
        if (preg_match('^http://^', $img_url)) {
            $img_url = str_replace('http://', 'https://', $img_url);
        }

        // print "<pre>";
        // print_r($all);
        // print "</pre>";

        //different html if no image
        if ($img_url) {
            $img_block = '
			<div class="tw-img-wrapper">
				<div class="tw-img" style="background-image: url('.$img_url.')">
				</div>

				<div class="icon-wrapper">
					<i class="fa fa-twitter" aria-hidden="true"></i>
				</div>
			</div>';
        } else {
            $img_block = '';
        }

        $actions = '
		<a class="tweetReply" href="https://twitter.com/intent/tweet?in_reply_to='.$preSliceTweetID.'"><i class="fas fa-reply" aria-hidden="true"></i></a>
		<a class="tweetRetweet" href="https://twitter.com/intent/retweet?tweet_id='.$preSliceTweetID.'"><i class="fas fa-retweet" aria-hidden="true"></i></a>
		<a class="tweetFavorite" href="https://twitter.com/intent/favorite?tweet_id='.$preSliceTweetID.'"><i class="fas fa-heart" aria-hidden="true"></i></a>
		';

        $alltweets[$i] = '
		<li>
			<div class="twItem tweet'.($i + 1).'">
				<div class="tweet-wrapper">'.$img_block.'
					<p class="tw-content">'.$displayText.'</p>
				</div>
			</div>
		</li>';
        // from the class="twItem tweet '.($i + 1).'
        ++$i;

        // print "<pre>";
        // print_r($alltweets);
        // print "</pre>";
        // if more or less than 3 tweets are needed adjust the number in $i==3 accordingly
        if ($i == 1) {
            break;
        }
    }

    //Adjustments will be necessary here based on project requirements for the number of tweets required.
    $tweets = '<div class="tw-icons">'
                        .$actions.
                    '</div><section class="grid-wrap"><ul class="grid swipe-right" id="grid">';

    foreach ($alltweets as $data) {
        $tweets .= $data."\n";
    }
    $tweets .= '</ul></section>';
    echo $tweets;
}
latest_tweets();
