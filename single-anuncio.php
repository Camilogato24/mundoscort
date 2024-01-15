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
                                                <!-- <a href="<?php echo esc_url($image['url']); ?>">
                                                </a> -->
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
                                            <a href="<?php echo esc_url($image['url']); ?>">
                                                <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            </a>
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
                </div>
            </div>
            <div class="content-body">

                <button type="button" title="wp" class="btn btn-primary">Atiendo por Whatsapp</button>
                <form action="doit">

                </form>
            </div>
        </section>
        <section class="about-section" id="post-<?php the_ID(); ?>">
            <div class="container">
                <div class="row grid-single">
                    <div class="content-column order-2">
                        <div class="inner-column">
                            <div class="sec-title">
                                <span class="title">scorts, modelo</span>
                                <h2><?php the_title(); ?></h2>
                            </div>
                            <div class="text">
                                <?php the_content(); ?>
                            </div>
                            <div class="btn-box">
                                <a href="#" class="theme-btn btn-style-one">Llamame</a>
                            </div>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="image-column">
                        <div class="inner-column wow fadeInLeft">
                            <img src="<?php the_field('imagen_anuncio', get_the_ID()); ?>" alt="product">
                        </div>
                    </div>

                </div>
                <div class="text">
                <div class="product-cell sales"><span class="cell-label">Localización:</span><?php the_field('localizacion', get_the_ID()); ?></div>
                <div class="product-cell sales"><span class="cell-label">Premium:</span><?php the_field('premium', get_the_ID()); ?></div>
                <div class="product-cell sales"><span class="cell-label">Nacionalidad:</span><?php the_field('nacionalidad', get_the_ID()); ?></div>
                <div class="product-cell sales"><span class="cell-label">Top:</span><?php the_field('top', get_the_ID()); ?></div>
                <div class="product-cell sales"><span class="cell-label">Precio:</span><?php the_field('precio', get_the_ID()); ?>€</div>

                </div>
                <div class="text">
                    Here we are trying to give you all kinds of technical content, whether it is related to designing or
                    functionality. We are creating content on a lot of languages and will continue to make it free of cost
                    even if you use it without any problem. Which is a very important thing.
                </div>
                <div class="text">
                    Here you can also share the content you create if our technical team likes it, then we will also share it
                    on our blog.
                </div>
                <div class="text">
                    In the end, I would say keep visiting our website and enjoy the quality content.
                </div>
            </div>
        </section>
        <?php endwhile; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<!-- <?php //get_sidebar(); ?> -->
<?php get_footer(); ?>
