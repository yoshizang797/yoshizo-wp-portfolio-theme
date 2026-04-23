<?php get_header(); ?>

	<main class="main">
		<section class="single-container">
      <div class="top-section">
        <div class="single-image">
          <?php
            $slug = get_post_field( 'post_name', get_the_ID() );
            $image_url = has_post_thumbnail()
              ? get_the_post_thumbnail_url(get_the_ID(), 'full')
              : get_template_directory_uri() . '/img/noimage.jpg';
          ?>
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('full', array(
            'class' => 'works-single-image',
            'alt'   => get_the_title(),
          )); ?>
          <?php endif; ?>
        </div>
        <div class="vertical-line"></div>

        <div class="right-text">
          <div class="text-block-title">
            <p><?php the_title(); ?></p>
          </div>
          <div class="text-block">
            <P>使用ツール / <?php echo get_post_meta(get_the_ID(),'使用ツール',true); ?></p>
		        <p>制作時間 / <?php echo get_post_meta(get_the_ID(),'制作時間',true); ?></p>
          </div>
        </div>
      </div>

      <div class="bottom-text">
        <p><?php the_content(); ?></p>
      </div>
			<div class="works__button">
				<a href="<?php echo esc_url(home_url('#works')); ?>" class="button02">Back to page</a>
        <a href="<?php echo esc_url(home_url('#works')); ?>" class="button03">Back to page</a>
  		</div>
    </section>
  </main>
  
<?php get_footer(); ?>
