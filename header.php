<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="thumbnail" content="http://www.dataplan.site/wp-content/uploads/2020/03/thumbnail.jpg" />
	
	<?php //title・canonical・keywords・descriptionはプラグインにて自動生成?>
	<title></title>
	
	<?php //cssはinc/init.phpにて読み込み（WordPress推奨方法） ?>	
	<link href="https://use.fontawesome.com/releases/v5.10.1/css/all.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
	<?php if ( is_front_page() ): ?>
		<div id="mainImage" data-stellar-background-ratio="1.2">
			<h1 id="logo_main" class="motion fadeIn" data-wow-delay="0.1s"><img src="<?php echo get_template_directory_uri(); ?>/img/common/logo_main.png" alt="dataplan"></h1>

			<div id="catch">
				<p id="catch_main"><img src="<?php echo get_template_directory_uri(); ?>/img/index/mainImage_text_A.png" alt="確かな技術力とスピーディーでベストなWEBシステムをご提案！"></p>
			</div>
		</div>
	<?php else: ?>
		<div id="lower_head">
			<h1><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/common/head_logo.png" alt="dataplan" /></a></h1>
		</div>
	<?php endif; ?>
	<nav id="nav_top" class="motion fadeIn" data-wow-delay="0.2s">
		<div class="clearfix">
			<ul class="clearfix">
				<li class="motion fadeIn" data-wow-delay="0.2s"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>				
				<li class="motion fadeIn" data-wow-delay="0.3s"><a href="<?php echo esc_url( home_url( 'wordpress/' ) ); ?>">WordPress構築</a></li>
				<li class="motion fadeIn" data-wow-delay="0.3s"><a href="<?php echo esc_url( home_url( 'partner/' ) ); ?>">パートナー提携</a></li>
				<li class="motion fadeIn" data-wow-delay="0.4s"><a href="<?php echo esc_url( home_url( 'company/' ) ); ?>">会社概要</a></li>
				<li class="motion fadeIn" data-wow-delay="0.5s"><a href="<?php echo esc_url( home_url( 'contact/' ) ); ?>">お問い合わせ</a></li>
			</ul>
		</div>
	</nav>
	<p class="menu_btn_wrap"><span class="menu_btn"></span></p>
	<nav id="nav_sp">
        <ul id="nav_sp_menu">
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>			
			<li><a href="<?php echo esc_url( home_url( 'wordpress/' ) ); ?>">WordPress構築</a></li>
			<li><a href="<?php echo esc_url( home_url( 'partner/' ) ); ?>">パートナー提携</a></li>
			<li><a href="<?php echo esc_url( home_url( 'company/' ) ); ?>">会社概要</a></li>
			<li><a href="<?php echo esc_url( home_url( 'contact/' ) ); ?>">お問い合わせ</a></li>
        </ul>
    </nav>
</header>