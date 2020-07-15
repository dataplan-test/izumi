<?php get_header(); ?>

<div id="contents">
	<div id="lower_head">
		<h2><span>INFO</span>お知らせ</h2>
	</div>
	
	<?php custom_breadcrumb(); //パンくずリスト自動生成	functions.php→init.php ?>
	
	<section id="info_block">
		<div class="col_wrap clearfix contents_inner">
			<main class="main_col left">
				<?php	
				
				if(have_posts()):
					while(have_posts()): the_post();
				
					$cat = get_the_category();
					$cat_name = $cat[0]->cat_name;
				
				?>
					<a href="<?php the_permalink(); ?>">
						<article class="post_box">

								<div class="title_box">
										<p class="date"><time><?php echo get_the_date(); ?></time></p>
										<p class="cat"><?php echo $cat_name; ?></p>
										<h4 class="title"><?php echo get_the_title(); ?></h4>
									</div>
									<div class="txt_box">
										<p><?php echo get_the_excerpt(); ?></p>
									</div>

						</article>
					</a>
				
				<?php	
				
					endwhile; 
				else:
					echo '<p>現在お知らせはありません。</p>';
				endif;
				
				?>
				
				<?php get_template_part('tmp/pager', 'single'); //ページャー取得 ?>
				
			</main>
			<aside class="sub_col right">
				<?php get_sidebar(); ?>
			</aside>			
			
		</div>
	</section>
</div>

<?php get_footer(); ?>