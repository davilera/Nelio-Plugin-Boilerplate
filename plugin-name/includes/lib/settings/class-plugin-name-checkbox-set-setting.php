<?php
/**
 * This file contains the Checkbox Set Setting class.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
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
 * @since      0.0.0
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
	 * @since  0.0.0
	 * @access protected
	 * @var    array
	 */
	protected $checkboxes;

	/**
	 * Creates a new instance of this class.
	 *
	 * @param array $options A list with the required information for creating checkboxes.
	 *
	 * @since  0.0.0
	 * @access public
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
			$this->checkboxes[ $option['name'] ] = $checkbox;
		}

	}//end __construct()

	/**
	 * Sets the value of this setting to the given value.
	 *
	 * @param array $tuple A tuple with the name of the specific checkbox and its concrete value.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public function set_value( $tuple ) {

		$name = $tuple['name'];
		$value = $tuple['value'];

		if ( isset( $this->checkboxes[ $name ] ) ) {
			$checkbox = $this->checkboxes[ $name ];
			$checkbox->set_value( $value );
		}

	}//end set_value()

	// @codingStandardsIgnoreStart
	// @Implements
	public function display() {
	// @codingStandardsIgnoreEnd

		foreach ( $this->checkboxes as $checkbox ) {
			$checkbox->display();
		}

	}//end display()

	// @codingStandardsIgnoreStart
	// @Implements
	public function sanitize( $input ) {
	// @codingStandardsIgnoreEnd

		foreach ( $this->checkboxes as $checkbox ) {
			$input = $checkbox->sanitize( $input );
		}
		return $input;

	}//end sanitize()

	// @codingStandardsIgnoreStart
	// @Overrides
	public function register( $label, $page, $section, $option_group, $option_name ) {
	// @codingStandardsIgnoreEnd

		parent::register( $label, $page, $section, $option_group, $option_name );
		foreach ( $this->checkboxes as $checkbox ) {
			$checkbox->set_option_name( $option_name );
		}

	}//end register()

}//end class

