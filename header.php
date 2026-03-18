<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('descrption'); ?>">
    <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('img/favicon.ico')); ?>">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">

   
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <div class="header__inner">
            <a href="<?php echo esc_url(home_url()); ?>" class="header__logoLink">
                <img class="header__img" src="<?php echo esc_url(get_theme_file_uri('img/logo.png')); ?>" alt="Yoshihiko's Portfolio">
            </a>

            <nav id="hamburger-navigation">
                <ul class="sections">
                    <li>
						<a class="hamburger-menu-section" href="<?php echo esc_url(home_url('#about')); ?>">About</a>
					</li>
					<li>
						<a class="hamburger-menu-section" href="<?php echo esc_url(home_url('#works')); ?>">Works</a>
					</li>
					<li>
						<a class="hamburger-menu-section" href="<?php echo esc_url(home_url('#contact')); ?>">Contact</a>
					</li>
				</ul>
            </nav>
            <div class="hamburger-menu">
					<span></span>
					<span></span>
					<span></span>
			</div>
        </div>
    </header>