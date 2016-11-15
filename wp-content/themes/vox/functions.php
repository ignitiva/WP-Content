<?php

require_once('functions/App.php');

// Init
$app = new App;
$app->__construct();

/*
| Register Menu
*/
$app->register_menu(array(
	'menu' => __('Menu Principal'),
));

/*
| Image Sizes
*/
add_image_size('post', 340, 340, true);

/*
| Enqueue
*/
add_action('wp_enqueue_scripts', function ()
{
	// Enqueue Styles
	wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
	wp_enqueue_style('raleway', 'https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900');
	wp_enqueue_style('reset', get_template_directory_uri() . '/css/reset.css');
	wp_enqueue_style('flickity', 'https://unpkg.com/flickity@2.0/dist/flickity.min.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');

	// Enqueue Scripts
	wp_enqueue_script('flickity', 'https://unpkg.com/flickity@2.0/dist/flickity.pkgd.min.js', 'jquery', '1.0', true);
	wp_enqueue_script('mask', get_template_directory_uri() . '/js/jquery.mask.min', 'jquery', '1.0', true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', 'jquery', '1.0', true);
});

/*
| Set Custom Functions
*/
$app->functions($app);