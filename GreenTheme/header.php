<!DOCTYPE HTML>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?> >
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?> >
<![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ) . bloginfo('name'); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/dvatabuka.ico" />
	<!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri();?>/script/IE9.js"></script>
    <![endif]-->
<?php wp_head(); ?>
</head>
<body>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '727236860684064',
	      xfbml      : true,
	      version    : 'v2.1'
	    });
	  };
	
	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/bg_BG/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>
	<div id="wrapper">
		<header id="header">
			<div>
				<section id="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
						title="Двата бука"> <img
						src="<?php echo get_template_directory_uri(); ?>/images/logo-dvata-buka.png"
						width="195" height="110" alt="logo" />
						<h1>Двата бука</h1>
						<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
					</a>
				</section>
				<div id="fb-root"></div>
				<div id="like-button-holder">
					<div class="fb-like" data-href="https://www.facebook.com/dvatabuka" data-layout="button" data-colorscheme="dark" data-share="false" data-width="450" data-show-faces="false"></div>
				</div>
				<div id="search">
					<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						<input id="SearchBox" type="search" name="s" placeholder="Търсене..." /> <input
							id="SearchButton" type="submit" value="" />
					</form>
				</div>
			</div>
			<nav id="nav">
				<?php
					wp_nav_menu ( array (
										'theme_location' => 'menu',
										'container' => 'false',
									) );
				?>
			</nav>
		</header>
		<div id="main">