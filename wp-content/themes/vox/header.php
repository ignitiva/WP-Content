<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width" />
	<meta name="copyright" content="2016 &copy; <?php wp_title(); ?> - Todos os Direitos Reservados." />
	<meta name="author" content="Vox Digital" />
	
	<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
</head>

<body>

<div id="fb-root"></div>

<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

<header id="header">
	<div class="container">
		<figure class="logo">
			<a href="<?php echo esc_url(home_url('/')); ?>">
				<img src="<?php header_image(); ?>" alt="<?php wp_title(); ?>" />
			</a>
		</figure>

		<nav class="menu">
			<?php
				wp_nav_menu([
					'theme_location'  => 'menu',
					'menu'            => '',
					'container'       => '',
					'container_class' => false,
					'container_id'    => '',
					'menu_class'      => false,
					'menu_id'         => false,
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'depth'           => 0,
					'walker'          => '',
				]);
			?>
		</nav>
	</div>
</header>
