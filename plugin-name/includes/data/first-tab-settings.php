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
		'name'  => 'plugin-name-first-section',
		'label' => __( 'First Section', 'plugin-name' )
	), // ===============================================================

	array(
		'type'    => 'select',
		'name'    => 'favorite_color',
		'label'   => __( 'Favorite Color', 'plugin-name' ),
		'desc'    => __( 'Select your favorite color.', 'plugin-name' ),
		'default' => 'blue',
		'options' => array(
			array(
				'value' => 'white',
				'label' => __( 'White', 'plugin-name' ),
				'desc'  => __( 'This color is associated with light, goodness, innocence, and purity.', 'plugin-name' )
			),
			array(
				'value' => 'blue',
				'label' => __( 'Blue', 'plugin-name' ),
				'desc'  => __( 'Depth and stability, it\'s the color of the sky and sea.', 'plugin-name' )
			),
			array(
				'value' => 'green',
				'label' => __( 'Green', 'plugin-name' ),
				'desc'  => __( 'It\'s the color of nature. It symbolizes growth, harmony.', 'plugin-name' )
			)
		)
	),

	array( // ===========================================================
		'type'  => 'section',
		'name'  => 'plugin-name-second-section',
		'label' => __( 'Second Section', 'plugin-name' )
	), // ===============================================================

	array(
		'type'    => 'checkbox',
		'name'    => 'send_emails',
		'label'   => __( 'E-Mails', 'plugin-name' ),
		'desc'    => __( 'Activate this option if you want to receive e-mails when something happens.', 'plugin-name' ),
		'default' => true
	)

);
