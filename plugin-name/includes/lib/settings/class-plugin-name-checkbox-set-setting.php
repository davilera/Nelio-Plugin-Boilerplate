<?php

/**
 * This file contains the Checkbox Set Setting class.
 *
 * @since      0.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This class represents a set of checkboxes setting.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings
 * @author     Your Name <your.name@example.com>
 */
class Plugin_Name_Checkbox_Set_Setting extends Plugin_Name_Abstract_Setting {

	/**
	 * List of checkboxes.
	 *
	 * In this particular case, the instantiated checkboxes are not directly
	 * registered. We register the whole set using this instance.
	 *
	 * @see Plugin_Name_Checkbox_Setting
	 *
	 * @var array
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      boolean
	 */
	protected $checkboxes;

	/**
	 * Creates a new instance of this class.
	 *
	 * @param    array    $options    A list with the required information for creating checkboxes.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function __construct( $options ) {
		parent::__construct( 'aaa' );
		$this->checkboxes = array();

		foreach ( $options as $option ) {
			if ( isset( $option['more'] ) ) {
				$more = $option['more'];
			} else {
				$more = '';
			}
			$checkbox = new Plugin_Name_Checkbox_Setting(
				$option['name'],
				$option['desc'],
				$more
			);
			$this->checkboxes[$option['name']] = $checkbox;
		}

	}

	/**
	 * Sets the value of this setting to the given value.
	 *
	 * @param    array    $tuple    A tuple with the name of the specific checkbox and its concrete value.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function set_value( $tuple ) {

		$name = $tuple['name'];
		$value = $tuple['value'];

		if ( isset( $this->checkboxes[$name] ) ) {
			$checkbox = $this->checkboxes[$name];
			$checkbox->set_value( $value );
		}

	}

	// @Implements
	public function display() {

		foreach ( $this->checkboxes as $checkbox ) {
			$checkbox->display();
		}

	}

	// @Implements
	public function sanitize( $input ) {

		foreach ( $this->checkboxes as $checkbox ) {
			$input = $checkbox->sanitize( $input );
		}
		return $input;

	}

	// @Overrides
	public function register( $label, $page, $section, $option_group, $option_name ) {

		parent::register($label, $page, $section, $option_group, $option_name );
		foreach ( $this->checkboxes as $checkbox ) {
			$checkbox->set_option_name( $option_name );
		}

	}

}

