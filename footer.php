<?php
$current_page_id = get_queried_object_id();
$english_parent  = get_page_by_path('en');

$is_english_page = false;

if ($english_parent) {
    $is_english_page =
        $current_page_id === $english_parent->ID
        || wp_get_post_parent_id($current_page_id) === $english_parent->ID;
}

if (is_single() && has_category('works-en')) {
    $is_english_page = true;
}
?>

<?php if (!is_page(array('contact', 'contact-en'))) : ?>

<section id="contact" class="contact u-wrapper">
    <img
    class="contact-img"
    src="<?php
        echo esc_url(
            get_template_directory_uri() . '/title/' .
            ($is_english_page ? 'CONTACT-EN.png' : 'CONTACT.png')
        );
    ?>"
    alt="Contact"
>

    <?php if ($is_english_page) : ?>
        <div class="contact_text">
            <p>Need help with your website?</p>
        </div>
    <?php endif; ?>

    <div class="button003">

        <?php if ($is_english_page) : ?>

            <a
                href="<?php echo esc_url(get_permalink(get_page_by_path('en/contact-en'))); ?>"
                class="mail-button"
            >
                Send Message
            </a>

        <?php else : ?>

            <a
                href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
                class="mail-button"
            >
                メールを送る
            </a>

        <?php endif; ?>

    </div>
</section>

<?php endif; ?>

</main>
<?php
// 英語ページかどうかを判定
$is_english_page =
    is_page('en') ||
    is_page('about-en') ||
    is_page('contact-en') ||
    (is_single() && has_category('works-en'));

// ページごとのリンク先
if ($is_english_page) {
    $footer_home_url    = home_url('/en/');
    $footer_about_url   = home_url('/en/about-en/');
    $footer_works_url   = home_url('/en/') . '#works';
    $footer_contact_url = home_url('/en/contact-en/');
} else {
    $footer_home_url    = home_url('/');
    $footer_about_url   = home_url('/about/');
    $footer_trouble_url = home_url('/') . '#trouble';
    $footer_price_url   = home_url('/') . '#price';
    $footer_works_url   = home_url('/') . '#works';
    $footer_contact_url = home_url('/contact/');
}
?>

<footer class="footer u-wrapper">
    <div class="footer__text">
        <p class="footer__name">Yoshihiko Kuramitsu</p>

        <nav class="footer__nav">
            <ul class="footer__list">
                <li class="tooter__item">
                    <a href="<?php echo esc_url($footer_home_url); ?>">HOME</a>
                </li>

                <li class="tooter__item">
                    <a href="<?php echo esc_url($footer_about_url); ?>">ABOUT</a>
                </li>

                <?php if (!$is_english_page): ?>
                <li class="tooter__item">
                    <a href="<?php echo esc_url($footer_trouble_url); ?>">TROUBLE</a>
                </li>

                <li class="tooter__item">
                    <a href="<?php echo esc_url($footer_price_url); ?>">PRICE</a>
                </li>
                <?php endif; ?>

                <li class="tooter__item">
                    <a href="<?php echo esc_url($footer_works_url); ?>">WORKS</a>
                </li>

                <li class="tooter__item">
                    <a href="<?php echo esc_url($footer_contact_url); ?>">CONTACT</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="footer__bottom">
        <hr>

        <p class="copyright">
            &copy; <?php bloginfo('name'); ?>
        </p>

        <div>
            <ul class="bottom__list">
                <li class="bottom__item">
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                        <img
                            class="sns-img"
                            src="<?php echo esc_url(get_template_directory_uri() . '/img/insta.png'); ?>"
                            alt="Instagram"
                        >
                    </a>
                </li>

                <li class="bottom__item">
                    <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer">
                        <img
                            class="sns-img"
                            src="<?php echo esc_url(get_template_directory_uri() . '/img/x.png'); ?>"
                            alt="X"
                        >
                    </a>
                </li>

                <li class="bottom__item">
                    <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                        <img
                            class="sns-img"
                            src="<?php echo esc_url(get_template_directory_uri() . '/img/facebook.png'); ?>"
                            alt="Facebook"
                        >
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
 <script src="js/main.js"></script>
 <?php wp_footer(); ?>
</body>
</html>