<?php

	function the_post_type_content($post_type = null){
		
		// GET CURRENT POST TYPE IF THE ENTRY IS EMPTY
		if(!$post_type)
			global $post_type;
		
		$post_type = get_option('cpt_editor_' . $post_type);
		$post_type_content = wpautop($post_type['content']);
		$post_type_content = str_replace(array('\\'), '', $post_type_content);

		echo $post_type_content;
	}

	function get_post_type_content($post_type = null){
		
		// GET CURRENT POST TYPE IF THE ENTRY IS EMPTY
		if(!$post_type)
			global $post_type;
		
		$post_type = get_option('cpt_editor_' . $post_type);
		$post_type_content = wpautop($post_type['content']);
		$post_type_content = str_replace(array('\\'), '', $post_type_content);

		return $post_type_content;
	}

	function the_post_type_thumbnail($post_type = null, $size = ''){
		global $wpdb;
		
		// GET CURRENT POST TYPE IF THE ENTRY IS EMPTY
		if(!$post_type)
			global $post_type;

		// GET IMAGE
		$post_type = get_option('cpt_editor_' . $post_type);
		$thumbnail = $post_type['featured_image'];

		// GET GUID
		$thumbnail_guid = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE guid = '{$thumbnail}'");
		
		if(isset($thumbnail_guid->ID)):
			$thumbnail = wp_get_attachment_image_src($thumbnail_guid->ID, $size);
			printf('<img src="%s" width="%s" height="%s" %s/>', $thumbnail[0], $thumbnail[1], $thumbnail[2], isset($thumbnail[3]) ? 'alt="' . $thumbnail[3] . '" ' : null);
		endif;
	}

	function the_post_type_thumbnail_url($post_type = null, $size = ''){
		global $wpdb;
		
		// GET CURRENT POST TYPE IF THE ENTRY IS EMPTY
		if(!$post_type)
			global $post_type;

		// GET IMAGE
		$post_type = get_option('cpt_editor_' . $post_type);
		$thumbnail = $post_type['featured_image'];

		// GET GUID
		$thumbnail_guid = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE guid = '{$thumbnail}'");
		
		if(isset($thumbnail_guid->ID)):
			return wp_get_attachment_image_src($thumbnail_guid->ID, $size);
		else:
			return $thumbnail;
		endif;
	}

	function get_post_type_thumbnail($post_type = null, $size = ''){
		global $wpdb;
		
		// GET CURRENT POST TYPE IF THE ENTRY IS EMPTY
		if(!$post_type)
			global $post_type;

		// GET IMAGE
		$post_type = get_option('cpt_editor_' . $post_type);
		$thumbnail = $post_type['featured_image'];

		// GET GUID
		$thumbnail_guid = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE guid = '{$thumbnail}'");
		
		if(isset($thumbnail_guid->ID)):
			$thumbnail = wp_get_attachment_image_src($thumbnail_guid->ID, $size);
			return sprintf('<img src="%s" width="%s" height="%s" %s/>', $thumbnail[0], $thumbnail[1], $thumbnail[2], isset($thumbnail[3]) ? 'alt="' . $thumbnail[3] . '" ' : null);
		endif;
	}

	function get_post_type_thumbnail_url($post_type = null, $size = ''){
		global $wpdb;
		
		// GET CURRENT POST TYPE IF THE ENTRY IS EMPTY
		if(!$post_type)
			global $post_type;

		// GET IMAGE
		$post_type = get_option('cpt_editor_' . $post_type);
		$thumbnail = $post_type['featured_image'];

		// GET GUID
		$thumbnail_guid = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE guid = '{$thumbnail}'");
		
		if(isset($thumbnail_guid->ID)):
			return wp_get_attachment_image_src($thumbnail_guid->ID, $size);
		else:
			return $thumbnail;
		endif;
	}