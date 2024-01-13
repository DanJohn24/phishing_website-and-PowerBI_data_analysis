<link rel="stylesheet" type="text/css" href="css/stylesheet.css" /> 

<?php
    $title = 'Index'; 
    setcookie("starter_cookie", "starter_cookie",  time() + 2 * 24 * 60 * 60, '/');
?>

<?php include ("db/access_site_query.php"); ?>

<script type="text/javascript">
    function email_validation() {
        var email_in = document.getElementById('email_input').value;
        var template = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
        if (template.test(email_in)) {
            document.getElementById('valid_email_span').hidden = true
            return true;
        } else {
            document.getElementById('valid_email_span').hidden = false
            return false;
        }
    }

    window.onload = function() {
        document.getElementById('submit_form').onsubmit = email_validation;
    }
</script>

<body>
    <div id ="header_container">
        <header id="layout_header">
            <a href="/" id="login_page_logo_wrap">
                <img id = "zoom_logo" src="pictures\zoom_logo.png">
            </a>
            <div id="header_links">
                <span id="header_login_link">New to Zoom?</span>
                <button type="button" id="sign_up_for_free_button" onclick="window.location.href='db/investigate_site.php';">
                    <span id="sign_up_for_free_span"> Sign Up Free </span>
                </button>
                <a class="additional_headers_links" type="button" target="_self" href="db/investigate_site.php">
                    <span class="additional_headers_spans"> Support </span>
                </a>
                <a class="additional_headers_links" type="button"  target="_self" href="db/investigate_site.php">
                    <span class="additional_headers_spans"> English  </span>
                </a>
            </div>
        </header>
    </div>
    
    <div id ="full_container_div">
        <div id ="form_container">
            <form id="submit_form" method="post" action="db/sign_in_query.php">
            <h1 id="sign_in_text"> Sign In </h1>
                <div class="form_group">
                    <div class="controller_container">
                        <label for="email" id="email_label">
                            Email Address</label>
                        <input type="text" id="email_input" name="email" autocomplete="new-email" maxlength="99" placeholder="Email Address" value="">
	                    <span hidden ="hidden" id="valid_email_span"> Please enter a valid email address. </span>
                    </div>
                </div>
                <div class="form_group">
                    <div class="controller_container">
                        <label for="password" id="password_label">Password</label>
                        <div id="password_box_container">
                            <input type="password" id="password_input" name="password" autocomplete="new-password" maxlength="99" placeholder="Password" required>
                            <a id="forgot_password_button" href="db/investigate_site.php">Forgot password?</a>
                        </div>
                    </div>
                </div>
                <div class="form_group">
                    <div class="controller_container">
                        <p id="agree_terms_text">
                        By signing in, I agree to the <a target="_self" href="db/investigate_site.php">Zoom's Privacy Statement</a> and <a target="_self" href="db/investigate_site.php">Terms of Service</a>.</p>
                        <div id = "signin" >
                            <button type="submit"  id="sign_in_button">Sign In</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>