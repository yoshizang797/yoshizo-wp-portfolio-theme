<?php get_header(); ?>

	<main class="main">
		<section class="single-container">
      <div class="top-section">
        <div class="single-image">
          
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('full', array(
            'class' => 'works-single-image',
            'alt'   => get_the_title(),
          )); ?>
          <?php endif; ?>
        </div>
        <div class="vertical-line"></div>
            <?php
            $is_demo = get_post_meta(get_the_ID(), 'site_demo', true);
            $site_demo_url = get_post_meta(get_the_ID(), 'site_demo_url', true);
            $github_url = get_post_meta(get_the_ID(), 'github_url', true);
            ?>
        <div class="right-text">
          <div class="text-block-title <?php if ($is_demo) echo 'is-demo'; ?>">
            <p><?php the_title(); ?></p>
          </div>

          <div class="text-block">
            <P>使用ツール / <?php echo get_post_meta(get_the_ID(),'使用ツール',true); ?></p>
		        <p>制作時間 / <?php echo get_post_meta(get_the_ID(),'制作時間',true); ?></p>

             <?php if ($is_demo && $site_demo_url): ?>
              <p>
        デモサイト /
        <a href="<?php echo esc_url($site_demo_url); ?>" target="_blank" rel="noopener noreferrer">
          <?php echo esc_html($site_demo_url); ?>
        </a>
      </p>
    <?php endif; ?>

    <?php if ($is_demo && $github_url): ?>
      <p>
        GitHub /
        <a href="<?php echo esc_url($github_url); ?>" target="_blank" rel="noopener noreferrer">
          GitHubを見る
        </a>
      </p>

    <?php endif; ?>
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
