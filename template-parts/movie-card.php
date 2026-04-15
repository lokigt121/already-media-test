<div class="movies-grid__item movie-card">
    <div class="movie-card__image">

        <?php the_post_thumbnail(); ?>

        <?php if(!empty(get_field('rating'))): ?>

            <div class="movie-card__rating">

                <?php the_field('rating') ?>

                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-star.svg" alt="Star icon" class="movie-card__icon">
            </div>

        <?php endif; ?>

    </div>
    <h3 class="h3 movie-card__title"><?php the_title(); ?></h3>
    <a href="<?php the_permalink(); ?>" class="btn btn--secondary movie-card__readmore">Read more</a>
</div>