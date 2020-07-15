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