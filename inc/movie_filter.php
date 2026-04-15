<?php
function load_movies_callback()
{
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $genre = isset($_POST['genre']) ? $_POST['genre'] : '';
    $sort = isset($_POST['sort']) ? $_POST['sort'] : 'date';
    $year_from = isset($_POST['year_from']) ? intval($_POST['year_from']) : '';
    $year_to = isset($_POST['year_to']) ? intval($_POST['year_to']) : '';

    $args = array(
        'post_type' => 'movie',
        'posts_per_page' => 2,
        'paged' => $page,
        'post_status' => 'publish',
    );

    if (!empty($genre)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'genre',
                'field' => 'slug',
                'terms' => $genre,
            )
        );
    }

    if (!empty($year_from) || !empty($year_to)) {
        $meta_query = array();

        if (!empty($year_from)) {
            $meta_query[] = array(
                'key' => 'year_of_release',
                'value' => $year_from,
                'type' => 'NUMERIC',
                'compare' => '>='
            );
        }

        if (!empty($year_to)) {
            $meta_query[] = array(
                'key' => 'year_of_release',
                'value' => $year_to,
                'type' => 'NUMERIC',
                'compare' => '<='
            );
        }

        $args['meta_query'] = $meta_query;
    }

    if ($sort == 'rating') {
        $args['meta_key'] = 'rating';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
        $args['meta_type'] = 'NUMERIC';
    } elseif ($sort == 'date') {
        $args['meta_key'] = 'release_date';
        $args['orderby'] = 'meta_value';
        $args['order'] = 'ASC';
    }

    $query = new WP_Query($args);

    $html = '';
    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/movie-card');
        }
    } else {
        echo '<p class="no-movies">Nothing found.</p>';
    }

    $html = ob_get_clean();
    wp_reset_postdata();

    wp_send_json(array(
        'html' => $html,
        'max_pages' => $query->max_num_pages
    ));
}

add_action('wp_ajax_load_movies', 'load_movies_callback');
add_action('wp_ajax_nopriv_load_movies', 'load_movies_callback');