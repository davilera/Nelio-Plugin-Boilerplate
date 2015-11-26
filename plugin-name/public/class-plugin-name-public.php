<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */
class Plugin_Name_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since  0.0.0
	 * @access private
	 * @var    string
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
	 * @param string $pn_var  The name of the plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since 0.0.0
	 */
	public function __construct( $pn_var, $version ) {

		$this->pn_var = $pn_var;
		$this->version = $version;

	}//end __construct()

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since 0.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->pn_var, plugin_dir_url( __FILE__ ) . 'css/public.css', array(), $this->version, 'all' );

	}//end enqueue_styles()

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since 0.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->pn_var, plugin_dir_url( __FILE__ ) . 'js/public.js', array( 'jquery' ), $this->version, false );

	}//end enqueue_scripts()

}//end class

