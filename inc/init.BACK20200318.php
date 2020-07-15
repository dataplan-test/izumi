<?php
/**
*	基本設定
*/

/*タイトル自動生成*/
add_theme_support( 'title-tag' );

/*タイトルタグ区切り文字の変更*/
function my_document_title_separator( $sep ) {
  $sep = '｜';
  return $sep;
}
add_filter( 'document_title_separator', 'my_document_title_separator' );

/*canonical URLを設定*/
remove_action('wp_head', 'rel_canonical');//デフォルトのcanonicalを削除

add_action( 'wp_head', 'add_canonical' );//適当なcanonicalを追加
function add_canonical() {
	$canonical = null;

	if(is_404()) {
		echo '<meta name="robots" content="noindex,follow" />'."\n";
	}
	else {
		if( is_home() || is_front_page() ) {
		$canonical = home_url();
	}
	elseif ( is_category() ) {
		$canonical = get_category_link( get_query_var('cat') );
	}
	elseif(is_tag()){
		$canonical = get_tag_link(get_queried_object()->term_id);
	}
	elseif ( is_search() ) {
		$canonical = get_search_link();
	}
	elseif ( is_page() || is_single() ) {
		$canonical = get_permalink();
	}	
	else {
		$canonical = home_url();
	}
	echo '<link rel="canonical" href="'.$canonical.'">'."\n";
	} 	
}

/*css取得*/
function get_css() {
	#共通css
	echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/reset.css">' . PHP_EOL;
	echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/common.css">' . PHP_EOL;
	
	if(is_front()) {
		echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/index.css">' . PHP_EOL;
	}
	else {
		echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/lower.css">' . PHP_EOL;
		if(is_home() || is_category() || is_single() || is_archive()) {
			if(get_post_type() == 'post') {
				echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/news.css">';
			}
			elseif(get_post_type() == 'omairi') {
				echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/omairi.css">';
			}
		}	
		elseif (is_page()) {
			if (in_array($slug, array('introduction', 'plan', 'area', 'company'))) {
				echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/' . $slug . '.css">';
			}
			else {
				echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/plan.css">';
			}
		}
	}
	echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/lower.css">' . PHP_EOL;

//	ページ情報取得
//	 $page = get_post( get_the_ID() );
//	 $slug = $page->post_name; // スラッグ	
//	 $parent_id = $post->post_parent;//親ページID
//	 $parent_slug = get_post( $parent_id )->post_name; // 親ページのスラッグ		
	
	#reien or blog
	
}

/*パンくずリスト*/
if( ! function_exists( 'custom_breadcrumb' ) ) {
	function custom_breadcrumb( $wp_obj = null ) {
		#現在リクエストされているクエリの情報取得
		$wp_obj = $wp_obj ? : get_queried_object();
		
		$index_title = "お知らせ";
		$index_link = esc_url(home_url());

		 echo '<ul class="breadcrumb contents_inner clearfix">' .
			 		'<li><a href="/">TOPページ</a></li>';       

		#新着ページ
		if ( is_front_page() || is_home() ) {			
			echo '<li>' .$index_title . '</li>';
		}
		#カテゴリーページ
		elseif ( is_category() ) {
			$cat_name = $wp_obj->name;

			echo '<li><a href="' . $index_link . '">' . $index_title . '</a><li>'.
					 '<li>' . $cat_name . '</li>';
		}
		#シングルページ
		elseif ( is_single() ) {
			$cat = get_the_category();
			$cat_name = $cat[0]->cat_name;
			$cat_id = $cat[0]->cat_ID;
			$cat_link = get_category_link($cat_id);
			$post_title = $wp_obj->post_title;

			echo '<li><a href="' . $index_link . '">' . $index_title . '</a></li>'.
					 '<li><a href="' . $cat_link . '">' . $cat_name . '</a></li>'.
					 '<li>' . $post_title . '</li>';
		}
		#固定ページ
		elseif ( is_page() ) {
			$post_title = $wp_obj->post_title;

			echo '<li>' . $post_title . '</li>';
		}
		//アーカイブページ
		elseif(is_archive()) {
			$archive_label = $wp_obj->label;
			echo '<li>' . $archive_label . '</li>';
		}
		elseif(is_404()) {
			echo '<li>ページが見つかりませんでした</li>';
		}
		
		echo '</ul>';
				
	}
}

/*アイキャッチ画像*/
add_theme_support('post-thumbnails');

/*概要（抜粋）の文字数調整*/
 function twpp_change_excerpt_length( $length ) {
  return 50;
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );

/*概要（抜粋）の省略文字*/
function twpp_change_excerpt_more( $more ) {
  return '...';
}
add_filter( 'excerpt_more', 'twpp_change_excerpt_more' );

/*メニュー追加*/
//register_nav_menus( array(
//	'header_nav' => 'ヘッダーメニュー',
//	'cat_menu', 'カテゴリメニュー',
//	'side_nav' => 'サイドメニュー',
//	'footer_nav' => 'フッターナビゲーション'
//));

//ページの種類によって表示数を変更する
//function change_posts_per_page($query) {
//	/* 管理画面,メインクエリに干渉しないために必須 */
//	if( is_admin() || ! $query->is_main_query() ){  return; }
//	
//	/* 特定のアーカイブページの表示件数を変更 */
//	if ( $query->is_post_type_archive('kawaraban') ) { 
//		$query->set( 'posts_per_page', '10' );  return;
//	} 
//} add_action( 'pre_get_posts', 'change_posts_per_page' );

/*年別アーカイブリストに年を表示する */
//function my_get_archives_link($html){
//  return preg_replace ( '/<\/a>/', '年</a>', $html );
//}
//add_filter('get_archives_link','my_get_archives_link');