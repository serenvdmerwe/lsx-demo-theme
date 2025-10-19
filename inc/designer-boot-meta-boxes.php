<?php

/**
 * Designer Boot Custom Fields Meta Boxes
 * Handles admin interface for boot custom fields
 *
 * @package LSX Demo Theme
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Render boot details meta box
 */
function lbc_render_boot_details_meta_box($post)
{
	wp_nonce_field('lbc_save_boot_details', 'lbc_boot_details_nonce');

	$description_rich = get_post_meta($post->ID, 'lbc_description_rich', true);
	$featured_desc = get_post_meta($post->ID, 'lbc_featured_desc', true);
	$featured_alt = get_post_meta($post->ID, 'lbc_featured_alt', true);
	$personal_notes = get_post_meta($post->ID, 'lbc_personal_notes', true);
	$product_link = get_post_meta($post->ID, 'lbc_product_link', true);
	$retail_price = get_post_meta($post->ID, 'lbc_retail_price', true);

?>
	<table class="form-table">
		<tr>
			<th><label for="lbc_description_rich"><?php _e('Rich Description', 'lbc'); ?></label></th>
			<td>
				<?php
				wp_editor($description_rich, 'lbc_description_rich', array(
					'textarea_rows' => 5,
					'media_buttons' => false,
					'teeny' => true
				));
				?>
				<p class="description"><?php _e('Detailed description for the boot', 'lbc'); ?></p>
			</td>
		</tr>
		<tr>
			<th><label for="lbc_featured_desc"><?php _e('Featured Image Description', 'lbc'); ?></label></th>
			<td>
				<textarea name="lbc_featured_desc" id="lbc_featured_desc" rows="3" class="large-text"><?php echo esc_textarea($featured_desc); ?></textarea>
				<p class="description"><?php _e('Description for the featured image', 'lbc'); ?></p>
			</td>
		</tr>
		<tr>
			<th><label for="lbc_featured_alt"><?php _e('Featured Image Alt Text', 'lbc'); ?></label></th>
			<td>
				<input type="text" name="lbc_featured_alt" id="lbc_featured_alt" value="<?php echo esc_attr($featured_alt); ?>" class="large-text" />
				<p class="description"><?php _e('Alt text for the featured image', 'lbc'); ?></p>
			</td>
		</tr>
		<tr>
			<th><label for="lbc_personal_notes"><?php _e('Personal Notes', 'lbc'); ?></label></th>
			<td>
				<textarea name="lbc_personal_notes" id="lbc_personal_notes" rows="4" class="large-text"><?php echo esc_textarea($personal_notes); ?></textarea>
				<p class="description"><?php _e('Personal notes about this boot', 'lbc'); ?></p>
			</td>
		</tr>
		<tr>
			<th><label for="lbc_product_link"><?php _e('Product Link', 'lbc'); ?></label></th>
			<td>
				<input type="url" name="lbc_product_link" id="lbc_product_link" value="<?php echo esc_url($product_link); ?>" class="large-text" />
				<p class="description"><?php _e('Link to retailer or product page', 'lbc'); ?></p>
			</td>
		</tr>
		<tr>
			<th><label for="lbc_retail_price"><?php _e('Retail Price (€)', 'lbc'); ?></label></th>
			<td>
				<input type="number" name="lbc_retail_price" id="lbc_retail_price" value="<?php echo esc_attr($retail_price); ?>" min="0" step="0.01" />
				<p class="description"><?php _e('Price in euros (without € symbol)', 'lbc'); ?></p>
			</td>
		</tr>
	</table>
<?php
}

/**
 * Render boot images meta box
 */
function lbc_render_boot_images_meta_box($post)
{
	$image_2 = get_post_meta($post->ID, 'lbc_image_2', true);
	$image_2_alt = get_post_meta($post->ID, 'lbc_image_2_alt', true);
	$image_3 = get_post_meta($post->ID, 'lbc_image_3', true);
	$image_3_alt = get_post_meta($post->ID, 'lbc_image_3_alt', true);
	$image_4 = get_post_meta($post->ID, 'lbc_image_4', true);
	$image_4_alt = get_post_meta($post->ID, 'lbc_image_4_alt', true);

?>
	<table class="form-table">
		<tr>
			<th><label for="lbc_image_2"><?php _e('Image 2 URL', 'lbc'); ?></label></th>
			<td>
				<input type="url" name="lbc_image_2" id="lbc_image_2" value="<?php echo esc_url($image_2); ?>" class="large-text" />
				<input type="text" name="lbc_image_2_alt" placeholder="Alt text" value="<?php echo esc_attr($image_2_alt); ?>" class="large-text" style="margin-top: 5px;" />
			</td>
		</tr>
		<tr>
			<th><label for="lbc_image_3"><?php _e('Image 3 URL', 'lbc'); ?></label></th>
			<td>
				<input type="url" name="lbc_image_3" id="lbc_image_3" value="<?php echo esc_url($image_3); ?>" class="large-text" />
				<input type="text" name="lbc_image_3_alt" placeholder="Alt text" value="<?php echo esc_attr($image_3_alt); ?>" class="large-text" style="margin-top: 5px;" />
			</td>
		</tr>
		<tr>
			<th><label for="lbc_image_4"><?php _e('Image 4 URL', 'lbc'); ?></label></th>
			<td>
				<input type="url" name="lbc_image_4" id="lbc_image_4" value="<?php echo esc_url($image_4); ?>" class="large-text" />
				<input type="text" name="lbc_image_4_alt" placeholder="Alt text" value="<?php echo esc_attr($image_4_alt); ?>" class="large-text" style="margin-top: 5px;" />
			</td>
		</tr>
	</table>
<?php
}

