<?php get_header(); ?>

<?php
$front_id = (int) get_option('page_on_front'); // 表示設定で選ばれた固定ページID
if ($front_id) {
  $front_post = get_post($front_id);
  if ($front_post) {
    echo apply_filters('the_content', $front_post->post_content);
  }
}
?>

<?php get_footer(); ?>