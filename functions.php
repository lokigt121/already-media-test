<?php
add_action('after_setup_theme', 'already_media_test_theme_setup');
function already_media_test_theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu( 'header', 'Header Menu' );
}

add_action('wp_enqueue_scripts', function() {
    $manifest_path = __DIR__ . '/dist/.vite/manifest.json';

    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);

        if (isset($manifest['scss/main.scss'])) {
            wp_enqueue_style(
                'already-media-test-css',
                get_template_directory_uri() . '/dist/' . $manifest['scss/main.scss']['file'],
                [],
                null
            );
        }

    }
    wp_enqueue_style(
        'choices-css',
        get_template_directory_uri() . '/assets/css/choices.min.css',
        [],
        null
    );

    wp_enqueue_script(
        'choices-js',
        get_template_directory_uri() . '/assets/js/choices.min.js',
        array(),
        '1.0',
        true
    );

    wp_enqueue_script(
        'already-media-test-js',
        get_template_directory_uri() . '/assets/js/scripts.js',
        array(),
        '1.0',
        true
    );
    wp_enqueue_script(
        'movies-filter-and-loadmore',
        get_template_directory_uri() . '/assets/js/movies-filter-and-loadmore.js',
        array(),
        '1.0',
        true
    );


    wp_localize_script('movies-filter-and-loadmore', 'moviesScriptObj', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
});

require_once get_template_directory() . '/inc/register_movie_custom_post_type_and_genre_taxonomy.php';
require_once get_template_directory() . '/inc/movie_filter.php';