/**
 * Render boot specifications meta box
 */
function lbc_render_boot_specs_meta_box($post)
{
	$heel_type = get_post_meta($post->ID, 'lbc_heel_type', true);
	$heel_height_mm = get_post_meta($post->ID, 'lbc_heel_height_mm', true);
	$leather_type = get_post_meta($post->ID, 'lbc_leather_type', true);
	$leather_color = get_post_meta($post->ID, 'lbc_leather_color', true);
	$sizes_eu = get_post_meta($post->ID, 'lbc_sizes_eu', true);
	$country_of_origin = get_post_meta($post->ID, 'lbc_country_of_origin', true);
	$care = get_post_meta($post->ID, 'lbc_care', true);

?>
	<table class="form-table">
		<tr>
			<th><label for="lbc_heel_type"><?php _e('Heel Type', 'lbc'); ?></label></th>
			<td><input type="text" name="lbc_heel_type" value="<?php echo esc_attr($heel_type); ?>" class="widefat" /></td>
		</tr>
		<tr>
			<th><label for="lbc_heel_height_mm"><?php _e('Heel Height (mm)', 'lbc'); ?></label></th>
			<td><input type="number" name="lbc_heel_height_mm" value="<?php echo esc_attr($heel_height_mm); ?>" min="0" class="widefat" /></td>
		</tr>
		<tr>
			<th><label for="lbc_leather_type"><?php _e('Leather Type', 'lbc'); ?></label></th>
			<td><input type="text" name="lbc_leather_type" value="<?php echo esc_attr($leather_type); ?>" class="widefat" /></td>
		</tr>
		<tr>
			<th><label for="lbc_leather_color"><?php _e('Leather Color', 'lbc'); ?></label></th>
			<td><input type="text" name="lbc_leather_color" value="<?php echo esc_attr($leather_color); ?>" class="widefat" /></td>
		</tr>
		<tr>
			<th><label for="lbc_sizes_eu"><?php _e('Sizes (EU)', 'lbc'); ?></label></th>
			<td><input type="text" name="lbc_sizes_eu" value="<?php echo esc_attr($sizes_eu); ?>" class="widefat" placeholder="e.g. 35-41" /></td>
		</tr>
		<tr>
			<th><label for="lbc_country_of_origin"><?php _e('Country of Origin', 'lbc'); ?></label></th>
			<td><input type="text" name="lbc_country_of_origin" value="<?php echo esc_attr($country_of_origin); ?>" class="widefat" /></td>
		</tr>
		<tr>
			<th><label for="lbc_care"><?php _e('Care Instructions', 'lbc'); ?></label></th>
			<td><textarea name="lbc_care" rows="3" class="widefat"><?php echo esc_textarea($care); ?></textarea></td>
		</tr>
	</table>
<?php
}

/**
 * Save custom fields
 */
function lbc_save_designer_boot_meta($post_id)
{
	// Verify nonce
	if (!isset($_POST['lbc_boot_details_nonce']) || !wp_verify_nonce($_POST['lbc_boot_details_nonce'], 'lbc_save_boot_details')) {
		return;
	}

	// Check user permissions
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	// Skip autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Only save for designer_boot post type
	if (get_post_type($post_id) !== 'designer_boot') {
		return;
	}

	// List of fields to save
	$fields = array(
		'lbc_description_rich',
		'lbc_featured_desc',
		'lbc_featured_alt',
		'lbc_personal_notes',
		'lbc_product_link',
		'lbc_retail_price',
		'lbc_image_2',
		'lbc_image_2_alt',
		'lbc_image_3',
		'lbc_image_3_alt',
		'lbc_image_4',
		'lbc_image_4_alt',
		'lbc_heel_type',
		'lbc_heel_height_mm',
		'lbc_leather_type',
		'lbc_leather_color',
		'lbc_sizes_eu',
		'lbc_country_of_origin',
		'lbc_care'
	);

	// Save each field
	foreach ($fields as $field) {
		if (isset($_POST[$field])) {
			$value = $_POST[$field];

			// Sanitize based on field type
			if (in_array($field, array('lbc_product_link', 'lbc_image_2', 'lbc_image_3', 'lbc_image_4'))) {
				$value = esc_url_raw($value);
			} elseif ($field === 'lbc_retail_price' || $field === 'lbc_heel_height_mm') {
				$value = floatval($value);
			} elseif ($field === 'lbc_description_rich') {
				$value = wp_kses_post($value);
			} else {
				$value = sanitize_text_field($value);
			}

			update_post_meta($post_id, $field, $value);
		}
	}
}

// Hook the save function
add_action('save_post', 'lbc_save_designer_boot_meta');
