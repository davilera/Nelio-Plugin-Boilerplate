<?php

/**
 * List of settings.
 *
 * @since      0.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/data
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(

	array( // ===========================================================
		'type'  => 'section',
		'name'  => 'text-fields',
		'label' => __( 'Text Fields', 'plugin-name' )
	), // ===============================================================

	array(
		'type'        => 'text',
		'name'        => 'short_text',
		'label'       => __( 'Short Text', 'plugin-name' ),
		'desc'        => __( 'This is the field\'s description. A "Read more..." link is also included. Note that all fields (regardless of its type) may include their own description.', 'plugin-name' ),
		'more'        => 'http://neliosoftware.com',
		'placeholder' => __( 'Write a short text here...', 'plugin-name' )
	),

	array(
		'type'        => 'textarea',
		'name'        => 'long_text',
		'label'       => __( 'Long Text', 'plugin-name' ),
		'desc'        => __( 'Another description, but this time without a "Read more..." link. Cool, huh?', 'plugin-name' ),
		'placeholder' => __( 'Write a long text here...', 'plugin-name' )
	),

	array( // ===========================================================
		'type'  => 'section',
		'name'  => 'other-fields',
		'label' => __( 'Other Fields', 'plugin-name' )
	), // ===============================================================

	array(
		'type'    => 'checkbox',
		'name'    => 'a_checkbox',
		'label'   => __( 'Checkbox', 'plugin-name' ),
		'desc'    => __( 'Some descriptive text.', 'plugin-name' ),
		'default' => true
	),

	array(
		'type'    => 'checkboxes',
		'label'   => __( 'Checkbox Set', 'nelioab' ),
		'options' => array(
			array(
				'name'    => 'checkboxes_a',
				'desc'    => __( 'First checkbox in a set.', 'plugin-name' ),
				'default' => true
			),
			array(
				'name'    => 'checkboxes_b',
				'desc'    => __( 'Second checkbox in a set.', 'plugin-name' ),
				'default' => false
			),
			array(
				'name'    => 'checkboxes_c',
				'desc'    => __( 'Third checkbox in a set.', 'plugin-name' )
			),
		)
	),

	array(
		'type'    => 'radio',
		'name'    => 'radio_buttons',
		'label'   => __( 'Radio Buttons', 'plugin-name' ),
		'desc'    => __( 'Radio description.', 'plugin-name' ),
		'default' => 'radio_a',
		'options' => array(
			array(
				'value' => 'radio_a',
				'label' => __( 'Radio A', 'plugin-name' ),
				'desc'  => __( 'First explanation.', 'plugin-name' )
			),
			array(
				'value' => 'radio_b',
				'label' => __( 'Radio B', 'plugin-name' ),
				'desc'  => __( 'Second explanation.', 'plugin-name' )
			),
			array(
				'value' => 'radio_c',
				'label' => __( 'Radio C', 'plugin-name' ),
				'desc'  => __( 'Third explanation.', 'plugin-name' )
			)
		)
	),

	array(
		'type'    => 'select',
		'name'    => 'select_options',
		'label'   => __( 'Select Stuff', 'plugin-name' ),
		'desc'    => __( 'Select descriptions follow the same approach as radio buttons\'. In this example, though, individual options have no descriptions.', 'plugin-name' ),
		'default' => 'option_b',
		'options' => array(
			array(
				'value' => 'option_a',
				'label' => __( 'Option A', 'plugin-name' )
			),
			array(
				'value' => 'option_b',
				'label' => __( 'Option B', 'plugin-name' )
			),
			array(
				'value' => 'option_c',
				'label' => __( 'Option C', 'plugin-name' )
			)
		)
	)

);
