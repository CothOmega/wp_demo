<?php
/**
 * almond Theme Customizer
 *
 * @package almond
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function almond_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'almond_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'almond_customize_partial_blogdescription',
		) );
	}

	// remove built in sections:
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_panel('widgets');
	$wp_customize->remove_section('colors');

	// add new sections:
	$wp_customize->add_section('header', [
		'title'			=> 'Header',
		'priority'		=> 21
	]);
	$wp_customize->add_section('footer', [
		'title'			=> 'Footer',
		'priority'		=> 22
	]);
	$wp_customize->add_section('home', [
		'title'			=> 'Home',
		'priority'		=> 23
	]);
	$wp_customize->add_section('interior', [
		'title'			=> 'Interior',
		'priority'		=> 24
	]);
	$wp_customize->add_section('news', [
		'title'			=> 'News',
		'priority'		=> 25
	]);
	$wp_customize->add_section('social', [
		'title'			=> 'Social',
		'priority'		=> 26
	]);
	$wp_customize->add_section('meta', [
		'title'			=> 'Meta',
		'priority'		=> 27
	]);

	// add new settings & controls:
	// header
	$wp_customize->add_setting('header_height', [
		'default'		=> 72,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'header_height', [
		'type'			=> 'number',
		'description'	=> 'This affects menu item height and line height, too. (pixels)',
		'section'		=> 'header',
		'label'			=> 'Header Height',
		'settings'		=> 'header_height'
	]);

	$wp_customize->add_setting('header_logo_width', [
		'default'		=> 250,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'header_logo_width', [
		'type'			=> 'number',
		'description'	=> 'Use half the original image width to optimize for retina screens. (pixels)',
		'section'		=> 'header',
		'label'			=> 'Header Logo Width',
		'settings'		=> 'header_logo_width'
	]);

	$wp_customize->add_setting('header_bg', [
		'default'		=> '#1c2938',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg', [
		'label'      => __( 'Header Background Color', 'almond' ),
		'section'    => 'header',
		'settings'   => 'header_bg'
	] ) );

	$wp_customize->add_setting('header_transparent_checkbox', [
		'default'		=> 0,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'header_transparent_checkbox', [
		'type'			=> 'checkbox',
		'description'	=> 'Check this box to make header transparent until the window is scrolled (window.scrollY !== 0).',
		'section'		=> 'header',
		'label'			=> 'Transparent Header',
		'settings'		=> 'header_transparent_checkbox'
	]);

	$wp_customize->add_setting('header_box_shadow_checkbox', [
		'default'		=> 0,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'header_box_shadow_checkbox', [
		'type'			=> 'checkbox',
		'description'	=> 'Check this box to add a box shadow to the header.',
		'section'		=> 'header',
		'label'			=> 'Header Box Shadow',
		'settings'		=> 'header_box_shadow_checkbox'
	]);

	$wp_customize->add_setting('google_fonts', [
		'default'		=> 'Poppins,Noto Sans',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'google_fonts', [
		'type'			=> 'text',
		'description'	=> 'Add Google font names separated by commas (no space after the comma). This enables fonts sitewide, not just in the header.',
		'section'		=> 'header',
		'label'			=> 'Google Fonts',
		'settings'		=> 'google_fonts'
	]);

	$wp_customize->add_setting('hamburger_animation', [
		'default'		=> 'elastic',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'hamburger_animation', [
		'type'			=> 'select',
		'description'	=> 'Choose animation type for Hamburgers CSS. <a href="https://jonsuh.com/hamburgers/" target="_blank">Click for Examples</a>',
		'section'		=> 'header',
		'label'			=> 'Hamburger Animation Style',
		'settings'		=> 'hamburger_animation',
		'choices'		=> [
			'3dx'			=> '3DX',
			'3dx-r'			=> '3DX (reverse)',
			'3dy'			=> '3DY',
			'3dy-r'			=> '3DY (reverse)',
			'3dxy'			=> '3DXY',
			'3dxy-r'		=> '3DXY (reverse)',
			'arrow'			=> 'Arrow',
			'arrow-r'		=> 'Arrow (reverse)',
			'arrowalt'		=> 'Arrow Alt',
			'arrowalt-r'	=> 'Arrow Alt (reverse)',
			'arrowturn'		=> 'Arrow Turn',
			'arrowturn-r'	=> 'Arrow Turn (reverse)',
			'boring'		=> 'Boring',
			'collapse'		=> 'Collapse',
			'collapse-r'	=> 'Collapse (reverse)',
			'elastic'		=> 'Elastic',
			'elastic-r'		=> 'Elastic (reverse)',
			'emphatic'		=> 'Emphatic',
			'emphatic-r'	=> 'Emphatic (reverse)',
			'minus'			=> 'Minus',
			'slider'		=> 'Slider',
			'slider-r'		=> 'Slider (reverse)',
			'spin'			=> 'Spin',
			'spin-r'		=> 'Spin (reverse)',
			'spring'		=> 'Spring',
			'spring-r'		=> 'Spring (reverse)',
			'stand'			=> 'Stand',
			'stand-r'		=> 'Stand (reverse)',
			'squeeze'		=> 'Squeeze',
			'vortex'		=> 'Vortex',
			'vortex-r'		=> 'Vortex (reverse)'
		],
	]);

	// footer
	$wp_customize->add_setting('footer_height', [
		'default'		=> 422,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'footer_height', [
		'type'			=> 'number',
		'description'	=> 'Uses max-height CSS property in pixels.',
		'section'		=> 'footer',
		'label'			=> 'Footer Height',
		'settings'		=> 'footer_height'
	]);

	$wp_customize->add_setting('footer_bg_color', [
		'default'		=> '#1c2938',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', [
		'label'      => __( 'Footer Background Color', 'almond' ),
		'section'    => 'footer',
		'settings'   => 'footer_bg_color'
	] ) );

	$wp_customize->add_setting('hide_footer_bg_img', [
		'default'		=> 0,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'hide_footer_bg_img', [
		'type'			=> 'checkbox',
		'section'		=> 'footer',
		'label'			=> 'Hide Footer Background Image',
		'settings'		=> 'hide_footer_bg_img'
	]);

	$wp_customize->add_setting('footer_bg_image', [
		'default'		=> '',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_bg_image', [
		'label' 	 	=> __( 'Footer Background Image', 'almond' ),
		'section' 	 	=> 'footer',
		'settings'		=> 'footer_bg_image',
		'mime_type'  	=> 'image'
	] ) );

	$wp_customize->add_setting('footer_logo', [
		'default'		=> '',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_logo', [
		'label' 	 	=> __( 'Footer Logo', 'almond' ),
		'section' 	 	=> 'footer',
		'settings'		=> 'footer_logo',
		'mime_type'  	=> 'image'
	] ) );

	$wp_customize->add_setting('footer_logo_width', [
		'default'		=> 250,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'footer_logo_width', [
		'type'			=> 'number',
		'description'	=> 'Use half the original image width to optimize for retina screens. (pixels)',
		'section'		=> 'footer',
		'label'			=> 'Footer Logo Width',
		'settings'		=> 'footer_logo_width'
	]);

	$wp_customize->add_setting('footer_message', [
		'default'		=> 'Extra message in case you wanted to add one here...',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'footer_message', [
		'type'			=> 'textarea',
		'section'		=> 'footer',
		'label'			=> 'Footer Message',
		'settings'		=> 'footer_message'
	]);

	$wp_customize->add_setting('disclaimer', [
		'default'		=> 'Paid for by Almond Farmers of America',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'disclaimer', [
		'type'			=> 'text',
		'section'		=> 'footer',
		'label'			=> 'Disclaimer',
		'settings'		=> 'disclaimer'
	]);

	// home
	$wp_customize->add_setting('show_hero_section', [
		'default'		=> 1,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'show_hero_section', [
		'type'			=> 'checkbox',
		'section'		=> 'home',
		'label'			=> 'Show Hero Section',
		'settings'		=> 'show_hero_section'
	]);

	$wp_customize->add_setting('hero_bg', [
		'default'		=> '',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_bg', [
		'label' 	 	=> __( 'Hero Background Image', 'almond' ),
		'section' 	 	=> 'home',
		'settings'		=> 'hero_bg',
		'mime_type'  	=> 'image'
	] ) );

	$wp_customize->add_setting('hero_height', [
		'default'		=> 565,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'hero_height', [
		'type'			=> 'number',
		'description'	=> 'Choose the Hero Section height. (pixels)',
		'section'		=> 'home',
		'label'			=> 'Hero Height',
		'settings'		=> 'hero_height'
	]);

	$wp_customize->add_setting('hero_mobile_section_toggle', [
		'default'		=> 0,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'hero_mobile_section_toggle', [
		'type'			=> 'checkbox',
		'section'		=> 'home',
		'label'			=> 'Show mobile hero section',
		'settings'		=> 'hero_mobile_section_toggle'
	]);

	$wp_customize->add_setting('hero_mobile_img', [
		'default'		=> '',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_mobile_img', [
		'label' 	 	=> __( 'Mobile Hero Background Image', 'almond' ),
		'section' 	 	=> 'home',
		'settings'		=> 'hero_mobile_img',
		'mime_type'  	=> 'image'
	] ) );

	$wp_customize->add_setting('hero_mobile_bg_color', [
		'default'		=> '#a10b26',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_mobile_bg_color', [
		'label'      => __( 'Mobile Hero Background Color', 'almond' ),
		'section'    => 'home',
		'settings'   => 'hero_mobile_bg_color'
	] ) );

	$wp_customize->add_setting('hero_mobile_toggle_width', [
		'default'		=> 600,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'hero_mobile_toggle_width', [
		'type'			=> 'number',
		'description'	=> 'Choose the width at which the hero section toggles to mobile (pixels)',
		'section'		=> 'home',
		'label'			=> 'Hero Mobile Width Toggle',
		'settings'		=> 'hero_mobile_toggle_width'
	]);

	$wp_customize->add_setting('hero_title', [
		'default'		=> 'ALMONDS ARE A RICH SOURCE OF PROTEIN',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'hero_title', [
		'type'			=> 'text',
		'section'		=> 'home',
		'label'			=> 'Hero Title',
		'settings'		=> 'hero_title'
	]);

	$wp_customize->add_setting('hero_subtitle', [
		'default'		=> 'You\'ll go nuts for these tasty treats!',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'hero_subtitle', [
		'type'			=> 'textarea',
		'section'		=> 'home',
		'label'			=> 'Hero Sub-Title',
		'settings'		=> 'hero_subtitle'
	]);

	$wp_customize->add_setting('show_signup_section', [
		'default'		=> 1,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'show_signup_section', [
		'type'			=> 'checkbox',
		'section'		=> 'home',
		'label'			=> 'Show Signup Section',
		'settings'		=> 'show_signup_section'
	]);

	$wp_customize->add_setting('signup_bg', [
		'default'		=> '#EB2A4D',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'signup_bg', [
		'label'      => __( 'Signup Background Color', 'almond' ),
		'section'    => 'home',
		'settings'   => 'signup_bg'
	] ) );

	$wp_customize->add_setting('signup_title', [
		'default'		=> 'Stay in Touch',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'signup_title', [
		'type'			=> 'text',
		'section'		=> 'home',
		'label'			=> 'Signup Title',
		'settings'		=> 'signup_title'
	]);

	$wp_customize->add_setting('signup_shortcode', [
		'default'		=> '',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'signup_shortcode', [
		'type'			=> 'text',
		'section'		=> 'home',
		'label'			=> 'Signup Form Shortcode',
		'settings'		=> 'signup_shortcode'
	]);

	$wp_customize->add_setting('signup_html_form', [
		'default'		=> '<script>
		var l_submit_confirmation_status = true;
		var l_recaptcha_status = true;
		function onSumbit(token){
		var form = document.getElementById("CI_subscribeForm");
		if (grecaptcha.getResponse() == ""){form.reset();grecaptcha.reset();alert("Something went wrong. Please try again later.");}else{form.submit();}}
		function validate(event){
		var form = document.getElementById("CI_subscribeForm");
		event.preventDefault();
		if(!form.checkValidity()){var tmpSubmit = document.createElement("button");form.appendChild(tmpSubmit);tmpSubmit.click();form.removeChild(tmpSubmit);}else{grecaptcha.execute();}}
		function onload(){
		var element = document.getElementById("CI_submit");
		element.onclick = validate;}
		</script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<form id="CI_subscribeForm" action="https://ci.criticalimpact.com/wc/wc_verify.cfm" method="post" name="CI_subscribeForm" validate>
		<input type="hidden" name="CI_thankyou" value="donate_or_thankyou_url.com">
		<input type="hidden" name="CI_thankyou2" value="donate_or_thankyou_url.com">
		<input type="hidden" name="CI_err" value="https://ci.criticalimpact.com/wc/error.cfm">
		<input type="hidden" name="CI_Action" value="sub">
		
		<input type="hidden" name="CI_LID" value="XXXXXXXXXXXXXXX">
		<input type="hidden" name="CI_MID" value="XXXXXXXXXXXXXXX">
		<input type="hidden" name="CI_FID2" value="XXXXXXXXXXXXXXX">
		
		<input type="hidden" name="CI_SITEKEY" value="SITEKEY_G_LETTERS_NUMBERS_SAME_AS_BELOW">
		
		<input type="email" name="CI_email" placeholder="Email" required/>
		<input type="text" name="CI_custom2" pattern="[0-9][0-9][0-9][0-9][0-9]" maxlength="5" placeholder="Zip" required/>
		<!-- if needed
		<input type="text" name="CI_firstname" placeholder="First Name" required>
		<input type="text" name="CI_lastname" placeholder="Last Name" required>
		<input type="text" name="CI_custom7" placeholder="Mobile Phone">
		etc... -->
		<div class="g-recaptcha" data-sitekey="SITEKEY_G_LETTERS_NUMBERS_SAME_AS_ABOVE" data-callback="onSumbit" data-size="invisible"></div>
		
		<input type="button" id="CI_submit" name="CI_submit" value="Submit" />
		</form>
		<script>onload();</script>',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'signup_html_form', [
		'type'			=> 'textarea',
		'section'		=> 'home',
		'label'			=> 'Signup HTML Form',
		'settings'		=> 'signup_html_form'
	]);

	$wp_customize->add_setting('show_about_section', [
		'default'		=> 1,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'show_about_section', [
		'type'			=> 'checkbox',
		'section'		=> 'home',
		'label'			=> 'Show About Section',
		'settings'		=> 'show_about_section'
	]);

	$wp_customize->add_setting('about_feature_title', [
		'default'		=> 'About the Almond',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'about_feature_title', [
		'type'			=> 'text',
		'section'		=> 'home',
		'label'			=> 'About Feature Title',
		'settings'		=> 'about_feature_title'
	]);

	$wp_customize->add_setting('about_video', [
		'default'		=> 'https://www.youtube.com/watch?v=XtgJjLKxoxk',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'about_video', [
		'type'			=> 'text',
		'section'		=> 'home',
		'label'			=> 'About Video URL',
		'settings'		=> 'about_video'
	]);

	$wp_customize->add_setting('hide_about_feature_img', [
		'default'		=> 0,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'hide_about_feature_img', [
		'type'			=> 'checkbox',
		'section'		=> 'home',
		'label'			=> 'Hide About Feature Image',
		'settings'		=> 'hide_about_feature_img'
	]);

	$wp_customize->add_setting('about_feature_img', [
		'default'		=> '',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'about_feature_img', [
		'label' 	 	=> __( 'About Feature Image', 'almond' ),
		'section' 	 	=> 'home',
		'settings'		=> 'about_feature_img',
		'mime_type'  	=> 'image'
	] ) );

	$wp_customize->add_setting('about_feature_body', [
		'default'		=> 'The almond (Prunus dulcis, syn. Prunus amygdalus) is a species of tree native to Iran and surrounding countries but widely cultivated elsewhere. The almond is also the name of the edible and widely cultivated seed of this tree. Within the genus Prunus, it is classified with the peach in the subgenus Amygdalus, distinguished from the other subgenera by corrugations on the shell (endocarp) surrounding the seed. The fruit of the almond is a drupe, consisting of an outer hull and a hard shell with the seed, which is not a true nut, inside. Shelling almonds refers to removing the shell to reveal the seed. Almonds are sold shelled or unshelled. Blanched almonds are shelled almonds that have been treated with hot water to soften the seedcoat, which is then removed to reveal the white embryo.',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'about_feature_body', [
		'type'			=> 'textarea',
		'section'		=> 'home',
		'label'			=> 'About Feature Body',
		'settings'		=> 'about_feature_body'
	]);

	$wp_customize->add_setting('hide_learn_more_button', [
		'default'		=> 0,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'hide_learn_more_button', [
		'type'			=> 'checkbox',
		'section'		=> 'home',
		'label'			=> 'Hide Learn More Button',
		'settings'		=> 'hide_learn_more_button'
	]);

	$wp_customize->add_setting('learn_more_button_text', [
		'default'		=> 'Learn More',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'learn_more_button_text', [
		'type'			=> 'text',
		'section'		=> 'home',
		'label'			=> 'Learn More Button Text',
		'settings'		=> 'learn_more_button_text'
	]);

	$wp_customize->add_setting('learn_more_button_page_link', [
		'default'		=> 'About',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'learn_more_button_page_link', [
		'type'			=> 'dropdown-pages',
		'section'		=> 'home',
		'label'			=> 'Choose Page',
		'settings'		=> 'learn_more_button_page_link'
	]);

	// interior
	$wp_customize->add_setting('interior_header_bg_img', [
		'default'		=> '',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'interior_header_bg_img', [
		'label' 	 	=> __( 'Interior Header Background Image', 'almond' ),
		'section' 	 	=> 'interior',
		'settings'		=> 'interior_header_bg_img',
		'mime_type'  	=> 'image'
	] ) );

	$wp_customize->add_setting('interior_header_height', [
		'default'		=> 362,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'interior_header_height', [
		'type'			=> 'number',
		'description'	=> 'Choose the Interior Header height. (pixels)',
		'section'		=> 'interior',
		'label'			=> 'Interior Header Height',
		'settings'		=> 'interior_header_height'
	]);

	$wp_customize->add_setting('interior_header_logo', [
		'default'		=> '',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'interior_header_logo', [
		'label' 	 	=> __( 'Interior Header Logo', 'almond' ),
		'section' 	 	=> 'interior',
		'settings'		=> 'interior_header_logo',
		'mime_type'  	=> 'image'
	] ) );

	$wp_customize->add_setting('interior_header_logo_width', [
		'default'		=> 250,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'interior_header_logo_width', [
		'type'			=> 'number',
		'description'	=> 'Use half the original image width to optimize for retina screens. (pixels)',
		'section'		=> 'interior',
		'label'			=> 'Interior Header Logo Width',
		'settings'		=> 'interior_header_logo_width'
	]);

	// news

	$wp_customize->add_setting('news_page_title', [
		'default'		=> 'News',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'news_page_title', [
		'type'			=> 'text',
		'section'		=> 'news',
		'label'			=> 'Add title for news page (only for "posts page" not using News template)',
		'settings'		=> 'news_page_title'
	]);

	$wp_customize->add_setting('news_header_bg_img', [
		'default'		=> '',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'news_header_bg_img', [
		'label' 	 	=> __( 'News Page Header Background Image', 'almond' ),
		'section' 	 	=> 'news',
		'settings'		=> 'news_header_bg_img',
		'mime_type'  	=> 'image'
	] ) );

	$wp_customize->add_setting('news_posts_per_page', [
		'default'		=> 5,
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'news_posts_per_page', [
		'type'			=> 'number',
		'description'	=> 'Choose the number of posts per page. (only for pages with that use the News template)',
		'section'		=> 'news',
		'label'			=> 'Posts Per Page',
		'settings'		=> 'news_posts_per_page'
	]);

	// social
	$wp_customize->add_setting('donate_link', [
		'default'		=> 'https://winred.com/',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'donate_link', [
		'type'			=> 'url',
		'section'		=> 'social',
		'label'			=> 'Donate Link',
		'settings'		=> 'donate_link'
	]);

	$wp_customize->add_setting('social_fb', [
		'default'		=> 'https://facebook.com',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'social_fb', [
		'type'			=> 'url',
		'section'		=> 'social',
		'label'			=> 'Facebook URL',
		'settings'		=> 'social_fb'
	]);

	$wp_customize->add_setting('social_tw', [
		'default'		=> 'https://twitter.com',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'social_tw', [
		'type'			=> 'url',
		'section'		=> 'social',
		'label'			=> 'Twitter URL',
		'settings'		=> 'social_tw'
	]);

	$wp_customize->add_setting('social_in', [
		'default'		=> 'https://instagram.com',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'social_in', [
		'type'			=> 'url',
		'section'		=> 'social',
		'label'			=> 'Instagram URL',
		'settings'		=> 'social_in'
	]);

	$wp_customize->add_setting('social_yt', [
		'default'		=> 'https://youtube.com',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'social_yt', [
		'type'			=> 'url',
		'section'		=> 'social',
		'label'			=> 'YouTube Channel URL',
		'settings'		=> 'social_yt'
	]);

	$wp_customize->add_setting('social_linkedin', [
		'default'		=> 'https://linkedin.com',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'social_linkedin', [
		'type'			=> 'url',
		'section'		=> 'social',
		'label'			=> 'LinkedIn Profile URL',
		'settings'		=> 'social_linkedin'
	]);

	$wp_customize->add_setting('privacy_email', [
		'default'		=> 'info@prospergroupcorp.com',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'privacy_email', [
		'type'			=> 'text',
		'section'		=> 'social',
		'label'			=> 'Privacy Email',
		'settings'		=> 'privacy_email'
	]);

	// meta
	$wp_customize->add_setting('meta_description', [
		'default'		=> '',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'meta_description', [
		'type'			=> 'textarea',
		'section'		=> 'meta',
		'label'			=> 'Meta Description',
		'settings'		=> 'meta_description'
	]);

	$wp_customize->add_setting('meta_og_image', [
		'default'		=> '',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'meta_og_image', [
		'label' 	 	=> __( 'Open Graph Image', 'almond' ),
		'description'	=> 'Upload or choose an Open Graph image. (1200 x 630px)',
		'section' 	 	=> 'meta',
		'settings'		=> 'meta_og_image',
		'mime_type'  	=> 'image'
	] ) );

	$wp_customize->add_setting('gtm_head', [
		'default'		=> '<!-- add GTM code under Meta section in WP Customizer or remove this message -->',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'gtm_head', [
		'type'			=> 'textarea',
		'section'		=> 'meta',
		'label'			=> 'GTM Head Code',
		'settings'		=> 'gtm_head'
	]);

	$wp_customize->add_setting('gtm_body', [
		'default'		=> '<!-- add GTM code under Meta section in WP Customizer or remove this message -->',
		'transport'		=> 'refresh'
	]);

	$wp_customize->add_control( 'gtm_body', [
		'type'			=> 'textarea',
		'section'		=> 'meta',
		'label'			=> 'GTM Body Code',
		'settings'		=> 'gtm_body'
	]);
}

add_action( 'customize_register', 'almond_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function almond_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function almond_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function almond_customize_preview_js() {
	wp_enqueue_script( 'almond-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'almond_customize_preview_js' );