<?php get_header(); ?>

<section class="main-page-intro">
    <div class="container main-page-intro__container">
        <div class="main-page-intro__grid">
            <div class="main-page-intro__column">
                <h1 class="h1 main-page-intro__title">Explore a <span class="text-color-primary">World</span> of Cinematic Wonders</h1>
                <p class="p main-page-intro__description">Our database not only includes blockbusters but also independent films, documentary features, and works from talented directors worldwide.</p>
                <div class="main-page-intro__btns">
                    <a href="#" class="btn btn--primary">REGISTER NOW</a>
                    <a href="#" class="btn btn--tertiary">About us</a>
                </div>
            </div>
            <div class="main-page-intro__column">
                <div class="main-page-intro__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pages/main-page/main-page-intro.png" alt="Main page intro" class="main-page-intro__img">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="movies-block">
    <div class="container movies-block__container">
        <h2 class="movies-block__title h2">Discover a <span class="text-color-primary">Universe</span> of Cinematic Marvels</h2>
        <div class="movies-block__grid">
            <div class="movies-block__column">
                <div class="movies-block__filter movies-filter">
                    <div class="movies-filter__search">
                        <input type="text" placeholder="Search by name">
                    </div>
                    <div class="movies-filter__title">FILTER:</div>
                    <div class="movies-filter__grid">
                        <div class="movies-filter__item filter-item">
                            <div class="filter-item__label">Genre:</div>
                            <select id="movie-genres" class="filter-item__select">
                                <option value="">All</option>
                                <?php
                                $genres = get_terms('genre', array('hide_empty' => false));

                                foreach ($genres as $genre) {
                                    echo "<option value='{$genre->slug}'>{$genre->name}</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="movies-filter__item filter-item">
                            <div class="filter-item__label">Date from:</div>
                            <select id="movie-year-from" name="year_from">
                                <option value="">None</option>
                                <?php $current_year = date('Y');

                                for ($year = $current_year; $year >= 1950; $year--) : ?>

                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>

                                <?php endfor; ?>

                            </select>
                            <div class="filter-item__label">to</div>
                            <select id="movie-year-to" name="year_to">
                                <option value="">None</option>
                                <?php for ($year = $current_year; $year >= 1950; $year--) : ?>

                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>

                                <?php endfor; ?>

                            </select>
                        </div>
                    </div>
                    <div class="movies-filter__btns">
                        <button id="movies-filter-submit" class="btn btn--primary movies-filter__submit">APPLY</button>
                    </div>
                </div>

            </div>
            <div class="movies-block__column">
                <div class="movies-block__sort movies-sort">
                    <div class="movies-sort__title">Sort by:</div>
                    <select name="movie-sort" id="movie-sort">
                        <option value="rating">Rating</option>
                        <option value="date">Date</option>
                    </select>
                </div>
                <div id="movies-grid" class="movies-block__result movies-grid">
                </div>
                <div id="loader" style="display: none; text-align: center; padding: 20px;">
                    Loading...
                </div>
                <button id="movies-load-more" class="btn btn--primary movies-grid__loadmore">Load more</button>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>