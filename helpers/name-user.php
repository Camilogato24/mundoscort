<?php
    function mostrar_mensaje_saludo() {
        // Verifica si el usuario está logueado
        if (is_user_logged_in()) {
            // Obtiene el ID del usuario actual
            $user_id = get_current_user_id();
    
            // Obtiene el objeto del usuario
            $user = get_user_by('ID', $user_id);
    
            // Accede al nombre del usuario
            $user_name = $user->user_nicename;
    
            // Muestra el nombre del usuario
            echo 'Hola, ' . esc_html($user_name) . '!';
        } else {
            // Mensaje si el usuario no está logueado
            echo '¡Bienvenido, invitado!';
        }
    }
    add_shortcode('nombre_usuario', 'mostrar_mensaje_saludo');


?>