<?php

/**
 * This file contains the Range Setting class.
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
 * This class represents a Range setting.
 *
 * Ranges are sliders that specify a minimum and a maximum values,
 * as well as the size of its steps.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/settings
 * @author     Your Name <your.name@example.com>
 */
class Plugin_Name_Range_Setting extends Plugin_Name_Abstract_Setting {

	/**
	 * The current value of this field.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      int
	 */
	protected $value;

	/**
	 * Minimum value for the range.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      int
	 */
	protected $min;

	/**
	 * Maximum value for the range.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      int
	 */
	protected $max;

	/**
	 * The value in which the range decrements or increments
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      int
	 */
	protected $step;

	/**
	 * Additional text that describes the range value
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $verbose_value;

	/**
	 * Creates a new instance of this class.
	 *
	 * @param    string   $name     The name that identifies this setting.
	 * @param    string   $desc     A text that describes this field.
	 * @param    string   $more     A link pointing to more information about this field.
	 * @param    array    $args     A set of specific attributes for the range.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function __construct( $name, $desc, $more, $args ) {
		parent::__construct( $name, $desc, $more );
		$this->verbose_value = $args['label'];
		$this->min           = $args['min'];
		$this->max           = $args['max'];
		$this->step          = $args['step'];
	}

	/**
	 * Sets the value of this field to the given number.
	 *
	 * @param    int    $value    The current value of this field.
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
		$id            = str_replace( '_', '-', $this->name );
		$name          = $this->option_name . '[' . $this->name . ']';
		$desc          = $this->desc;
		$more          = $this->more;
		$value         = $this->value;
		$verbose_value = $this->verbose_value;
		$min           = $this->min;
		$max           = $this->max;
		$step          = $this->step;
		// -----------------------------------------------
		include PLUGIN_NAME_DIR_PATH . '/admin/views/partials/settings/plugin-name-range-setting.php';

	}

	// @Implements
	public function sanitize( $input ) {
		if ( ! isset( $input[$this->name] ) ) {
			$input[$this->name] = $this->value;
		} else {
			$input[$this->name] = intval( $input[$this->name] );
		}
		return $input;
	}

}
