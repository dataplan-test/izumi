<?php
/**
*	会員ページ
*/

/*管理バー非表示*/
function my_function_admin_bar($content) {
  return ( current_user_can("administrator") ) ? $content : false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');