<?php

/**************************************************
CSSファイルの読み込み
**************************************************/
function my_enqueue_styles() {
  // リセットCSS
  wp_enqueue_style('ress', '//unpkg.com/ress/dist/ress.min.css', array(), false, 'all');

  // テーマのstyle.css（テーマ認識用）
  wp_enqueue_style('theme-style', get_stylesheet_uri(), array('ress'), false, 'all');

  // SCSSから生成したCSS（これが本体）
  wp_enqueue_style(
    'main-style',
    get_template_directory_uri() . '/css/style.css',
    array('theme-style'),
    '1.0',
    'all'
  );
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');

/**************************************************
JSファイルの読み込み
**************************************************/
function my_scripts() {
  // GSAP本体（CDNから読み込み）
  wp_enqueue_script(
    'gsap',
    'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js',
    array(),
    null,
    true
  );

  // あなたのJS（GSAPに依存させる）
  wp_enqueue_script(
    'main-js',
    get_template_directory_uri() . '/js/main.js',
    array('gsap'),
    null,
    true
  );
}
add_action('wp_enqueue_scripts', 'my_scripts');

function yoshizo_marquee() {
    ob_start();
    ?>
    <div class="marquee-container">
      <div class="marquee" id="marquee">
        <?php for ($i = 0; $i < 8; $i++) : ?>
          <span class="scroll-name">
            <img src="<?php echo get_template_directory_uri(); ?>/img/scrollName.png" alt="名前">
          </span>
        <?php endfor; ?>
      </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('marquee', 'yoshizo_marquee');

/**************************************************
アイキャッチを有効化
**************************************************/
add_theme_support('post-thumbnails');

function yoshizo_works_grid_shortcode($atts) {
  $atts = shortcode_atts(
    array(
      'posts'     => 12,
      'order'     => 'ASC',
      'orderby'   => 'menu_order',
      'post_type' => 'post',
    ),
    $atts,
    'works_grid'
  );

  $q = new WP_Query(array(
  'post_type'      => 'post',
  'posts_per_page' => max(1, (int)$atts['posts']),
  'meta_key'       => 'works_order',
  'orderby'        => 'meta_value_num',
  'order'          => 'ASC',
));

  ob_start();

  echo '<section id="works" class="works u-wrapper">';
  echo '<div class="grid">';

 while ($q->have_posts()) {
  $q->the_post();

  $img_url = has_post_thumbnail()
    ? get_the_post_thumbnail_url(get_the_ID(), 'full')
    : get_template_directory_uri() . '/img/noimage.jpg';

  echo '<div class="fade-in grid__item">';
    echo '<a href="' . esc_url(get_permalink()) . '">';
      echo '<div class="img-wrap">';
        echo '<img src="' . esc_url($img_url) . '" alt="">';
      echo '</div>';
      echo '<p class="works-piece-title">' . esc_html(get_the_title()) . '</p>';

      // ここ修正
     // echo '<p class="debug-order">works_order: ' . get_post_meta(get_the_ID(), 'works_order', true) . '</p>';

    echo '</a>';
  echo '</div>';
}

  wp_reset_postdata();

  echo '</div>';
  echo '</section>';

  return ob_get_clean();
}
add_shortcode('works_grid', 'yoshizo_works_grid_shortcode');

/**************************************************
投稿順番
**************************************************/
function add_menu_order_support() {
  add_post_type_support('post', 'page-attributes');
}
add_action('init', 'add_menu_order_support');