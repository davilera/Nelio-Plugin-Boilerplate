<?php

/**
 * This file contains the Text Area Setting class.
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
 * This class represents a text area setting.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings
 * @author     Your Name <your.name@example.com>
 */
class Plugin_Name_Text_Area_Setting extends Plugin_Name_Abstract_Setting {

	/**
	 * The concrete value of this field.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $value;

	/**
	 * A placeholder text to be displayed when the field is empty.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $placeholder;

	/**
	 * Creates a new instance of this class.
	 *
	 * @param    string   $name         The name that identifies this setting.
	 * @param    string   $desc         A text that describes this field.
	 * @param    string   $more         A link pointing to more information about this field.
	 * @param    string   $placeholder  A placeholder text to be displayed when the field is empty.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function __construct( $name, $desc, $more, $placeholder = '' ) {
		parent::__construct( $name, $desc, $more );
		$this->placeholder = $placeholder;
	}

	/**
	 * Sets the value of this field to the given string.
	 *
	 * @param    string   $value   The value of this field.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function set_value( $value ) {
		$this->value = $value;
	}

	// @Implements
	public function display() {

		// Preparing data for the partial
		// -----------------------------------------------
		$id          = str_replace( '_', '-', $this->name );
		$name        = $this->option_name . '[' . $this->name . ']';
		$desc        = $this->desc;
		$more        = $this->more;
		$value       = $this->value;
		$placeholder = $this->placeholder;
		// -----------------------------------------------
		include PLUGIN_NAME_INCLUDES_DIR . '/lib/settings/partials/plugin-name-text-area-setting.php';

	}

	// @Implements
	public function sanitize( $input ) {
		if ( ! isset( $input[$this->name] ) ) {
			$input[$this->name] = $this->value;
		}

		$value = $this->sanitize_text( $input[$this->name] );
		$input[$this->name] = $value;

		return $input;
	}

	/**
	 * This function sanitizes the input value.
	 *
	 * @param    string   $value   The current value that has to be sanitized.
	 *
	 * @return   string   The input text properly sanitized.
	 *
	 * @see      sanitize_text_field
	 * @since    0.0.0
	 * @access   private
	 */
	private function sanitize_text( $value ) {
		return sanitize_text_field( $value );
	}

}
