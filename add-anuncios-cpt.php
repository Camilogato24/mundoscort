<?php

function registrar_custom_post_type_anuncio() {
    $labels = array(
        'name'               => 'Anuncios',
        'singular_name'      => 'Anuncio',
        'menu_name'          => 'Anuncios',
        'add_new'            => 'Agregar Nuevo',
        'add_new_item'       => 'Agregar Nuevo Anuncio',
        'edit_item'          => 'Editar Anuncio',
        'new_item'           => 'Nuevo Anuncio',
        'view_item'          => 'Ver Anuncio',
        'search_items'       => 'Buscar Anuncios',
        'not_found'          => 'No se encontraron Anuncios',
        'not_found_in_trash' => 'No se encontraron Anuncios en la papelera',
        'all_items'          => 'Todos los Anuncios',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'anuncio'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array('title', 'editor', 'custom-fields'),
    );

    register_post_type('anuncio', $args);
}

add_action('init', 'registrar_custom_post_type_anuncio');

?>