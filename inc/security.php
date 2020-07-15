<?php
/**
*	セキュリティ関連
*/


/*
*	パスワードページ
*/

/*クッキーを残さない*/
 add_action('after_setup_theme', 'my_after_setup_theme' );
 function my_after_setup_theme(){
     setcookie('wp-postpass_' . COOKIEHASH,  $_POST['post_password'],  0, COOKIEPATH);
 }

/*パスワード入力時のメッセージ変更*/
 function my_password_form() {
   return
     '<section id="download"><h3><span>DOWNLOAD</span>保証書ダウンロード</h3>
 	<p>ログインが必要です。ランドセル購入時に送付されたパスワードを入力してください。<p>
     <form class="post_password" action="' . home_url() . '/wp-login.php?action=postpass" method="post">
     <input name="post_password" type="password" size="24" />
     <input type="submit" name="Submit" value="' . esc_attr__("ログイン") . '" />
     </form></section>';
 }
 add_filter('the_password_form', 'my_password_form');


