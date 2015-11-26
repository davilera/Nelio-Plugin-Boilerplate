<?php
/**
 * This file contains the Radio Setting class.
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
 * This class represents a Radio setting.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */
class Plugin_Name_Radio_Setting extends Plugin_Name_Abstract_Setting {

	/**
	 * The currently-selected value of this radio.
	 *
	 * @since  0.0.0
	 * @access protected
	 * @var    string
	 */
	protected $value;

	/**
	 * The list of options.
	 *
	 * @since  0.0.0
	 * @access protected
	 * @var    array
	 */
	protected $options;

	/**
	 * Creates a new instance of this class.
	 *
	 * @param string $name    The name that identifies this setting.
	 * @param string $desc    A text that describes this field.
	 * @param string $more    A link pointing to more information about this field.
	 * @param array  $options The list of options.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public function __construct( $name, $desc, $more, $options ) {

		parent::__construct( $name, $desc, $more );
		$this->options = $options;

	}//end __construct()

	/**
	 * Specifies which option is selected.
	 *
	 * @param string $value The currently-selected value of this radio.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public function set_value( $value ) {
		$this->value = $value;
	}//end set_value()

	// @codingStandardsIgnoreStart
	// @Implements
	public function display() {
	// @codingStandardsIgnoreEnd

		// Preparing data for the partial.
		$id       = str_replace( '_', '-', $this->name );
		$name     = $this->option_name . '[' . $this->name . ']';
		$value    = $this->value;
		$options  = $this->options;
		$desc     = $this->desc;
		$more     = $this->more;
		include PLUGIN_NAME_INCLUDES_DIR . '/lib/settings/partials/plugin-name-radio-setting.php';

	}//end display()

	// @codingStandardsIgnoreStart
	// @Implements
	public function sanitize( $input ) {
	// @codingStandardsIgnoreEnd
		if ( ! isset( $input[ $this->name ] ) ) {
			$input[ $this->name ] = $this->value;
		}
		$is_value_correct = false;
		foreach ( $this->options as $option ) {
			if ( $option['value'] === $input[ $this->name ] ) {
				$is_value_correct = true;
			}
		}
		if ( ! $is_value_correct ) {
			$input[ $this->name ] = $this->value;
		}
		return $input;
	}//end sanitize()

}//end class

