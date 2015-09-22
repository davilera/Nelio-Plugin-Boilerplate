<?php

/**
 * This file has the Settings class, which defines and registers Plugin Name's Settings.
 *
 * @since      0.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( PLUGIN_NAME_INCLUDES_DIR . '/lib/settings/abstract-class-plugin-name-abstract-settings.php' );

/**
 * The Settings class, responsible of defining, registering, and providing access to all Plugin Name's settings.
 *
 * @since      0.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <your.name@example.com>
 */
final class Plugin_Name_Settings extends Plugin_Name_Abstract_Settings {

	/**
	 * The single instance of this class.
	 *
	 * @since    0.0.0
	 * @access   private
	 * @var      Plugin_Name_Settings
	 */
	private static $_instance;

	/**
	 * Initialize the class, set its properties, and add the proper hooks.
	 *
	 * @since    0.0.0
	 * @access   protected
	 */
	protected function __construct() {

		// Add as many tabs as you want. If you have one tab only, no tabs will be shown at all.
		$tabs = array(

			array(
				'name'   => 'standard-fields',
				'label'  => __( 'Standard Fields', 'plugin-name' ),
				'fields' => include PLUGIN_NAME_INCLUDES_DIR . '/data/standard-fields-tab.php'
			),

			array(
				'name'   => 'advanced-fields',
				'label'  => __( 'Advanced Fields', 'plugin-name' ),
				'fields' => include PLUGIN_NAME_INCLUDES_DIR . '/data/advanced-fields-tab.php'
			)

		);

		parent::__construct( 'plugin-name', $tabs );

	}

	/**
	 * Returns the single instance of this class.
	 *
	 * @return Plugin_Name_Settings the single instance of this class.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

}

Plugin_Name_Settings::instance();
