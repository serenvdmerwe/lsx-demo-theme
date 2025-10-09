<?php

/**
 * Plugin Name: Luxury Designer Boots (CPT: designer_boot)
 * Description: Registers the Designer Boot CPT, taxonomies, meta fields, patterns, REST support, and seed content per project spec.
 * Version: 1.0.0
 * Author: Luxury Black Heels Demo
 * Text Domain: lbc
 * Domain Path: /languages
 */

defined('ABSPATH') || exit;

if (! class_exists('LBC_Designer_Boots')) {

	class LBC_Designer_Boots
	{

		const VERSION = '1.0.0';
		const CPT     = 'designer_boot';
		const PREFIX  = 'lbc_';

		/**
		 * Initializes the singleton instance of the plugin class and sets up all WordPress hooks.
		 *
		 * This method ensures that only one instance of the plugin class exists during runtime,
		 * following the singleton design pattern. Call this method once to bootstrap the plugin.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public static function init(): void
		{
			static $instance = null;
			if (null === $instance) {
				$instance = new self();
				$instance->hooks();
			}
		}

		private function hooks(): void
		{
			add_action('init', [$this, 'register_post_type']);
			add_action('init', [$this, 'register_taxonomies']);
			add_action('init', [$this, 'register_meta_fields']);
			add_action('init', [$this, 'register_block_patterns']);
			add_action('admin_init', [$this, 'add_meta_boxes']);
			add_action('save_post_' . self::CPT, [$this, 'save_meta_boxes'], 10, 2);
			add_action('rest_api_init', [$this, 'extend_rest_response']);
			add_action('plugins_loaded', [$this, 'load_textdomain']);

			if (defined('WP_CLI') && WP_CLI) {
				\WP_CLI::add_command('lbc seed', [$this, 'cli_seed_data']);
			}
		}

		public function load_textdomain(): void
		{
			load_plugin_textdomain('lbc', false, dirname(plugin_basename(__FILE__)) . '/languages');
		}

		/*----------------------------------------
		 * CPT
		 *---------------------------------------*/
		public function register_post_type(): void
		{
			$labels = [
				'name'               => __('Designer Boots', 'lbc'),
				'singular_name'      => __('Designer Boot', 'lbc'),
				'add_new'            => __('Add New', 'lbc'),
				'add_new_item'       => __('Add New Designer Boot', 'lbc'),
				'edit_item'          => __('Edit Designer Boot', 'lbc'),
				'new_item'           => __('New Designer Boot', 'lbc'),
				'view_item'          => __('View Designer Boot', 'lbc'),
				'search_items'       => __('Search Designer Boots', 'lbc'),
				'not_found'          => __('No designer boots found', 'lbc'),
				'not_found_in_trash' => __('No designer boots found in Trash', 'lbc'),
				'all_items'          => __('All Designer Boots', 'lbc'),
				'menu_name'          => __('Designer Boots', 'lbc'),
			];

			register_post_type(
				self::CPT,
				[
					'labels'        => $labels,
					'public'        => true,
					'show_ui'       => true,
					'show_in_rest'  => true,
					'menu_position' => 21,
					'menu_icon'     => 'dashicons-universal-access',
					'supports'      => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
					'has_archive'   => true,
					'rewrite'       => ['slug' => 'designer-boots'],
				]
			);
		}

		/*----------------------------------------
		 * TAXONOMIES (all non-hierarchical per spec)
		 *---------------------------------------*/
		public function register_taxonomies(): void
		{
			$taxonomies = [
				'brand'      => __('Brand', 'lbc'),
				'heel_height' => __('Heel Height', 'lbc'),
				'material'   => __('Material', 'lbc'),
				'country'    => __('Country of Origin', 'lbc'),
				'color'      => __('Color', 'lbc'),
				'silhouette' => __('Silhouette', 'lbc'),
				'closure'    => __('Closure', 'lbc'),
			];

			foreach ($taxonomies as $key => $label) {
				register_taxonomy(
					$key,
					self::CPT,
					[
						'label'        => $label,
						'public'       => true,
						'show_in_rest' => true,
						'hierarchical' => false,
						'rewrite'      => ['slug' => $key],
					]
				);
			}
		}

		/*----------------------------------------
		 * META FIELDS
		 *---------------------------------------*/
		public function register_meta_fields(): void
		{
			/**
			 * Field map matching §2.3 Boot Details.
			 * Structure: key => [type, single, sanitize_callback]
			 */
			$fields = [
				'lbc_featured_alt'        => ['string', true, 'sanitize_text_field'],
				'lbc_featured_caption'    => ['string', true, 'sanitize_text_field'],
				'lbc_featured_desc'       => ['string', true, 'sanitize_textarea_field'],
				'lbc_description_rich'    => ['string', true, [$this, 'sanitize_rich_text']],
				'lbc_sizes_eu'            => ['string', true, 'sanitize_text_field'],
				'lbc_heel_type'           => ['string', true, 'sanitize_text_field'],
				'lbc_heel_height_mm'      => ['number', true, [$this, 'sanitize_positive_int']],
				'lbc_leather_type'        => ['string', true, 'sanitize_text_field'],
				'lbc_leather_color'       => ['string', true, 'sanitize_text_field'],
				'lbc_country_of_origin'   => ['string', true, 'sanitize_text_field'],
				'lbc_care'                => ['string', true, 'sanitize_textarea_field'],
				'lbc_product_link'        => ['string', true, 'esc_url_raw'],
				'lbc_gallery'             => ['array', true, [$this, 'sanitize_gallery']],
				'lbc_videos'              => ['array', true, [$this, 'sanitize_videos']],
				'lbc_personal_notes'      => ['string', true, 'sanitize_textarea_field'],
				'lbc_prompt_notes'        => ['string', true, 'sanitize_textarea_field'],
			];

			foreach ($fields as $meta_key => $args) {
				[$type, $single, $cb] = $args;
				register_post_meta(
					self::CPT,
					$meta_key,
					[
						'type'              => $type,
						'single'            => $single,
						'default'           => ('array' === $type) ? [] : '',
						'show_in_rest'      => true,
						'auth_callback'     => function () {
							return current_user_can('edit_posts');
						},
						'sanitize_callback' => is_callable($cb) ? $cb : null,
					]
				);
			}
		}

		public function sanitize_rich_text($value)
		{
			return wp_kses_post($value);
		}

		public function sanitize_positive_int($value)
		{
			$value = intval($value);
			return $value > 0 ? $value : '';
		}

		public function sanitize_gallery($value)
		{
			if (! is_array($value)) {
				return [];
			}
			$clean = [];
			foreach ($value as $maybe_id) {
				$id = intval($maybe_id);
				if ($id > 0) {
					$clean[] = $id;
				}
			}
			return $clean;
		}

		public function sanitize_videos($value)
		{
			if (! is_array($value)) {
				return [];
			}
			$out = [];
			foreach ($value as $row) {
				if (! is_array($row)) {
					continue;
				}
				$url     = isset($row['url']) ? esc_url_raw($row['url']) : '';
				$caption = isset($row['caption']) ? sanitize_text_field($row['caption']) : '';
				if ($url) {
					$out[] = ['url' => $url, 'caption' => $caption];
				}
			}
			return $out;
		}

		/*----------------------------------------
		 * META BOXES (Admin UI)
		 *---------------------------------------*/
		public function add_meta_boxes(): void
		{
			add_meta_box(
				'lbc_boot_details',
				__('Boot Details (Structured Fields)', 'lbc'),
				[$this, 'render_meta_box'],
				self::CPT,
				'normal',
				'high'
			);
		}

		public function render_meta_box($post)
		{
			wp_nonce_field('lbc_boot_meta', 'lbc_boot_meta_nonce');
			$fields = [
				'lbc_featured_alt'      => __('Featured Image Alt', 'lbc'),
				'lbc_featured_caption'  => __('Featured Caption', 'lbc'),
				'lbc_featured_desc'     => __('Featured Image Description', 'lbc'),
				'lbc_description_rich'  => __('Rich Description (100–200 words)', 'lbc'),
				'lbc_sizes_eu'          => __('Sizes (EU)', 'lbc'),
				'lbc_heel_type'         => __('Heel Type', 'lbc'),
				'lbc_heel_height_mm'    => __('Heel Height (mm)', 'lbc'),
				'lbc_leather_type'      => __('Leather Type', 'lbc'),
				'lbc_leather_color'     => __('Leather Color', 'lbc'),
				'lbc_country_of_origin' => __('Country of Origin', 'lbc'),
				'lbc_care'              => __('Care Instructions', 'lbc'),
				'lbc_product_link'      => __('External Product Link', 'lbc'),
				'lbc_personal_notes'    => __('Personal Notes', 'lbc'),
				'lbc_prompt_notes'      => __('Prompt Notes (AI)', 'lbc'),
			];
?>
			<style>
				.lbc-grid {
					display: grid;
					grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
					gap: 16px;
					margin-top: 8px;
				}

				.lbc-grid .field {
					display: flex;
					flex-direction: column;
				}

				.lbc-grid textarea {
					min-height: 90px;
				}

				.lbc-inline-note {
					font-size: 11px;
					color: #555;
					margin-top: 4px;
				}

				.lbc-array-table input[type="text"] {
					width: 100%;
				}

				.lbc-array-table th,
				.lbc-array-table td {
					padding: 4px 6px;
				}
			</style>
			<div class="lbc-grid">
				<?php foreach ($fields as $key => $label) :
					$val = get_post_meta($post->ID, $key, true);
					if ('lbc_description_rich' === $key) : ?>
						<div class="field" style="grid-column:1/-1">
							<label for="<?php echo esc_attr($key); ?>"><strong><?php echo esc_html($label); ?></strong></label>
							<?php
							wp_editor(
								$val,
								$key,
								[
									'textarea_rows' => 8,
									'media_buttons' => false,
									'tinymce'       => true,
								]
							);
							?>
							<span class="lbc-inline-note"><?php esc_html_e('Target 100–200 words; factual & benefit-led (materials, fit, styling).', 'lbc'); ?></span>
						</div>
					<?php else : ?>
						<div class="field">
							<label for="<?php echo esc_attr($key); ?>"><strong><?php echo esc_html($label); ?></strong></label>
							<?php if (in_array($key, ['lbc_care', 'lbc_featured_desc', 'lbc_personal_notes', 'lbc_prompt_notes'], true)) : ?>
								<textarea id="<?php echo esc_attr($key); ?>" name="<?php echo esc_attr($key); ?>"><?php echo esc_textarea($val); ?></textarea>
							<?php else : ?>
								<input type="text" id="<?php echo esc_attr($key); ?>" name="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($val); ?>" />
							<?php endif; ?>
						</div>
				<?php endif;
				endforeach; ?>
			</div>
			<hr />
			<?php
			$gallery = get_post_meta($post->ID, 'lbc_gallery', true);
			$videos  = get_post_meta($post->ID, 'lbc_videos', true);
			if (! is_array($gallery)) {
				$gallery = [];
			}
			if (! is_array($videos)) {
				$videos = [];
			}
			?>
			<h4><?php esc_html_e('Gallery (Attachment IDs)', 'lbc'); ?></h4>
			<p class="lbc-inline-note"><?php esc_html_e('Enter attachment IDs (minimum 3). Use Media Library to obtain IDs.', 'lbc'); ?></p>
			<table class="widefat lbc-array-table" id="lbc-gallery-table">
				<thead>
					<tr>
						<th><?php esc_html_e('Attachment ID', 'lbc'); ?></th>
						<th><?php esc_html_e('Remove', 'lbc'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($gallery as $id) : ?>
						<tr>
							<td><input type="text" name="lbc_gallery[]" value="<?php echo esc_attr($id); ?>" /></td>
							<td><button type="button" class="button lbc-remove-row">&times;</button></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<p><button type="button" class="button" id="lbc-add-gallery"><?php esc_html_e('Add Image', 'lbc'); ?></button></p>

			<h4><?php esc_html_e('Videos (URL + Caption optional)', 'lbc'); ?></h4>
			<table class="widefat lbc-array-table" id="lbc-videos-table">
				<thead>
					<tr>
						<th><?php esc_html_e('Video URL', 'lbc'); ?></th>
						<th><?php esc_html_e('Caption', 'lbc'); ?></th>
						<th><?php esc_html_e('Remove', 'lbc'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($videos as $row) : ?>
						<tr>
							<td><input type="text" name="lbc_videos[url][]" value="<?php echo esc_attr($row['url'] ?? ''); ?>" /></td>
							<td><input type="text" name="lbc_videos[caption][]" value="<?php echo esc_attr($row['caption'] ?? ''); ?>" /></td>
							<td><button type="button" class="button lbc-remove-row">&times;</button></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<p><button type="button" class="button" id="lbc-add-video"><?php esc_html_e('Add Video', 'lbc'); ?></button></p>

			<script>
				(function($) {
					function addRow(tableSelector, inputs) {
						const $tbody = $(tableSelector).find('tbody');
						let row = '<tr>';
						inputs.forEach(i => {
							row += '<td><input type="text" name="' + i.name + '[]" value=""/></td>';
						});
						row += '<td><button type="button" class="button lbc-remove-row">&times;</button></td></tr>';
						$tbody.append(row);
					}
					$('#lbc-add-gallery').on('click', function() {
						addRow('#lbc-gallery-table', [{
							name: 'lbc_gallery'
						}]);
					});
					$('#lbc-add-video').on('click', function() {
						addRow('#lbc-videos-table', [{
							name: 'lbc_videos[url]'
						}, {
							name: 'lbc_videos[caption]'
						}]);
					});
					$(document).on('click', '.lbc-remove-row', function() {
						$(this).closest('tr').remove();
					});
				})(jQuery);
			</script>
<?php
		}

		public function save_meta_boxes($post_id, $post)
		{
			if (! isset($_POST['lbc_boot_meta_nonce']) || ! wp_verify_nonce($_POST['lbc_boot_meta_nonce'], 'lbc_boot_meta')) {
				return;
			}
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
				return;
			}
			if (! current_user_can('edit_post', $post_id)) {
				return;
			}

			$text_keys = [
				'lbc_featured_alt',
				'lbc_featured_caption',
				'lbc_featured_desc',
				'lbc_sizes_eu',
				'lbc_heel_type',
				'lbc_heel_height_mm',
				'lbc_leather_type',
				'lbc_leather_color',
				'lbc_country_of_origin',
				'lbc_care',
				'lbc_product_link',
				'lbc_personal_notes',
				'lbc_prompt_notes',
			];

			foreach ($text_keys as $key) {
				if (isset($_POST[$key])) {
					update_post_meta($post_id, $key, sanitize_text_field(wp_unslash($_POST[$key])));
				}
			}

			if (isset($_POST['lbc_description_rich'])) {
				update_post_meta($post_id, 'lbc_description_rich', wp_kses_post(wp_unslash($_POST['lbc_description_rich'])));
			}

			// Gallery.
			if (isset($_POST['lbc_gallery']) && is_array($_POST['lbc_gallery'])) {
				$gallery = array_filter(array_map('intval', $_POST['lbc_gallery']));
				update_post_meta($post_id, 'lbc_gallery', $gallery);
			} else {
				delete_post_meta($post_id, 'lbc_gallery');
			}

			// Videos.
			if (isset($_POST['lbc_videos']['url']) && is_array($_POST['lbc_videos']['url'])) {
				$urls     = $_POST['lbc_videos']['url'];
				$caps     = $_POST['lbc_videos']['caption'] ?? [];
				$compiled = [];
				foreach ($urls as $index => $url) {
					$url = esc_url_raw($url);
					if ($url) {
						$compiled[] = [
							'url'     => $url,
							'caption' => sanitize_text_field($caps[$index] ?? ''),
						];
					}
				}
				update_post_meta($post_id, 'lbc_videos', $compiled);
			} else {
				delete_post_meta($post_id, 'lbc_videos');
			}
		}

		/*----------------------------------------
		 * REST AUGMENTATION (example: computed fact_box)
		 *---------------------------------------*/
		public function extend_rest_response(): void
		{
			register_rest_field(
				self::CPT,
				'fact_box',
				[
					'get_callback' => function ($object) {
						$id = $object['id'];
						return [
							'heel_type'        => get_post_meta($id, 'lbc_heel_type', true),
							'heel_height_mm'   => get_post_meta($id, 'lbc_heel_height_mm', true),
							'leather_type'     => get_post_meta($id, 'lbc_leather_type', true),
							'leather_color'    => get_post_meta($id, 'lbc_leather_color', true),
							'country_of_origin' => get_post_meta($id, 'lbc_country_of_origin', true),
							'sizes_eu'         => get_post_meta($id, 'lbc_sizes_eu', true),
							'care'             => get_post_meta($id, 'lbc_care', true),
							'product_link'     => get_post_meta($id, 'lbc_product_link', true),
						];
					},
					'schema'       => null,
				]
			);
		}

		/*----------------------------------------
		 * BLOCK PATTERNS (Core)
		 *---------------------------------------*/
		public function register_block_patterns(): void
		{

			if (! function_exists('register_block_pattern_category')) {
				return;
			}

			register_block_pattern_category('heels-luxe', ['label' => __('Heels Luxe', 'lbc')]);

			// Fact Box pattern (dl structure).
			register_block_pattern(
				'heels-luxe/boot-fact-box',
				[
					'title'       => __('Boot Fact Box', 'lbc'),
					'categories'  => ['heels-luxe'],
					'description' => __('Definition list of key boot specs (heel, material, fit).', 'lbc'),
					'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"neutral-100","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-neutral-100-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":3} --><h3>' . esc_html__('Specifications', 'lbc') . '</h3><!-- /wp:heading --><!-- wp:list {"className":"lbc-fact-box","ordered":false} -->
<ul class="lbc-fact-box"><li><strong>' . esc_html__('Heel Type:', 'lbc') . '</strong> <span>Stiletto</span></li><li><strong>' . esc_html__('Heel Height:', 'lbc') . '</strong> <span>100 mm</span></li><li><strong>' . esc_html__('Material:', 'lbc') . '</strong> <span>Calfskin</span></li><li><strong>' . esc_html__('Fit:', 'lbc') . '</strong> <span>True to size</span></li><li><strong>' . esc_html__('Sizes:', 'lbc') . '</strong> <span>35–39</span></li><li><strong>' . esc_html__('Care:', 'lbc') . '</strong> <span>Wipe with soft cloth.</span></li></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->',
				]
			);

			// Card pattern (simplified).
			register_block_pattern(
				'heels-luxe/boot-card',
				[
					'title'       => __('Boot Card', 'lbc'),
					'categories'  => ['heels-luxe'],
					'description' => __('Single boot card with image, title, excerpt, and specifications.', 'lbc'),
					'content'     => '<!-- wp:group {"className":"boot-card"} -->
<div class="wp-block-group boot-card"><!-- wp:post-featured-image {"isLink":true,"height":"400px"} /--><!-- wp:post-title {"level":3,"isLink":true} /--><!-- wp:post-excerpt {"moreText":"' . esc_html__('View details', 'lbc') . '"} /--></div>
<!-- /wp:group -->',
				]
			);

			// Grid pattern (query).
			register_block_pattern(
				'heels-luxe/boot-card-grid',
				[
					'title'       => __('Boot Card Grid', 'lbc'),
					'categories'  => ['heels-luxe'],
					'description' => __('Responsive grid of designer boots (Query Loop).', 'lbc'),
					'content'     => '<!-- wp:query {"queryId":1,"query":{"perPage":6,"pages":0,"offset":0,"postType":["designer_boot"],"order":"desc","orderBy":"date"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:pattern {"slug":"heels-luxe/boot-card"} /-->
<!-- /wp:post-template --><!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous /-->
<!-- wp:query-pagination-numbers /-->
<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query -->',
				]
			);
		}

		/*----------------------------------------
		 * WP-CLI SEED
		 *---------------------------------------*/
		public function cli_seed_data(): void
		{
			$examples = $this->seed_examples();
			foreach ($examples as $example) {
				$post_id = wp_insert_post(
					[
						'post_type'    => self::CPT,
						'post_title'   => $example['post_title'],
						'post_excerpt' => $example['post_excerpt'],
						'post_status'  => 'publish',
					]
				);
				if (is_wp_error($post_id)) {
					\WP_CLI::warning("Failed to insert {$example['post_title']}");
					continue;
				}
				// Meta.
				foreach ($example['meta'] as $k => $v) {
					update_post_meta($post_id, $k, $v);
				}
				// Taxonomies.
				foreach ($example['tax'] as $taxonomy => $terms) {
					wp_set_object_terms($post_id, $terms, $taxonomy);
				}
				\WP_CLI::success('Inserted: ' . $example['post_title']);
			}
		}

		private function seed_examples(): array
		{
			/**
			 * Attempt to load seed data from a CSV file located alongside this plugin.
			 *
			 * CSV columns (header row required):
			 * post_type,post_title,post_excerpt,lbc_description_rich,lbc_featured_desc,lbc_featured_alt,lbc_featured_caption,lbc_sizes_eu,lbc_heel_type,lbc_heel_height_mm,lbc_leather_type,lbc_leather_color,lbc_country_of_origin,lbc_care,lbc_product_link,brand,heel_height,material,country,color,silhouette,closure,lbc_personal_notes,lbc_prompt_notes
			 *
			 * Multiple taxonomy terms can be pipe-separated (e.g. "medium|platform").
			 * Empty fields are ignored. If the file is missing or invalid we fall back to the previous hard‑coded examples.
			 *
			 * @since 1.0.1 Added CSV based seeding.
			 * @return array[] List of seed post arrays (title, excerpt, meta[], tax[])
			 */
			// Use plugin_dir_path(__FILE__) for WordPress standard and better edge case handling.
			$csv_path = plugin_dir_path(__FILE__) . 'seed-designer-boots.csv';
			$posts    = [];
			if (file_exists($csv_path) && is_readable($csv_path)) {
				$lines = file($csv_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
				if ($lines && count($lines) > 1) {
					$header = array_map('trim', str_getcsv(array_shift($lines)));
					foreach ($lines as $line) {
						$row = str_getcsv($line);
						if (count($row) !== count($header)) {
							continue; // skip malformed row
						}
						$data = array_combine($header, $row);
						if (empty($data['post_type']) || $data['post_type'] !== self::CPT) {
							continue;
						}
						// Build meta array.
						$meta_keys = [
							'lbc_description_rich',
							'lbc_featured_desc',
							'lbc_featured_alt',
							'lbc_featured_caption',
							'lbc_sizes_eu',
							'lbc_heel_type',
							'lbc_heel_height_mm',
							'lbc_leather_type',
							'lbc_leather_color',
							'lbc_country_of_origin',
							'lbc_care',
							'lbc_product_link',
							'lbc_personal_notes',
							'lbc_prompt_notes'
						];
						$meta = ['lbc_gallery' => [], 'lbc_videos' => []];
						foreach ($meta_keys as $mk) {
							if (isset($data[$mk]) && $data[$mk] !== '') {
								$value = $data[$mk];
								if ('lbc_heel_height_mm' === $mk) {
									$value = (int) $value;
								}
								$meta[$mk] = $value;
							}
						}
						// Taxonomies mapping.
						$tax_map = [
							'brand' => 'brand',
							'heel_height' => 'heel_height',
							'material' => 'material',
							'country' => 'country',
							'color' => 'color',
							'silhouette' => 'silhouette',
							'closure' => 'closure',
						];
						$tax = [];
						foreach ($tax_map as $csv_col => $tax_name) {
							if (! empty($data[$csv_col])) {
								$terms = array_filter(array_map('trim', preg_split('/\|/', $data[$csv_col])));
								if ($terms) {
									$tax[$tax_name] = $terms;
								}
							}
						}
						$posts[] = [
							'post_title'   => $data['post_title'] ?? '',
							'post_excerpt' => $data['post_excerpt'] ?? '',
							'meta'         => $meta,
							'tax'          => $tax,
						];
					}
				}
			}
			if ($posts) {
				return $posts;
			}
			// Fallback to legacy hard-coded seed data if CSV missing or empty.
			return [
				[
					'post_title'   => 'GUCCI Horsebit Ankle Boot – Black Calfskin',
					'post_excerpt' => 'Iconic horsebit ankle boot in smooth black calfskin with a low rubber block heel and side-zip convenience—versatile from desk to dinner.',
					'meta'         => [
						'lbc_featured_alt'      => 'GUCCI Horsebit ankle boot in black calfskin, side view',
						'lbc_featured_caption'  => '',
						'lbc_featured_desc'     => 'Three-quarter angle showing horsebit hardware and block heel.',
						'lbc_description_rich'  => 'The GUCCI Horsebit ankle boot pairs Italian craftsmanship with everyday wearability. Smooth black calfskin shapes a refined silhouette, anchored by a low rubber block heel for stability...',
						'lbc_sizes_eu'          => '35–39',
						'lbc_heel_type'         => 'Low rubber block',
						'lbc_heel_height_mm'    => 50,
						'lbc_leather_type'      => 'calfskin',
						'lbc_leather_color'     => 'Black',
						'lbc_country_of_origin' => 'Italy',
						'lbc_care'              => 'Wipe with soft cloth; avoid saturation.',
						'lbc_product_link'      => 'https://example.com/gucci-boot',
						'lbc_gallery'           => [],
						'lbc_videos'            => [],
						'lbc_personal_notes'    => '',
						'lbc_prompt_notes'      => 'Tone: concise, authoritative.',
					],
					'tax'         => [
						'brand'      => ['GUCCI'],
						'heel_height' => ['low'],
						'material'   => ['calfskin'],
						'country'    => ['Italy'],
						'color'      => ['Black'],
						'silhouette' => ['ankle boot'],
						'closure'    => ['side zip'],
					],
				],
				[
					'post_title'   => 'Louis Vuitton Swing Platform Ankle Boot – Black Lambskin',
					'post_excerpt' => 'Supple lambskin ankle boot with a balanced platform and medium block heel—modern height with confident traction.',
					'meta'         => [
						'lbc_featured_alt'      => 'Louis Vuitton Swing Platform ankle boot in black lambskin, profile',
						'lbc_featured_desc'     => 'Profile view emphasising platform and heel.',
						'lbc_featured_caption'  => '',
						'lbc_description_rich'  => 'Crafted in soft black lambskin, the Swing Platform ankle boot delivers statement height without sacrificing stability...',
						'lbc_sizes_eu'          => '35–39',
						'lbc_heel_type'         => 'Medium block with platform',
						'lbc_heel_height_mm'    => 75,
						'lbc_leather_type'      => 'lambskin',
						'lbc_leather_color'     => 'Black',
						'lbc_country_of_origin' => 'Italy',
						'lbc_care'              => 'Condition occasionally; avoid abrasive contact.',
						'lbc_product_link'      => '',
						'lbc_gallery'           => [],
						'lbc_videos'            => [],
						'lbc_personal_notes'    => '',
						'lbc_prompt_notes'      => 'Platform offsets perceived height.',
					],
					'tax'         => [
						'brand'      => ['Louis Vuitton'],
						'heel_height' => ['medium', 'platform'],
						'material'   => ['lambskin'],
						'country'    => ['Italy'],
						'color'      => ['Black'],
						'silhouette' => ['ankle boot'],
						'closure'    => ['side zip'],
					],
				],
				[
					'post_title'   => 'Prada 85 Leather Ankle Boots – Black Nappa',
					'post_excerpt' => 'Sleek nappa ankle boots with an elegant high heel—streamlined lines and a close, tailored fit.',
					'meta'         => [
						'lbc_featured_alt'      => 'Prada 85 leather ankle boots in black nappa, three-quarter view',
						'lbc_featured_desc'     => 'Three-quarter view highlighting tapered toe and high heel.',
						'lbc_featured_caption'  => '',
						'lbc_description_rich'  => 'Prada’s 85 leather ankle boots deliver a polished profile in supple black nappa. The tapered toe elongates the line...',
						'lbc_sizes_eu'          => '35–40',
						'lbc_heel_type'         => 'High stiletto-like block',
						'lbc_heel_height_mm'    => 85,
						'lbc_leather_type'      => 'nappa',
						'lbc_leather_color'     => 'Black',
						'lbc_country_of_origin' => 'Italy',
						'lbc_care'              => 'Use shoe trees; store in dust bags.',
						'lbc_product_link'      => '',
						'lbc_gallery'           => [],
						'lbc_videos'            => [],
						'lbc_personal_notes'    => 'Closer fit through ankle.',
						'lbc_prompt_notes'      => 'Highlight sizing consideration.',
					],
					'tax'         => [
						'brand'      => ['Prada'],
						'heel_height' => ['high'],
						'material'   => ['nappa'],
						'country'    => ['Italy'],
						'color'      => ['Black'],
						'silhouette' => ['ankle boot'],
						'closure'    => ['side zip'],
					],
				],
			];
		}
	}

	LBC_Designer_Boots::init();
}
