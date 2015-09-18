<?php

/**
 * The file that includes installation-related functions and actions.
 *
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/utils
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This class configures WordPress and installs some capabilities.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/utils
 *
 * @since      1.0.0
 * @author     Your Name <your.name@example.com>
 */
class Plugin_Name_Install {

	/**
	 * Hook in tabs.
	 *
	 * @since    1.0.0
	 */
	public static function init() {

		add_action( 'admin_init', array( __CLASS__, 'check_version' ), 5 );

	}

	/**
	 * Checks the currently-installed version and, if it's old, installs the new one.
	 *
	 * @since    1.0.0
	 */
	public static function check_version() {

		$last_installed_version = get_option( 'plugin_name_version' );
		$this_version = Plugin_Name()->get_version();
		if ( ! defined( 'IFRAME_REQUEST' ) && ( $last_installed_version !== $this_version ) ) {
			self::install();

			/**
			 * Fires once the plugin has been updated.
			 *
			 * @since      1.0.0
			 */
			do_action( 'plugin_name_updated' );
		}

	}

	/**
	 * Install Plugin Name.
	 *
	 * This function registers new post types, adds a few capabilities, and more.
	 *
	 * @since    1.0.0
	 */
	public static function install() {

		if ( ! defined( 'PLUGIN_NAME_INSTALLING' ) ) {
			define( 'PLUGIN_NAME_INSTALLING', true );
		}

		// Add installation actions here

		// Update version
		delete_option( 'plugin_name_version' );
		add_option( 'plugin_name_version', Plugin_Name()->get_version() );

		/**
		 * Fires once the plugin has been installed.
		 *
		 * @since      1.0.0
		 */
		do_action( 'plugin_name_installed' );

	}

}

Plugin_Name_Install::init();
