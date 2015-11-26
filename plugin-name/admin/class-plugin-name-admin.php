<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */
class Plugin_Name_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since  0.0.0
	 * @access private
	 * @var    string $pn_var
	 */
	private $pn_var;

	/**
	 * The version of this plugin.
	 *
	 * @since  0.0.0
	 * @access private
	 * @var    string
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $pn_var  The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public function __construct( $pn_var, $version ) {

		$this->pn_var = $pn_var;
		$this->version = $version;

	}//end __construct()

	/**
	 * Includes all required classes.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public function includes() {

		if ( ! defined( 'DOING_AJAX' ) ) {
			require_once( PLUGIN_NAME_ADMIN_DIR . '/class-plugin-name-admin-menus.php' );
			$admin_menus = new Plugin_Name_Admin_Menus();
			$admin_menus->define_admin_hooks();
		}

	}//end includes()

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->pn_var, plugin_dir_url( __FILE__ ) . 'css/admin.css', array(), $this->version, 'all' );

	}//end enqueue_styles()

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since  0.0.0
	 * @access public
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->pn_var, plugin_dir_url( __FILE__ ) . 'js/admin.js', array( 'jquery' ), $this->version, false );

	}//end enqueue_scripts()

}//end class

