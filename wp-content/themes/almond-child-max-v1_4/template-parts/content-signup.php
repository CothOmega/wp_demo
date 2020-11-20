<div id='signup'>
    <?php 
        if (get_theme_mod('signup_shortcode')) {
            echo do_shortcode(get_theme_mod('signup_shortcode'));
        }
        if (get_theme_mod('signup_html_form', '<script>
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
        <script>onload();</script>')) {
            echo do_shortcode(get_theme_mod('signup_html_form', '<script>
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
            <script>onload();</script>'));
        }
    ?>
</div>