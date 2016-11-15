<?php
	
	class CPTContentEditor{

		function CPTContentEditor(){

			add_action('admin_enqueue_scripts', array(&$this, 'scripts'));
			add_action('admin_init', array($this, 'Register_settings'));
			add_action('admin_menu' , array($this, 'Enable_pages'));
		}

		public function scripts(){
			
			wp_enqueue_style('cpt_editor_styles', plugin_dir_url(__FILE__) . '../template/css/styles.css', array(), '0.1');
			wp_enqueue_script('cpt_editor_scripts', plugin_dir_url(__FILE__) . '../template/js/scripts.js', array(), '0.1', true);
		}

		public function Register_settings() {

			// OUTPUT - NAMES OR OBJECTS, NOTE NAMES IS THE DEFAULT
			// OPERATOR - 'AND' or 'OR'
			
			$post_types = get_post_types(array(
				'public'   => true,
				'_builtin' => false
			), 'names', 'and');

			foreach($post_types as $post_type):
				
				// REGISTER SETTINGS AND CALL SANITATION FUNCTIONS
				register_setting('cpt_editor_' . $post_type, 'cpt_editor_' . $post_type, array($this, 'Sanitize'));
			endforeach;
		}

		public function Enable_pages() {
			
			// OUTPUT - NAMES OR OBJECTS, NOTE NAMES IS THE DEFAULT
			// OPERATOR - 'AND' or 'OR'
			
			$post_types = get_post_types(array(
				'public'   => true,
				'_builtin' => false
			), 'names', 'and');

			foreach($post_types as $post_type):
				
				// GET POST TYPE INFO
				$post_type_info = get_post_types(array(
					'name' => $post_type,
				), 'objects', 'and');

				// ADD SUBMENU
				add_submenu_page('edit.php?post_type=' . $post_type, $post_type_info[$post_type]->labels->name . ' - ' . __('Edit'), __('Editor'), 'edit_posts', 'post_type_edit', array($this, 'Edit_post_type'));
			endforeach;
		}

		public function Edit_post_type() {
			global $post_type;
			
			// VARIABLES
			$screen = get_current_screen();
			$post_type = $screen->post_type;
			
			// GET POST TYPE INFO
			$post_type_info = get_post_types(array(
				'name' => $post_type,
			), 'objects', 'and');

			if(empty($_REQUEST['settings-updated']))
				$_REQUEST['settings-updated'] = false; // THIS CHECKS WHETHER THE FORM HAS JUST BEEN SUBMITTED.

			// INCLUDE WRAPPER
			include(trailingslashit(dirname(__FILE__)) . '../template/main.php');
			//require_once( 'wptuts-options/wptuts-options.php' );
		}

		public function Sanitize($input){
			// STRIP ALL TAGS FROM THE TEXT FIELD, TO AVOID VULNERABLILTIES LIKE XSS.
			
			$input['featured_image'] = wp_filter_post_kses($input['featured_image']);
			$input['content'] = wp_filter_post_kses($input['content']);
			
			return $input;
		}
	}