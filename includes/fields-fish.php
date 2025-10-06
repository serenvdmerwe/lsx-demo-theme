<?php
/**
 * Local Secure Custom Fields (SCF) / ACF-style field group for the Fish CPT.
 *
 * This file is loaded by the theme on acf/init as a PHP fallback to register
 * the same field group that's provided as JSON in acf-json/group_fish_details.json.
 *
 * Meta key convention: fish_<field_name>
 *
 * Place this file in: wp-content/themes/lsx-demo-theme/includes/fields-fish.php
 *
 * @package lsx-demo-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the Fish field group via acf_add_local_field_group() if SCF/ACF is active.
 */
add_action( 'acf/init', 'lsx_demo_theme_register_local_fish_fields' );
function lsx_demo_theme_register_local_fish_fields() {
	// Bail if SCF/ACF is not active.
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'                   => 'group_lsx_fish_details',
		'title'                 => 'Fish — Details',
		'fields'                => array(
			array(
				'key'   => 'field_lsx_fish_tab_identity',
				'label' => 'Identity',
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'           => 'field_lsx_fish_scientific_name',
				'label'         => 'Scientific name',
				'name'          => 'fish_scientific_name',
				'type'          => 'text',
				'instructions'  => 'Binomial scientific name (e.g. Labeobarbus aeneus).',
				'required'      => 1,
			),
			array(
				'key'           => 'field_lsx_fish_common_names',
				'label'         => 'Common names',
				'name'          => 'fish_common_names',
				'type'          => 'repeater',
				'instructions'  => 'Add common names by language or region.',
				'min'           => 0,
				'max'           => 0,
				'layout'        => 'table',
				'sub_fields'    => array(
					array(
						'key'   => 'field_lsx_common_name_text',
						'label' => 'Name',
						'name'  => 'name',
						'type'  => 'text',
					),
					array(
						'key'     => 'field_lsx_common_name_language',
						'label'   => 'Language',
						'name'    => 'language',
						'type'    => 'select',
						'choices' => array(
							'en' => 'English',
							'af' => 'Afrikaans',
							'zu' => 'Zulu',
						),
						'allow_null' => 1,
					),
				),
			),

			array(
				'key'   => 'field_lsx_fish_tab_media',
				'label' => 'Media',
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'           => 'field_lsx_fish_primary_image',
				'label'         => 'Primary image',
				'name'          => 'fish_primary_image',
				'type'          => 'image',
				'return_format' => 'id',
				'preview_size'  => 'medium',
				'instructions'  => 'Hero image — ensure alt text is added in Media Library.',
			),
			array(
				'key'           => 'field_lsx_fish_gallery',
				'label'         => 'Gallery',
				'name'          => 'fish_gallery',
				'type'          => 'gallery',
				'instructions'  => 'Optional multiple images (habitat, specimen).',
				'min'           => 0,
				'max'           => 12,
				'return_format' => 'id',
			),

			array(
				'key'   => 'field_lsx_fish_tab_details',
				'label' => 'Details',
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'           => 'field_lsx_fish_description',
				'label'         => 'Description',
				'name'          => 'fish_description',
				'type'          => 'wysiwyg',
				'instructions'  => 'Short species summary — identification and distinguishing features.',
				'required'      => 1,
				'toolbar'       => 'full',
			),
			array(
				'key'        => 'field_lsx_fish_quick_facts',
				'label'      => 'Quick facts',
				'name'       => 'fish_quick_facts',
				'type'       => 'group',
				'sub_fields' => array(
					array(
						'key'   => 'field_lsx_qf_common_name',
						'label' => 'Primary common name',
						'name'  => 'common_name',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_lsx_qf_scientific_display',
						'label' => 'Scientific name (display)',
						'name'  => 'scientific_name_display',
						'type'  => 'text',
					),
					array(
						'key'           => 'field_lsx_qf_conservation_status',
						'label'         => 'Conservation status (term)',
						'name'          => 'fish_conservation_status_term',
						'type'          => 'taxonomy',
						'taxonomy'      => 'conservation_status',
						'field_type'    => 'select',
						'allow_null'    => 1,
						'return_format' => 'id',
					),
					array(
						'key'   => 'field_lsx_qf_avg_size_value',
						'label' => 'Average size value',
						'name'  => 'fish_average_size_value',
						'type'  => 'number',
						'step'  => '0.1',
						'min'   => 0,
					),
					array(
						'key'     => 'field_lsx_qf_avg_size_unit',
						'label'   => 'Average size unit',
						'name'    => 'fish_average_size_unit',
						'type'    => 'select',
						'choices' => array(
							'cm' => 'cm',
							'kg' => 'kg',
							'in' => 'in',
							'lb' => 'lb',
						),
						'default_value' => 'cm',
					),
				),
			),
			array(
				'key'   => 'field_lsx_fish_max_length_cm',
				'label' => 'Max length (cm)',
				'name'  => 'fish_max_length_cm',
				'type'  => 'number',
				'min'   => 0,
			),
			array(
				'key'   => 'field_lsx_fish_typical_length_cm',
				'label' => 'Typical length (cm)',
				'name'  => 'fish_typical_length_cm',
				'type'  => 'number',
				'min'   => 0,
			),

			array(
				'key'           => 'field_lsx_fish_habitat',
				'label'         => 'Habitat',
				'name'          => 'fish_habitat',
				'type'          => 'taxonomy',
				'taxonomy'      => 'habitat',
				'field_type'    => 'multi_select',
				'return_format' => 'id',
				'instructions'  => 'Select one or more habitats/locations.',
			),
			array(
				'key'           => 'field_lsx_fish_region',
				'label'         => 'Region',
				'name'          => 'fish_region',
				'type'          => 'taxonomy',
				'taxonomy'      => 'region',
				'field_type'    => 'multi_select',
				'return_format' => 'id',
			),

			array(
				'key'   => 'field_lsx_fish_tab_ecology',
				'label' => 'Ecology & Status',
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'           => 'field_lsx_fish_diet',
				'label'         => 'Diet',
				'name'          => 'fish_diet',
				'type'          => 'text',
				'instructions'  => 'Short, e.g. Planktivore, Piscivore.',
			),
			array(
				'key'           => 'field_lsx_fish_behaviour',
				'label'         => 'Behaviour',
				'name'          => 'fish_behaviour',
				'type'          => 'wysiwyg',
				'toolbar'       => 'basic',
			),

			array(
				'key'   => 'field_lsx_fish_tab_refs',
				'label' => 'References & Relations',
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'        => 'field_lsx_fish_references',
				'label'      => 'References',
				'name'       => 'fish_references',
				'type'       => 'repeater',
				'min'        => 0,
				'max'        => 0,
				'sub_fields' => array(
					array(
						'key'   => 'field_lsx_ref_citation',
						'label' => 'Citation',
						'name'  => 'citation',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_lsx_ref_url',
						'label' => 'URL',
						'name'  => 'url',
						'type'  => 'url',
					),
				),
			),
			array(
				'key'           => 'field_lsx_fish_related_species',
				'label'         => 'Related species',
				'name'          => 'fish_related',
				'type'          => 'post_object',
				'post_type'     => array( 'fish' ),
				'allow_null'    => 1,
				'multiple'      => 1,
				'return_format' => 'id',
				'instructions'  => 'Select related species (editorial).',
			),

			array(
				'key'   => 'field_lsx_fish_tab_story',
				'label' => 'Personal / Story',
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'         => 'field_lsx_fish_fun_fact',
				'label'       => 'Fun fact',
				'name'        => 'fish_fun_fact',
				'type'        => 'text',
				'maxlength'   => 200,
			),
			array(
				'key'         => 'field_lsx_fish_personal_story',
				'label'       => 'Personal story / note',
				'name'        => 'fish_personal_story',
				'type'        => 'wysiwyg',
				'instructions' => 'Editor anecdotes or field notes (optional).',
			),

			array(
				'key'         => 'field_lsx_fish_admin_notes',
				'label'       => 'Admin notes',
				'name'        => 'fish_admin_notes',
				'type'        => 'message',
				'message'     => 'Internal editorial notes (not shown on front end).',
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'fish',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'seamless',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => array( 'permalink' ),
		'active'                => true,
		'description'           => 'Fields for fish species entries.',
		'show_in_rest'          => true,
	) );
}