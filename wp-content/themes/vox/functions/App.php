<?php

/*
| WP Custom Class.
| Version: 1.0.1
*/

class App 
{
	public function __construct()
	{
		// Enqueue jQuery
		$this->jQuery('1.12.3', true, true);

		// Supports
		add_theme_support('category-thumbnails');
		add_theme_support('custom-header');
		add_theme_support('post-thumbnails', [true]);
		add_theme_support('custom-background');
		add_theme_support('category-thumbnails');
		add_post_type_support('page', 'excerpt');

		// Ajax Url
		$this->ajaxurl();
	}

	public function register_menu($menus)
	{
		foreach($menus as $handle => $title)
			register_nav_menu($handle, $title);
	}

	public function jQuery($version = '1.12.3', $minified = true, $in_footer = true)
	{
		$jquery_uri = sprintf('https://code.jquery.com/jquery-%s%s.js', $version, (($minified) ? '.min' : null));

		add_action('wp_enqueue_scripts', function() use ($jquery_uri, $version, $in_footer)
		{
			wp_deregister_script('jquery');
			wp_register_script('jquery', $jquery_uri, null, $version, $in_footer);
			wp_enqueue_script('jquery');
		});
	}

	public function ajaxurl()
	{
		wp_localize_script('scripts', 'ajaxurl', admin_url('admin-ajax.php')); 
	}

	public static function thumbnail_from_url($url, $size = 'full')
	{
		global $wpdb;

		$thumbnail = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE guid = '$url'");

		if(isset($thumbnail))
			return wp_get_attachment_image_src($thumbnail->ID, $size);
	
		return false;
	}

	public static function text_limit($text, $maxsize = 155, $final = ' [...]')
	{
		if(strlen($text) <= $maxsize)
			return $text;

		$generate = function($text)
		{
			$text = explode(' ', $text);

			$keys = array_keys($text);
			$key = end($keys);

			// Unset last word
			unset($text[$key]);

			// Implode text as string
			$text = implode(' ', $text);

			return $text;
		};

		$text = substr(strip_tags($text), 0, $maxsize);
		$text = $generate($text);

		// Implement the final string
		if(isset($final))
		{	
			// Size of text with the final string
			$supersize = (strlen($text) + strlen($final));

			if($supersize > $maxsize)
			{
				$text = substr($text, 0, $maxsize - strlen($final));
				$text = $generate($text);
			}

			return sprintf("{$text}%s", $final);
		}

		return $text;
	}

	public function post_type()
	{
		global $wp_query;
		$post_type = $wp_query->query['post_type'];
		
		return get_post_type_object($post_type);
	}

	public function functions($app)
	{
		require_once('Functions.php');
	}
}
