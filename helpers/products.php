<?php
function products_post($atts) {
    ?>
    <section>
        <div class="content">
            <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                );
                
                $query = new WP_Query($args);
                
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                    $product = wc_get_product(get_the_ID());
                
                ?>
                <div class="product">
                    <h2><?php the_title(); ?></h2>
                    <p><?php echo $product->get_price_html(); ?></p>
                    <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="button">Comprar</a>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo 'No posts found';
                endif;
            ?>
        </div>
    </section>
    <?php
}

add_shortcode('products_shortcode', 'products_post');

?>
