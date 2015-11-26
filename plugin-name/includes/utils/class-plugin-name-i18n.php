<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
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
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/utils
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */
class Plugin_Name_i18n {

	/**
	 * The domain specified for this plugin.
	 *
	 * @since  0.0.0
	 * @access private
	 * @var    string $domain The domain identifier for this plugin.
	 */
	private $domain;

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			$this->domain,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}//end load_plugin_textdomain()

	/**
	 * Set the domain equal to that of the specified domain.
	 *
	 * @param string $domain The domain that represents the locale of this plugin.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public function set_domain( $domain ) {
		$this->domain = $domain;
	}//end set_domain()

}//end class
