<?php if (get_theme_mod('about_video', 'https://www.youtube.com/watch?v=XtgJjLKxoxk')) {
        $yt_video_link = get_theme_mod('about_video', 'https://www.youtube.com/watch?v=XtgJjLKxoxk');
        if (strpos($yt_video_link, 'watch?v=')) {
            $yt_video_link = str_replace('watch?v=', 'embed/', $yt_video_link);
        };
        if (!strpos($yt_video_link, '?rel=0')) {
            $yt_video_link .= '?rel=0';
        };
        ?>
        <div class="vid-wrapper">
            <div id="video-section">
                <div class='about-video'>
                    <iframe width="100%" height="100%" src="<?php echo $yt_video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <?php 
    }; ?>
<div id='about-feature'>

    <?php 
        if ((get_theme_mod('about_feature_img')) && (get_theme_mod('hide_about_feature_img', 0) == 0)) {
            echo "<img src='" . wp_get_attachment_url(get_theme_mod('about_feature_img')) . "' class='about-feature-img' title='About " . get_bloginfo('name') . "' />";
        } elseif (get_theme_mod('hide_about_feature_img', 0) == 0) {
            echo "<img src='/wp-content/themes/almond/img/almond-about-feature-img.jpg' class='about-feature-img' title='About the Almond' />";
        }
    ?>

    
    <div class="about-text">
        <h2><?php echo get_theme_mod('about_feature_title', 'About the Almond'); ?></h2>
        <p><?php echo get_theme_mod('about_feature_body', 'The almond (Prunus dulcis, syn. Prunus amygdalus) is a species of tree native to Iran and surrounding countries but widely cultivated elsewhere. The almond is also the name of the edible and widely cultivated seed of this tree. Within the genus Prunus, it is classified with the peach in the subgenus Amygdalus, distinguished from the other subgenera by corrugations on the shell (endocarp) surrounding the seed. The fruit of the almond is a drupe, consisting of an outer hull and a hard shell with the seed, which is not a true nut, inside. Shelling almonds refers to removing the shell to reveal the seed. Almonds are sold shelled or unshelled. Blanched almonds are shelled almonds that have been treated with hot water to soften the seedcoat, which is then removed to reveal the white embryo.'); ?></p>
        <?php if (get_theme_mod('hide_learn_more_button', 0) == 0) : ?>
        <p class='learn-more-button-cont'>
            <a href='<?php echo get_the_permalink(get_theme_mod("learn_more_button_page_link", 14)); ?>' class='learn-more-button'><?php echo get_theme_mod('learn_more_button_text', 'Learn More'); ?></a>
        </p>
    </div>
    <?php endif; ?>
</div>
<div id="facebook-section">
<h2>Connect on Facebook</h2>
<h3><a href="https://www.facebook.com/friendsofcarminemarceno/" target="_blank">@FriendsofCarmineMarceno</a></h3>
<?php echo do_shortcode('[rad_posts]'); ?>
</div>