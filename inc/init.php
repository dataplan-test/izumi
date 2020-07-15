<?php
/**
*	基本設定
*/

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

/**
 * ヘッダーから不要なもの削除
 */
remove_action('wp_head', 'wp_generator'); //バージョン→セキュリティ上表示させるのは良くないので削除
remove_action('wp_head', 'rsd_link'); //投稿ツール→使用していないので削除
remove_action('wp_head', 'wlwmanifest_link'); //投稿ツール→使用していないので削除

/**
 * css・js読み込み
 */
function add_css_js() {
	
	//分岐に必要な情報
	$post = get_post();
	if(!empty($post->post_name)) {
		$slug = $post->post_name;
	}
	if(!empty($post->post_parent)) {
		$parent_id = $post->post_parent;
		$parent_slug = get_post($parent_id)->post_name;
	}
	
	//CSS
	
	//共通
	wp_enqueue_style('reset', get_template_directory_uri() . '/css/reset.css' );
	wp_enqueue_style('dataplan_common', get_template_directory_uri() . '/css/common.css' );
	
	if ( is_front_page() ) { //トップページ
		wp_enqueue_style('contents', get_template_directory_uri() . '/css/contents.css' );
		wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css' );
	}
	else { //下層
		wp_enqueue_style('lower', get_template_directory_uri() . '/css/lower.css' );
		if ( is_page() ) { //固定ページ
			if ( $parent_slug == 'contact' ) { //お問い合わせ
				wp_enqueue_style('contact', get_template_directory_uri() . '/css/contact.css' );
			}
			elseif ( file_exists ( get_template_directory() . '/css/' . $slug . '.css' ) ) { //それ以外の固定ページは「slug.css」で読み込み
				wp_enqueue_style($slug,  get_template_directory_uri() . '/css/' . $slug . '.css' );
			}
		}
	}	
 
	//js	
	
}
//関数名add_scripts()を表側で呼び出す
add_action('wp_enqueue_scripts', 'add_css_js');

//Gutenberg用のCSS→使用していないので削除
function dequeue_plugins_style() {
    //プラグインIDを指定し解除する
    wp_dequeue_style('wp-block-library');
}
add_action( 'wp_enqueue_scripts', 'dequeue_plugins_style', 9999);

/**
 * パンくずリストjsonデータ出力
 */
function json_breadcrumb() {
	if ( !is_front_page() ) {
		
		$top_url = home_url();
		$top_title = 'TOP';		
		
		//分岐に必要な情報
		$post = get_post();
		if(!empty($post->post_name)) {
			$lower_url = home_url() . '/' . $post->post_name . '/';			
		}
		if ( !empty( $post->post_title ) ) {
			$lower_title = $post->post_title;
		}		
		
$json_html = <<<EOM
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement":
  [
    {
      "@type": "ListItem",
      "position": 1,
      "item":
      {
        "@id": "$top_url ",
        "name": "$top_title"
      }
    },
    {
      "@type": "ListItem",
      "position": 2,
      "item":
      {
        "@id": "$lower_url",
        "name": "$lower_title"
      }
    }
   ]
}
</script>
EOM;
		
		echo $json_html;
	}
}
add_action( 'wp_footer', 'json_breadcrumb');

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