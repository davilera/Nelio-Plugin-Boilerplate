<?php
/**
 * List of settings.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/data
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(

	array( // ===========================================================
		'type'  => 'section',
		'name'  => 'cool-fields',
		'label' => __( 'Cool Fields', 'plugin-name' ),
	), // ===============================================================

	array(
		'type'    => 'range',
		'name'    => 'some_numbers',
		'label'   => __( 'Slider', 'plugin-name' ),
		'default' => 5,
		'args'    => array(
			'label' => __( 'This slider\'s value is: {value}. You can make the slider verbose using the keyword <code>{value}</code>.', 'plugin-name' ),
			'min'   => 0,
			'max'   => 20,
			'step'  => 5,
		),
	),

	array(
		'type'    => 'number',
		'name'    => 'a_number',
		'label'   => __( 'Number', 'plugin-name' ),
		'default' => 1985,
	),

	array(
		'type'        => 'email',
		'name'        => 'your_email',
		'label'       => __( 'E-Mail Address', 'plugin-name' ),
		'placeholder' => __( 'user.name@example.com', 'plugin-name' ),
	),

	array(
		'type'        => 'password',
		'name'        => 'your_password',
		'label'       => __( 'Password', 'plugin-name' ),
	),

);
