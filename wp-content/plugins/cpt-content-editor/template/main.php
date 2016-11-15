<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php echo $post_type_info[$post_type]->labels->name; ?> - <?php _e('Edit'); ?></h2>

	<?php if($_REQUEST['settings-updated'] !== false): ?>
		<div class="updated fade">
			<p><strong><?php _e('Options saved'); ?></strong></p>
		</div>
	<?php endif; ?>

	<form id="cpt_editor" method="post" action="options.php">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="post-body-content">
					<?php
						$settings = get_option('cpt_editor_'. $post_type); 
						settings_fields('cpt_editor_' . $post_type);

						if(function_exists('wp_enqueue_media')):
							wp_enqueue_media();
						else:
							wp_enqueue_style('thickbox');
							wp_enqueue_script('media-upload');
							wp_enqueue_script('thickbox');
						endif;

						wp_editor(stripslashes($settings['content']), 'content', array(
							'textarea_name' => 'cpt_editor_' . $post_type . '[content]',
							'textarea_rows' => 15,
							'tabindex' => 1,
							'media_buttons' => true,
						));
					?>
				</div>
				
				<div id="postbox-container-1" class="postbox-container">
					<div id="postimagediv" class="postbox">
						<h3 class="hndle ui-sortable-handle"><span><?php _e('Featured Image'); ?></span></h3>
						<div class="inside">
							<p class="hide-if-no-js">
								<div class="cpt_editor_media_upload">
									<img class="cpt_editor_featured_image" src="<?php echo ($settings['featured_image'] != '') ? $settings['featured_image'] : null; ?>" />
									<input type="text" class="cpt_editor_featured_image_url" name="<?php echo 'cpt_editor_' . $post_type . '[featured_image]'; ?>" value="<?php echo ($settings['featured_image'] != '') ? $settings['featured_image'] : null; ?>">
									<a href="#" class="button cpt_editor_featured_image_upload"><?php _e('Upload'); ?></a>
								</div>
							</p>
							<div id="major-publishing-actions">
								<input type="submit" class="button-primary" value="<?php _e('Save'); ?>" />
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>