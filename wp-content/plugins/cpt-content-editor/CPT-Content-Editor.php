<?php

	/*
		Plugin Name: CPT Content Editor
		Version: 1.0
		Description: Adds a place to enter a title, content description and featured thumbnail for your custom post types, which you can display anywhere in your template.
		Author: Livemark
		Author URI: http://livemark.com.br/

		CPT Content
		Copyright (C) 2015, Livemark - contato@livemark.com.br
	*/

	require_once('core/system.php');
	require_once('core/functions.php');

	// INIT
	new CPTContentEditor();