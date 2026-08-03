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

    <?php $is_english = has_category('works-en'); ?>

    <p>
        <strong><?php echo $is_english ? 'Tools' : '使用ツール'; ?></strong> /
        <?php echo esc_html(get_post_meta(get_the_ID(), '使用ツール', true)); ?>
    </p>

    <p>
        <strong><?php echo $is_english ? 'Development Time' : '制作時間'; ?></strong> /
        <?php echo esc_html(get_post_meta(get_the_ID(), '制作時間', true)); ?>
    </p>

    <?php if ($is_demo && $site_demo_url) : ?>
        <p>
            <strong><?php echo $is_english ? 'Live Demo' : 'デモサイト'; ?></strong> /
            <a
                href="<?php echo esc_url($site_demo_url); ?>"
                target="_blank"
                rel="noopener noreferrer"
            >
                <?php echo esc_html($site_demo_url); ?>
            </a>
        </p>
    <?php endif; ?>

    <?php if ($github_url) : ?>
        <p>
            <strong>GitHub</strong> /
            <a
                href="<?php echo esc_url($github_url); ?>"
                target="_blank"
                rel="noopener noreferrer"
            >
                <?php echo $is_english ? 'View GitHub' : 'GitHubを見る'; ?>
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
				<?php
$works_url = has_category('works-en')
    ? home_url('/en/#works')
    : home_url('/#works');
?>

<a href="<?php echo esc_url($works_url); ?>" class="works-back-button works-back-button--pc">
    <?php echo has_category('works-en') ? 'Back to Works' : '一覧へ戻る'; ?>
</a>

<a href="<?php echo esc_url($works_url); ?>" class="works-back-button works-back-button--sp">
    <?php echo has_category('works-en') ? 'Back to Works' : '一覧へ戻る'; ?>
</a>
  		</div>
    </section>
  </main>
  
<?php get_footer(); ?>
