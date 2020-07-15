<footer>
	<div id="footer_wrapper" data-stellar-background-ratio="0.6">
    	<div class="ft_center clearfix">
			<div class="logo_block">
	        	<h2><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/common/ft_logo_main.png" alt="dataplan"></a></h2>
				<ul>
					<li>データプラン株式会社</li>
					<li>仙台市青葉区一番町四丁目1番1号</li>
				</ul>
	        </div>
			<nav>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>					
					<li><a href="<?php echo esc_url( home_url( 'wordpress/' ) ); ?>">WordPress構築</a></li>
					<li><a href="<?php echo esc_url( home_url( 'partner/' ) ); ?>">パートナー提携</a></li>
					<li><a href="<?php echo esc_url( home_url( 'company/' ) ); ?>">会社概要</a></li>
					<li><a href="<?php echo esc_url( home_url( 'contact/' ) ); ?>">お問い合わせ</a></li>
					<li><a href="<?php echo esc_url( home_url( 'privacy/' ) ); ?>">個人情報保護法</a></li>
					<li><a href="<?php echo esc_url( home_url( 'sitemap/' ) ); ?>">サイトマップ</a></li>
				</ul>
			</nav>
        </div>
        <p id="copyright">© 2019 dataplan.</p>
	</div>
</footer>

<p id="scrolltop"><a href="#"></a></p>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.stellar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>
<script>
	var wow = new WOW(
	  {
		boxClass: 'motion',
	  }
	);
	wow.init();
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
 <script src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script><![endif]-->
<?php wp_footer(); ?>
</body>
</html>