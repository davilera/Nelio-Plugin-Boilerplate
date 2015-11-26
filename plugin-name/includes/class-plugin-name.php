<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      0.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <your.name@example.com>
 */
final class Plugin_Name {

	/**
	 * The single instance of this class.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      Plugin_Name
	 */
	protected static $_instance;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $pn_var;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	private function __construct() {

		$this->pn_var = 'plugin_name';
		$this->version = '0.0.0';

		$this->define_constants();
		$this->load_dependencies();
		$this->set_locale();

		if ( $this->is_request( 'admin' ) ) {
			$this->define_admin_hooks();
		}

		if ( $this->is_request( 'frontend' ) ) {
			$this->define_public_hooks();
		}

		/**
		 * Fires after (possibly) all dependencies are loaded and hooks are created.
		 *
		 * @since      0.0.0
		 */
		do_action( 'plugin_name_loaded' );

	}

	/**
	 * Cloning instances of this class is forbidden.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function __clone() {

		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '0.0.0' );

	}


	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public function __wakeup() {

		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '0.0.0' );

	}


	/**
	 * Returns the single instance of this class.
	 *
	 * @return Plugin_Name the single instance of this class.
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

	/**
	 * Defines the constants.
	 *
	 * @since    0.0.0
	 * @access   public
	 */
	public static function define_constants() {

		define( 'PLUGIN_NAME_ADMIN_DIR',    PLUGIN_NAME_DIR . '/admin' );
		define( 'PLUGIN_NAME_PUBLIC_DIR',   PLUGIN_NAME_DIR . '/public' );
		define( 'PLUGIN_NAME_INCLUDES_DIR', PLUGIN_NAME_DIR . '/includes' );

		define( 'PLUGIN_NAME_ADMIN_URL',    PLUGIN_NAME_URL . '/admin' );
		define( 'PLUGIN_NAME_INCLUDES_URL', PLUGIN_NAME_URL . '/includes' );
		define( 'PLUGIN_NAME_PUBLIC_URL',   PLUGIN_NAME_URL . '/public' );

	}

	/**
	 * What type of request is this?
	 * @param    string   $type    ajax, frontend or admin
	 * @return   bool
	 *
	 * @since    0.0.0
	 * @access   private
	 */
	private function is_request( $type ) {

		switch ( $type ) {
			case 'admin' :
				return is_admin();
			case 'ajax' :
				return defined( 'DOING_AJAX' );
			case 'cron' :
				return defined( 'DOING_CRON' );
			case 'frontend' :
				return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
			default:
				return false;
		}

	}

	/**
	 * Load the (minimum) required dependencies for this plugin.
	 *
	 * @since    0.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		require_once( PLUGIN_NAME_INCLUDES_DIR . '/utils/plugin-name-core-functions.php' );
		require_once( PLUGIN_NAME_INCLUDES_DIR . '/utils/class-plugin-name-i18n.php' );

		require_once( PLUGIN_NAME_INCLUDES_DIR . '/utils/class-plugin-name-install.php' );

		require_once( PLUGIN_NAME_INCLUDES_DIR . '/class-plugin-name-settings.php' );

		if ( $this->is_request( 'admin' ) ) {
			require_once( PLUGIN_NAME_ADMIN_DIR . '/class-plugin-name-admin.php' );
		}

		if ( $this->is_request( 'frontend' ) ) {
			require_once( PLUGIN_NAME_PUBLIC_DIR . '/class-plugin-name-public.php' );
		}

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Plugin_Name_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    0.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Plugin_Name_i18n();
		$plugin_i18n->set_domain( $this->get_pn_var() );

		add_action( 'plugins_loaded', array( $plugin_i18n, 'load_plugin_textdomain' ) );

	}

	/**
	 * Register the main hooks related to the admin area functionality of the plugin.
	 *
	 * @since    0.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Plugin_Name_Admin( $this->get_pn_var(), $this->get_version() );

		add_action( 'admin_enqueue_scripts', array( $plugin_admin, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $plugin_admin, 'enqueue_scripts' ) );

		add_action( 'init', array( Plugin_Name_Settings::instance(), 'define_admin_hooks' ) );

		add_action( 'init', array( $plugin_admin, 'includes' ) );

	}

	/**
	 * Register the main hooks related to the public-facing functionality of the plugin.
	 *
	 * @since    0.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Plugin_Name_Public( $this->get_pn_var(), $this->get_version() );

		add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_scripts' ) );

	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     0.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_pn_var() {
		return $this->pn_var;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     0.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}

/**
 * Returns the single instance of the Plugin_Name class.
 *
 * @since    0.0.0
 * @return   Plugin_Name    The single instance of the Plugin_Name class.
 */
function Plugin_Name() {
	return Plugin_Name::instance();
}
