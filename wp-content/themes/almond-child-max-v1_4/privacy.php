<?php
/**
 * Template Name: Privacy Policy
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package almond
 */

get_header();
?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

			<section class="privacy-policy-page">

			<header class="entry-header" <?php 
				if (get_theme_mod('interior_header_bg_img')) {
					echo 'style="background-image: url(' . wp_get_attachment_url(get_theme_mod('interior_header_bg_img')) . ');"';
				} else {
					echo 'style="background-image: url(/wp-content/themes/almond/img/almond-interior-header.jpg);"';
				}
			?>>
			<div class="title-wrapper">
                <div class="title-inner">
                    <h1 class="entry-title">Privacy Policy</h1>
                </div>
            </div>    
        	</header><!-- .entry-header -->

				<div class="page-content">
					<p>This Privacy Policy governs the manner in which "<?php echo bloginfo('name'); ?>" collects, uses, maintains and discloses information collected from users of <?php echo site_url(); ?> (the "website").  This Privacy Policy applies to the website and all products and services offered by The Prosper Group.</p>
					<h1>Information We Collect Automatically</h1>
					<p>If you visit our website to browse, read, or download information:</p>
					<p>Your web browser automatically sends us (and we may retain) information such as the:<br></p>
					<ul>
						<li> Internet domain through which you access the Internet (e.g., yourServiceProvider.com if you use a commercial Internet service provider, or yourSchool.edu if you use an Internet account from your school);</li>
						<li> Internet Protocol address of the computer you are using;</li>
						<li> type of browser software and operating system you are using;</li>
						<li> date and time you access our site; and</li>
						<li> the Internet address of the site from which you linked directly to our site.</li>
					</ul>
					<p>We will use this information as aggregate data to help us maintain this site, e.g., to determine the number of visitors to different sections of our site, to ensure the site is working properly, and to help us make our site more accessible and useful.</p>
					<p>We will not use this information to identify individuals, except for site security or law enforcement purposes.</p>
					<p>We will not obtain personally-identifying information about you when you visit our site, unless you choose to provide such information.</p>


					<h1>Other Information We Collect</h1>
					<p>If you choose to identify yourself (or otherwise provide us with personal information) when you use our online forms:</p>
					<p>We will collect (and may retain) any personally identifying information, such as your name, street address, email address, and phone number, and any other information you provide. We will use this information to try to fulfill your request and may use it to provide you with additional information at a later time. We may share your information with third parties.<br>
						If you request information, services, or assistance, we may disclose your personal information to those third parties that (in our judgment) are appropriate in order to fulfill your request. If, when you provide us with such information, you specify that you do not want us to disclose the information to third parties, we will honor your request. Note, however, that if you do not provide such information, it may be impossible for us to refer, respond to or fulfill your request.<br>
					If your communication relates to a law enforcement matter, we may disclose the information to law enforcement agencies that we deem appropriate.</p>


					<h1>How Long We Keep Information</h1>
					<p>We may keep information that will collect for an unlimited period of time.</p>


					<h1>Use of Cookies</h1>
					<p>Our website may use “cookies” to enhance your experience. Your web browser places cookies on its hard drive for record-keeping purposes and sometimes to track information about it. You may choose to set your web browser to refuse cookies, or to alert you when cookies are being sent. If you do so, note that some parts of the website may not function properly.</p>


					<h1>Google Analytics</h1>
					<p>We use a tool called “Google Analytics” to collect information about use of this site. Google Analytics collects information such as how often users visit this site, what pages they visit when they do so, and what other sites they used prior to coming to this site. We use the information we get from Google Analytics only to improve this site. Google Analytics collects only the IP address assigned to you on the date you visit this site, rather than your name or other identifying information. We do not combine the information collected through the use of Google Analytics with personally identifiable information. Although Google Analytics plants a permanent cookie on your web browser to identify you as a unique user the next time you visit this site, the cookie cannot be used by anyone but Google. Google’s ability to use and share information collected by Google Analytics about your visits to this site is restricted by the <a href="https://www.google.com/analytics/terms/">Google Analytics Terms of Use</a> and the <a href="https://policies.google.com/privacy">Google Privacy Policy</a>. You can prevent Google Analytics from recognizing you on return visits to this site by <a href="https://www.usa.gov/optout-instructions">disabling cookies</a> on your browser.</p>


					<h1>Children’s Online Privacy Protection Act Compliance</h1>
					<p>We are in compliance with the requirements of COPPA (Children’s Online Privacy Protection Act), in that we do not knowingly collect or maintain personal information from anyone under 13 years of age. Our website, information and services are all directed to people who are at least 13 years of age or older.</p>


					<h1>Your Access to and Control Over Information</h1>
					<p>You may opt out of any future contacts from us at any time by contacting us via the email address given on our website: <a href="<?php echo get_theme_mod('privacy_email', 'info@prospergroupcorp.com'); ?>" rel="noopener" target="_blank"><?php echo get_theme_mod('privacy_email', 'info@prospergroupcorp.com')?></a></p>


					<h1>Links to Other Websites</h1>
					<p>Our website may contain links to other websites. Any personal information you provide on the linked pages is provided directly to that third party and is subject to that third party's privacy policy. This Policy does not apply to such linked sites, and we are not responsible for the content or privacy and security practices and policies of these websites or any other sites that are linked to from our website. We suggest you to learn about their privacy and security practices and policies before providing them with personal information.</p>


					<h1>Security</h1>
					<p>We take reasonable precautions to protect your information in an effort to prevent loss, misuse, and unauthorized access, disclosure, alteration, and destruction. Please be aware, however, that despite our efforts, no security measures are perfect or impenetrable and no method of data transmission that can be guaranteed against any interception or other type of misuse.</p>
					<p>Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a closed lock icon at the bottom of your web browser, or looking for “https” at the beginning of the address of the web page.</p>
					<p>While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment.</p>


					<h1>Changes to this Privacy Policy</h1>
					<p><?php echo bloginfo('name'); ?> has the discretion to update this privacy policy at any time. When we do, we will post a notification on the main page of our website and revise the updated date at the bottom of this page. We encourage you to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>


					<h1>Your Acceptance of These Terms</h1>
					<p>By using the website, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our website. Your continued use of the website following the posting of changes to this policy will be deemed your acceptance of those changes.</p>


					<h1>Contacting Us</h1>
					<p>If you have any questions about this Privacy Policy, the practices of this website, or your dealings with this website, please contact us at:</p>
					<p><?php echo bloginfo('name'); ?><br><a href="<?php echo get_theme_mod('privacy_email', 'info@prospergroupcorp.com'); ?>" rel="noopener" target="_blank"><?php echo get_theme_mod('privacy_email', 'info@prospergroupcorp.com')?></a></p>
                    <?php 
                        $privacy_policy_creation_date = date('m/d/Y'); 
                        add_option('privacy_policy_creation_date', $privacy_policy_creation_date); 
                    ?>
                    <p>This document was last updated on <?php echo get_option('privacy_policy_creation_date'); ?></p>

				</div><!-- .page-content -->

			</section><!-- .error-404 -->

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_footer();