<?php

/**
 * 投稿画面の設定
 */

/*入力欄フォントサイズ変更*/
function change_editor_font(){
    echo'<style type="text/css">
        textarea#content.wp-editor-area {
        font-size:15px;
        }
    </style>';
}
add_action('admin_head', 'change_editor_font');


/*カテゴリーの選択を1つにする(type="checkbox"→"radio"にする)*/
function category_radio() {
?>
<script>
jQuery(function($) {
	$('#categorychecklist input[type=checkbox]').each(function() {
		$(this).replaceWith($(this).clone().attr('type', 'radio'));
	});
});
</script>
<?php
}
add_action( 'admin_head-post-new.php', 'category_radio' );
add_action( 'admin_head-post.php', 'category_radio' );


//gutenberg無効
add_filter( 'use_block_editor_for_post', '__return_false' );


//テキストエディタの初期値をテキストに
function change_editor_default( $editor ) {
 $editor = 'html';
 return $editor;
}
add_filter( 'wp_default_editor', 'change_editor_default' );


//投稿画面からタイトル・本文を消去
function my_remove_post_editor_support() {
// remove_post_type_support( 'post', 'title' );//投稿ページタイトル
// remove_post_type_support( 'post', 'editor' );//投稿ページ本文
	// remove_post_type_support( 'post', 'title' );//固定ページタイトル
// remove_post_type_support( 'post', 'editor' );//固定ページ本文
//	 remove_post_type_support( 'kawaraban', 'title' );//カスタム投稿ページタイトル
// remove_post_type_support( 'kawaraban', 'editor' );//カスタム投稿ページ本文
}
add_action( 'init' , 'my_remove_post_editor_support' );


/* <p><br>の自動挿入の停止*/
#固定ページ
function disable_page_wpautop() {
	if ( is_page() ){
		remove_filter('the_content', 'wpautop');
		remove_filter('the_excerpt', 'wpautop');
	}
}
add_action( 'wp', 'disable_page_wpautop' );

