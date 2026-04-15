<?php get_header();?>

<section class="movie-page">
    <div class="container movie-page__container">
        <div class="movie-page__image"><?php the_post_thumbnail('full'); ?></div>
        <h1 class="h1 movie-page__title"><?php the_title(); ?></h1>
    </div>
</section>

<?php get_footer();?>