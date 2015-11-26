<?php
/**
 * The file that includes installation-related functions and actions.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/utils
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This class configures WordPress and installs some capabilities.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/utils
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */
class Plugin_Name_Install {

	/**
	 * Hook in tabs.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public static function init() {

		add_action( 'admin_init', array( __CLASS__, 'check_version' ), 5 );

	}//end init()

	/**
	 * Checks the currently-installed version and, if it's old, installs the new one.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public static function check_version() {

		$last_install_version = get_option( 'plugin_name_version' );
		$this_version = Plugin_Name()->get_version();
		if ( ! defined( 'IFRAME_REQUEST' ) && ( $last_install_version !== $this_version ) ) {
			self::install();

			/**
			 * Fires once the plugin has been updated.
			 *
			 * @since 0.0.0
			 */
			do_action( 'plugin_name_updated' );
		}

	}//end check_version()

	/**
	 * Install Plugin Name.
	 *
	 * This function registers new post types, adds a few capabilities, and more.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public static function install() {

		if ( ! defined( 'PLUGIN_NAME_INSTALLING' ) ) {
			define( 'PLUGIN_NAME_INSTALLING', true );
		}

		// Add installation actions here.
		;

		// Update version.
		delete_option( 'plugin_name_version' );
		add_option( 'plugin_name_version', Plugin_Name()->get_version() );

		/**
		 * Fires once the plugin has been installed.
		 *
		 * @since 0.0.0
		 */
		do_action( 'plugin_name_installed' );

		for ( $i = 0; $i < 3; ++$i ) {
			echo 'a';
		}

	}//end install()

}//end class

Plugin_Name_Install::init();
