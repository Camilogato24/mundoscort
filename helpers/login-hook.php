<?php 

function ajax_login_init(){

    wp_register_script('ajax-login-script', get_template_directory_uri() . '/ajax-login-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => '/admin',
        'loadingmessage' => __('Enviando la información del usuario, por favor espera...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}


function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ) {
        // Handle login errors
        $errors = $user_signon->get_error_messages();
        $error_message = '<span class="error-message">' . __('Error de inicio de sesión: ') . implode(", ", $errors) . '</span>';
        echo json_encode(array('loggedin'=>false, 'message'=> wp_kses_post($error_message)));
    } else {
        // Login successful
        wp_set_current_user($user_signon->ID);
        wp_set_auth_cookie($user_signon->ID);
        echo json_encode(array('loggedin'=>true, 'message'=>__('Inicio de sesión exitoso, redirigiendo...')));
    }

    die();
}

?>