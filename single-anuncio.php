<?php
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php while (have_posts()) : the_post(); ?>
        <section class="single-anuncio" id="post-<?php the_ID(); ?>">
            <div class="content-top">
                <div class="container-gallery">
                    <div class="gallery-thumbnails">
                        <?php
                            $images = get_field('gallery-anuncio');
                            if( $images ): ?>
                                <div thumbsSlider="" class="swiper mySwiper">
                                    <ul class="swiper-wrapper">
                                        <?php foreach( $images as $image ): ?>
                                            <li class="swiper-slide">
                                                <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                                <p><?php echo esc_html($image['caption']); ?></p>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif;
                        ?>
                    </div>
                    <div class="gallery-items">
                        <?php
                            $images = get_field('gallery-anuncio');
                            if( $images ): ?>
                            <div thumbsSlider="" class="swiper mySwiper2">
                                <ul class="swiper-wrapper">
                                    <?php foreach( $images as $image ): ?>
                                        <li class="swiper-slide">
                                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <p><?php echo esc_html($image['caption']); ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif;
                        ?>
                    </div>
                </div>
                <div class="container-content">
                    <div class="content-title">
                        <?php
                            if (puede_editar_post()) {
                                // Muestra el botón flotante con el icono de lápiz
                                echo '<a href="#" id="edit-post" class="edit-post"><i class="fa fa-pencil"></i> Editar anuncio.</a>';
                            } 
                        ?>
                        <h1 class="title">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                    <div class="content-price">
                        <h2>
                            <?php the_field('precio', get_the_ID()); ?>€
                        </h2>
                    </div>
                    <div class="content-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="content-contact">
                        <button type="button" title="wp" class="btn btn-primary">Atiendo por Whatsapp</button>
                        <button type="button" title="cel" class="btn btn-secundary">Llámame</button>
                    </div>
                    <div class="content-more">
                        <div class="product-cell sales"><span class="cell-label">Localización:</span><?php the_field('localizacion', get_the_ID()) ; ?></div>
                        <div class="product-cell sales"><span class="cell-label">Nacionalidad:</span><?php the_field('nacionalidad', get_the_ID()); ?></div>
                        <div class="product-cell sales"><span class="cell-label">Edad:</span><?php the_field('edad', get_the_ID()); ?></div>
                        <div class="product-cell sales"><span class="cell-label">Teléfono:</span><?php the_field('telefono', get_the_ID()); ?></div>
                        <div class="product-cell sales"><span class="cell-label">Apodo o nombre:</span><?php the_field('nombre_o_apodo', get_the_ID()); ?></div>
                        <div class="product-cell sales"><span class="cell-label">Zona:</span><?php the_field('zona_de_la_ciudad', get_the_ID()); ?></div>
                        <div class="product-cell sales"><span class="cell-label">Disponibilidad:</span><?php the_field('disponibilidad', get_the_ID()); ?></div>
                        <div class="product-cell sales"><span class="cell-label">Horario:</span><?php the_field('horario', get_the_ID()); ?></div>
                        <div class="product-cell sales"><span class="cell-label">Profesión:</span><?php the_field('profesion', get_the_ID()); ?></div>
                        <div class="product-cell sales"><span class="cell-label">Peso:</span><?php the_field('peso', get_the_ID()); ?></div>
                        <div class="product-cell sales"><span class="cell-label">Precio:</span><?php the_field('precio', get_the_ID()); ?>€</div>

                    </div>
                </div>
            </div>
            <div class="content-body">
            </div>
        </section>
        <div class="off-canvas-content">
            <div class="overlayCanvas"></div>
            <div class="menu-off-canvas" id="menu-off-canvas">
                <!-- form update post -->
                <?php
                    // Verifica si estás en una página de single-post
                    if (is_single()) {
                        // Obtiene el ID del post actual
                        $post_id = get_the_ID();

                        // Muestra el formulario de actualización
                        echo display_frontend_form_update($post_id);
                    }
                ?>

            </div>
        </div>
        <?php endwhile; ?>

    </main><!-- #main -->
</div><!-- #primary -->
<script>
    const openUpdateForm = document.getElementById("edit-post");
    const menuCanvas = document.getElementById("menu-off-canvas");
    const body = document.querySelector("body");
    openUpdateForm.addEventListener('click', () => {
        menuCanvas.classList.add("animated");
        body.classList.add("animated")
    });
</script>
<?php get_footer(); ?>
