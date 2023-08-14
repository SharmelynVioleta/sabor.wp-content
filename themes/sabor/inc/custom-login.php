<?php
// This function is used to change the login page design
function the_sabor_login_css() {
    $site_logo = get_field('site_logo', 'option');
    if ($site_logo) {
        echo '<style type="text/css">
            body {
                background: #ffffff;
                min-width: 0;
                color: #3c434a;
                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
                font-size: 13px;
                line-height: 1.4;
            }
            .login #backtoblog a, .login #nav a {
                text-decoration: none;
                color: #ffffff;
            }
            .login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
                color: #ffffff;
            }
            .login h1 {
                text-align: center;
                padding: 10px;
                border-radius: 5px;
                background: white;
            }
            .login h1 a {
                background-image: url("' . esc_url($site_logo['url']) . '") !important;
                width: 300px !important;
                background-size: contain;
                margin-bottom: 0px;
            }
            .login form {
                margin-top: 20px;
                margin-left: 0;
                padding: 26px 24px 34px;
                font-weight: 400;
                overflow: hidden;
                background: #fff;
                border: 1px solid #c3c4c7;
                box-shadow: 0 1px 3px rgba(0,0,0,.04);
                border-radius: 5px;
            }
        </style>';
    }
}
add_action('login_head', 'the_sabor_login_css');

// This function is used to change the logo link from wordpress.org to your site
function sabor_admin_login_url() {
    return home_url();
}
add_filter('login_headerurl', 'sabor_admin_login_url');
?>
