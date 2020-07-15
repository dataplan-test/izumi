<?php
/**
*	ショートコード
*/

/*投稿内で [top] と記述する⇒フロントページのurl呼び出し*/
function shortcode_url() {
	return get_bloginfo('url');
}
add_shortcode('top', 'shortcode_url');

/*投稿内で [tmp] と記述する⇒テンプレートディレクトリのパス呼び出し*/
function shortcode_templateurl() {
	return get_bloginfo('template_url');
}
add_shortcode('tmp', 'shortcode_templateurl');

/*投稿内で[tbl]と記述する⇒料金表（無料・有料）呼び出し*/
function shortcode_table() {
	ob_start();
	get_template_part('inc/table', 'free');//そのままリターンするとページ上部で読み込まれてしまうため、結果をいったん保留しておく
	return ob_get_clean();
}
add_shortcode('tbl', 'shortcode_table');
