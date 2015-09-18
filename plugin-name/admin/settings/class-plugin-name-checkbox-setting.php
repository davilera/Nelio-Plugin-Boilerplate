<?php

/**
 * This file contains the Checkbox Setting class.
 *
 * @since      0.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/settings
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This class represents a checkbox setting.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/settings
 * @author     Your Name <your.name@example.com>
 */
class Plugin_Name_Checkbox_Setting extends Plugin_Name_Abstract_Setting {

	/**
	 * Whether this checkbox is checked or not.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      boolean
	 */
	protected $checked;

	/**
	 * Creates a new instance of this class.
	 *
	 * @param    string   $name     The name that identifies this setting.
	 * @param    string   $desc     A text that describes this field.
	 * @param    string   $more     A link pointing to more information about this field.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function __construct( $name, $desc, $more ) {
		parent::__construct( $name, $desc, $more );
	}

	/**
	 * Sets whether this checkbox is checked or not.
	 *
	 * @param    boolean  $value   Whether this checkbox is checked or not.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function set_value( $value ) {
		$this->checked = $value;
	}

	// @Implements
	public function display() {

		// Preparing data for the partial
		// -----------------------------------------------
		$id      = str_replace( '_', '-', $this->name );
		$name    = $this->option_name . '[' . $this->name . ']';
		$desc    = $this->desc;
		$more    = $this->more;
		$checked = $this->checked;
		// -----------------------------------------------
		include PLUGIN_NAME_DIR_PATH . '/admin/views/partials/settings/plugin-name-checkbox-setting.php';

	}

	// @Implements
	public function sanitize( $input ) {
		if ( isset( $input[$this->name] ) && 'on' === $input[$this->name] ) {
			$input[$this->name] = true;
		} else {
			$input[$this->name] = false;
		}
		return $input;
	}

}
