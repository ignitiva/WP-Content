<?php

function the_theme_url()
{
	echo get_template_directory_uri();
}

function get_theme_url()
{
	return get_template_directory_uri();
}

function the_thumbnail_from_url($url, $size = 'full')
{
	$data = App::thumbnail_from_url($url, $size);
}

function get_thumbnail_from_url($url, $size = 'full')
{
	$data = App::thumbnail_from_url($url, $size);

	if(!$data)
		return $url;

	return $data[0];
}

function the_post_type_link($post_type)
{
	echo get_post_type_archive_link($post_type);
}

function get_post_type_link($post_type)
{
	return get_post_type_archive_link($post_type);
}

function get_page_title($pageID)
{
	$page = get_page($pageID);
	return $page->post_title;
}

function get_post_type()
{
	return App::post_type();
}

function text_limit($text, $maxsize = 155, $final = ' [...]')
{
	return App::text_limit($text, $maxsize, $final);
}
