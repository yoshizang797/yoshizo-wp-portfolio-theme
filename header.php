<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('img/favicon.ico')); ?>">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">

   
    <?php wp_head(); ?>
    <meta name="google-site-verification" content="uXku5JUoj0FKSOim2hCeQ3uaLGgg0QONUnh6H3rorh0" />
</head>

<?php
$current_page_id = get_queried_object_id();
$english_parent  = get_page_by_path('en');

$is_english_page = false;

if ($english_parent) {
    $is_english_page =
        $current_page_id === $english_parent->ID ||
        wp_get_post_parent_id($current_page_id) === $english_parent->ID;
}

if (is_single() && has_category('works-en')) {
    $is_english_page = true;
}

?>
<?php
if ($is_english_page) {

    $logo_url    = home_url('/en/');
    $about_url   = home_url('/en/about-en/');
    $works_url   = home_url('/en/#works');
    $contact_url = home_url('/en/contact-en/');
    $switch_text = 'JP';
    $switch_url  = home_url('/');

} else {

    $logo_url    = home_url('/');
    $about_url   = home_url('/about/');
    $works_url   = home_url('/#works');
    $contact_url = home_url('/contact/');
    $switch_text = 'EN';
    $switch_url  = home_url('/en/');
}
?>
<body <?php body_class(); ?>>
    <header class="header">
        <div class="header__inner">
            <a href="<?php echo esc_url($logo_url); ?>" class="header__logoLink">
                <img class="header__img" src="<?php echo esc_url(get_theme_file_uri('img/logo.png')); ?>" alt="Yoshihiko's Portfolio">
            </a>

            <nav id="hamburger-navigation">
                <ul class="sections">
                    <li>
						<a class="hamburger-menu-section" href="<?php echo esc_url($about_url); ?>">About</a>
					</li>
					<li>
						<a class="hamburger-menu-section" href="<?php echo esc_url($works_url); ?>">Works</a>
					</li>
                    <?php if (!$is_english_page): ?>

                    <li>
                        <a class="hamburger-menu-section" href="<?php echo esc_url(home_url('/#trouble')); ?>">Trouble</a>
                    </li>
                    <li>
                        <a class="hamburger-menu-section" href="<?php echo esc_url(home_url('/#price')); ?>">Price</a>
                    </li>
                    <?php endif; ?>
					<li>
						<a class="hamburger-menu-section" href="<?php echo esc_url($contact_url); ?>">Contact</a>
					</li>
                    <li>
                        <a class="hamburger-menu-section" href="<?php echo esc_url($switch_url); ?>">
                            <?php echo esc_html($switch_text); ?>
                        </a>
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