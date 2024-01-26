<?php
add_action('acf/save_post', 'my_acf_save_post', 20);

function my_acf_save_post($post_id) {
    if ($post_id == 'new_post') {
        $required_fields = array('imagen_anuncio', 'localizacion', 'edad', 'nombre_o_apodo', 'premium', 'top', 'nacionalidad', 'precio'); 
        
        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                acf_add_validation_error("acf-field-$field", 'Este campo es obligatorio.');
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'add_acf_form_head');
function add_acf_form_head() {
    acf_form_head();
}
 
add_shortcode( 'frontend_form', 'display_frontend_form' );
 
function display_frontend_form() {
    ob_start(); 
 
    acf_form(array(
        'post_id'       => 'new_post',
        'post_title'    => true,
        'form' => true, 
        'new_post'      => array(
            'post_type'     => 'anuncio',
            'post_status'   => 'publish'
        ),
        'field_groups' => array(139),
        'submit_value'  => 'Agregar el anuncio',
        'updated_message' => __( '' ),

    )); 
    return ob_get_clean(); 
}

function display_frontend_form_update($post_id) {
    ob_start(); 
 
    acf_form(array(
        'post_id'       => $post_id,
        'post_title'    => true,
        'form' => true, 
        'new_post'      => array(
            'post_type'     => 'anuncio',
            'post_status'   => 'publish'
        ),
        'field_groups' => array(139),
        'submit_value'  => 'actualizar el anuncio',
        'updated_message' => __( '' ),

    )); 
    return ob_get_clean(); 
}
?>