<div id="single" class="pagenation">
<ul class="page-numbers">
<?php
$next_post = get_next_post();
$prev_post = get_previous_post();
if(!empty($next_post)) {
	$next_url = get_permalink($next_post->ID);
	echo '<li><a href="' . $next_url . '" class="page-numbers prev">前へ</a></li>';
}
	echo '<li  class="all_btn"><a href="' . esc_url(home_url()) . '" class="page-numbers">一覧へ</a></li>';
if(!empty($prev_post)) {
	$prev_url = get_permalink($prev_post->ID);
	echo '<li><a href="' . $prev_url . '" class="page-numbers next">次へ</a></li>';
}
?>
 </ul>
	</div>