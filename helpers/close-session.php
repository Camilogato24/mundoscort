<?php 

// Añade una acción para manejar la solicitud AJAX
add_action('wp_ajax_cerrar_sesion_usuario', 'cerrar_sesion_usuario');

// La misma acción debe estar disponible para usuarios no autenticados
add_action('wp_ajax_nopriv_cerrar_sesion_usuario', 'cerrar_sesion_usuario');

function cerrar_sesion_usuario() {
    // Cerrar la sesión de WordPress
    wp_logout();

    // Responder con un mensaje o lo que sea necesario
    echo 'Sesión cerrada exitosamente';
    wp_die(); // Importante para detener la ejecución de WordPress
}


?>