<?php
add_action( 'init', 'create_genre_taxonomy' );

function create_genre_taxonomy(){

    register_taxonomy( 'genre', [ 'movie' ], [
        'label'                 => null,
        'labels'                => [
            'name'              => 'Genres',
            'singular_name'     => 'Genre',
            'search_items'      => 'Search Genres',
            'all_items'         => 'All Genres',
            'view_item '        => 'View Genre',
            'parent_item'       => 'Parent Genre',
            'parent_item_colon' => 'Parent Genre:',
            'edit_item'         => 'Edit Genre',
            'update_item'       => 'Update Genre',
            'add_new_item'      => 'Add New Genre',
            'new_item_name'     => 'New Genre Name',
            'menu_name'         => 'Genre',
            'back_to_items'     => '← Back to Genre',
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true,
        'rewrite'               => true,
        'capabilities'          => array(),
        'meta_box_cb'           => null,
        'show_admin_column'     => false,
        'show_in_rest'          => null,
        'rest_base'             => null,
    ] );
}

add_action( 'init', 'register_movie_post_types' );

function register_movie_post_types(){

    register_post_type( 'movie', [
        'taxonomies' => ['genre'],
        'label'  => null,
        'labels' => [
            'name'              => 'Movies',
            'singular_name'     => 'Movie',
            'add_new'           => 'Add Movie',
            'add_new_item'      => 'Adding Movie',
            'edit_item'         => 'Edit Movie',
            'new_item'          => 'New Movie',
            'view_item'         => 'See Movie',
            'search_items'      => 'Search Movies',
            'not_found'         => 'Not Found',
            'parent_item_colon' => '',
            'menu_name'         => 'Movies',
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => null,
        'show_in_rest'        => null,
        'rest_base'           => null,
        'menu_position'       => null,
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'author', 'thumbnail'],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

}