<?php if ( !is_page('contact') ) : ?>
<section id="contact" class="contact u-wrapper">
    <img class="contact-img" src="<?php echo get_template_directory_uri(); ?>/title/CONTACT.png" alt="">
        <div class="button003">
	        <!--<a href="mailto:someone@example.com?subject=お問い合わせ&body=こちらからご連絡ください。" class="mail-button">-->
                <a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>" class="mail-button">
  				メールを送る
			</a>
        </div>
</section>
<?php endif; ?>
</main>
<footer class="footer u-wrapper">
    <div class="footer__text">
        <p class="footer__name">Yoshihiko Kuramitsu</p>
        <nav class="footer__nav">
            <ul class="footer__list">
                <li class="tooter__item"><a href="<?php echo esc_url(home_url()); ?>">HOME</a></li>
                <li class="tooter__item"><a href="<?php echo esc_url(home_url('#about')); ?>">ABOUT</a></li>
                <li class="tooter__item"><a href="<?php echo esc_url(home_url('#works')); ?>">WORKS</a></li>
                <li class="tooter__item"><a href="<?php echo esc_url(home_url('#contact')); ?>">CONTACT</a></li>
            </ul>
        </nav>
    </div>
    <div class="footer__bottom">
     <hr>
        <p class="copyright">&copy; <?php echo bloginfo('name'); ?></p>
        <div>
            <ul class="bottom__list">
                <li class="bottom__item"><a href="https://www.instagram.com/" target="_blank"><img class="sns-img" src="<?php echo get_template_directory_uri(); ?>/img/insta.png" alt="instagram"></a></li>
                <li class="bottom__item"><a href="https://twitter.com/" target="_blank"><img class="sns-img" src="<?php echo get_template_directory_uri(); ?>/img/x.png" alt="instagram"></a></li>
                <li class="bottom__item"><a href="https://www.facebook.com/" target="_blank"><img class="sns-img" src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="instagram"></a></li>
            </ul>
        </div>
    </div>
 </footer>
 <script src="js/main.js"></script>
 <?php wp_footer(); ?>
</body>
</html>