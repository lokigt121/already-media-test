<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header id="header" class="header">
    <div class="container header__container">
        <a href="<?php echo site_url(); ?>" class="header__logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo.svg" alt="logo" class="header__img">
        </a>
        <nav class="header__menu">

            <?php
            wp_nav_menu([
                    'theme_location' => 'header',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'depth'          => 0,
            ]);
            ?>

        </nav>
        <div class="header__burger">
            <span></span><span></span><span></span>
        </div>
    </div>
</header>

<main id="content" class="content">