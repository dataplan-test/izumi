<div id="category" class="aside_box">
	<p class="box_label">カテゴリー</p>
		<?php
		$cats = get_categories();
	
		foreach ( $cats as $cat ):
			$catlink = get_category_link( $cat->cat_ID ); ?>
		<a href="<?php echo $catlink; ?>" class="aside_link"><?php echo $cat->name; ?><span>（<?php echo $cat->count; ?>）</span></a>
	<?php endforeach; ?>	
</div>

<div id="resent_post" class="aside_box">
	<p class="box_label">最近の投稿</p>
	<?php
		$args = array(
			'post_type' => 'post',
			'no_found_rows' => true,
			'posts_per_page' => 6,
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ):
			while ( $the_query->have_posts() ): $the_query->the_post();	?>
			<a href="<?php the_permalink(); ?>" class="aside_link">
				<?php echo get_the_title(); ?>
			</a>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php else: ?>
	<p>投稿はありません。</p>
	<?php endif; ?>
</div>