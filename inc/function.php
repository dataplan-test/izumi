<?php
/**
*	独自関数
*/

/**
 * デバッグ用関数
 *
 * @param array $array 配列
 * @return 
 */
function d($array) {
	echo '<pre style="color: #fff;">';
	var_dump($array);
	echo '</pre>';
}

/**
 * htmlspecialchars
 *
 * @param string $value エスケープ処理をしたい変数
 * @return string $str      エスケープ処理した文字列
 */
function h($value) {
	$str = htmlspecialchars($value, ENT_QUOTES);
	return $str;
}