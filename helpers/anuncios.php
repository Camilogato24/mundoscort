<?php

function textoTop($valor) {
    if ($valor == 1) {
        // Devuelve este texto si el valor es 1
        return "<p class=\"price\">" . esc_html("Top") . "</p>";
    }
}
function premium($valor) {
    if ($valor == 1) {
        // Devuelve este texto si el valor es 1
        return "<p class=\"price\">" . esc_html("Premium") . "</p>";
    }
}

function mostrar_anuncios_lista_completa_shortcode($atts) {
    // Configura el loop para recuperar los anuncios
    $anuncios_query = new WP_Query(array(
        'post_type' => 'anuncio',
        'posts_per_page' => -1,
    ));

    // Inicia la salida
    $output = '<div class="anuncios-lista" id="row-anuncios">';

    // Comprueba si hay anuncios
    if ($anuncios_query->have_posts()) {
        while ($anuncios_query->have_posts()) {
            $anuncios_query->the_post();
            $post_url = get_permalink();
            $is_mobile = wp_is_mobile();
            $edad = $is_mobile ? '' : '<p>' . esc_html(get_field('edad', get_the_ID())) . '</p>';
            $nacionalidad = $is_mobile ? '' : '<p>' . esc_html(get_field('nacionalidad', get_the_ID())) . '</p>';
            $localizacion = $is_mobile ? '' : '<p>' . esc_html(get_field('localizacion', get_the_ID())) . '</p>';
            $hearth = $is_mobile ? '' : '<div class=\"heart\"> </div>';

            // Agrega el contenido de cada anuncio
            $output .= '<div class="anuncio">';            
            // Muestra la imagen destacada
            $thumbnail_url = get_field('imagen_anuncio', get_the_ID());
            if ($thumbnail_url) {
                $output .= '<div class="anuncio-imagen">
                    <a href=" ' . esc_url($post_url) .'" class=\"hidden-link\">
                        <img src="' . esc_url($thumbnail_url) . '">
                    </a>
                </div>';
            }

            // Muestra el contenido
            $output .= "
                <div class=\"anuncio-contenido\">
                    <div class=\"top-contenido\">
                        ". textoTop(get_field('top', get_the_ID())) ."
                        ". premium(get_field('premium', get_the_ID())) ."
                    </div>
                    <a href=". esc_url($post_url) ." class=\"hidden-link\">
                        <h2>" . esc_html(get_the_title()) . "</h2>
                    </a>
                    <p>" . esc_html(get_the_excerpt()) . "</p>
                    <div class=\"social-media\">
                        <img class=\"wp\" src=\"" . esc_url(get_template_directory_uri() . "/assets/images/whatsapp.png") . "\">
                        $edad
                        $nacionalidad
                        <p class=\"price\">" . esc_html(get_field('precio', get_the_ID())) . " €</p>
                        $localizacion
                        <p>" . esc_html(get_field('nombre_o_apodo', get_the_ID())) . "</p>
                        $hearth
                    </div>
                </div>
            </div>";
        }
    } else {
        $output .= '<p>No hay anuncios disponibles.</p>';
    }

    $output .= '</div>';

    return $output;

}
function anuncios_last_style($atts) {
?>
<div class="swiperHome">
<div class="grid-template swiper-wrapper">
<?php
$args = array(
    'post_type' => 'anuncio',
    'posts_per_page' => -1,
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
    $thumbnail_url = get_the_post_thumbnail_url(); // Obtener la URL del thumbnail

?>
<div class="example-2 card swiper-slide">
    <div class="wrapper-item" style="background-image: url('<?php the_field('imagen_anuncio', get_the_ID()); ?>');">
        <div class="header">
            <div class="date">
                <span class="day"><?php echo get_the_date('d'); ?></span>
                <span class="month"><?php echo get_the_date('M'); ?></span>
                <span class="year"><?php echo get_the_date('Y'); ?></span>
            </div>
            <ul class="menu-content">
                <li>
                    <a href="#" class="fa fa-bookmark-o"></a>
                </li>
                <li><a href="#" class="fa fa-heart-o"><span><?php echo get_post_meta(get_the_ID(), 'likes', true); ?></span></a></li>
                <li><a href="#" class="fa fa-comment-o"><span><?php echo get_comments_number(); ?></span></a></li>
            </ul>
        </div>
        <div class="data">
            <div class="content">
                <span class="author"><?php the_author(); ?></span>
                <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="button-cpt">Detalles</a>
            </div>
        </div>
    </div>
</div>
<?php
    endwhile;
    wp_reset_postdata();
else :
    echo 'No posts found';
endif;
?>
</div>
</div>
<?php
}

// Registra el shortcode
add_shortcode('anuncios_shortcode_total', 'mostrar_anuncios_lista_completa_shortcode');
add_shortcode('anuncios_shortcode_style', 'anuncios_last_style');

?>