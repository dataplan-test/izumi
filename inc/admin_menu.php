<?php
/**
*	wp管理画面
*/

/*管理画面のサイドメニューの「投稿」の表記を変更*/
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'お知らせ';
	$submenu['edit.php'][5][0] = 'お知らせ一覧';
	$submenu['edit.php'][10][0] = 'お知らせの追加';
	$submenu['edit.php'][16][0] = 'タグ';
	//echo ”;
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'お知らせ';
	$labels->singular_name = 'お知らせ';
	$labels->add_new = _x('新規追加', 'お知らせ');
	$labels->add_new_item = 'お知らせの追加';
	$labels->edit_item = 'お知らせの編集';
	$labels->new_item = 'お知らせの追加2';
	$labels->view_item = 'お知らせの表示';
	$labels->search_items = 'お知らせの検索';
	$labels->not_found = 'お知らせが見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱のお知らせにも見つかりませんでした';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );


/*投稿・固定ページ一覧にスラッグを表示*/
function add_columns_slug($columns) {
	$columns['slug'] = "スラッグ";
	echo '<style>.fixed .column-slug {width: 10%;}</style>';
	return $columns;
}
function add_column_row_slug($column_name, $post_id) {
	if($column_name == 'slug') {
		$post = get_post($post_id);
		$slug = $post->post_name;
		echo esc_html($slug);
	}
}
add_filter( 'manage_pages_columns', 'add_columns_slug');
add_action( 'manage_pages_custom_column', 'add_column_row_slug', 10, 2);


//投稿画面プレースホルダー変更
function title_placeholder_change( $title ) {
  $screen = get_current_screen();
  if ( $screen->post_type == 'kawaraban' ) {
    $title = 'かわら版のタイトル';
  } elseif ( $screen->post_type == 'post' ) {
    $title = 'お知らせのタイトル';
  }
  return $title;
}
add_filter( 'enter_title_here', 'title_placeholder_change' );


/*管理画面メニューの非表示*/
add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
//    remove_menu_page( 'index.php' ); //ダッシュボード
    //remove_menu_page( 'edit.php' ); //投稿メニュー
//    remove_menu_page( 'upload.php' ); //メディア
//    remove_menu_page( 'edit.php?post_type=page' ); //ページ追加
//    remove_menu_page( 'edit-comments.php' ); //コメントメニュー
//    remove_menu_page( 'themes.php' ); //外観メニュー
//    remove_menu_page( 'plugins.php' ); //プラグインメニュー
//    remove_menu_page( 'tools.php' ); //ツールメニュー
//    remove_menu_page( 'options-general.php' ); //設定メニュー
}

/**
 * ログイン画面カスタマイズ
 */

/* css読み込み */
function my_login_stylesheet() {
	wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/wp_login.css' );
//	wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

/* リンク先変更 */
function my_login_logo_url() {
return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
/* タイトル変更 */
function my_login_logo_url_title() {
return 'データプラン株式会社';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
