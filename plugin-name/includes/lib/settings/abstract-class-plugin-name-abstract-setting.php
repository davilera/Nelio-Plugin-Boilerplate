<?php

/**
 * Abstract class that implements the `register` method of the `Plugin_Name_Setting` interface.
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
 * A class that represents a Plugin_Name Setting.
 *
 * It only implements the `register` method, which will be common among all
 * Plugin_Name A/B Testing's settings.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings
 * @author     Your Name <your.name@example.com>
 */
abstract class Plugin_Name_Abstract_Setting implements Plugin_Name_Setting {

	/**
	 * The label associated to this setting.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $label;

	/**
	 * The name that identifies this setting.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $name;

	/**
	 * A text that describes this field.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $desc;

	/**
	 * A link pointing to more information about this field.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $more;

	/**
	 * The option name in which this setting will be stored.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $option_name;

	/**
	 * Creates a new instance of this class.
	 *
	 * @param    string   $name   The name that identifies this setting.
	 * @param    string   $desc   Optional. A text that describes this field.
	 *                            Default: the empty string.
	 * @param    string   $more   Optional. A link pointing to more information about this field.
	 *                            Default: the empty string.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function __construct( $name, $desc = '', $more = '' ) {

		$this->name = $name;
		$this->desc = $desc;
		$this->more = $more;

	}

	/**
	 * Returns the name that identifies this setting.
	 *
	 * @return   string   The name that identifies this setting.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function get_name() {
		return $this->name;
	}

	// @Implements
	public function register( $label, $page, $section, $option_group, $option_name ) {

		$this->label       = $label;
		$this->option_name = $option_name;

		register_setting(
			$option_group,
			$option_name,
			array( $this, 'sanitize' ) // Sanitization function
		);

		$label = $this->generate_label();
		add_settings_field(
			$this->name,  // The ID of the settings field
			$label,       // The name of the field of setting(s)
			array( $this, 'display' ),
			$page,
			$section
		);

	}

	/**
	 * This function generates a label for this field.
	 *
	 * In particular, it adds the `label` tag and a help icon (if a description
	 * was provided).
	 *
	 * @return   string   the label for this field.
	 *
	 * @since    0.0.0
	 * @access   protected
	 */
	protected function generate_label() {

		$label = '<label for="' . $this->option_name . '">' . $this->label . '</label>';

		if ( ! empty( $this->desc ) ) {
			$img = PLUGIN_NAME_INCLUDES_URL . '/lib/settings/assets/images/help.png';
			$label .= '<img class="plugin-name-help" style="float:right;margin-right:-15px;cursor:pointer;" src="' . $img . '" height="16" width="16" />';
		}

		return $label;

	}

}
