<?php
/*
Template Name: Agregar el anuncio
*/
get_header();

?>

<!-- Formulario de Anuncio -->
<?php
// if (function_exists('do_shortcode')) {
//     echo do_shortcode('[update_anuncio]');
// }
acf_form(array(
    'post_id'       => $post_id,
    'post_title'    => true,
    'post_content'  => true,
    'form'          => true,
    'updated_message' => __('¡Anuncio actualizado!', 'textdomain'),
    'submit_value'  => __('Actualizar Anuncio', 'textdomain'),
));
?> 

<!-- Mensaje de respuesta del formulario -->
<div id="mensaje-respuesta"></div>

<?php get_footer(); ?>
