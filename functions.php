<?php

/**************************************************
CSSファイルの読み込み
**************************************************/
function my_enqueue_styles() {
  wp_enqueue_style('ress', '//unpkg.com/ress/dist/ress.min.css', array(), false, 'all');
  wp_enqueue_style('style', get_stylesheet_uri(), array('ress'), false, 'all');

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

// Works（投稿）をグリッド表示するショートコード： [works_grid posts="6"]
/*add_shortcode('works-grid', function ($atts) {
  $atts = shortcode_atts([
    'posts' => 6,
  ], $atts);

  $q = new WP_Query([
    'post_type'      => 'post',          // カスタム投稿ならここを変更
    'posts_per_page' => (int) $atts['posts'],
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  if (!$q->have_posts()) return '';

  ob_start();
  echo '<div class="grid__item">';
  while ($q->have_posts()) : $q->the_post();
    $url   = get_permalink();
    $title = get_the_title();
    $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');

    echo '<a href="' . esc_url($url) . '">';
    if ($thumb) {
      echo '<div class="img-wrap"><img src="' . esc_url($thumb) . '" alt=""></div>';
    }
    echo '<div class="works-piece-title"">' . esc_html($title) . '</div>';
    echo '</a>';
  endwhile;
  echo '</div>';

  wp_reset_postdata();
  return ob_get_clean();
});*/


function yoshizo_works_grid_shortcode($atts) {
  $atts = shortcode_atts(
    array(
      'posts'     => 12,
      'order'     => 'ASC',
      'orderby'   => 'date',
      'post_type' => 'post',
    ),
    $atts,
    'works_grid'
  );

  $q = new WP_Query(array(
    'post_type'      => sanitize_key($atts['post_type']),
    'posts_per_page' => max(1, (int)$atts['posts']),
    'order'          => (strtoupper($atts['order']) === 'ASC') ? 'ASC' : 'DESC',
    'orderby'        => sanitize_key($atts['orderby']),
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
      echo '</a>';
    echo '</div>';
  }

  wp_reset_postdata();

  echo '</div>';
  echo '</section>';

  return ob_get_clean();
}
add_shortcode('works_grid', 'yoshizo_works_grid_shortcode');