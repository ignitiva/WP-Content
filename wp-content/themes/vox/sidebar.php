<nav>
	<?php
		wp_nav_menu(array(
			'theme_location'  => 'aside',
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
		));
	?>
</nav>