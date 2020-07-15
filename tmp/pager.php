<?php
	$big = 999999999; // 最大値を指定
				global $wp_query;
				if($wp_query->max_num_pages > 1) {
					echo '<div class="pagenation">';
					echo paginate_links( array( // ページネーションを表示
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ), //URLの生成ルールを決める
					'format' => '?paged=%#%', //ページネーションの構造を指定
					'current' => max( 1, get_query_var( 'paged' ) ), //現在のページ番号を指定
					'total' => $wp_query->max_num_pages, //全体のページ数を指定
					'prev_text' => '前へ',
					'next_text' => '次へ',
					'type' => 'list',
					'end_size' => 1,
					'mid_size' => 1
				) );
					echo '</div>';
				}
				else {
					return '';
				}
				
				

	