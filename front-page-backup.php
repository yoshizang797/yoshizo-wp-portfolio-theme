<?php get_header(); ?>

 <main class="main">
<section class="firstView u-wrapper" id="home">
    <h1 class="fade-in firstView__title">More haste, less speed.<br>ー急がば回れー</h1>
		<p class="fade-in firstView__text">『我、事において後悔せず』<br>　　　　　　　by宮本武蔵
        <br>自分が決めたこと、行動したことに対して、後悔しない・・・</p>
</section> 

<section id=""about class="about u-wrapper">
<?php
$front_id = (int) get_option('page_on_front'); // 表示設定で選ばれた固定ページID
if ($front_id) {
  $front_post = get_post($front_id);
  if ($front_post) {
    echo apply_filters('the_content', $front_post->post_content);
  }
}
?>
	<div class="concept_title">
		<img class="concept-title-img" src="<?php echo get_template_directory_uri(); ?>/title/ABOUT.png" alt="">
    </div>
		<img class="concept-title-img2" src="<?php echo get_template_directory_uri(); ?>/title/ABOUT.png" alt="">
    <div class="u-container">
        <img class="concept__img" src="<?php echo get_template_directory_uri(); ?>/img/KWOBE9283.jpg" alt="紹介写真">
    	<div class="concept-text-box">
			<p class="fade-in concept__text">
            	好奇心と創作意欲の塊で、人生は挑戦あるのみ！
       	 	</p>
        	<p class="fade-in concept-second-text">
            	平坦ではない道・・・<br>遠回りし、時には挫折して、何度も諦めそうになりながらも歩んできた道、目指すは唯一無二のWEB職人。
        	</p>
			<?php
				$page_url = get_permalink( get_page_by_path( 'about' ) ); 
			?>
			<a href="<?php echo esc_url( $page_url ); ?>" class="button02">
            	More
        	</a>
		</div>
	</div>
		<a href="<?php echo esc_url( $page_url ); ?>" class="button03">
            More
        </a>
</section>

<section id="works" class="works u-wrapper">
    <div class="u-sectionTitle">
		<img class="works-img" src="<?php echo get_template_directory_uri(); ?>/title/WORKS.png" alt="">
    </div>
	

    <div class="grid">
  		<?php
  		$args = array(
    		'posts_per_page' => 12,
			'post_type' => 'post',
			'orderby' => 'menu_order',
    		'order' => 'ASC',
  		);
  		$posts = get_posts($args);
  		?>
  
  		<?php foreach($posts as $post): setup_postdata($post); ?>
  			<div class="fade-in grid__item">
  				<a href="<?php the_permalink(); ?>">
    				<div class="img-wrap">
      					<img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
    				</div>
    				<p class="works-piece-title"><?php the_title(); ?></p>
					<p class="debug-order">
  order: <?php echo get_post_field('menu_order', get_the_ID()); ?>
</p>
  				</a>
  			</div>
 		<?php endforeach; wp_reset_postdata(); ?>
	</div>
</section>

<?php get_footer(); ?>