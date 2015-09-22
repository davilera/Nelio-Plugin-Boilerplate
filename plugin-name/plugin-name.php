<?php

/**
 * The plugin bootstrap file.
 *
 * @since             0.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Name
 * Plugin URI:        http://example.com/plugin-name/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           0.0.0
 *
 * Author:            Your Name
 * Author URI:        http://example.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'PLUGIN_NAME_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_plugin_name() {
	/** @noinspection PhpIncludeInspection */
	require_once( PLUGIN_NAME_DIR . '/includes/utils/class-plugin-name-activator.php' );
	Plugin_Name_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_plugin_name() {
	/** @noinspection PhpIncludeInspection */
	require_once( PLUGIN_NAME_DIR . '/includes/utils/class-plugin-name-deactivator.php' );
	Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_name' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 *
 * @noinspection PhpIncludeInspection
 */

// The core plugin class that is used to define internationalization,
// admin-specific hooks, and public-facing site hooks.
require( PLUGIN_NAME_DIR . '/includes/class-plugin-name.php' );

// Let's begin the execution of the plugin.
//
// Since everything within the plugin is registered via hooks,
// then kicking off the plugin from this point in the file does
// not affect the page life cycle.
Plugin_Name();

