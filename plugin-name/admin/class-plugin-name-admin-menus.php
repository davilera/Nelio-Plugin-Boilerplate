<?php

/**
 * Setup menus in the WordPress Dashboard.
 *
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Setups Plugin Name's menu and submenus in the WordPress Dashboard.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <your.name@example.com>
 */
class Plugin_Name_Admin_Menus {

	/**
	 * The identifying name of Plugin Name's menus and submenus.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string
	 */
	private $menu_slug;

	/**
	 * Menu's position.
	 *
	 * @see https://codex.wordpress.org/Function_Reference/add_menu_page
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string
	 */
	private $position;

	/**
	 * Initializes the class and sets its properties.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function __construct() {

		$this->menu_slug = 'plugin-name';
		$this->position  = '59.1';
	}

	/**
	 * Adds the proper hooks.
	 *
	 * By default, the resulting menu will look as follows:
	 *
	 * Plugin Name default menu:
	 *  * Custom Page.      Priority 20.
	 *  * Settings.         Priority 40.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function define_admin_hooks() {

		add_action( 'admin_menu', array( $this, 'create_menu_entry' ), 1 );
		add_action( 'admin_menu', array( $this, 'add_custom_pages' ), 20 );
		add_action( 'admin_menu', array( $this, 'add_settings_page' ), 40 );

	}

	/**
	 * Returns the slug of the menu, so that plugins can add their own entries.
	 *
	 * @return string the slug of the menu, so that plugins can add their own entries.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function get_menu_slug() {

		return $this->menu_slug;

	}

	/**
	 * Creates a new menu entry.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function create_menu_entry() {

		// Load default icon
		$svg_icon_file = PLUGIN_NAME_ADMIN_DIR . '/images/logo.svg';
		$svg = 'data:image/svg+xml;base64,' . base64_encode( file_get_contents( $svg_icon_file ) );

		// Contents of the parent menu
		add_menu_page(
			__( 'Plugin Name', 'plugin-name' ),
			__( 'Plugin Name', 'plugin-name' ),
			'manage_options',
			$this->menu_slug,
			array( $this, 'print_main_page' ),
			$svg,
			$this->position );

	}

	/**
	 * Adds a secondary "Add Experiment" entry and the Dashboard.
	 *
	 * The secondary "Add Experiment" entry is added so that we can have two
	 * different pages.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function add_custom_pages() {

		add_submenu_page( $this->menu_slug,
			__( 'Some Page', 'plugin-name' ),
			__( 'Some Page', 'plugin-name' ),
			'manage_options',
			'plugin-name-custom-page',
			array( $this, 'print_some_page' ) );

	}

	/**
	 * Adds the My Account (or Free Trial) and the Settings submenu entries.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function add_settings_page() {

		// Settings page
		// ----------------------------------------------------------------------
		add_submenu_page( $this->menu_slug,
			__( 'Settings', 'plugin-name' ),
			__( 'Settings', 'plugin-name' ),
			'manage_options',
			'plugin-name-settings',
			array( $this, 'print_settings_page' ) );

	}

	/**
	 * Print the New Experiment Selector page.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function print_main_page() {

		// This variable is used in the template.
		$example = __( 'Lorem ipsum dolor sit amet.', 'plugin-name' );

		include_once( 'views/plugin-name-main-page.php' );

	}

	/**
	 * Print the New Experiment Selector page.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function print_some_page() {

		include_once( 'views/plugin-name-some-page.php' );

	}

	/**
	 * Print the Settings page.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function print_settings_page() {

		$settings = Plugin_Name_Settings::instance();
		include_once( 'views/plugin-name-settings-page.php' );

	}

}

