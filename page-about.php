<?php
get_header();
?>

<main class="page page-about">
  <?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
      the_content();
    endwhile;
  endif;
  ?>
</main>

<?php
get_footer();