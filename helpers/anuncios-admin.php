<?php 
function function_anuncios_admin($atts) {
?>
<?php
$args = array(
    'post_type' => 'anuncio',
    'posts_per_page' => -1,
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
    $thumbnail_url = get_the_post_thumbnail_url(); // Obtener la URL del thumbnail
    $post_id = get_the_ID();
    $post_status = get_post_status($post_id);
    $categorias = get_the_terms($post_id, 'categoria-anuncio');
?>
    <div class="products-row"><!-- Item de la lista -->
        <button class="cell-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="12" cy="5" r="1"></circle>
                <circle cx="12" cy="19" r="1"></circle>
            </svg>
        </button>
        <div class="product-cell image">
            <a href="#">
                <img src="<?php the_field('imagen_anuncio', get_the_ID()); ?>" alt="product">
            </a>
            <a href="#">
                <span><?php the_field('nombre_o_apodo', get_the_ID()); ?></span>
            </a>
        </div>
        <div class="product-cell category">
            <span class="cell-label">Category:</span>
            Categorias
        </div>
        <!-- Agrega más divs según tus necesidades -->
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status active"><?php echo $post_status ?></span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Localización:</span><?php the_field('localizacion', get_the_ID()); ?></div>
        <div class="product-cell sales"><span class="cell-label">Premium:</span><?php the_field('premium', get_the_ID()); ?></div>
        <div class="product-cell sales"><span class="cell-label">Nacionalidad:</span><?php the_field('nacionalidad', get_the_ID()); ?></div>
        <div class="product-cell sales"><span class="cell-label">Top:</span><?php the_field('top', get_the_ID()); ?></div>
        <div class="product-cell sales"><span class="cell-label">Precio:</span><?php the_field('precio', get_the_ID()); ?>€</div>

    </div>
<?php
    endwhile;
    wp_reset_postdata();
else :
    echo 'No posts found';
endif;
?>
<?php
}

// Registra el shortcode
add_shortcode('anuncios_admin', 'function_anuncios_admin');

?>