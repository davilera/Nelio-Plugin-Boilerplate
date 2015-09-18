<?php

/**
 * The file that defines an autoloader class, for automatically loading classes.
 *
 * @since      0.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/utils
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin Name Autoloader
 *
 * @since      0.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/utils
 * @author     Your Name <your.name@example.com>
 */
class Plugin_Name_Autoloader {

	/**
	 * The Constructor
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function __construct() {
		if ( function_exists( "__autoload" ) ) {
			spl_autoload_register( "__autoload" );
		}
		spl_autoload_register( array( $this, 'autoload' ) );
	}

	/**
	 * Loads a class file. Returns whether the file has been successfully loaded.
	 *
	 * @param    string   $path    The class file to be loaded.
	 * @return   bool     Whether the file has been successfully loaded.
	 *
	 * @since    0.0.0
	 * @access   private
	 */
	private function load_file( $path ) {
		if ( $path && is_readable( $path ) ) {
			include_once( $path );
			return true;
		}
		return false;
	}

	/**
	 * Auto-load Plugin_Name classes on demand to reduce memory consumption.
	 *
	 * @param    string   $class    ajax, frontend or admin
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function autoload( $class ) {
		if ( strpos( $class, 'Plugin_Name_' ) !== 0 ) {
			return;
		}

		$dictionary = array();
		$dictionary['Plugin_Name_Settings'] = '/includes/class-plugin-name-settings.php';
		$dictionary['Plugin_Name_Abstract_Setting'] = '/admin/settings/abstract-class-plugin-name-abstract-setting.php';
		$dictionary['Plugin_Name_Checkbox_Setting'] = '/admin/settings/class-plugin-name-checkbox-setting.php';
		$dictionary['Plugin_Name_Conversion_Value_Setting'] = '/admin/settings/class-plugin-name-conversion-value-setting.php';
		$dictionary['Plugin_Name_Input_Setting'] = '/admin/settings/class-plugin-name-input-setting.php';
		$dictionary['Plugin_Name_Notification_Email_Setting'] = '/admin/settings/class-plugin-name-notification-email-setting.php';
		$dictionary['Plugin_Name_Quota_Limit_Setting'] = '/admin/settings/class-plugin-name-quota-limit-setting.php';
		$dictionary['Plugin_Name_Range_Setting'] = '/admin/settings/class-plugin-name-range-setting.php';
		$dictionary['Plugin_Name_Select_Algorithm_Setting'] = '/admin/settings/class-plugin-name-select-algorithm-setting.php';
		$dictionary['Plugin_Name_Select_Setting'] = '/admin/settings/class-plugin-name-select-setting.php';
		$dictionary['Plugin_Name_Setting'] = '/admin/settings/interface-plugin-name-setting.php';

		/**
		 * @var string $path
		 */
		$path = '';
		if ( isset( $dictionary[$class] ) ) {
			$path = PLUGIN_NAME_DIR_PATH . $dictionary[$class];
		}

		/**
		 * This action fires right before a certain Plugin Name class is automatically loaded.
		 *
		 * @param    string    $class    The name of the class to be loaded.
		 * @param    string    $path     The path of the file that contains this class.
		 *                                If it's empty, the class was not found.
		 *
		 * @since    0.0.0
		 */
		do_action( 'plugin_name_autoload_class', $class, $path );

		if ( ! empty( $path ) ) {
			$this->load_file( $path );
		}
	}
}

new Plugin_Name_Autoloader();
