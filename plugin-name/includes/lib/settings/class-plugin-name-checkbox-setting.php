<?php
/**
 * This file contains the Checkbox Setting class.
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
 * This class represents a checkbox setting.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */
class Plugin_Name_Checkbox_Setting extends Plugin_Name_Abstract_Setting {

	/**
	 * Whether this checkbox is checked or not.
	 *
	 * @since  0.0.0
	 * @access protected
	 * @var    boolean
	 */
	protected $checked;

	/**
	 * Sets whether this checkbox is checked or not.
	 *
	 * @param string $option_name The name of an option to sanitize and save.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public function set_option_name( $option_name ) {
		$this->option_name = $option_name;
	}//end set_option_name()

	/**
	 * Sets whether this checkbox is checked or not.
	 *
	 * @param boolean $value Whether this checkbox is checked or not.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public function set_value( $value ) {

		$this->checked = $value;

	}//end set_value()

	// @codingStandardsIgnoreStart
	// @Implements
	public function display() {
	// @codingStandardsIgnoreEnd

		// Preparing data for the partial.
		$id      = str_replace( '_', '-', $this->name );
		$name    = $this->option_name . '[' . $this->name . ']';
		$desc    = $this->desc;
		$more    = $this->more;
		$checked = $this->checked;
		include PLUGIN_NAME_INCLUDES_DIR . '/lib/settings/partials/plugin-name-checkbox-setting.php';

	}//end display()

	// @codingStandardsIgnoreStart
	// @Implements
	public function sanitize( $input ) {
	// @codingStandardsIgnoreEnd

		if ( isset( $input[ $this->name ] ) && 'on' === $input[ $this->name ] ) {
			$input[ $this->name ] = true;
		} else {
			$input[ $this->name ] = false;
		}
		return $input;

	}//end sanitize()

	// @codingStandardsIgnoreStart
	// @Override
	protected function generate_label() {
	// @codingStandardsIgnoreEnd

		return $this->label;

	}//end generate_label()

}//end class

